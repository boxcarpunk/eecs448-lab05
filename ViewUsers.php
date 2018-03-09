<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	// creates MYSQL object
	$mysqli = new mysqli("mysql.eecs.ku.edu", "a594h359", "iej3iepi", "a594h359");

	// check connection
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	//gets users from the table
	$query = "SELECT * FROM Users";
	$result = $mysqli->query($query);
	
	//if there are users in the array
	if($result)
	{
	
		echo "<table style=\"border: 1px solid black\">";
		
			echo "<tr>";
			
				echo "<th style=\"border: 1px solid black; text-align: center\">";
				
					echo "Users";
					
				echo "</th>";
				
			echo "</tr>";
	
			while($row = $result->fetch_assoc())
			{
		
				echo "<tr>";
				
					echo "<td style=\"border: 1px solid black; text-align: center\">";
					
						echo $row["user_id"];
						
					echo "</td>";
					
				echo "</tr>";
		
			}
		
		echo "</table>";
	
	}
	else
	{
	
		echo "There are no users in the database.<br>";
	
	}

	// close connection
	$mysqli->close();
	
?>
