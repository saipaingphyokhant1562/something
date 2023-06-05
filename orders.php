<?php
include_once "layouts/sidebar.php";
include_once "controllers/orderController.php";

$order_controller=new OrderController();
$orderlist=$order_controller->getAllOrders();
//var_dump($orderlist);


?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Order Table</strong> Dashboard</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="create_order.php" class="btn btn-dark my-3">Create Order</a>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                   <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Ordered Date</th>
                                        <th>Shipped Date</th>
                                        <th>Status Date</th>
                                        <th>Actions</th>
                                   </tr>         
                                </thead>
                                <tbody>
                                    <?php
                                            for($row=0;$row<sizeof($orderlist);$row++)
                                            {
                                                echo "<tr id='".$orderlist[$row]["orderNumber"]."'>";
                                                    echo "<td>".($row+1)."</td>";
                                                    echo "<td>".$orderlist[$row]['orderNumber']."</td>";
                                                    echo "<td>".$orderlist[$row]['customerName']."</td>";
                                                    echo "<td>".$orderlist[$row]['orderDate']."</td>";
                                                    echo "<td>".$orderlist[$row]['shippedDate']."</td>";
                                                    echo "<td>".$orderlist[$row]['status']."</td>";
                                                    echo "<td><a class='btn btn-success mx-2'> View </a><a class='btn btn-warning mx-2'> Edit </a><a class='btn btn-danger mx-2'> Delete </a></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>