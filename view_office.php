<?php
include_once "layouts/sidebar.php";
include_once __DIR__."/controllers/officesController.php";

$cid=$_GET['id'];
$office_controller=new OfficesController();
$office=$office_controller->getOffice($cid);
//var_dump($office);
?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>View Office</strong> Dashboard</h1>

					<div class="row  d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Office Code : <?php echo $office["officeCode"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Extension : <?php echo $office["city"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Email : <?php echo $office["phone"] ?></label>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Address : <?php echo $office["addressLine1"]." ".$office["addressLine2"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">State : <?php echo $office["state"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Country : <?php echo $office["country"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Post Code : <?php echo $office["postalCode"] ?></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="" class="form-label">Territory : <?php echo $office["territory"] ?></label>
                                            </div>
                                    </div>
                               
                            </div>
                        </div>
                        </div>      
                        <div class="col-md-5">
                            <a href="offices_.php" class="btn btn-info">Back To Offices</a>
                        </div>
                    </div>
                    </div>

				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>