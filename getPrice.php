<?php
include_once 'controllers/productController.php';

$pid=$_POST['pid'];
$product_controller=new ProductController();
$product=$product_controller->getPrice($pid);

echo $product['MSRP'];
?>