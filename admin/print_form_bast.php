<!DOCTYPE html>
<html>
<?php include '../../session.php'; ?>
<?php include 'includes/header.php'; ?>



<?php
  $code = $_GET['code'];
  //mengambil data
  
  $sql = "SELECT bast.code as ba, surat_jalan.code as sj, sj_goods.nama_barang, sj_goods.quantity, sj_goods.unit, delivery.no_container, delivery.no_seal, delivery.address_cons, customer.name_cos, delivery.receipent 
  FROM `bast` 
  INNER JOIN surat_jalan ON bast.sj = surat_jalan.code 
  INNER JOIN sj_goods on sj_goods.sj = surat_jalan.code 
  INNER JOIN delivery ON delivery.code_jo = surat_jalan.code_del 
  INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id 
  INNER JOIN customer ON inquiry_container.customer = customer.code WHERE bast.code ='$code'";
          $query = $conn->query($sql);;
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
      <p class="ba"><b>Berita Acara Serah Terima Barang</b> </p>
      <p class="ba" style="margin-top: -10px; margin-bottom: 20px;">Nomor : <?= $data['ba']?></p>
    </div>

      
    <div class="container" style="width: 500px; margin-left: -70px;">
      <table class='table-sm'id='for'>
        <tr>
          <td id='l'><label>Nama Pengirim       </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['name_cos']?></label>
        <tr>
          <td id='l'><label>Nomor Container </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['no_container']?></label>
        </tr>
        <tr>
          <td id='l'><label>Nomor Seal </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['no_seal']?></label>
        </tr>
        <tr>
          <td id='l'><label>Nomor SJ </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['sj']?></label>
        </tr>
        <tr>
          <td id='l'><label>Nama Penerima </label></td>
          <td id='for'> <label style='height: 14px; margin-left: 50px;'>: <?= $data['receipent']?></label>
        </tr>
        <tr>
          <td id='l'><label>Jalan</label></td>
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
           $codeb = $_GET['code'];
              //mengambil data
              $no = 1;
              $query = mysqli_query($conn, "SELECT * FROM sj_goods 
              INNER JOIN bast on bast.sj = sj_goods.sj
              where bast.code ='$codeb'");
                 while($row = $query->fetch_assoc()){
                    echo
                  "<tr>
                      <td style='text-align: center;'> ".$no."</td>
                      <td align='center'>".$row['nama_barang']."</td>
                      <td align='center'>".$row['quantity']."</td>
                      <td align='center'>".$row['unit']."</td>
                  </tr>";
                    $no++;
                  }
              ?>
              
          </tbody>
        </table>
      </div>
      
          <table id='ttd'>
                <tr>
                    <td id='ttd' style="margin-top: 40px;"> Penerima Barang</td>
                    <td id='ttd' style="margin-top: 40px;">Jakarta, <?= date('d F Y')?></td>
                  
                <tr >
                  <td align="left" id='ttd'> (............................)</td>
                  <td align="left" id='ttd'> (............................) </td>
                    
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
  width: 500px;
}

td#l{
  width: 280px;
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

