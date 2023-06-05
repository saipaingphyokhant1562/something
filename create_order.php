<?php
session_start();
include_once "layouts/sidebar.php";
include_once "controllers/customerController.php";
include_once "controllers/productController.php";
include_once "controllers/orderController.php";

$customer_controller=new CustomerController();
$customer_list=$customer_controller->getAllCustomers();

$product_controller=new ProductController();
$productlist=$product_controller->getAllProducts();
//var_dump($productlist);


$pprice=$productlist[0]['MSRP'];
if(isset($_POST['submit']))
{
    $pname[]=$_POST['pname'];
    $price[]=$_POST['price'];
    $qty[]=$_POST['qty'];
    $cname=$_POST['cname'];
    $date=date('Y-m-d',strtotime($_POST['date']));

    var_dump($pname);
    $order_controller=new OrderController();
    $order_controller->addOrder($date,$cname,$pname,$price,$qty);
};

if(isset($_POST["addmore"]))
{
    //echo "heoo";
    $status_error=false;
    

    if(isset($_POST["price"]))
    {
        $price=$_POST["price"];
    }
    else{
        $status_error=true;
    }

    if(isset($_POST["qty"]))
    {
        $qty=$_POST["qty"];
    }else{
        $status_error=true;
    }

}
?>
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<form action="" method="post">
					<div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Customer Name</label>
                                        <select name="cname" id="" class="form-control">
                                            <?php
                                                foreach($customer_list as $customer)
                                                {
                                                    echo "<option value='".$customer['customerNumber']."'>".$customer['customerName']."(".$customer['phone'].")"."</option>";

                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Date :</label>
                                        <input type="date" name="date" id="" class="form-control">
                                    </div>
                                    
                                </div>
                            
                        </div>
                    </div>
                    <div class="prow">

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Product Name</label>
                                        <select name="pname[]" id="" class="form-select product">
                                            <?php 
                                                foreach($productlist as $product)
                                                {
                                                    echo "<option value='".$product['productCode']."'>".$product['productName']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php if(isset($address1_error)) echo $address1_error; ?></span>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Price </label>
                                        <input type="double" name="price[]" id="price" class="form-control price" value="<?php echo $pprice ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Quantity</label>
                                        <input type="number" name="qty[]" id="qty" class="form-control" value="0" min=1>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Sub Total</label>
                                        <input type="double" name="subtotal" id="" class="form-control subtotal" value="">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary addmore" name="addmore">Add More</button>
                                    </div>
                                </div>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row my-3">
                                    <div class="col-md-2">
                                        <button name="submit" class="btn btn-success">Order</button>
                                        <a href="customers.php" class="btn btn-warning">Back</a>
                                        <!-- <button name="customers.php" class="btn btn-warning">Back</button> -->
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="form-label">Total</label>
                        <input type="double" name="" class="form-control total" id="">
                        <!-- <span class="total"></span> -->
                    </div>
                    
                    </form>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>