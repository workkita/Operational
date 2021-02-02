<?php
	include '../../session.php';
    

		$id = $_GET['id'];
		$sql =" DELETE FROM inquiry_container WHERE inquiry_container.id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Joborder deleted successfully';
		}
		else{
            $_SESSION['error'] = 'Select item to delete first';
		}

	header('location: rep_joborder.php');
	
?>