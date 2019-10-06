<?php


namespace app\models\repositories;

use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getOrders($session, $field)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, o.status FROM basket b,products p,orders o WHERE b.product_id=p.id AND o.{$field} = :session AND b.order_id = o.id";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass () {
        return Order::class;
    }
}