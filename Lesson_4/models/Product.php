<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;

    /**
     * @param null $name
     */

    //TODO Вариант как сделать "умный" update, переделать под __set чтобы небыло дублирования (опционально)
    public function setName($name): void
    {
        $this->name = $name;
        $this->state['name'] = true;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
        $this->state['description'] = true;
    }

    /**
     * @param null $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
        $this->state['price'] = true;
    }



    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];
    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }




}