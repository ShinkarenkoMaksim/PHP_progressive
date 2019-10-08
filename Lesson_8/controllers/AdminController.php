<?php


namespace app\controllers;


use app\models\repositories\AdminRepository;
use app\models\repositories\UserRepository;

class AdminController extends Controller
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

        echo $this->render('admin', [
            'orders' => (new AdminRepository())->getOrderList()]);
    }

}