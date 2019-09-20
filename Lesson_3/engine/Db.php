<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    use Tsingletone;


    private $connection = null;

    public function getConnection() { //Ради ластАйди пришлось сделать эту функцию публичной, иначе не смог заставить работать...
        if (is_null($this->connection)) {
            var_dump("Подключаюсь к БД...");
            $this->connection =  new \PDO($this->prepareDSNstring(),
                $this->config['login'],
                $this->config['password']);

            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_CLASS);
            $this->connection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
        }
       return $this->connection;
    }

    private function prepareDSNstring() {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
//SELECT * FROM product WHERE id = $id $params = ['id' => 1]
    private function query($sql, $params) {

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }


    public function execute($sql, $params = []) {
        $this->query($sql, $params);

        return true;
    }

    public function queryOne($sql, $params = [], $class=null) {
        return $this->queryAll($sql, $params, $class)[0];
    }

    public function queryAll($sql, $params = [], $class=null) {

        return $this->query($sql, $params)->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $class);

    }

}