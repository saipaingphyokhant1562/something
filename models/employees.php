<?php
include_once __DIR__."/../vendor/db.php";
class Employees {
    private $connection="";
    public function getEmployeesList()
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select * from Employees";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createNewEmp($empnumber,$firstname,$lastname,$extension,$email,$jobtitle,$officecode)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="INSERT INTO employees(employeeNumber,  firstName,lastName, extension, email, officeCode, jobTitle,reportsTo) 
        VALUES(:empnumber, :firstname, :lastname, :extension, :email,:officecode,:jobtitle,:reportsto)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":empnumber",$empnumber);
        $statement->bindParam(":firstname",$firstname);
        $statement->bindParam(":lastname",$lastname);
        $statement->bindParam(":extension",$extension);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":jobtitle",$jobtitle);
        $statement->bindParam(":officecode",$officecode);
        $statement->bindParam(":reportsto",$report_to);

        if($statement->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function getEmployeeInfo($id)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="select * from employees where employeeNumber=:id";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":id",$id);

        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function updateEmployeeInfo($id,$firstname,$lastname,$extension,$email,$jobtitle,$officecode,$report_to)
    {
         //1.DB connection
         $this->connection=Database::connect();
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
         //2. sql statement
         $sql="update employees set  firstName=:firstname,lastName=:lastname,extension=:extension,email=:email,officeCode =:officecode ,reportsTo=:report_to,
         jobTitle=:jobtitle where employeeNumber=:id";
         $statement=$this->connection->prepare($sql);

            //$statement->bindParam(":name",$name);
            $statement->bindParam(":lastname",$lastname);
            $statement->bindParam(":firstname",$firstname);
            $statement->bindParam(":extension",$extension);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":officecode ",$officecode);
            $statement->bindParam(":report_to",$report_to);
            $statement->bindParam(":jobtitle",$jobtitle);
            //$statement->bindParam(":employeenumber",$empnumber);
            $statement->bindParam(":id",$id);
        
        if($statement->execute())
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteEmployeeInfo($id)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2.sql statement
        $sql="delete from employees where employeeNumber=:id";
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