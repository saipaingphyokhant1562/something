<?php
include_once __DIR__."/../models/order.php";

class OrderController extends Order{
    public function getAllOrders()
    {
        return $this->getOrderList();
    }

    public function addOrder($orderDate,$customerNo,array $pname,array $price,array $qty)
    {
        return $this->createOrder($orderDate,$customerNo,$pname,$price,$qty);
    }

    public function reportOrder($year)
    {
        return $this->reportOrderInfo($year);
    }
}


?>