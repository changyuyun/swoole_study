<?php
/**
 * Created by PhpStorm.
 * User: chang
 * Date: 2019/5/24
 * Time: 12:57
 */
$serv = new swoole_server("127.0.0.1", 9501);

$serv->set([
    'work_num' => 8,
    'max_request' => 10000,
]);

$serv->on('connect', function($serv, $fd) {
    echo "client: connect.\n";
});

$serv->on('receive', function($serv, $fd, $from_id, $data) {
    $serv->send($fd, "server:".$data);
});

$serv->on('close', function ($serv, $fd) {
    echo "client: close.\n";
});

$serv->start();