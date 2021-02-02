<?php
	$conn = new mysqli('localhost', 'root', '', 'final');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>