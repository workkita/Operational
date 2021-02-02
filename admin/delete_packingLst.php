<?php
	include '../../session.php';
    

		$id = $_GET['id'];
		$sql =" DELETE FROM packing_lst WHERE packing_lst.id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Packing List deleted successfully';
		}
		else{
            $_SESSION['error'] = 'Select item to delete first';
		}

	header('location: rep_joborder.php');
	
?>