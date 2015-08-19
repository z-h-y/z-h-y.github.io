var cheerio = require('cheerio');
var server = require('./curl.js');

var url = "http://v.163.com/special/opencourse/englishs1.html";

server.download(url, function(data) {
	if(data) {
		var $ = cheerio.load(data);
		$("a").each(function(i, e) {
			console.log($(e).attr("href"));
		});
		console.log("done");
	} else {
		console.log("error");
	}
});