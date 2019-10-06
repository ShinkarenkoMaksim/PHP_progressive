<?php


namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;

class UserController extends Controller
{
    public function actionLogin() {
        $request = (new Request())->getParams();
        if (isset($request['submit'])) {
            $login = $request['login'];
            $pass = $request['pass'];
            $userRepo = new UserRepository();
            $user = $userRepo->getWhere('login', $login);
            if (!$userRepo->auth($login, $pass)) {
                Die("Не верный пароль! <br> Пароль admin - 123, пароль user - 111");
            } else {
                if (isset($request['save'])) {
                    $hash = uniqid(rand(), true);
                    $user->hash = $hash;
                    $userRepo->update($user);
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