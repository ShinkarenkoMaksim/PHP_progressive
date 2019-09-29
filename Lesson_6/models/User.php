<?php

namespace app\models;

class User extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public static function getTableName() {
        return 'users';
    }

    public static function auth($login, $pass) {
        $user = static::getWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }

    public static function getName() {
        return static::isAuth() ? $_SESSION['login'] : "Guest";
    }

}