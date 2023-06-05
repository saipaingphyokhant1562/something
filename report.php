<?php
include_once 'controllers/orderController.php';
$year=$_POST['year'];

$order_controller=new OrderController();
$result=$order_controller->reportOrder($year);
$output="<table class='table table-striped'>";
$output.="<thead>";
$output.="<tr>";
$output.="<th> NO </th>";
$output.="<th> Month </th>";
$output.="<th> Number of Orders  </th>";
$output.="</tr>";
$output.="</thead>";
$output.="<tbody>";
$i=1;
$month=["Jan","Feb","March","April","May","June","July","August","Sept","Oct","Nov","Dec"];
foreach($result as $row)
{
    $output.="<tr>";
    $output.="<td>".($i++)."</td>";
    $output.="<td>".$month[$row['month']-1]."</td>";
    $output.="<td>".$row['totalorders']."</td>";
    $output.="</tr>";
}
$output.="</tbody>";
$output.="</table>";
echo $output;
?>