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
        $this->dbSource = new Swoole\Mysql;
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
        $this->dbSource->connect($this->dbConfig, function ($db, $result) {
           if($result === false){
               var_dump($db->connect_error);
           }

           $sql = "select * from test";

           $db->query($sql, function ($db, $result) {
               if($result === false){

               } elseif ($result === true){

               } else {
                   var_dump($result);
               }
           });
        });
        return true;
    }
}

$obj = new snyc_mysql();
$obj->execute(1, 'ityun');