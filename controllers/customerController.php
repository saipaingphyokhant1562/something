<?php
include_once __DIR__."/../models/customer.php";

class CustomerController extends Customer{
    public function getAllCustomers(){
        return $this->getCustomerList();
    }
    public function addNewCustomer($name,$firstname,$lastname,$phonenumber,$address1,$address2,$city,$state,$postcode,$country,$report_to,$credit)
    {
        return $this->createNewCustomer($name,$firstname,$lastname,$phonenumber,$address1,$address2,$city,$state,$postcode,$country,$report_to,$credit);
    }
    public function getCustomer($id)
    {
        return $this->getCustomerInfo($id);
    }
    public function updateCustomer($id,$name,$firstname,$lastname,$phonenumber,$address1,$address2,$city,$state,$postcode,$country,$report_to,$credit)
    {
        return $this->updateCustomerInfo($id,$name,$firstname,$lastname,$phonenumber,$address1,$address2,$city,$state,$postcode,$country,$report_to,$credit);
    }

    public function deleteCustomer($id)
    {
        return $this->deleteCustomerInfo($id);
    }
}





?>