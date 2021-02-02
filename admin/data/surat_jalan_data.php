
<?php
include '../conn.php';
$code = $_GET['code_jo'];
//mengambil data
$query = mysqli_query($conn, "Select  delivery.no_container, delivery.no_seal as ns,
customer.name_cos, delivery.receipent , delivery.address_cons , v.vessel_n, delivery.load_type FROM delivery 
INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id 
INNER JOIN customer ON inquiry_container.customer = customer.code 
INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id where code_jo='$code'");
$jobOrder = mysqli_fetch_array($query);
$data = array(
            'container_num'             =>      $jobOrder['no_container'],
            'customer'                  =>      $jobOrder['name_cos'],
            'seal'                      =>      $jobOrder['ns'],
            'addres_cnse'               =>      $jobOrder['address_cons'],
            'consignee'                 =>      $jobOrder['receipent']
            
            );

//tampil data
echo json_encode($data);

?>