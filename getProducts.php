<?php
include_once 'controllers/productController.php';

//$pid=$_POST['pid'];
$product_controller=new ProductController();
$product_list=$product_controller->getAllProducts();

$html="";
foreach($product_list as $product)
{
    $html.="<option value='".$product['productCode']."'>".$product['productName']."</option>";
}
echo $html;
//echo $product['MSRP'];
?>