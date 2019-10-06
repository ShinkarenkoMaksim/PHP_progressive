<?php

namespace app\models\entities;

class Product extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;

    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];

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





}