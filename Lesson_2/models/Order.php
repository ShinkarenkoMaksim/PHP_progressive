<?php


namespace app\models;


class Order extends Model
{

    public $id;
    public $address;
    public $userId;
    public $sumTotal;
    public $status;

    public function getTableName()
    {
        return 'order';
    }
}