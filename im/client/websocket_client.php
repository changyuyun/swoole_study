<?php

$http = new swoole_http_server("www.biihu.com.cn", 80);
$http->set([
    'enable_static_handler' => true,
    'document_root' => "/home/work/hdtocs/swoole_study/demo/im/html"
]);

$http->on('request', function($request, $response) {
    $response->end('client.html');
});

$http->start();
