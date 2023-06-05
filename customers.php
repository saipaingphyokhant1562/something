<?php
include_once "layouts/sidebar.php";
include_once "controllers/customerController.php";

$customer_controller=new CustomerController();
$customer_list=$customer_controller->getAllCustomers();
//var_dump($customer_list);

?>
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Customers</strong> Info</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                if(isset($_GET['status'])&&$_GET['status']==1)
                                {
                                    echo "<div class='text-success'>New Customer is successfully Created</div>";
                                }

                                if(isset($_GET['update_status'])&&$_GET['update_status']==1)
                                {
                                    echo "<div class='text-info'>New Customer is successfully Updated</div>";
                                }
                            ?>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="create_customer.php" class="btn btn-dark my-3">Add New Customer</a>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Contact Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($row=0;$row<sizeof($customer_list);$row++)
                                        {
                                            echo "<tr id='".$customer_list[$row]["customerNumber"]."'>";
                                                echo "<td>".($row+1)."</td>";
                                                echo "<td>".$customer_list[$row]['customerName']."</td>";
                                                //echo "<td>".$customer_list[$row]['contactFirstName']."</td>";
                                                echo "<td>".$customer_list[$row]['contactLastName']." ".$customer_list[$row]['contactFirstName']."</td>";
                                                echo "<td>".$customer_list[$row]['addressLine1']."</td>";
                                                echo "<td>".$customer_list[$row]['city']."</td>";
                                                echo "<td><a class='btn btn-success mx-2' href='view_customer.php?id=".$customer_list[$row]['customerNumber']."'> View </a><a class='btn btn-warning mx-2' href='edit_customer.php?id=".$customer_list[$row]['customerNumber']."'>Edit</a><a class='btn btn-danger mx-2 delete'>Delete</a></td>";
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