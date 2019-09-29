<?php


namespace app\controllers;


use app\models\Basket;
use app\models\User;

class BasketController extends Controller
{
    public function actionIndex()
    {
        if (User::isAuth()) {
            $id = User::getId();
            $field = 'user_id';
        } else {
            $id = session_id();
            $field = 'session_id';
        }


        echo $this->render('basket', [
            'products' => Basket::getBasket($id, $field)]);
    }
}