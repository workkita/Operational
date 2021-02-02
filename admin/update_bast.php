<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $id = $_POST['idg'];
            $goods = $_POST['goods'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];

    
            $sql = "UPDATE ba_goods SET nama_barang= '$goods',quantity= '$qty', unit='$unit' WHERE id = '$id'";
            if($conn->query($sql)){
                $_SESSION['success'] = 'BAST edited successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: rep_Bast.php');
?>