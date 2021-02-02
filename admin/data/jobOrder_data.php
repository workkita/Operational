
<?php
include '../conn.php';
$code = $_GET['code_jo'];
//mengambil data
$query = mysqli_query($conn, "Select delivery.id_inquiry_container, delivery.code_jo, port.port_name, inquiry_container.voy, inquiry_container.etd, inquiry_container.eta, sj_goods.nama_barang, sj_goods.quantity, sj_goods.unit,
inquiry_container.container, delivery.no_container, delivery.no_seal as ns, customer.name_cos, delivery.receipent , delivery.address_cons ,
v.vessel_n, delivery.load_type FROM delivery 
INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id
INNER JOIN sales ON inquiry_container.sales_code = sales.code
INNER JOIN customer ON inquiry_container.customer = customer.code 
INNER JOIN surat_jalan ON surat_jalan.code_del = delivery.code_jo
INNER JOIN sj_goods ON surat_jalan.code = sj_goods.sj 
INNER JOIN port ON delivery.origin_port = port.id and delivery.destination_port = port.id 
INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id where code_jo='$code'");
$jobOrder = mysqli_fetch_array($query);
$data = array(

            'id'                        =>      $jobOrder['id_inquiry_container'],
            'code_jo'                   =>      $jobOrder['code_jo'],
            'Destination_port'          =>      $jobOrder['port_name'],
            'container'                 =>      $jobOrder['container'],
            'container_num'             =>      $jobOrder['no_container'],
            'customer'                  =>      $jobOrder['name_cos'],
            'seal'                      =>      $jobOrder['ns'],
            'addres_cnse'               =>      $jobOrder['address_cons'],
            'consignee'                 =>      $jobOrder['receipent'],
            'vessel_name'               =>      $jobOrder['vessel_n'],
            'load_type'                 =>      $jobOrder['load_type'],
            'voy'                       =>      $jobOrder['voy'],
            'etd'                       =>      $jobOrder['etd'],
            'eta'                       =>      $jobOrder['eta'],
            'nama_barang'               =>      $jobOrder['nama_barang'],
            'quantity'                  =>      $jobOrder['quantity'],
            'unit'                      =>      $jobOrder['unit']
            );

//tampil data
echo json_encode($data);

?>