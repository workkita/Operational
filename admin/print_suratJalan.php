<!DOCTYPE html>
<html>
<?php include '../../session.php'; ?>
<?php include 'includes/header.php'; ?>



<?php

  $code = $_GET['code'];
  $status = '1';
  $query = mysqli_query($conn, "UPDATE surat_jalan SET `status`='$status' where code ='$code'");
  //mengambil data
  
  $sql = "SELECT surat_jalan.id, surat_jalan.code, sj_goods.nama_barang, sj_goods.quantity, 
  sj_goods.unit, c.name_cos, delivery.no_container, delivery.receipent , delivery.address_cons, delivery.rec_no_hp FROM surat_jalan 
  INNER JOIN delivery ON surat_jalan.code_del = delivery.code_jo 
  INNER JOIN inquiry_container ic ON delivery.id_inquiry_container = ic.id 
  INNER JOIN customer c ON ic.customer = c.code 
  INNER JOIN sj_goods on sj_goods.sj = surat_jalan.code WHERE surat_jalan.code ='$code'";
  $query = $conn->query($sql);
  $data = $query->fetch_assoc()?>


  <head>

  <div class="container">
  
    <div class="container">
      <div class="row" style="margin-top: 40px;">
        <div class="col-sm-2">
          <img style="width: 200px; margin-right: 5px;" src="../images/cel_logo.png">

        </div>
        <div class="col-sm-10  head">
          <div class="container" style="margin-top: -30px; margin-bottom: 30px;">
                <h4 style='color: red; margin-top: 30px; margin-bottom: -5px;'> <b  class="pt">PT CHANDRA EKAJAYA LOGISTIK </b></h4>
                <p class="jalan" style='color: green; font-size: 15px; margin-bottom: -5px;'>Jalan Terusan Kepala Hybrida Blok 
                C No. 17 Komplek Gading Square Kelapa Gading Sukapura, 
                Jakarta Utara 14140
                <li class='tlp'>TELP. 021-29068517, 29068518, 2906519, 29068520</li>
                <li class='tlp'>        021-29068473, 29068479, 29061654 </li>
                <li class='tlp'>FAX.    021-29068473, 29068479, 29061654 </li></p>
            </div>

        </div>
      <hr style='border: 0.1px solid black;'>
      </div>
    </div>
   </head>

  <body>

    <div>
      <p class="ba"><b>Surat Jalan</b> </p>
      <p class="ba" style="margin-top: -10px; margin-bottom: 20px;">Nomor : <?= $data['code']?></p>
    </div>

      
    <div class="container" style="width: 500px; margin-left: -70px;">
      <table class='table-sm'id='for'>
        <tr>
            <td><h4>Kepada Yth.</h4></td>
        </tr>
        <tr>
          <td id='l'><label>Nama penerima </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['receipent']?></label>
        <tr>
          <td id='l'><label>Nomor Telpon </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['rec_no_hp']?></label>
        </tr>
        <tr>
          <td id='l'><label>Alamat </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['address_cons']?></label>
        </tr>
      
      </table>
    </div>
      
    <div>
    </div>
    <div class="content-block">
      <div class="container" style="margin-top: 40px;">
        <table width="100%" class="table table-striped table-bordered table-hover rep">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Unit</th>
            </tr>
          </thead>

          <tbody>
        <?php
        $no= 1;
        $sql1 = "SELECT sj_goods.nama_barang, sj_goods.quantity, sj_goods.unit FROM `surat_jalan` 
        INNER Join sj_goods on sj_goods.sj = surat_jalan.code WHERE surat_jalan.code ='$code'";
         $query = $conn->query($sql1);
         while($row = $query->fetch_assoc()){
         echo"
          <tr>
              <td style='text-align: center;'>".$no."</td>
              <td align='center'>".$row['nama_barang']."</td>
              <td align='center'>".$row['quantity']."</td>
              <td align='center'>".$row['unit']."</td>
          </tr>";
        $no++;
        }
        ?>
        <tr>
             <td colspan="2">Catatan:</td>
             <td colspan="2">Perhatian: 
              <ol>
                <li>Surat jalan ini bukti resmi pengiriman barang</li>
              </ol>
             </td>
        </tr> 
    
          </tbody>
        </table>
      </div>
      
          <table id='ttd'>
                <tr>
                    <td id='ttd' style="margin-top: 40px;"> Pengirim Barang</td>
                    <td id='ttd' style="margin-top: 40px;"> Penerima Barang</td>
                    <td id='ttd' style="margin-top: 40px;">Jakarta, <?= date('d F Y')?></td>
                  
                <tr >
                  <td id='ttd' > (............................)</td>
                  <td id='ttd' > (............................)</td>
                  <td id='ttd' > (............................)</td>
                    
                </tr>
                </tr>
                
          </table>


        </div>
        <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
         
        </div>
      </div>
    </div>

   
    </div>
<style>
img{
  width: 60%;
}
.col-sm-1{
    width: 5opx;
}
.ba{
    text-align: center;
    font-size: 14px;
    font-style: bold;
}
#nnpc{
    margin-bottom: -3px;
    font-size: 14px;
}
h1, h3{
  text-align: center;
  font-size: 13px;
}
p{
  font-size: 12px;
}
th{
  color: black;
  text-align: center;
}
.col-sm-6::after{
  margin-left: 20px;
  margin-right: 20px;
}
footer. {
  font-size: 9px;
  text-align: left;
}
table#ttd{
  margin-left: 135px;
}
td#ttd{
  height: 100px;
  width: 400px;
}

td#l{
  width: 260px;
}

td#for{
  width: 800px;
  margin-top: 30px;
}
label{
  margin-right: -100px;
}
table#for{
  margin-left: 80px;
  height: 100px;
  font-size: 12px;
}
@page {
  size: A4;
  margin-right: 20px;
  margin-left: 40px;
  margin-top: 10px;
  margin-bottom: -10px;

}

@media print {
.head{
    margin-left: 140px;
    margin-top: 20px;
}

table.rep{
  margin-top: -40px;
}
.pt{
    color: red !important;
}
.jalan{
    color: green !important;
}
.jalan, .tlp{
    font-size: 12px !important;
}
  footer {
    position: fixed;
    bottom: 0;
  }
  a[href]:after {
        content: none !important;
    }

  .content-block, p {
    page-break-inside: avoid;
  }

  table.table-sm{
    margin-bottom: 40px;
  }
  img{
    margin-top: 40px;
    margin-bottom: -93px;
    margin-left: -2px;
    width: 150px !important;
  }
  h4#pt{
    color: red;
  }
  p#jalan{
    color: green;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
  input.form-control {
        border: none;
    }
}
#header, #nav, .noprint
{
display: none;
}
</style>
<script>
var curURL = window.location.href;
history.replaceState(history.state, '', '/');
window.print();
history.replaceState(history.state, '', curURL);

</script>
<?php include 'includes/scripts.php'; ?>
 </body>
</html>

