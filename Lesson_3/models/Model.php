<?php
namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert() {
        $params = [];
        $rowKeys = '';
        $rowVals = '';
        foreach ($this as $key => $value){
            if ($key === 'id' || $key === 'db')
                continue;
            $rowKeys .= "`" . $key . "`, ";
            $rowVals .= ":" . $key . ", ";
            $params[$key] = $value;
        }

        $rowKeys = substr($rowKeys, 0 , -2);
        $rowVals = substr($rowVals, 0 , -2);

        $sql = "INSERT INTO `{$this->getTableName()}`({$rowKeys}) VALUE ({$rowVals});";

        $this->db->execute($sql, $params);

        $this->id = $this->db->getConnection()->lastInsertId();
    }

    public function delete() {

    }
    public function update() {

    }



    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return $this->db->queryOne($sql, ['id' => $id]);
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}