<?php
include_once "controllers/customerController.php";

$id=$_POST["id"];
$customer_controller=new CustomerController();
echo $customer_controller->deleteCustomer($id);

?>