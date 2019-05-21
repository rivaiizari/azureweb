<!DOCTYPE html>
<html>
<head>
	<title>submision 1</title>
</head>
<body>
	<h1>Mauk Data here!</h1>
	<form method="post" action="" enctype="multipart/form-data">
		<tr>
			<td>nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td><input type="text" name="alamat"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit" /></td>
		</tr>
	</form>

	<?php 
		// $host = "localhost\sqlexpress";
 		$host = "localhost\azureweb";
		$user = "root";
		$pwd = "";
		$db = "ci_ajax_db";
		// Connect to database.
	 try {
	 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
	 	// $conn = new PDO( "sqli:Server= $host ; Database = $db ", $user, $pwd);
	 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 }
	 catch(Exception $e){
	 	die(var_dump($e));
	 }



	if(!empty($_POST)) {
		try {
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			// $date = date("Y-m-d");
			// Insert data
			$sql_insert = "INSERT INTO ci_ajax_db (nama, alamat) 
						   VALUES (?,?)";
			$stmt = $conn->prepare($sql_insert);
			$stmt->bindValue(1, $name);
			$stmt->bindValue(2, $email);
			// $stmt->bindValue(3, $date);
			$stmt->execute();
		}catch(Exception $e) {
			die(var_dump($e));
		}
		echo "<h3>Your're registered!</h3>";
	}

	

	$sql_select = "SELECT * FROM ci_ajax_db";
	$stmt = $conn->query($sql_select);
	$registrants = $stmt->fetchAll(); 
	if(count($registrants) > 0) {
		echo "<h2>employee who are registered:</h2>";
		echo "<table>";
		echo "<tr>";
		echo "<th>Nama</th>";
		echo "<th>Email</th>";
		echo "</tr>";
		foreach($registrants as $registrant) {
			echo "<tr><td>".$registrant['nama']."</td>";
			echo "<td>".$registrant['alamat']."</td></tr>";
	   }
		echo "</table>";
	} else {
		echo "<h3>No one is currently registered.</h3>";
	}

	?>
</body>
</html>