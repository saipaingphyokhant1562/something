<?php
include_once __DIR__."/../models/product.php";

class ProductController extends Product{
    public function getAllProducts()
    {
        return $this->getProductList();
    }

    public function getPrice($pid)
    {
        return $this->getPriceInfo($pid);
    }
}

?>