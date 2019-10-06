<?php


namespace app\controllers;


use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $user = new UserRepository();
        if ($user->isAuth()) {
            $id = $user->getId();
            $field = 'user_id';
        } else {
            $id = session_id();
            $field = 'session_id';
        }


        echo $this->render('basket', [
            'products' => (new BasketRepository())->getBasket($id, $field)]);
    }
}