
<?php
include '../conn.php';
$code = $_GET['code'];
//mengambil data
$query = mysqli_query($conn, "Select delivery.id_inquiry_container, inquiry_container.container, delivery.no_container, 
delivery.no_seal as ns, customer.name_cos, delivery.receipent , delivery.address_cons , v.vessel_n, delivery.load_type, 
sj_goods.nama_barang, sj_goods.quantity, sj_goods.unit
FROM delivery
INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id
INNER JOIN customer ON inquiry_container.customer = customer.code 
INNER JOIN surat_jalan ON surat_jalan.code_del = delivery.code_jo 
INNER JOIN sj_goods ON sj_goods.sj = surat_jalan.code
INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id where surat_jalan.code='$code'");

$jobOrder = mysqli_fetch_array($query);
$data = array(

            'id'                        =>      $jobOrder['id_inquiry_container'],
            'container_num'             =>      $jobOrder['no_container'],
            'customer'                  =>      $jobOrder['name_cos'],
            'seal'                      =>      $jobOrder['ns'],
            'addres_cnse'               =>      $jobOrder['address_cons'],
            'consignee'                 =>      $jobOrder['receipent'],
            'nm'                        =>      $jobOrder['nama_barang'],
            'qty'                       =>      $jobOrder['quantity'],
            'unit'                      =>      $jobOrder['unit']
                );

//tampil data
echo json_encode($data);

?>

