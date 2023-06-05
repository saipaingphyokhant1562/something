<?php
include_once __DIR__."/../vendor/db.php";
class Offices{
    private $connection="";
    public function getOffices()
    {
         //1.DB connection
         $this->connection=Database::connect();
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
         //2. sql statement
         $sql="Select * from Offices";
         $statement=$this->connection->prepare($sql);
 
         //3. execute
         $statement->execute();
         $result=$statement->fetchAll(PDO::FETCH_ASSOC);
         return $result;
    }

    public function createNewOffices($officecode,$city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="INSERT INTO offices(officeCode,city, phone, addressLine1, addressLine2, state, country, postalCode, territory) VALUES(:officecode,:city,:phonenumber,:address1,:address2,:state,:country,:postcode,:territory)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(':city',$city);
        $statement->bindParam(':phonenumber',$phonenumber);
        $statement->bindParam(':address1',$address1);
        $statement->bindParam(':address2',$address2);
        $statement->bindParam(':country',$country);
        $statement->bindParam(':postcode',$postcode);
        $statement->bindParam(':territory',$territory);
        $statement->bindParam(':state',$state);
        $statement->bindParam(':officecode',$officecode);

        if($statement->execute())
        {
            return true;
        }else
        {
            return false;
        }

    }

    public function updateNewOfficeInfo($id,$city,$phonenumber,$address1,$address2,$state,$country,$postcode,$territory)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="update offices set city=:city,phone=:phone,addressLine1=:addressline1,addressLine2=:addressline2,state=:state,
        country=:country,postalCode=:postcode,territory:territory where officeCode=:id";
        $statement=$this->connection->prepare($sql);

        //$statement->bindParam("officecode",$officecode);
        $statement->bindParam(":city",$city);
        $statement->bindParam(":phone",$phonenumber);
        $statement->bindParam(":addressline1",$address1);
        $statement->bindParam(":addressline2",$address2);
        $statement->bindParam(":state",$state);
        $statement->bindParam(":country",$country);
        $statement->bindParam(":postcode",$postcode);
        $statement->bindParam(":territory",$territory);
        $statement->bindParam(":id",$id);

        if($statement->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function getOfficeInfo($id)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="select * from offices where officeCode=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(':id',$id);

        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteOfficeInfo($id)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="delete from offices where officeCode=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);
        if($statement->execute())
        {
            return "success";
        }
        else{
            return "fail";
        }
    }
}

?>
