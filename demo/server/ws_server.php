<?php
/**
 * Created by PhpStorm.
 * User: chang
 * Date: 2019/5/24
 * Time: 15:14
 */
$server = new swoole_websocket_server("0.0.0.0", 8812);
//连接
$server->on('open', 'onOpen');

function onOpen($server, $request) {
    var_dump($request->fd);
    if($request->fd == 1){
        swoole_timer_tick(2000, function($timer_id){
            echo "2s: timerId:{$timer_id}\n";
        });
    }
}

//监听消息事件
$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

    swoole_timer_after(5000, function() use ($server, $frame){
        echo "5s-after\n";
        $server->push($frame->fd, 'server-time-after:');
    });
    $server->push($frame->fd, 'server-push-success');
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();

