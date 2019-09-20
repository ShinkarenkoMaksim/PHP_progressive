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

    public function __construct($session_id = null, $product_id = null)
    {
        parent::__construct();
        $this->session_id = $session_id;
        $this->product_id = $product_id;

    }
}