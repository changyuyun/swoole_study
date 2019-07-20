<?php
require_once 'AipNlp.php';
class Index{
    const APP_ID = '16841288';
    const API_KEY = 'hUVrwKwN8gYQYQd2pkZCLjoP';
    const SECRET_KEY = 'MVBGzlhwyui9ZUFO3mcca947PBXOxLIs';
    public function __construct()
    {
        $client = new AipNlp(self::APP_ID, self::API_KEY, self::SECRET_KEY);
        $text1 = "中华人民共和国";
        $text2 = "中华民国";
        $ret = $client->simnet($text1, $text2); //短文本相似
        echo json_encode($ret, JSON_UNESCAPED_UNICODE);
    }
}
new Index();
?>