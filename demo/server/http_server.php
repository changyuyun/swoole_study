<?php
$http = new swoole_http_server("www.biihu.com.cn", 9501);
//测试部署
$http->set([
    'enable_static_handler' => true,
    'document_root' => "/home/work/hdtocs/swoole_study/demo/html"
]);

$http->on('request', function($request, $response) {
    //print_r($request->get);
    $response->end("<h1>hello swoole. #".rand(1000,9999)."</h1>".json_encode($request->get));
});

$http->start();
