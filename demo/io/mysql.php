<?php
/**
 * Created by PhpStorm.
 * User: chang
 * Date: 2019/5/24
 * Time: 16:53
 */
class snyc_mysql{
    public $dbSource;
    public $dbConfig;
    public function __construct()
    {
        $this->dbSource = new Swoole\Coroutine\MySQL;
        $this->dbConfig = [
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => 'ityun@123',
            'database' => 'swoole_test',
            'charset' => 'utf8'
        ];
    }

    public function update()
    {

    }

    public function add()
    {

    }

    public function execute($id, $username)
    {
           $result = $this->dbSource->connect($this->dbConfig);
           if($result === false){
               return false;
           }

           $sql = "select * from test";
           $ret = $this->dbSource->query($sql);
           if($ret === false){
               return ;
           }
           var_dump($ret);
    }
}

$obj = new snyc_mysql();
$obj->execute(1, 'ityun');