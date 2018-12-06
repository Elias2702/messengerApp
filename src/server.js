var socket = require('socket.io'),
    express = require('express'),
    https = require('https'),
    http = require('http'),
    logger = require('winston');



logger.remove(logger.transports.Console);
logger.add(logger.transports.Console, { colorize : true, timestamp : true});
logger.info('SocketIO > Listening on port');



var app = express();
var http_server = http.createServer(app).listen(3001);

function emitNewMessage(http_server) {
    var io = socket.listen(http_server);

    io.socket.On('connection', function (socket) {




    });


}

emitNewMessage(http_server);
