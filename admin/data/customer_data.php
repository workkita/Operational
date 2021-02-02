
<?php
include '../../conn.php';
//mengambil data
$query = mysqli_query($conn, "select * from iqury_container ");
while($row = mysqli_fetch_assoc($query))  
{  
    $data[] = $row;  
}  

//tampil data
echo json_encode($data);

?>
