<?php
	# Declare the database credentials
	$servername = "localhost";
	$username = "root";
	$password = "DBPASsword";
	$dbname = "bakery_orders";

	# Establish a connection 
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	# Verify connection
	if($mysqli->connect_error){
        die("Connection failed!" . $mysqli->connect_error);  // Display the error message
    } else {
        echo "Connected successfully";  // Message indicating successful connection

	}

?>