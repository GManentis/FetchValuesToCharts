<?php
if(isset($_POST["stock"]) && isset($_POST["date"]))
{
	$hostname_DB = "127.0.0.1";
	$database_DB = "stocks";
	$username_DB = "root";
	$password_DB = "";

	try 
	{
		$CONNPDO = new PDO("mysql:host=".$hostname_DB.";dbname=".$database_DB.";charset=UTF8", $username_DB, $password_DB, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 3));	
	} 
	catch (PDOException $e) 
	{
		$CONNPDO = null;
	}
	if ($CONNPDO != null) 
	{
		$stock = $_POST["stock"];
		$date = $_POST["date"];
		
		$getdata_PRST = $CONNPDO->prepare("SELECT * FROM stocks WHERE date = :date");
		$getdata_PRST -> bindValue(":date",$date);
		$getdata_PRST ->execute() or die($CONNPDO->errorInfo());
		$count = $getdata_PRST->rowCount();
		
		if($count == 0)
		{
			$adddata_PRST = $CONNPDO->prepare("INSERT INTO stocks(value,date) VALUES (:value,:date)");
			$adddata_PRST -> bindValue(":value",$stock);
			$adddata_PRST -> bindValue(":date",$date);
			$adddata_PRST -> execute() or die($CONNPDO->errorInfo());
			
			echo "DATA HAS BEEN SUCCESSFULLY UPDATED!";
		}
		else
		{
			echo "There is a stock price for that date";
		}
	}

}
?>
