<?php

namespace app\controllers;


use app\engine\Request;
use app\models\Basket;
use app\models\User;

class ApiController extends Controller
{
    public function actionAddBasket() {

        if (User::isAuth()) {
            $user_id = User::getId();
            $field = 'user_id';
        } else {
            $field = 'session_id';
            $user_id = null;
        }


        (new Basket(session_id(), (new Request())->getParams()['id'], $user_id))->save();


        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere($field, $user_id ? $user_id : session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDeleteBasket() {

        $request = (new Request())->getParams();

        if (User::isAuth()) {
            $id = User::getId();
            $field = 'user_id';
            if (Basket::getOne($request['id'])->user_id !== $id)
                die('Отказано в доступе');
        } else {
            $id = session_id();
            $field = 'session_id';
            if (Basket::getOne($request['id'])->session_id !== $id)
                die('Отказано в доступе');
        }

        (Basket::getOne($request['id']))->delete();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere($field, $id)
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}