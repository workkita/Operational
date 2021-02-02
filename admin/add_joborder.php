<?php
        include '../../session.php';

        if(isset($_POST['save'])){
            $code_jo = $_POST['code_jo'];
            $ro_number = $_POST['ro_number'];
            $id_inquery = $_POST['id_inquery'];
            $tracking_n = $_POST['tracking_n'];
            $unit = $_POST['unit'];
            $type_track = $_POST['type_track'];
            $driver = $_POST['driver'];
            $no_handphone = $_POST['no_handphone'];
            $load_type = $_POST['load_type'];
            $recipient = $_POST['recipient'];
            $rec_no_hp = $_POST['rec_no_hp'];
            $address_cons = $_POST['address_cons'];
            $no_truck = $_POST['no_truck'];
            $no_Container = $_POST['no_Container'];
            $no_Seal = $_POST['no_Seal'];
            $route = $_POST['route'];
            $origin_port = $_POST['origin_port'];
            $destination_port = $_POST['destination_port'];
            $agent = $_POST['agent'];
            $Status = 0;
        
    
            $sql = "INSERT INTO delivery SET `code_jo`='$code_jo', `id_inquiry_container` ='$id_inquery',  `ro_number` ='$ro_number', `tracking_name` = '$tracking_n',  `unit` = '$unit',  `type_track` = '$type_track',
            `driver_n` = '$driver',  `no_hp` = '$no_handphone', `load_type` = '$load_type', `receipent` = '$recipient', `rec_no_hp`='$rec_no_hp',  `address_cons` = '$address_cons', `no_truck` = '$no_truck', `no_container` = '$no_Container',
            `no_seal` = '$no_seal', `route` = '$route', `origin_port` = '$origin_port', `destination_port` = '$destination_port', `agent` = '$agent', `Status`='$Status' ";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Job oreder added successfully';
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