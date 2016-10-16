<?php
function dbConnect()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "eis";	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error)
	    die("Connection failed: " . $conn->connect_error);

	return $conn;
}

function dbDisconnect($conn)
{
	$conn->close();
}
?>