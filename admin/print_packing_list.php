<!DOCTYPE html>
<html>
<?php include '../../session.php'; ?>
<?php include 'includes/header.php'; ?>



<?php
  $code = $_GET['code'];
  //mengambil data
  
  $query = mysqli_query($conn, "SELECT bast.code, packing_lst.id, packing_lst.agent, packing_lst.td_j, customer.name_cos, delivery.no_container,
   delivery.no_seal, delivery.load_type, delivery.receipent, vessel_name.vessel_n, delivery.address_cons , port.port_name 
   from bast 
   INNER JOIN packing_lst on bast.code = packing_lst.BA_num 
   INNER JOIN sj_goods on bast.sj = sj_goods.sj 
   INNER JOIN surat_jalan on sj_goods.sj = surat_jalan.code 
   INNER JOIN delivery on surat_jalan.code_del = delivery.code_jo 
   INNER JOIN inquiry_container on delivery.id_inquiry_container = inquiry_container.id 
   INNER JOIN port on port.id = delivery.destination_port 
   INNER JOIN customer on customer.code = inquiry_container.customer
   INNER JOIN vessel_name ON vessel_name.id = inquiry_container.vessel_name WHERE bast.code='$code'");
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
      <p class="ba"><b>Packing List</b> </p>
      <p class="ba" style="margin-top: -10px; margin-bottom: 20px;">Nomor : <?= $data['code']?></p>
    </div>

      <div><h5>Jakarta, <?= date('d F Y');?></h5></div>
      <div><h5>Kepada Yth.</h5></div>
      <div><h5><b><?= $data['agent'];?></b></h5></div>
      <div><h5><b><?= $data['receipent'];?></b></h5></div>
      <div style="margin-top: 40px; margin-bottom: -40px;"><h5>Packing List,</h5></div>

      <div style="margin-top: 45px; margin-bottom: -40px;"><h5><b><?= $data['vessel_n'];?> <?= date("d F Y", strtotime($data['td_j'])); ?> <?= $data['port_name'];?></b></h5></div>
    </table>
    </div>
      
    <div>
    </div>
    <div class="content-block">
      <div class="container" style="margin-top: 40px;">
        <table width="100%" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Container Number</th>
              <th>Seal</th>
              <th>Load</th>
              <th>Consignee</th>
              <th>BA Number</th>
            </tr>
          </thead>

          <tbody>

          <?php $no = 1; ?>
             <tr>
                  <td style='text-align: center;'> <?= $no++?></td>
                  <td align='center'><?= $data['no_container']?></td>
                  <td align='center'><?= $data['no_seal']?></td>
                  <td align='center'><?= $data['load_type']?></td>
                  <td align='center'><?= $data['receipent']?></td>
                  <td align='center'><?= $data['code']?></td>
              </tr
              
          </tbody>
        </table>
        <div class=""><h5>Demikian dari kami atas segala perhatiannya kami ucapkan terima kasih</h5></div>
      </div>

          <table id='ttd'>
                <tr>
                    <td id='ttd' style="margin-top: 40px;"> PT. CHANDRA EKAJAYA LOGISTIK</td>
                <tr >
                  <td id='ttd' > (........................)</td>
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

td#for{
  width: 150px;
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

