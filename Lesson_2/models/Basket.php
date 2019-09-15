<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $name;
    public $sumTotal;
    public $userId;
    public $discount;

    public function getTableName()
    {
        return 'basket';
    }
}