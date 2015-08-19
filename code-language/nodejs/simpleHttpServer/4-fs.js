var fs = require('fs');
fs.readFile('ReadMe.md', 'utf-8', function(err, data) {
	if(err) {
		console.log(err);
	} else {
		console.log(data);
	}
});

//don't use this unless necessary
fs.open('ReadMe.md', 'r', function(err, fd) {
	if(err) {
		console.log(err);
		return;
	}
	var buf = new Buffer(8);
	fs.read(fd, buf, 0, 8, null, function(err, bytesRead, buffer) {
		if(err) {
			console.log(err);
			return;
		}
		console.log('bytesRead: ' + bytesRead); 
		console.log(buffer); 
	})
});