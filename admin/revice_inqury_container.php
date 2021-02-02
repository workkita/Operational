<?php
        include '../../session.php';

        if(isset($_POST['save'])){

            $id = $_POST['id'];
            $orderdate = $_POST['orderdate'];
            $code_sales = $_POST['code_sales'];
            $loaddate = $_POST['loaddate'];
            $customer = $_POST['customer'];
            $purchased = $_POST['purchased'];
            $address = $_POST['address'];
            $ppn = $_POST['ppn'];
            $insurance = $_POST['insurance'];
            $ppftz03 = $_POST['ppftz03'];
            $service_type = $_POST['service_type'];
            $shippingn = $_POST['shippingn'];
            $vessel_n = $_POST['vessel_n'];
            $voy = $_POST['voy'];
            $type_JO = $_POST['type_JO'];
            $type = $_POST['type'];
            $etd = $_POST['etd'];
            $eta = $_POST['eta'];
            $status = '0';
              
        
            $sql = "UPDATE inquiry_container SET order_date = '$orderdate', sales_code='$code_sales', load_date = '$loaddate', customer = '$customer',
            purchased = '$purchased', `address` = '$address', ppn ='$ppn', insurance = '$insurance', ppftz03 ='$ppftz03', `service` ='$service_type',
            shipping_name = '$shippingn', vessel_name ='$vessel_n', voy ='$voy', type_jo = '$type_JO', `type` ='$type', etd = '$etd', eta = '$eta', 
            `Status` = '$status'  where id = '$id'";
        if($conn->query($sql)){
            $_SESSION['success'] = 'revice successfully';   
        }
           else{
               $_SESSION['error'] = $conn->error;
           }
       }	
       else{
           $_SESSION['error'] = 'Fill up add form first';
       }
        header('location: rep_joborder.php');
            
           
?>