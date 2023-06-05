<?php
include_once "layouts/sidebar.php";
include_once "controllers/employeesController.php";

$employees_controller=new EmployeesController();
$employees_list=$employees_controller->getAllEmployees();
//var_dump($employees_list);
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Employees</strong> Info</h1>
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
                            <a href="create_employees.php" class="btn btn-dark my-3">Add New Employees</a>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Employee Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($row=0;$row<sizeof($employees_list);$row++)
                                        {
                                            echo "<tr id='".$employees_list[$row]['employeeNumber']."'>";
                                            
                                                echo "<td>".($row+1)."</td>";
                                                echo "<td>".$employees_list[$row]['employeeNumber']."</td>";
                                                //echo "<td>".$customer_list[$row]['contactFirstName']."</td>";
                                                echo "<td>".$employees_list[$row]['firstName']." ".$employees_list[$row]['lastName']."</td>";
                                                //echo "<td>".$mployees_list[$row]['addressLine1']."</td>";
                                                echo "<td>".$employees_list[$row]['email']."</td>";
                                                echo "<td><a class='btn btn-success mx-2' href='view_employee.php?id=".$employees_list[$row]["employeeNumber"]."'> View </a><a class='btn btn-warning mx-2' href='edit_employee.php?id=".$employees_list[$row]["employeeNumber"]."'>Edit</a><a class='btn btn-danger mx-2'>Delete</a></td>";
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