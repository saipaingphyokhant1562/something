<?php
class Database{

private static $host="localhost";	
private static $dbname="oms";
private static $username="root";
private static $password="";
private static $connection="";

public static function connect(){
    if(self::$connection==null)
    {
        try{
            self::$connection=new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$username,self::$password);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    return self::$connection;
   
}
public static function disconnect()
{
    self::$connection=null;
}
}

?>