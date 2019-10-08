<?php

namespace app\controllers;


use app\engine\Request;
use app\models\entities\Order;
use app\models\repositories\AdminRepository;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;
use app\models\entities\Basket;

class ApiController extends Controller
{
    public function actionAddBasket() {

        $user = new UserRepository();
        $basketRepo = new BasketRepository();

        if ($user->isAuth()) {
            $user_id = $user->getId();
            $field = 'user_id';
        } else {
            $field = 'session_id';
            $user_id = null;
        }

        $id = (new Request())->getParams()['id'];

        $basket = new Basket(session_id(), $id, $user_id);
        $basketRepo->save($basket);


        $response = [
            'result' => 1,
            'count' => $basketRepo->getCountWhere($field, $user_id ? $user_id : session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDeleteBasket() {

        $user = new UserRepository();
        $basketRepo = new BasketRepository();

        $request = (new Request())->getParams();

        if ($user->isAuth()) {
            $id = $user->getId();
            $field = 'user_id';
        } else {
            $id = session_id();
            $field = 'session_id';
        }

        $basketRepo->delWhere(['id' => $request['id'], $field => $id]);

        $response = [
            'result' => 1,
            'count' => $basketRepo->getCountWhere($field, $id)
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionStatus() {
        $adminRepo = new AdminRepository();
        if ($adminRepo->isAdmin()) {
            $request = (new Request())->getParams();
            $order = new Order();
            $order->setStatus(['id' => $request['id'], 'status' => $request['status']]);
            (new OrderRepository())->save($order);

            $response = [
                'result' => 1
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }


}