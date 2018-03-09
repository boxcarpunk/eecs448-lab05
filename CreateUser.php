<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$username = $_POST["username"];
	
	if($username == "")
	{
	
		echo "Your username cannot be empty.";
	
	}
	else
	{

		// creates MYSQL object
		$mysqli = new mysqli("mysql.eecs.ku.edu", "a594h359", "iej3iepi", "a594h359");

		// check connection
		if ($mysqli->connect_errno)
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		//checks if the user is already in the table
		$query = "SELECT * FROM Users WHERE user_id='" . $username . "'";
		$result = $mysqli->query($query);

		if (!($result->fetch_assoc()))
		{
		
			//if the user is not in the table, adds the user
			$add = "INSERT INTO Users VALUES ('" .  $username . "')";
			$mysqli->query($add);
		
			echo "User was successfully created.";
		
		}
		else
		{
		
			//if the user is in the table then tell the user and do not add
			echo "There is already a user with that name, please try a different username.";
		
		}

		// close connection
		$mysqli->close();
		
	}
	
?>
