<?php
include_once "layouts/sidebar.php";
include_once "controllers/officesController.php";

$offices_controller=new OfficesController();
$offices_list=$offices_controller->getAllOffices();
//var_dump($offices_list);
?>
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Offices</strong> Info</h1>
				</div>
				<div class="row">
                        <div class="col-md-12">
                            <?php
                                if(isset($_GET['status'])&&$_GET['status']==1)
                                {
                                    echo "<div class='text-success'>New Office is successfully Created</div>";
                                }
								if(isset($_GET['update_status'])&&$_GET['update_status']==1)
                                {
                                    echo "<div class='text-success'>New Office is successfully Updated</div>";
                                }
                            ?>
                        </div>
                        
                    </div>
				<div class="row">
					<div class="col-md-2">
						<a href="create_offices.php" class="btn btn-dark my-3">Add Office</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table" id="myTable">
							<thead>
								<tr>
									<td>No</td>
									<td>Office Code</td>
									<td>City</td>
									<td>Phone</td>
									<td>Address</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php
									for($row=0;$row<sizeof($offices_list);$row++)
									{
										echo "<tr id='".$offices_list[$row]['officeCode']."'>";
										echo "<td>".($row+1)."</td>";
										echo "<td>".$offices_list[$row]['officeCode']."</td>";
										echo "<td>".$offices_list[$row]['city']."</td>";
										echo "<td>".$offices_list[$row]['phone']."</td>";
										echo "<td>".$offices_list[$row]['addressLine1']." ".$offices_list[$row]['addressLine2']."</td>";
										echo "<td><a class='btn btn-primary mx-2' href='view_office.php?id=".$offices_list[$row]['officeCode']."'>View</a><a class='btn btn-warning mx-2' href='edit_office.php?id=".$offices_list[$row]['officeCode']."' >Edit</a><a class='btn btn-danger mx-2 office_delete'>Delete</a></td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</main>
<?php
include_once "layouts/footer.php";
?>