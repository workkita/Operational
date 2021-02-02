<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $id = $_POST['id'];
            $nilai = $_POST['nilai'];
            $percent = $_POST['percent'];
            $rate = $_POST['rate'];
            $TD_Jakarta = $_POST['TD_Jakarta'];

    
            $sql = "UPDATE `insurance` SET `value`='$nilai',
            `rate`= '$percent',`total`= '$rate',`td_j`='$TD_Jakarta' WHERE id = '$id'";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Insurance edited successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: rep_insurance.php');
?>