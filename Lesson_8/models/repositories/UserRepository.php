<?php

namespace app\models\repositories;

use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{
    public function getTableName() {
        return 'users';
    }

    public function auth($login, $pass) {
        $user = $this->getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public function isAuth() {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $user = $this->getWhere('hash', $hash);
            $id = $user->id;
            $login = $user->login;
            if (!empty($login)) {
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $id;
            }
        }
        return isset($_SESSION['login']) ? true: false;
    }

    public function getName() {
        return $this->isAuth() ? $_SESSION['login'] : "Guest";
    }

    public function getId() {
        return $_SESSION['id'];
    }

    public function getEntityClass () {
        return User::class;
    }

}