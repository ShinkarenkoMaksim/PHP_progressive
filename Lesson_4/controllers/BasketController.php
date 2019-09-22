<?php


namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionList() {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }

}
//Решил не заморачиваться с функционалом, как Вы и сказали))) Можно было запрос переопределить, чтобы отображались товары, а не сами баскеты