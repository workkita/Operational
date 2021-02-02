
<?php
include '../conn.php';
$Vessel = $_GET['vessel'];
$Port = $_GET['port'];
//mengambil data
$query = mysqli_query($conn, "SELECT bast.code, customer.name_cos, delivery.no_container, delivery.no_seal, delivery.load_type, 
delivery.receipent, vessel_name.vessel_n, delivery.address_cons 
from bast 
INNER JOIN sj_goods on bast.sj = sj_goods.sj 
INNER JOIN surat_jalan on sj_goods.sj = surat_jalan.code 
INNER JOIN delivery on surat_jalan.code_del = delivery.code_jo 
INNER JOIN inquiry_container on delivery.id_inquiry_container = inquiry_container.id 
INNER JOIN customer on customer.code = inquiry_container.customer 
INNER JOIN port on delivery.destination_port = port.id 
INNER JOIN vessel_name ON vessel_name.id = inquiry_container.vessel_name where vessel_name.id='$Vessel' and port.id='$Port'");
while ($PackList = mysqli_fetch_array($query)){
$data[] = array(
            'code'      =>  $PackList['code'],
            'customer'  =>  $PackList['name_cos'],
            'container' =>  $PackList['no_container'],
            'seal'      =>  $PackList['no_seal'],
            'receipent' =>  $PackList['receipent'],
            'address'   =>  $PackList['address_cons'],
            'type'      =>  $PackList['load_type'],
            'vessel'    =>  $PackList['vessel_n']
            );
        }
//tampil data
echo json_encode($data);

?>
