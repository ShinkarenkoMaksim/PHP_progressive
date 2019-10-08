<?php
namespace app\models;

use app\engine\Db;
use app\models\entities\DataEntity;

/**
 * Class Model
 * @package app\models
 */

abstract class Repository extends Models
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }


    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field AND order_id IS NULL";
        return $this->db->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getLimit($from, $to) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return $this->db->queryLimit($sql, $from, $to);
}

    public  function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return $this->db->queryObject($sql, ["$field"=>$value], $this->getEntityClass());
    }

    public function delWhere(array $where) {
        $rowVals = '';
        foreach ($where as $key => $value){
            $rowVals .= "`" . $key . "`=" . ":" . $key . " AND ";
        }
        $rowVals = substr($rowVals, 0 , -5);

        $sql = "DELETE FROM `{$this->getTableName()}` WHERE {$rowVals};";

        return $this->db->execute($sql, $where);

    }

    public function insert(DataEntity $entity) {
        $params = [];
        $columns = [];
        $tableName = $this->getTableName();
        foreach ($entity->state as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        $this->db->execute($sql, $params);
        $entity->id = $this->db->lastInsertId();
    }

    public function delete(DataEntity $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, ['id' => $entity->id]);
    }

    public function update(DataEntity $entity) {
        $params = [];
        $rowVals = '';
        foreach ($entity as $key => $value){
            if ($entity->state[$key] === true) {
                $rowVals .= "`" . $key . "`=" . ":" . $key . ", ";
                $params[$key] = $value;
                $entity->state[$key] = false;
            }
        }
        $params['id'] = $entity->id;
        $rowVals = substr($rowVals, 0 , -2);

        $sql = "UPDATE `{$this->getTableName()}` SET {$rowVals} WHERE `id`=:id;";

        return $this->db->execute($sql, $params);
    }

    public function save(DataEntity $entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }

    public function getOne($id) {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        $request = $this->db->queryObject($sql, ['id' => $id], $this->getEntityClass());

        return $request;
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}