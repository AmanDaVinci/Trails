<?php

    if($_POST["flow"])
	{
<<<<<<< HEAD
		$json_flow = $_POST["flow"];
		
		echo "<h1>Flow Captured:</h1> <br>"; // Success Message
		var_dump(json_decode($json_flow,true));

		$history = json_decode($json_flow,true);
		echo "<hr>".$history[0]['title']."<br>".$history[0]['url']."<br>".$history[0]['id'];
		echo "<hr>".$history[1]['title']."<br>".$history[1]['url']."<br>".$history[1]['id'];
		echo "<hr>".$history[2]['title']."<br>".$history[2]['url']."<br>".$history[2]['id']."<hr>";

		// Store the data
		for ($i = 0; $i < 3; $i++)
		{
			$servername = "localhost";
			$username = "root";
			$password = "test123";
			$dbName = "Trails";

			$conn = new mysqli($servername, $username, $password, $dbName);
			if ($conn->connect_error)
			{
				die("Connection failed: ".$conn->connect_error);
			}

			$id = mysqli_real_escape_string($conn, $history[$i]['id']);
			$url = mysqli_real_escape_string($conn, $history[$i]['url']);
			$title= mysqli_real_escape_string($conn, $history[$i]['title']);
			$lastVisitTime = mysqli_real_escape_string($conn, $history[$i]['lastVisitTime']);
			$typedCount = mysqli_real_escape_string($conn, $history[$i]['typedCount']);
			$visitCount = mysqli_real_escape_string($conn, $history[$i]['visitCount']);
			
			$sql = "INSERT INTO FlowDB (id, url, title, lastVisitTime, typedCount, visitCount)
					VALUES ('".$id."', '".$url."','".$title."','".$lastVisitTime."','".$typedCount."','".$visitCount."')";

			if ($conn ->query($sql) === TRUE)
			{
				echo "New record created";
			}
			else
			{
				echo "Error: ".$sql."<br>".$conn->error;
			}

			$conn->close();	
		}

=======
		$url = $_POST["flow"];
		$visit = $_POST["visits"];
		
		echo "<h1>Flow Captured:</h1> <br>"; // Success Message
		var_dump(json_decode($visit,true));

		$history = json_decode($url,true);
		echo "<hr>".$history[0]['title']."<br>".$history[0]['url'];
		echo "<hr>".$history[1]['title']."<br>".$history[1]['url'];
		echo "<hr>".$history[2]['title']."<br>".$history[2]['url']."<hr>";
>>>>>>> origin/master
	}
	
	if($_POST["transition"])
	{
		$url = $_POST["transition"];
		
		echo "<h1>transition:</h1> <br>"; // Success Message
		var_dump(json_decode($url,true));

		$transition = json_decode($url,true);
		echo "<hr>".$transition[0]['id']."<br>".$transition[0]['referringVisitId'];
		
	}
	
	$flow = array_merge($transition, $history);
?>