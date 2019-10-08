<?php


namespace app\models\entities;


class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;
    public $user_id;
    public $order_id;

    public $state = [
        'session_id' => false,
        'user_id' => false,
        'product_id' => false,
        'order_id' => false,
    ];

    /**
     * Basket constructor.
     * @param $session_id
     * @param $product_id
     * @param $user_id
     */
    public function __construct($session_id = null, $product_id = null, $user_id = null, $order_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
        $this->order_id = $order_id;
    }

    public function setOrder ($order_id) :void
    {
        $this->order_id = $order_id;
        $this->state['order_id'] = true;
    }


}