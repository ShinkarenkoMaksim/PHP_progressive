<?php

namespace app\models\repositories;

use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{
    public function getBasket($session, $field)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,products p WHERE b.product_id=p.id AND {$field} = :session AND b.order_id IS NULL";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function setBasketOrder($order_id)
    {
        $user = new UserRepository();
        if ($user->isAuth()) {
            $user_id = $user->getId();
            $field = 'user_id';
        } else {
            $field = 'session_id';
            $user_id = session_id();
        }
        $sql = "UPDATE `basket` SET order_id = :order_id WHERE {$field} = :session AND order_id IS NULL";
        return $this->db->execute($sql, ['session' => $user_id, 'order_id' => $order_id]);
    }


    public function getTableName()
    {
        return 'basket';
    }

    public function getEntityClass () {
        return Basket::class;
    }

}