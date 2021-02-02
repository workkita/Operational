<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $code = $_POST['code'];
            $agentn = $_POST['agentn'];
            $no_ba = $_POST['no_ba'];
            $td_j = $_POST['td_j'];
            

    
            $sql = "INSERT INTO packing_lst (`code`,`BA_num`, `agent`, `td_j`) VALUES ('$code', '$no_ba', '$agentn', '$td_j')";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Packing list standard added successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: packinglist.php');
?>