var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var guestNumber = 1;
var nickNames = {};
var namesUsed = [];
var currentRoom = {};

app.get('/', function(req, res) {
	res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
  console.log('a user connected');
  guestNumber = assignGuestName(socket, guestNumber, nickNames, namesUsed);
  joinRoom(socket, 'Lobby');
  handleMessageBroadcasting(socket, nickNames);
  handleNameChangeAttempts(socket, nickNames, namesUsed);
  handleRoomJoining(socket);
  
  socket.on('disconnect', function(){
    console.log('user disconnected');
    io.emit('leaveGuest', nickNames[socket.id]);
    var nameIndex = namesUsed.indexOf(nickNames[socket.id]);
		delete namesUsed[nameIndex];
		delete nickNames[socket.id];
  });
});

function assignGuestName(socket, guestNumber, nickNames, namesUsed) {
	var name = 'Guest' + guestNumber;
	nickNames[socket.id] = name;
	socket.emit('nameResult', {
		success: true,
		name: name
	});
	io.emit('newGuest', name);
	namesUsed.push(name);
	return guestNumber + 1;
}
function joinRoom(socket, room) {
	socket.join(room);
	currentRoom[socket.id] = room;
	socket.emit('joinResult', {room:room});
	socket.broadcast.to(room).emit('message', {
		text: nickNames[socket.id] + ' has joined ' + room + '.'
	});
	var usersInRoom = io.sockets.adapter.rooms[room];
	var currentGuests = [];
	for(var index in usersInRoom) {currentGuests.push(nickNames[index]);}
	io.emit('currentGuests', {
		currentGuests: currentGuests,
		room: room
	});
}
function handleMessageBroadcasting(socket) {
	socket.on('chat message', function(msg) {
		io.to(msg.room).emit('chat message', nickNames[socket.id] + ': ' + msg.text);
	});
}
function handleNameChangeAttempts(socket, nickNames, namesUsed) {
	socket.on('nameAttempt', function(name) {
		if(name.indexOf('Guest') == 0 || name == '') {
			socket.emit('nameResult', {
				success: false,
				message: 'Names cannot begin with "Guest" or empty.'
			});
		} else {
			if(namesUsed.indexOf(name) == -1) {
				var previousName = nickNames[socket.id];
				var previousNameIndex = namesUsed.indexOf(previousName);
				namesUsed.push(name);
				nickNames[socket.id] = name;
				delete namesUsed[previousNameIndex];
				socket.emit('nameResult', {
					success: true,
					name: name
				});
				io.emit('changName', {
					name: name,
					previousName: previousName
				});
			} else {
				socket.emit('nameResult', {
					success: false,
					message: 'That name is already in use.'
				});
			}
		}
	});
}
function handleRoomJoining(socket) {
	socket.on('join', function(room) {
		if(currentRoom[socket.id] != room) {
			socket.leave(currentRoom[socket.id]);
			io.to(currentRoom[socket.id]).emit('leaveGuest', nickNames[socket.id]);
			joinRoom(socket, room);
		}	
	});
}
http.listen(3000, function() {
	console.log('listening on *:3000');
});