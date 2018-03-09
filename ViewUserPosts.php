<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$username = $_POST["username"];
	
	// creates MYSQL object
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a594h359", "iej3iepi", "a594h359");

	// check connection
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	//gets the posts from the user
	$query = "SELECT content FROM Posts WHERE author_id='" . $username . "'";
	$result = $mysqli->query($query);

	//if the user is in the posts table
	if ($result->fetch_assoc())
	{
	
		echo "<table style=\"border: 1px solid black\">";
		
			echo "<tr>";
			
				echo "<th style=\"border: 1px solid black; text-align: center\">";
			
					echo $username . "'s Posts";
				
				echo "</th>";
			
			echo "</tr>";
	
			while($row = $result->fetch_assoc())
			{
		
				echo "<tr>";
				
					echo "<td style=\"border: 1px solid black; text-align: center\">";
				
						echo $row["content"];
				
					echo "</td>";
				
				echo "</tr>";
		
			}
		
		echo "</table>";
	
	}
	else
	{
	
		echo "The user hasn't posted anything.<br>";
	
	}

	// close connection
	$mysqli->close();
	
?>
