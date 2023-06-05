<?php
include_once "layouts/sidebar.php";
include_once __DIR__."/controllers/employeesController.php";

$cid=$_GET['id'];
$emp_controller=new EmployeesController();
 
$emp_num=$emp_controller->getAllEmployees();
$employee=$emp_controller->getEmployee($cid);

//var_dump($emp_num);
if(isset($_POST['submit']))
{
	$error_status=false;
	if(!empty($_POST['empnumber']))
	{
		$empnumber=$_POST['empnumber'];
	}else
	{
		$error_status=true;
		$empnumber_error="Please Enter Employee Name";
	}

	if(!empty($_POST['firstname']))
	{
		$firstname=$_POST['firstname'];
	}else
	{
		$error_status=true;
		$firtname_error="Please Enter First Name";
	}

	if(!empty($_POST['lastname']))
	{
		$lastname=$_POST['lastname'];
	}else
	{
		$error_status=true;
		$lastname_error="Please Enter Last Name";
	}

	if(!empty($_POST['email']))
	{
		$email=$_POST['email'];
	}else
	{
		$error_status=true;
		$email_error="Please Enter Email";
	}

	$extension=$_POST['extension'];

	if(!empty($_POST['jobtitle']))
	{
		$jobtitle=$_POST['jobtitle'];
	}else
	{
		$error_status=true;
		$jobtitle_error="Please Enter Job Title";
	}

	if(!empty($_POST['officecode']))
	{
		$officecode=$_POST['officecode'];
	}else
	{
		$error_status=true;
		$officecode_error="Please Enter Office Code";
	}
	//$officecode=$_POST['officecode'];

	$report_to=$employee["reportsTo"];

	
	var_dump($employee["reportsTo"]);

	if($error_status==false)
	{
		$status=$emp_controller->updateEmployee($cid,$firstname,$lastname,$extension,$email,$jobtitle,$officecode,$report_to);
		if($status)
		{
			echo "<script>location.href='employees_.php?update_status=".$status."'</script>";
		}
	}
}
?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Employee</strong> Dashboard</h1>

					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<label for="" class="form-label">Employee Number</label>
										<input type="number" name="empnumber" id="" value="<?php echo $employee["employeeNumber"] ?>" class="form-control  <?php if(isset($empnumber_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($empnumber_error)) echo $empnumber_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">First Name</label>
										<input type="text" name="firstname" id="" value="<?php echo $employee["firstName"] ?>"class="form-control <?php if(isset($firtname_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($firtname_error)) echo $firtname_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Last Name</label>
										<input type="text" name="lastname" id="" value="<?php echo $employee["lastName"] ?>" class="form-control <?php if(isset($lastname_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($lastname_error)) echo $lastname_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Office Code</label>
										<input type="number" name="officecode" id="" value="<?php echo $employee["officeCode"] ?>" class="form-control <?php if(isset($officecode_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($officecode_error)) echo $officecode_error  ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label for="" class="form-label">Extension</label>
										<input type="text" name="extension" value="<?php echo $employee["extension"] ?>" id="" class="form-control">
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Email</label>
										<input type="email" name="email" id="" value="<?php echo $employee["email"] ?>" class="form-control <?php if(isset($email_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($email_error)) echo $email_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Job Title</label>
										<input type="text" name="jobtitle" id="" value="<?php echo $employee["jobTitle"] ?>" class="form-control <?php if(isset($jobtitle_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($jobtitle_error)) echo $jobtitle_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Report to</label>
										<input type="text" name="reportto" value="<?php
                                            foreach($emp_num as $empnum)
                                            {
                                                if($employee["reportsTo"]==$empnum['employeeNumber'])
                                                {
                                                    echo $empnum["firstName"]." ".$empnum["lastName"];
                                                }
                                                
                                            }
                                        
                                        //echo $employee["reportsTo"] ?>" id="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row my-3">
                                    <div class="col-md-2">
                                        <button name="submit" class="btn btn-success">Update</button>
                                        <a href="employees_.php" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
						</div>
					</form>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>