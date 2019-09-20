<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;

    public function getTableName() {
        return 'users';
    }

    public function __construct($login = null, $pass = null)
    {
        parent::__construct();
        $this->login = $login;
        $this->pass = $pass;

    }

}