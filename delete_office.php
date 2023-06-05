<?php

include_once "controllers/officesController.php";

$id=$_POST["id"];
$customer_controller=new OfficesController();
echo $customer_controller->deleteOffice($id);

?>