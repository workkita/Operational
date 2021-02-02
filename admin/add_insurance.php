<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $ins_code = $_POST['ins_code'];
            $code_jo = $_POST['code_jo'];
            $nilai = $_POST['nilai'];
            $percent = $_POST['percent'];
            $rate = $_POST['rate'];
            $TD_Jakarta = $_POST['TD_Jakarta'];

    
            $sql = "INSERT INTO insurance (`code`, `code_del`, `value`, `rate`, `total`, `td_j`) VALUES ('$ins_code', '$code_jo', '$nilai', '$percent','$rate','$TD_Jakarta')";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Insurance added successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: insurance.php');
?>