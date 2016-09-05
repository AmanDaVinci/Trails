<?php
	if($_POST["flow"])
		{
			$url = $_POST["flow"];
			
			echo "<h1>Flow Captured:</h1> <br>"; // Success Message
			//var_dump(json_decode($url,true));

			$history = json_decode($url,true);
			echo "<hr>".$history[0]['title']."<br>".$history[0]['url'];
			echo "<hr>".$history[1]['title']."<br>".$history[1]['url'];
			echo "<hr>".$history[2]['title']."<br>".$history[2]['url']."<hr>";

		}
?>