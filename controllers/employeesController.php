<?php
include_once __DIR__."/../models/employees.php";
class EmployeesController extends Employees{
    public function getAllEmployees()
    {
        return $this->getEmployeesList();
    }

    public function addNewEmp($empnumber,$firstname,$lastname,$extension,$email,$jobtitle,$officecode)
    {
        return $this->createNewEmp($empnumber,$firstname,$lastname,$extension,$email,$jobtitle,$officecode);
    }

    public function getEmployee($id)
    {
        return $this->getEmployeeInfo($id);
    }

    public function updateEmployee($id,$firstname,$lastname,$extension,$email,$jobtitle,$officecode,$report_to)
    {
        return $this->updateEmployeeInfo($id,$firstname,$lastname,$extension,$email,$jobtitle,$officecode,$report_to);
    }

    public function deleteEmployee($id)
    {
        return $this->deleteEmployeeInfo($id);
    }
}
?>