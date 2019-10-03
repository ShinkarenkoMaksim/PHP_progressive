<?php

namespace app\models\entities;

class User extends DataEntity
{
    public $id;
    public $login;
    public $pass;
    public $hash;

    public $state = [
            'hash' => true,
        ];

    /**
     * User constructor.
     * @param $login
     * @param $pass
     * @param $hash
     * @param $id
     */
    public function __construct($login = null, $pass = null, $hash = null, $id = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->id = $id;
    }




}