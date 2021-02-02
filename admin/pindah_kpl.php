<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $id = $_POST['id'];
            $vessel_name = $_POST['vn'];
            $voy = $_POST['voy'];
            $etd = $_POST['etd'];
            $eta = $_POST['eta'];

            $status ='0';
           
    
            $sql = "UPDATE inquiry_container SET voy ='$voy', vessel_name ='$vessel_name', etd ='$etd', eta ='$eta' WHERE id ='$id'";
            $query = mysqli_query($conn,"UPDATE delivery SET `Status`='$status' where delivery.id_inquiry_container ='$id'");
            
            if($conn->query($sql)){
                $_SESSION['success'] = 'Pindah Kapal success';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
       
        
        
        header('location: rep_delivery.php');
?>