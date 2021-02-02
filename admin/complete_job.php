<?php
        include '../../session.php';

        
        $id = $_GET['id'];
        $Status = '3';
        
        $query = mysqli_query($conn, "UPDATE inquiry_container 
        LEFT JOIN delivery ON delivery.id_inquiry_container = inquiry_container.id SET inquiry_container.Status ='$Status' where delivery.id = '$id'");

        $sql = "UPDATE delivery SET `Status` ='$Status' where id = '$id'";
        if($conn->query($sql)){
            $_SESSION['success'] = 'Job oreder Complete';
        } else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: rep_delivery.php');
?>