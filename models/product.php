<?php
include_once __DIR__."/../vendor/db.php";
class Product{
    private $connection="";
    public function getProductList()
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select * from products";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getPriceInfo($pid)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select * from products where productCode=:pid";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(':pid',$pid);

        //3. execute
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>