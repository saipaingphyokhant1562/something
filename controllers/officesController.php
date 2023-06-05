<?php
include_once __DIR__."/../models/offices.php";

class OfficesController extends Offices{

    public function getAllOffices(){
        return $this->getOffices();
    }
    public function addNewOffices($city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory,$officecode)
    {
        return $this->createNewOffices($city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory,$officecode);
    }
    public function getOffice($id)
    {
        return $this->getOfficeInfo($id);
    }
    public function updateNewOffice($id,$city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory)
    {
        return $this->updateNewOfficeInfo($id,$city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory);
    }

    public function deleteOffice($id)
    {
        return $this->deleteOfficeInfo($id);
    }
}


?>