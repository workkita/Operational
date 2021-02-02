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
        Report Insurance Data
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
				<h3>Report Insurance Data</h3>
        <div class="row">    
          <div class="col-sm-2">
          </div>

            
        </div>
        <div class="panel-body text-nowrap">
				<table id="example5" width="100%" class="table table-striped table-bordered table-hover">
          <thead style="background-color:#367FA9">
            <tr>
              <th style="color: #FFFFFF">No</th>
              <th id="orderdate_col_head" style="color: #FFFFFF">Nilai</th>
              <th id="code_sales_col_head" style="color: #FFFFFF">Rate/Premi %</th>
              <th id="loaddate_col_head" style="color: #FFFFFF">Destination Port</th>
              <th id="loaddate_col_head" style="color: #FFFFFF">container</th>
              <th id="Shipping_col_head" style="color: #FFFFFF">Load</th>
              <th id="purchased_head" style="color: #FFFFFF">Customer</th>
              <th id="purchased_head" style="color: #FFFFFF">Consignee</th>
              <th id="purchased_head" style="color: #FFFFFF">TD Jakarta</th>
              <th id="purchased_head" style="color: #FFFFFF">Vessel Name</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "SELECT insurance.id, insurance.rate as rate, insurance.value as val, insurance.td_j as td, port.port_name,
              inquiry_container.container, delivery.load_type, inquiry_container.customer, delivery.receipent, v.vessel_n as vn
              FROM insurance
              INNER JOIN delivery on delivery.code_jo = insurance.code_del 
              INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id
              INNER JOIN port on delivery.destination_port = port.id
              INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                
                    echo 
                    "
                  <tr>
                    <td align='center'>".$no."</td>
                    <td align='left'>".$row['val']."</td>
                    <td align='center' class='text-nowrap'>".$row['rate']." %</td>
                    <td align='center' class='text-nowrap'>".$row['port_name']."</td>
                    <td align='center' class='text-nowrap'>".$row['container']."</td>
                    <td align='center' class='text-nowrap'>".$row['load_type']."</td>
                    <td align='center' class='text-nowrap'>".$row['customer']."</td>
                    <td align='center' class='text-nowrap'>".$row['receipent']."</td>
                    <td align='center' class='text-nowrap'>".$row['td']."</td>
                    <td align='center' class='text-nowrap'>".$row['vn']."</td>
                    </td>
                    <td align='left'>
                    <a href='#' type='button' class='btn btn-success btn-sm trashedt' data-toggle='modal' data-target='#myModaledt' data-id=".$row['id']."><i class='fa fa-edit'></i> Edit</a>
                    <a title='delete' data-placement='right' class='btn btn-danger btn-sm trash' data-toggle='modal' href='#myModal' data-id=".$row['id'].">Delete</a>
                    
                  </td>
                    </td>
                  </tr>" ;
                      $no++;
                    }
              ?>
            </tbody>
        </table>


            <!-- modal Edit -->
              <div class="modal fade" id='myModaledt' tabindex="-1" role="dialog" aria-labelledby="myModalEdtLabel" aria-hidden="true">
                <div class="modal-dialog" style="background: #021e4f">
                  <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah anda yakin data ini akan <b>diedit</b>?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <a class='btn btn-primary btn-sm' id='btn-yes'>Yes</a>
                    </div>
                    </div>
                    </div>
                  </div>


            <!-- modal hapus -->
              <div class="modal fade" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background: #021e4f">
                  <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah anda yakin data ini akan <b>dihapus</b>?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <a class='btn btn-primary btn-sm dlt' id='btn-yes'>Yes</a>
                    </div>
                    </div>
                    </div>
                  </div>

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
.btn.btn-default.buttons-print{
  background-color: cyan;
  color: #fff;
}
  i{
    color: #fff;
  }
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
                title: 'Report Job Order',
                titleAttr: 'Copy',
                className: 'btn-primary'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title: 'Report Job Order',
                titleAttr: 'Excel',
                className: 'btn-success'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',  
                title: 'Report Job Order',
                titleAttr: 'CSV',
                className: 'btn-info'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                title: 'Report Job Order',
                className: 'btn-danger',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
              title: 'Report Job Order',
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
  });


    $('.trashedt').click(function(){
        var id=$(this).data('id');
        $('#btn-yes').attr('href','edit_insurance.php?id='+id);
    })

    $('.trash').click(function(){
        var id=$(this).data('id');
        $('.dlt').attr('href','delete_insurance.php?id='+id);
    })

</script>
</body>
</html>