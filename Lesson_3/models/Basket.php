<?php


namespace app\models;


class Basket extends Model
{
    public $id;
    public $session_id;
    public $product_id;

    public function getTableName() {
        return 'basket';
    }
}