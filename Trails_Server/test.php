<?php

    $test = "hello world";
    
    echo $test;

    if($_POST["url"])
	{
		$url = $_POST["url"];
		echo "Welcome ". $url ."!"; // Success Message
	}
?>