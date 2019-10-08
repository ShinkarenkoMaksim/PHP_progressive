<?php


namespace app\models\repositories;


use app\models\entities\Order;
use app\models\Repository;

class AdminRepository extends Repository
{

    public function isAdmin () {
        if ($_SESSION['login'] === 'admin') {
            return true;
        }
        return false;
    }

    public function getOrderList() {
        $sql = "SELECT * FROM orders";
        $orderList = $this->db->queryAll($sql, []);
        $orders = $this->getOrders();

        foreach ($orderList as $key => $order) {
            foreach ($orders as $item) {
                if ($item['id_order'] == $order['id']) {
                    $orderList[$key]['products'][] = $item;
                }
            }
        }

        return $orderList;
    }

    private function getOrders()
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.order_id id_order FROM basket b,products p,orders o WHERE b.product_id=p.id AND b.order_id = o.id";
        return $this->db->queryAll($sql, []);
    }

    public function getEntityClass () {
        return Order::class;
    }

}