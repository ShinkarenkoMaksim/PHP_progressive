<?php


namespace app\models\entities;


class Order extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $status = 0;
    public $session_id;
    public $user_id;


    public $state = [
        'name' => false,
        'phone' => false,
        'email' => false,
        'status' => false,
        'session_id' => false,
        'user_id' => false,
    ];

    /**
     * Order constructor.
     * @param $id
     * @param $name
     * @param $phone
     * @param $email
     * @param $status
     * @param $session_id
     * @param $user_id
     */
    public function __construct($name = null, $phone = null, $email = null, $session_id = null, $user_id = 0, $status = 0)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->status = $status;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
    }

}