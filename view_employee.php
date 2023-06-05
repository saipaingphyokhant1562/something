<?php
include_once "layouts/sidebar.php";
include_once __DIR__."/controllers/employeesController.php";

$cid=$_GET["id"];
$employee_controller=new EmployeesController();
$emp_num=$employee_controller->getAllEmployees();
$employee=$employee_controller->getEmployee($cid);
//var_dump($emp_num);
?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
                    <div class="row  d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Name : <?php echo $employee["firstName"]." ".$employee["lastName"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Extension : <?php echo $employee["extension"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Email : <?php echo $employee["email"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Report to : <?php 
                                                foreach($emp_num as $empnum)
                                                {
                                                    if($employee["reportsTo"]==$empnum['employeeNumber'])
                                                    {
                                                        echo $empnum["firstName"]." ".$empnum["lastName"];
                                                    }
                                                    
                                                }
                                                
                                                 ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">JobTitle : <?php echo $employee["jobTitle"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Office Code : <?php echo $employee["officeCode"] ?></label>
                                            </div>
                                    </div>
                               
                            </div>
                        </div>
                        </div>      
                        <div class="col-md-5">
                            <a href="employees_.php" class="btn btn-info">Back To Employees</a>
                        </div>
                    </div>
                    </div>
					
				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>