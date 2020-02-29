<?php
	ob_start();

	session_start();


	$timezone = date_default_timezone_set("Africa/Nairobi");

	$con = mysqli_connect("localhost", "root", "", "double b photography");

	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?> 