<?php
include_once "layouts/sidebar.php";

?>

		

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Report</strong> Dashboard</h1>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Report</label>
                            <select name="year" id="year" class="form-select">
                                <?php 
                                    for($index=2003;$index<=2023;$index++)
                                    echo "<option value='".$index."'>".$index."</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-info btn-search mt-4">Search</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 reporttable">

                        </div>
                        <div class="col-md-6 reportchart">
                            <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Bar Chart</h5>
                                        <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chartjs-line"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
				</div>
			</main>



<?php
include_once "layouts/footer.php";
?>