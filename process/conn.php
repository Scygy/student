<?php

$servername='localhost';
$username='root';
$password='SystemGroup2018';

date_default_timezone_set('Asia/Manila');
  $server_date = date('Y-m-d H:i:s');
  $server_date_only = date('Y-m-d'); 


try {

	$conn = new PDO ("mysql:host=$servername;
		dbname=sample",$username,$password);


// $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 //   echo "connectioned succesful";

	
} catch (PDOException $e) {
	echo 'NO CONNECTION'.$e->getMessage();
}

?>