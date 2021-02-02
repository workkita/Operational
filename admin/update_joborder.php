<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $id = $_POST['id'];
            $tracking_n = $_POST['tracking_n'];
            $unit = $_POST['unit'];
            $type_track = $_POST['type_track'];
            $driver = $_POST['driver'];
            $no_handphone = $_POST['no_handphone'];
            $load_type = $_POST['load_type'];
            $recipient = $_POST['recipient'];
            $address_cons = $_POST['address_cons'];
            $no_truck = $_POST['no_truck'];
            $no_Container = $_POST['no_Container'];
            $no_Seal = $_POST['no_Seal'];
            $route = $_POST['route'];
            $origin_port = $_POST['origin_port'];
            $destination_port = $_POST['destination_port'];
            $agent = $_POST['agent'];
            $Status = '0';
        
    
            $sql = "UPDATE delivery SET tracking_name  = '$tracking_n',  unit  = '$unit',  type_track  = '$type_track',
            driver_n  = '$driver',  no_hp  = '$no_handphone', load_type  = '$load_type', receipent  = '$recipient', 
            address_cons  = '$address_cons', no_truck  = '$no_truck', no_container  = '$no_Container', no_seal  = '$no_Seal',
           `route`  = '$route', origin_port  = '$origin_port', destination_port  = '$destination_port', agent  = '$agent', 
            `Status` ='$Status' where id = '$id'";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Job oreder edited successfully';
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