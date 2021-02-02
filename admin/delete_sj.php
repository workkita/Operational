<?php
	include '../../session.php';
    

		$code = $_GET['code'];
		$query= mysqli_query($conn, "DELETE FROM surat_jalan WHERE surat_jalan.code = '$code'");
		$sql = mysqli_query($conn,"DELETE FROM sj_goods WHERE sj_goods.sj = '$code'");
		if($conn->query($sql)){
			$_SESSION['success'] = 'Surat jalan deleted successfully';
		}
		else{
            $_SESSION['error'] = 'Select item to delete first';
		}

	header('location: surat_jalan.php');
	
?>