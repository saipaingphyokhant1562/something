<?php
include_once "controllers/employeesController.php";
//include_once "controllers/employeesController.php";

$id=$_POST["id"];
$emp_controller=new EmployeesController();
echo $emp_controller->deleteEmployee($id);

?>