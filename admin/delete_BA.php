<?php
	include '../../session.php';
    

		$id = $_GET['id'];
		$sql =" DELETE FROM bast WHERE bast.id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'bast deleted successfully';
		}
		else{
            $_SESSION['error'] = 'Select item to delete first';
		}

	header('location: rep_Bast.php');
	
?>