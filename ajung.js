/**************************
** ajung created 12/20 **
**************************/

const WebSocket = require('ws');
const ws = new WebSocke('ws://cspro.sogang.ac.kr:8025/~cse20131605');

/*
var Server = require('ws').Server;
var wSocket = new WebSocket("ws://cspro.sogang.ac.kr:8025/~cse20131605");

wSocket.onmessage = function (e) { alert(e.data) };
wSocket.onopen = function (e) { alert("Connect") };
wSocket.onclose = function (e) { alert("Close") };
function send() {
    wSocket.send("Hello web socket");
}

wSocket.send("HiHI");*/