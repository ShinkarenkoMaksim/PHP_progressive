<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function getTableName()
    {
        return 'products';
    }

    public function __construct($name = null, $description = null, $price = null)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;

    }


}