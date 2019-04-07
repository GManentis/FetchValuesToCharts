<?php
if(isset($_POST["before"]) && isset($_POST["after"]))
{
	$hostname_DB = "127.0.0.1";
	$database_DB = "stocks";
	$username_DB = "root";
	$password_DB = "";
	
   try
   {
		$CONNPDO = new PDO("mysql:host=".$hostname_DB.";"."dbname=".$database_DB.";charset=UTF8",$username_DB,$password_DB, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_TIMEOUT => 3));
   }
   catch(PDOException $e)
   {
	   $CONNPDO = null;
   }
   
   if($CONNPDO != null)
   {
	   $from = $_POST["before"];
	   $to = $_POST["after"];
	   
	   $getdata_PRST = $CONNPDO -> prepare("SELECT * FROM stocks WHERE date >= :from AND date <= :to");
	   $getdata_PRST -> bindValue(":from",$from);
	   $getdata_PRST -> bindValue(":to",$to);
	   $getdata_PRST ->execute() or die($CONNPDO->errorInfo());
	   
	   $message = array();
	   
	   while($getdata_RSLT = $getdata_PRST->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_NEXT))
	   {
		   $sent = new stdClass();
		   $sent->stock = $getdata_RSLT["value"];
		   $sent->dato = $getdata_RSLT["date"];
		   
		   array_push($message,$sent);
	   }
	   
	   $myJSON = json_encode($message);
	   echo $myJSON;
   }
	
	
	
	
	
	
	
	
	
	
	
	
}


?>