<?php
include_once __DIR__."/../vendor/db.php";
class Order{
    private $connection="";
    public function getOrderList()
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="Select orders.*,customers.customerName from orders join customers on orders.customerNumber=customers.customerNumber";
        $statement=$this->connection->prepare($sql);

        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function createOrder($orderDate,$customerNo,$pname,$price,$qty)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="INSERT INTO orders( orderDate,customerNumber ) VALUES(:orderDate,:customerNumber)";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":orderDate",$orderDate);
        $statement->bindParam(":customerNumber",$customerNo);
        //3. execute
        //$statement->execute();
        if($statement->execute())
        {
            $lastId=$this->connection->lastInsertId();
            for($count=0;$count<sizeof($pname[0]);$count++)
            {
                $sql="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber) values(:orderNumber,:productCode,:quantityOrdered,:priceEach,:orderLineNumber)";
                $statement=$this->connection->prepare($sql);
                $index=$count+1;
                $statement->bindParam(":orderNumber",$lastId);
                $statement->bindParam(":productCode",$pname[0][$count]);
                $statement->bindParam(":quantityOrdered",$pname[0][$count]);
                $statement->bindParam(":priceEach",$pname[0][$count]);
                $statement->bindParam(":orderLineNumber",$index);
                $statement->execute();
                
            }
            if($statement->execute())
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }
    }

    public function reportOrderInfo($year)
    {
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. sql statement
        $sql="select month(orderDate) as month,count(orderNumber) as
         totalorders from orders where year(orderDate)=:year group by month(orderDate);";
        $statement=$this->connection->prepare($sql);

        $statement->bindParam(":year",$year);
        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
?>