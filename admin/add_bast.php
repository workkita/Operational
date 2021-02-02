<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            
            $banum = $_POST['banum'];
            $sj = $_POST['code_sj'];
            $sql = "INSERT INTO bast (`code`, `sj`) VALUES ('$banum', '$sj')";
        
            if($conn->query($sql)){
                $_SESSION['success'] = 'Bast added successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: Bast.php');
?>