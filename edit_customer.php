<?php
include_once "layouts/sidebar.php";
include_once __DIR__."/controllers/customerController.php";
include_once __DIR__."/controllers/employeesController.php";



$cid=$_GET['id'];

$customer_controller=new CustomerController();
$customer=$customer_controller->getCustomer($cid);

$emp_controller=new EmployeesController();
$emp_list=$emp_controller->getEmployeesList();


if(isset($_POST['submit']))
{
    if(isset($_POST['submit']))
{
    $error_status=false;
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
    }else
    {
        $error_status=true;
        $errormessage="Please Enter Customer Name";
    }

    if(!empty($_POST['firstname']))
    {
        $firstname=$_POST['firstname'];
    }else
    {
        $error_status=true;
        $firstname_error="Please Enter First Name";
    }

    if(!empty($_POST['lastname']))
    {
        $lastname=$_POST['lastname'];
    }else
    {
        $error_status=true;
        $lastname_error="Please Enter Last Name";
    }

    if(!empty($_POST['phonenumber']))
    {
        $phonenumber=$_POST['phonenumber'];
    }else
    {
        $error_status=true;
        $phonenumber_error="Please Enter Phone Number";
    }

    if(!empty($_POST['address1']))
    {
        $address1=$_POST['address1'];
    }else
    {
        $error_status=true;
        $address1_error="Please Enter Address";
    }

    if(!empty($_POST['credit']))
    {
        $credit=$_POST['credit'];
    }else
    {
        $error_status=true;
        $credit_error="Please Enter Number of Credit Limit";
    }

    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $postcode=$_POST['postcode'];
    $country=$_POST['country'];
    $report_to=$_POST['reportto'];

    if($error_status==false)
    {
        $status=$customer_controller->updateCustomer($cid,$name,$firstname,$lastname,$phonenumber,$address1,$address2,$city,$state,$postcode,$country,$report_to,$credit);
         if($status)
         {
             //header('location:customers.php?status='.$status);
             echo "<script>location.href='customers.php?update_status=".$status."'</script>";

         }
        //  else{

        //  }
    }
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
                                        <input type="text" name="name" id="" class="form-control" value="<?php echo $customer['customerName'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Contact Person (FirstName)</label>
                                        <input type="text" name="firstname" id="" value="<?php echo $customer["contactFirstName"]?>" class="form-control <?php if(isset($firstname_error)) echo 'border border-danger'; ?>">
                                        <span class="text-danger"><?php if(isset($firstname_error)) echo $firstname_error; ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Contact Person (LastName)</label>
                                        <input type="text" name="lastname" id="" value="<?php echo $customer["contactLastName"]?>" class="form-control">
                                        <span class="text-danger"><?php if(isset($lastname_error)) echo $lastname_error; ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Mobile Phone</label>
                                        <input type="tel" name="phonenumber" id="" value="<?php echo $customer["phone"]; ?>" class="form-control <?php if(isset($phonenumber_error)) echo 'border border-danger'; ?>">
                                        <span class="text-danger"><?php if(isset($phonenumber_error)) echo $phonenumber_error; ?></span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Address Line1</label>
                                        <input type="text" name="address1" id="" value="<?php echo $customer["addressLine1"]; ?>" class="form-control <?php if(isset($address1_error)) echo 'border border-danger'; ?>">
                                        <span class="text-danger"><?php if(isset($address1_error)) echo $address1_error; ?></span>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Address Line2</label>
                                        <input type="text" name="address2" id="" class="form-control" value="<?php echo $customer["addressLine2"]; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">City</label>
                                        <select name="city" id="" class="form-select">
                                            <option value="Yangon">Yangon</option>
                                            <option value="Mandalay">Mandalay</option>
                                            <option value="Taunggyi">Taunggyi</option>
                                            <option value="Magway">Magway</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Division State</label>
                                        <select name="state" id="" class="form-select">
                                            <option value="Yangon">Yangon</option>
                                            <option value="Mandalay">Mandalay</option>
                                            <option value="Shan State">Shan State</option>
                                            <option value="Kachin State">Kachin State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Post Code</label>
                                        <input type="number" name="postcode" id="" class="form-control" value="<?php echo $customer["postalCode"]; ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Country</label>
                                        <select name="country" id="" class="form-select">
                                            <option value="Yangon">Singapor</option>
                                            <option value="Mandalay">Myanmar</option>
                                            <option value="Shan State">Thailand</option>
                                            <option value="Kachin State">China</option>
                                        </select>
                                    </div>
                                </div>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                         
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Report to</label>
                                        <select name="reportto" id="" class="form-select">
                                            <?php
                                                foreach($emp_list as $emp)
                                                {
                                                    if($emp["employeeNumber"]==$customer["salesRepEmployeeNumber"])
                                                    echo "<option value='".$emp['employeeNumber']."' selected>".$emp['firstName']." ".$emp['lastName']."</option>";
                                                    else
                                                    echo "<option value='".$emp['employeeNumber']."' >".$emp['firstName']." ".$emp['lastName']."</option>";

                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label" >Credit Limit(*)</label>
                                        <input type="number" name="credit" id="" class="form-control <?php if(isset($credit_error)) echo 'border border-danger'; ?>" value="<?php echo $customer["creditLimit"]; ?>">
                                        <span class="text-danger"><?php if(isset($credit_error)) echo $credit_error; ?></span>
                                    </div>
                                    
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-2">
                                        <button name="submit" class="btn btn-success">Update</button>
                                        <a href="customers.php" class="btn btn-warning">Back</a>
                                        <!-- <button name="customers.php" class="btn btn-warning">Back</button> -->
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    </form>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>