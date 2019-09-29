<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{
    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getLimit($from, $to) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return Db::getInstance()->queryLimit($sql, $from, $to);
}

    public static function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryObject($sql, ["$field"=>$value], static::class);
    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        foreach ($this->state as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update() {
        $params = [];
        $rowVals = '';
        foreach ($this as $key => $value){
            if ($this->state[$key] === true) {
                $rowVals .= "`" . $key . "`=" . ":" . $key . ", ";
                $params[$key] = $value;
                $this->state[$key] = false;
            }
        }
        $params['id'] = $this->id;
        $rowVals = substr($rowVals, 0 , -2);

        $sql = "UPDATE `{$this->getTableName()}` SET {$rowVals} WHERE `id`=:id;";

        return Db::getInstance()->execute($sql, $params);
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public static function getOne($id) {
        $tableName = static::getTableName();

        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        $request = Db::getInstance()->queryObject($sql, ['id' => $id], static::class);

        return $request;
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

}