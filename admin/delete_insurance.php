<?php
	include '../../session.php';
    

		$id = $_GET['id'];
		$sql =" DELETE FROM insurance WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Insurance deleted successfully';
		}
		else{
            $_SESSION['error'] = 'Select item to delete first';
		}

	header('location: rep_insurance.php');
	
?>