<?php
include_once "layouts/sidebar.php";
include_once "controllers/employeesController.php";


// $_controller=new OfficesController();
// $office_list=$office_controller->getAllOffices();
// var_dump($office_list);
$emp_controller=new EmployeesController();
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

	$officecode=$_POST['officecode'];

	if($error_status==false)
	{
		$status=$emp_controller->addNewEmp($empnumber,$firstname,$lastname,$extension,$email,$jobtitle,$officecode);
		if($status)
		{
			echo "<script>location.href='employees_.php?status=".$status."'</script>";
		}
	}
}
?>
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Add New Employee</strong> Dashboard</h1>
					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<label for="" class="form-label">Employee Number</label>
										<input type="number" name="empnumber" id="" class="form-control <?php if(isset($empnumber_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($empnumber_error)) echo $empnumber_error  ?></span>
									</div>
									<div class="col-md-4">
										<label for="" class="form-label">First Name</label>
										<input type="text" name="firstname" id="" class="form-control <?php if(isset($firtname_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($firtname_error)) echo $firtname_error  ?></span>
									</div>
									<div class="col-md-4">
										<label for="" class="form-label">Last Name</label>
										<input type="text" name="lastname" id="" class="form-control <?php if(isset($lastname_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($lastname_error)) echo $lastname_error  ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label for="" class="form-label">Extension</label>
										<input type="number" name="extension" id="" class="form-control">
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Email</label>
										<input type="email" name="email" id="" class="form-control <?php if(isset($email_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($email_error)) echo $email_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Job Title</label>
										<input type="text" name="jobtitle" id="" class="form-control <?php if(isset($jobtitle_error)) echo "border border-danger" ?>">
										<span class="text-danger"><?php if(isset($jobtitle_error)) echo $jobtitle_error  ?></span>
									</div>
									<div class="col-md-3">
										<label for="" class="form-label">Office Code</label>
										<input type="number" name="officecode" id="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row my-3">
                                    <div class="col-md-2">
                                        <button name="submit" class="btn btn-success">Add</button>
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