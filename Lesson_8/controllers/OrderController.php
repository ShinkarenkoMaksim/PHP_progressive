<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Order;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class OrderController extends Controller
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


        echo $this->render('orders', [
            'products' => (new OrderRepository())->getOrders($id, $field)]);
    }

    public function actionAdd()
    {
        $user = new UserRepository();
        $orderRepo = new OrderRepository();

        if ($user->isAuth()) {
            $user_id = $user->getId();
            $field = 'user_id';
        } else {
            $field = 'session_id';
            $user_id = null;
        }

        $params = (new Request())->getParams();

        $order = new Order($params['name'], $params['phone'], $params['email'], session_id(), $user_id);

        $orderRepo->save($order);

        (new BasketRepository())->setBasketOrder($order->id);

        header("Location: /order");
        exit();

    }
}