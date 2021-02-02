
<?php
include '../conn.php';
$sj = $_GET['sj'];

$query = mysqli_query($conn, "SELECT * FROM sj_goods where sj ='$sj'");

while($jobOrder = mysqli_fetch_array($query)){
$data[] = array(

    'id'                      =>      $jobOrder['id'],
    'sj'                      =>      $jobOrder['sj'],
    'nama_barang'             =>      $jobOrder['nama_barang'],
    'quantity'                =>      $jobOrder['quantity'],
    'unit'                    =>      $jobOrder['unit']
    );
}

//tampil data
echo json_encode($data);
?>