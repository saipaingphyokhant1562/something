<?php
include_once "layouts/sidebar.php";
include_once __DIR__."/controllers/officesController.php";

$cid=$_GET["id"];
$office_controller=new OfficesController();
$office_list=$office_controller->getAllOffices();
$office=$office_controller->getOffice($cid);
var_dump($office);


if(isset($_POST['submit']))
{
    $error_status=false;
    $city=$_POST['city'];
    if(!empty($_POST['phonenumber']))
    {
        $phonenumber=$_POST['phonenumber'];
    }
    else
    {
        $error_status=true;
        $phone_error="Please Enter Your Phone Number";
    }

    if(!empty($_POST['address1']))
    {
        $address1=$_POST['address1'];
    }else
    {
        $error_status=true;
        $address1_error="Please Enter Your Address";
    }

    $address2=$_POST['address2'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $postcode=$_POST['postcode'];
    var_dump($postcode);
    if(!empty($_POST['territory']))
    {
        $territory=$_POST['territory'];
    }else
    {
        $error_status=true;
        $territory_error="Please Enter Your Territory";
    }
     
    $officecode=$_POST['officecode'];
    
    if($error_status==false)
    {
        $state=$office_controller->updateNewOffice($cid,$city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory);
        if($state)
        {
            echo "<script>location.href='offices_.php?update_status=".$state."'</script>";
        }
    }

}
?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Office</strong> Dashboard</h1>

					<div class="row">
						<div class="col-md-12">
							<form action="" method="post">
								<div class="row">
									 <div class="col-md-4">
										<label for="" class="form-label">Office Code</label>
                                        <input type="number" class="form-control" name="officecode" value="<?php echo $office["officeCode"] ?>">
									</div> 
									<div class="col-md-4">
                                        <label for="" class="form-label">City</label>
                                        <select name="city" id="" class="form-select">
                                        <?php
                                                foreach($office_list as $of_l)
                                                {
                                                    if($office["city"]==$of_l["city"]){
                                                        echo "<option value='". $office["city"]."' selected>".$of_l["city"]."</option>";

                                                    }
                                                      
                                                }
                                            ?>
                                        </select>
                                    </div>
									<div class="col-md-4">
										<label for=""class="form-label">Phone Number</label>
										<input type="tel" name="phonenumber" id="" value="<?php echo $office["phone"] ?>" class="form-control <?php if(isset($phone_error)) echo "border border-danger";  ?>">
                                        <span class="text-danger"><?php if(isset($phone_error)) echo $phone_error; ?></span>
									</div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Address Line1</label>
                                        <input type="text" name="address1" id="" value="<?php echo $office["addressLine1"] ?>" class="form-control <?php if(isset($address1_error)) echo "border border-danger";  ?>">
                                        <span class="text-danger"><?php if(isset($address1_error)) echo $address1_error; ?></span>
                                    </div>
								</div>
								<div class="row">
									
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Address Line2</label>
                                        <input type="text" name="address2" id="" value="<?php echo $office["addressLine2"] ?>" class="form-control">
                                    </div>
									<div class="col-md-4">
                                        <label for="" class="form-label">Division State</label>
                                        <select name="state" id="" value="<?php ?>" class="form-select">
                                            <option value="Yangon">Yangon</option>
                                            <option value="Mandalay">Mandalay</option>
                                            <option value="Shan State">Shan State</option>
                                            <option value="Kachin State">Kachin State</option>
                                        
                                        <?php
                                                // foreach($office_list as $of_l)
                                                // {
                                                //     if($office["state"]==$of_l["state"]){
                                                //         echo "<option value='". $office["state"]."' selected>".$of_l["state"]."</option>";

                                                //     }
                                                // }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Country</label>
                                        <select name="country" id="" class="form-select">
                                        <?php
                                                foreach($office_list as $of_l)
                                                {
                                                    if($office["country"]==$of_l["country"]){
                                                        echo "<option value='". $office["country"]."' selected>".$of_l["country"]."</option>";

                                                    }
                                                      
                                                }
                                            ?>
                                        </select>
                                    </div>
								</div>
								<div class="row">
									
									<div class="col-md-4">
                                        <label for="" class="form-label">Postal Code</label>
                                        <input type="number" name="postcode" value="<?php echo $office["postalCode"] ?>" id="" class="form-control">
                                    </div>
									<div class="col-md-4">
                                        <label for="" class="form-label">Territory</label>
                                        <input type="text" name="territory" value="<?php echo $office["territory"] ?>" id="" class="form-control">
                                    </div>
                                    
								</div>
								<div class="row my-3">
                                    <div class="col-md-2">
                                        <button name="submit" class="btn btn-success">Update</button>
                                        <a href="offices_.php" class="btn btn-warning">Back</a>
                                        <!-- <button name="customers.php" class="btn btn-warning">Back</button> -->
                                    </div>
                                </div>
							</form>
						</div>
					</div>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>