<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$username = $_POST["username"];
	$postText = $_POST["postText"];
	
	if($username == "")
	{
	
		echo "Usernames cannot be empty.<br>";
		exit();
	
	}
	
	if($postText == "")
	{
	
		echo "Posts cannot be empty.<br>";
		exit();
	
	}

	// creates MYSQL object
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a594h359", "iej3iepi", "a594h359");

	// check connection
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	//checks if the user is already in the table
	$query = "SELECT * FROM Users WHERE user_id='" .$username. "'";
	$result = $mysqli->query($query);

	if ($result->fetch_assoc())
	{
	
		//if the user is in the table
		$add = "INSERT INTO Posts (content, author_id) VALUES ('" .$postText. "','" .$username. "')";
		$mysqli->query($add);
	
		echo "Post was successfully added.<br>";
	
	}
	else
	{
	
		//if the user is not in the table then tell the user and do not add post
		echo "There is not a user with that username.<br>";
		echo "Please use a valid username or create a user before trying to post.<br>";
	
	}

	// close connection
	$mysqli->close();
	
?>
