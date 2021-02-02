<?php
        include '../../session.php';

       
        
        
        if(isset($_POST['save'])){
            
            $sj = $_POST['sj'];
            $code_jo = $_POST['code_jo'];
            $status = '0';
               

            for($i=0;$i < count($_POST['goods']); $i++){
     
                $goods_rincian = $_POST['goods'][$i];
                $quantity = $_POST['quantity'][$i];
                $unit = $_POST['unit'][$i];

                    $sql_goods  = mysqli_query($conn, "INSERT INTO `sj_goods` (`id`, `nama_barang`, `quantity`, `unit`, `sj`) 
                VALUES ('', '$goods_rincian','$quantity', '$unit', '$sj')");  
                                    
        }
           
    
            $sql = "INSERT INTO surat_jalan VALUES ('','$sj', '$code_jo', '$status')";
        
            if($conn->query($sql)){
                $_SESSION['success'] = 'Surat jalan added successfully';
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
        }	
        else{
            $_SESSION['error'] = 'Fill up add form first';
        }
        header('location: suratJalan.php');
?>