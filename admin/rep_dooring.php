<?php include '../../session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Dooring
      </h1>
     
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
<div class="row" style="margin-top: -5px;">
  <div class="col-xs-12">
    <div class="box" id="box">
      <div class="box-header with-border">
				<h3>Report Dooring</h3>
        <div class="row">    
          <div class="col-sm-2">
          </div>

            
        </div>
        <div class="panel-body text-nowrap">
				<table id="example5" width="100%" class="table table-striped table-bordered table-hover">
          <thead style="background-color:#367FA9">
            <tr>
              <th style="color: #FFFFFF">No</th>
              <td id="_col_head" style="color: #FFFFFF" >Shipping Name</td>
              <th id="_col_head" style="color: #FFFFFF" >Vessel</th>
              <th id="_col_head" style="color: #FFFFFF" >Voyage</th>
              <th id="_col_head" style="color: #FFFFFF" >ETD</th>
              <th id="_col_head" style="color: #FFFFFF" >TD</th>
              <th id="_col_head" style="color: #FFFFFF" >ETA</th>
              <th id="_col_head" style="color: #FFFFFF" >TA</th>
              <th id="_col_head" style="color: #FFFFFF" >Sandar</th>
              <th id="_col_head" style="color: #FFFFFF" >Dooring Date</th>
              <th id="_col_head" style="color: #FFFFFF" >Free Storage</th>
              <th id="_col_head" style="color: #FFFFFF" >Free Demurage</th>
              <th id="_col_head" style="color: #FFFFFF" >Jumlah Hari Storage</th>
              <th id="_col_head" style="color: #FFFFFF" >Jumlah Hari Demurage</th>
              <th id="_col_head" style="color: #FFFFFF" >Total Storage</th>
              <th id="_col_head" style="color: #FFFFFF" >Total Demurage</th>
              <th id="_col_head" style="color: #FFFFFF" >Keterangan Claim</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "SELECT *, i.customer, d.tracking_name, d.code_jo, i.etd
              FROM delivery d 
              JOIN inquiry_container i ON i.id = d.id_inquiry_container";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                    echo 
                    "
                    <tr>
                      <td align='center'>".$no."</td>
                      <td class='orderdate_col' align='left'>".$row['destination_port']."</td>
                      <td class='code_sales_col' align='left' class='text-nowrap'>".$row['id']."</td>
                      <td class='loaddate_col' align='left' class='text-nowrap'>".$row['ro_number']."</td>
                      <td class='customer_col' align='left'>".$row['no_truck']."</td>
                      <td class='Shipping_col' align='center'>".$row['no_container']."</td>
                      <td class='Address_col' align='left'>".$row['no_seal']."</td>
                      <td class='ppn_col' align='left'>".$row['load_date']."</td>
                      <td class='insurance_col' align='left'>".$row['load_type']."</td>
                      <td class='ppftz03_col' align='left'>".$row['customer']."</td>
                      <td class='service_type_col' align='left'>".$row['code_jo']."</td>
                      <td class='service_col' align='left'>".$row['etd']."</td>
                      <td class='service_col' align='left'>".$row['etd']."</td>
                      <td class='service_col' align='left'>".$row['etd']."</td>
                      <td class='service_col' align='left'>".$row['etd']."</td>
                      <td class='vessel_name_col' align='left'>".$row['vessel_name']."</td>
                      <td class='_col' align='center'>
                        <a href='delete_job_order.php?id=".$row['code_jo']."' class='btn btn-danger btn-sm' name='delete' ><i class='fa fa-trash-o'></i> Delete</a>
                      </td>
                      <td align='center'>
                        <a  href='../../marketing/admin/revice.php?id=".$row['code_jo']."' class='btn btn-warning btn-sm' name='revice' ><i class='fa fa-mail-forward'></i> Revice</a>
                        <a href='joborder.php?id=".$row['code_jo']."' name='confirm' class='btn btn-primary btn-sm' ><i class='fa   fa-check-square-o'></i> Confirm</a>
                      </td>
                    </tr>" ;
                      $no++;
                    }
              ?>
            </tbody>
        </table>
            </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>

</div>

<style>
 @media screen and (min-width:1000px){

    th{
      font-weight: lighter;
    }
    .container.col-lg-12{
      width: 450px;
    }
    input[type='checkbox']{
      margin-right: 4px;
    }
    #dLabel{
    margin-left: -100px;
    }
  }
    th{
        font-weight: lighter;
        text-align: center;
      }
    button.btn.btn-default{
    margin-left: 4px;
    margin-right: 4px;
  }
</style>
<?php include 'includes/scripts.php'; ?>
<script>
   $(document).ready(function() {
    var table = $('#example5').DataTable( {
        'scrollX'     : true,
        'responsive'  : true,
        lengthChange: false,
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                className: 'btn-primary'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                className: 'btn-success'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                className: 'btn-info'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className: 'btn-danger',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
              title: '',
              extend:'print',
              text: 'Print <i class="fa  fa-print"></i>',
              orientation: 'landscape',
              pageSize: 'A4'
            }, 
             {

              extend:'colvis', 
              text: 'Coloumn visibility <i class="fa  fa-columns"></i>'
             } 
            
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example5_wrapper .col-sm-6:eq(0)' );
  })
</script>
</body>
</html>