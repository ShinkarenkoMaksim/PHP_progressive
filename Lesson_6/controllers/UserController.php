<?php


namespace app\controllers;

use app\engine\Request;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin() {
        $request = (new Request())->getParams();
        if (isset($request['submit'])) {
            $login = $request['login'];
            $pass = $request['pass'];
            $user = User::getWhere('login', $login);
            if (!$user->auth($login, $pass)) {
                echo password_hash('111', PASSWORD_DEFAULT);
                Die("Не верный пароль!");
            } else {
                if (isset($request['save'])) {
                    $hash = uniqid(rand(), true);
                    $user->hash = $hash;
                    $user->update();
                    setcookie("hash", $hash, time() + 3600, '/');
                }
                header("Location: /");
            }
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        setcookie("hash", null, 0, "/");
        header("Location: /");
        exit();
    }
}