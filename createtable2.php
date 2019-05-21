<?php 
	$pwd = "14051995Dp";
	$db = "web3";
	// PHP Data Objects(PDO) Sample Code:
	try {
	    $conn = new PDO("sqlsrv:server = tcp:dbizariazur.database.windows.net,1433; Database = web3", "dbizariazur", "14051995Dp");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
	    print("Error connecting to SQL Server yaa.");
	    die(print_r($e));
	}

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "dbizariazur@dbizariazur", "pwd" => "14051995Dp", "Database" => "web3", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:dbizariazur.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
