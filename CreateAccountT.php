<?php
	//Email and password
	$Email = $_REQUEST["Email"]; 
	$Password = $_REQUEST["Password"]; 

	//PHP Only
	$Hostname = "localhost";
	$DBName = "gameaccounts";
	$User = "root";
	$PasswordP = "";

	$conn = new mysqli($Hostname, $User, $PasswordP, $DBName);
	
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if(!$Email || !$Password) {
		echo "Empty";
	} else {
		$SQL = "SELECT * FROM  accounts where Email ='" . $Email . "'";
		$Result = mysqli_query($conn, $SQL);
		$Total = mysqli_num_rows($Result);
		if($Total == 0) {
			$insert = "INSERT INTO accounts (Email, Password) values ('" . $Email . "', MD5('" . $Password . "'))";
			$SQL1 = mysqli_query($conn, $insert);
			echo "Success";
		} else {
			echo "AlreadyUsed";
		}

	}

	//close mysql
	mysqli_close($conn);
?>
