<?php
$http = new swoole_http_server("www.biihu.com.cn", 9501);

$http->on('request', function($request, $response) {
    print_r($request->get);
    $response->end("<h1>hello swoole. #".rand(1000,9999)."</h1>");
});

$http->start();