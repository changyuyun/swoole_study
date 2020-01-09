<?php
$clientFds = [];
$server = new swoole_websocket_server("0.0.0.0", 9502);

$server->on('open', function(swoole_websocket_server $server, $request) use (&$clientFds){
    $clientFds[] = $request->fd;
    $server->push($request->fd, " 连接成功，在线人数：".count($clientFds));
});

$server->on('message', function(swoole_websocket_server $server, swoole_websocket_frame $frame) use (&$clientFds){
    foreach($clientFds as $fd){
        $server->push($fd, $frame->data);
    }
});

$server->on('close', function ($ser, $fd) use (&$clientFds){
    $res = array_search($fd, $clientFds, true);
    unset($clientFds[$res]);
});

$server->start();

?>