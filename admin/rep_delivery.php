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
        Report Delivery Data
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
				<h3>Report Delivery Data</h3>
        <div class="row">    
          <div class="col-sm-2">
          </div>

            
        </div>
        <div class="panel-body text-nowrap">
				<table id="example5" width="100%" class="table table-striped table-bordered table-hover">
          <thead style="background-color:#367FA9">
            <tr>
              <th style="color: #FFFFFF">No</th>
              <th id="orderdate_col_head" style="color: #FFFFFF">Job Order Num.</th>
              <th id="code_sales_col_head" style="color: #FFFFFF">Destination Port</th>
              <th id="loaddate_col_head" style="color: #FFFFFF">RO Num.</th>
              <th id="Shipping_col_head" style="color: #FFFFFF">Truck Num.</th>
              <th id="purchased_head" style="color: #FFFFFF">Container</th>
              <th id="purchased_head" style="color: #FFFFFF">Container Num.</th>
              <th id="Address_col_head" style="color: #FFFFFF">Seal Num.</th>
              <th id="ppn_col_head" style="color: #FFFFFF">SJ Date</th>
              <th id="insurance_col_head" style="color: #FFFFFF">Load Type</th>
              <th id="ppftz03_col_head" style="color: #FFFFFF">Customer</th>
              <th id="service_type_col_head" style="color: #FFFFFF">Consignee</th>
              <th id="status_col_head" style="color: #FFFFFF">Vessel Name</th>
              <th id="status_col_head" style="color: #FFFFFF">Status</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "Select delivery.id as idd, delivery.code_jo as code, inquiry_container.id as id_c, inquiry_container.load_date, delivery.code_jo as jo_number, port.port_name as portn, delivery.no_truck as truck, 
              delivery.ro_number as RO, inquiry_container.container as con, delivery.no_container as noc, delivery.no_seal as seal,
              delivery.load_type as `load`, customer.name_cos as cos, delivery.receipent as consignee,v.vessel_n as vn, delivery.Status, subtracking.tracking_name FROM delivery 
              INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id
              INNER JOIN sales ON inquiry_container.sales_code = sales.code 
              INNER JOIN customer ON inquiry_container.customer = customer.code
              INNER JOIN subtracking ON delivery.tracking_name = subtracking.id
              INNER JOIN port ON delivery.origin_port = port.id and delivery.destination_port = port.id
              INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                if($row["Status"] == "0"){
                  $status = '<span class="label label-danger pull-center">not complete</span>';
                  $btnEdt = 'title="Edit" data-placement="right" class="btn btn-success btn-sm trashedt" data-toggle="modal" href="#myModalEdit" data-id='.$row["idd"].'>Edit</a>';
                  $cmplt = 'title="Complete" data-placement="right" class="btn btn-primary btn-sm trash" data-toggle="modal" href="#myModal" data-id='.$row["idd"].'> Complete</a>';
                  $pndhKpl = ' href="#" type="button" class="btn btn-warning btn-sm trashpndh" data-toggle="modal" data-target="#myModalpindah" data-id='.$row["code"].'><i class="fa fa-ship"></i> Pindah kapal</a>';
                }
                elseif($row["Status"] == "1"){
                    $status = '<span class="label label-warning pull-center">pindah kapal</span>';
                    $btnEdt = '"#" id="edit" title="button unusable" name="edit" class="btn btn-success btn-sm" disabled><i class="fa   fa-edit"></i> Edit</a>';
                    $cmplt = '"#" class="btn btn-primary btn-sm" name="complete" title="button unusable" disabled> <i class="fa fa-check-square-o" ></i> Complete</a>';
                    $pndhKpl = ' href="#" type="button" class="btn btn-warning btn-sm trashpndh" data-toggle="modal" data-target="#myModalpindah" data-id='.$row["code"].'><i class="fa fa-ship"></i> Pindah kapal</a>';
                }
                elseif($row["Status"] == "2"){
                    $status = '<span id="complete" class="label label-success pull-center">edit</span>';
                    $btnEdt = ' title="Edit" data-placement="right" class="btn btn-success btn-sm trashedt" data-toggle="modal" href="#myModalEdit" data-id='.$row["idd"].'>Edit</a>';
                    $cmplt = '"#" class="btn btn-primary btn-sm" name="complete" title="button unusable" disabled> <i class="fa fa-check-square-o"></i> Complete</a>';
                    $pndhKpl = '"#" class="btn btn-warning btn-sm" title="button unusable" name="pindah" disabled><i class="fa fa-ship"></i> Pindah kapal</a>';
                }
                elseif($row["Status"] == "3"){
                    $status = '<span id="complete" class="label label-primary pull-center">complete</span>';
                    $btnEdt = '"#" id="edit" title="button unusable" name="edit" class="btn btn-success btn-sm" disabled><i class="fa fa-edit"></i> Edit</a>';
                    $cmplt = '"#" class="btn btn-primary btn-sm" name="complete" title="button unusable" disabled> <i class="fa fa-check-square-o"></i> Complete</a>';
                    $pndhKpl = '"#" class="btn btn-warning btn-sm" title="button unusable" name="pindah" disabled><i class="fa fa-ship"></i> Pindah kapal</a>';
                }
                    echo 
                    "
                    <tr>
                      <td align='center'>".$no."</td>
                      <td class='orderdate_col' align='left'>".$row['jo_number']."</td>
                      <td class='orderdate_col' align='left'>".$row['portn']."</td>
                      <td class='loaddate_col' align='left' class='text-nowrap'>".$row['RO']."</td>
                      <td class='customer_col' align='left'>".$row['truck']."</td>
                      <td class='Shipping_col' align='center'>".$row['con']."</td>
                      <td class='Address_col' align='left'>".$row['noc']."</td>
                      <td class='ppn_col' align='left'>".$row['seal']."</td>
                      <td class='insurance_col' align='left'>".$row['load_date']."</td>
                      <td class='ppftz03_col' align='left'>".$row['load']."</td>
                      <td class='service_type_col' align='left'>".$row['cos']."</td>
                      <td class='service_col' align='left'>".$row['consignee']."</td>
                      <td class='vessel_name_col' align='left'>".$row['vn']."</td>
                      <td class='vessel_name_col' align='left'>".$status."</td>
                      <td class='_col' align='center'>
                        <a $btnEdt
                        <a $cmplt
                        <a $pndhKpl
                      </td>
                    </tr> ";
                    
                    $no++;
                    
                  }
                  ?>
        </tbody>
      </table>


        <!-- modal pindah kapal -->
        <div class="modal fade" id='myModalpindah' tabindex="-1" role="dialog" aria-labelledby="myModalpindahLabel" aria-hidden="true">
            <div class="modal-dialog" style="background: #021e4f">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <form method="post" action="pindah_kpl.php">
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name='id' id='id' >
                      <div class="form-group">
                        <label for="">Vessel Name</label>
                        <select id="vn"  name="vn" class="form-control" required>
                            <option value="">--select--</option>
                            <?php
                              $sql = "SELECT * FROM vessel_name";
                              $query = $conn->query($sql);
                              while($row = $query->fetch_assoc()){
                                    echo "
                              <option value=".$row['id'].">".$row['vessel_n']."</option>";
                              }
                            ?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="">Voyage</label>
                        <input class='form-control' type="text" id='voy' name='voy'>
                      </div>
                      <div class="form-group">
                        <label for="">ETD</label>
                        <input class='form-control' type="date" id='etd'  name='etd'>
                      </div>
                      <div class="form-group">
                        <label for="">ETA</label>
                        <input class='form-control' type="date" id='eta' name='eta'>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <button class='btn btn-primary btn-sm edt' type='submit' id='btn-yes' name='save'>save</button>
                  </form>
                </div>
                </div>
                </div>
              </div>
            </div>


        <!-- modal complete -->
        <div class="modal fade" id='myModalEdit' tabindex="-1" role="dialog" aria-labelledby="myModalEditLabel" aria-hidden="true">
            <div class="modal-dialog" style="background: #021e4f">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                <h4>Apakah anda yakin akan <b>mengedit</b>  Joborder ini ?</h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                  <a class='btn btn-primary btn-sm edt' id='btn-yes'>Yes</a>
                </div>
                </div>
                </div>
              </div>
            </div>
  
        <!-- modal complete -->
        <div class="modal fade" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="background: #021e4f">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                <h4>Apakah anda yakin Joborder ini akan <b>Complete</b>?</h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                  <a class='btn btn-primary btn-sm' id='btn-complete'>Yes</a>
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


  
// modal pindah kapal
  $('.trashpndh').click(function(){
        var code=$(this).data('id');
    $.ajax({
      url: "data/jobOrder_data.php",
      data: "code_jo=" + code,
    }).done(function(data) {
      var json = data;
      obj = JSON.parse(json);
      $('#id').val(obj.id);
      $('#vn').val(obj.vessel_name);
      $('#voy').val(obj.voy);
      $('#etd').val(obj.etd);
      $('#eta').val(obj.eta);
    });
    });





  $('.trashedt').click(function(){
        var id=$(this).data('id');
        $('.edt').attr('href','joborder_edt.php?id='+id);
    })

  $('.trash').click(function(){
        var id=$(this).data('id');
        $('#btn-complete').attr('href','complete_job.php?id='+id);
    })

</script>
</body>
</html>
