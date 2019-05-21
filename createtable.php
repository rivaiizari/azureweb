<?php
 // DB connection info
 // $host = "localhost\sqlexpress";
	$host = "dbizariazur.database.windows.net";
	$user = "dbizariazur";
	$pwd = "14051995Dp";
	$db = "web3";
 try{
 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
 	// $conn = new PDO( "mysqli:Server= $host ; Database = $db ", $user, $pwd);
 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 	$sql = "CREATE TABLE tbl_employees(
 	id INT NOT NULL IDENTITY(1,1) 
 	PRIMARY KEY(id),
 	employee_name VARCHAR(50),
 	address VARCHAR(30),
 	created_at DATETIME),
 	updated_at DATETIME)";
 	$conn->query($sql);
 }
 catch(Exception $e){
 	die(print_r($e));
 }
 echo "<h3>Table created.</h3>";
 ?>