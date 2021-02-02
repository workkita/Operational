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
        Report Data Vessel Schedule
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
				<h3>Report Job Order</h3>
        <div class="row">    
          <div class="col-sm-2">
            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
          </div>

            
        </div>
        <div class="panel-body text-nowrap">
				<table id="example5" width="100%" class="table table-striped table-bordered table-hover">
          <thead style="background-color:#367FA9">
            <tr>
              <th style="color: #FFFFFF">No</th>
              <th id="orderdate_col_head" style="color: #FFFFFF">Order Date</th>
              <th id="code_sales_col_head" style="color: #FFFFFF">Sales</th>
              <th id="loaddate_col_head" style="color: #FFFFFF">Load Date</th>
              <th id="Shipping_col_head" style="color: #FFFFFF">Customer</th>
              <th id="purchased_head" style="color: #FFFFFF">Purchased</th>
              <th id="Address_col_head" style="color: #FFFFFF">Address</th>
              <th id="ppn_col_head" style="color: #FFFFFF">PPN</th>
              <th id="insurance_col_head" style="color: #FFFFFF">Insurance</th>
              <th id="ppftz03_col_head" style="color: #FFFFFF">PPFTZ03</th>
              <th id="service_type_col_head" style="color: #FFFFFF">Service_type</th>
              <th id="shipping_name_col_head" style="color: #FFFFFF">Shipping Name</th>
              <th id="Vessel_Name_col_head" style="color: #FFFFFF">Vessel Name</th>
              <th id="Voyage_col_head" style="color: #FFFFFF">Voyage</th>
              <th id="c20_col_head" style="color: #FFFFFF">container</th>
              <th id="type_jo_col_head" style="color: #FFFFFF">Type JO</th>
              <th id="type_col_head" style="color: #FFFFFF">Type</th>
              <th id="ETD_col_head" style="color: #FFFFFF">ETD</th>
              <th id="ETA_Dest_col_head" style="color: #FFFFFF">ETA</th>
              <th id="status_col_head" style="color: #FFFFFF">STATUS</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "SELECT *, inquiry_container.id as iq FROM inquiry_container
               INNER JOIN
                sales ON inquiry_container.sales_code = sales.code
                INNER JOIN
                customer ON inquiry_container.customer = customer.code
                INNER JOIN
                vessel_name ON inquiry_container.vessel_name = vessel_name.id";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                  if($row["Status"] == "0"){
                    $status = '<span class="label label-danger pull-center">no confirm </span>';
                    $btnConf = '"joborder.php?id='.$row['iq'].'" id="confirm" name="confirm" class="btn btn-primary btn-sm"><i class="fa   fa-check-square-o"></i> Confirm</a>';
                    $rev = '"revice.php?id='.$row["iq"].'" class="btn btn-warning btn-sm" name="revice" > <i class="fa fa-mail-forward"></i> Revice</a>';
                    $btnDel = '"delete_job_order.php?id='.$row["iq"].'" class="btn btn-danger btn-sm" name="delete" ><i class="fa fa-trash-o"></i> Delete</a>';
                  }
                  elseif($row["Status"] == "1"){
                      $status = '<span class="label label-success pull-center">confirm</span>';
                      $btnConf = '"#" id="confirm" name="confirm" class="btn btn-primary btn-sm" disabled><i class="fa   fa-check-square-o"></i> Confirm</a>';
                      $rev = '"revice.php?id='.$row["iq"].'" class="btn btn-warning btn-sm" name="revice" > <i class="fa fa-mail-forward"></i> Revice</a>';
                      $btnDel = '"delete_job_order.php?id='.$row["iq"].'" class="btn btn-danger btn-sm" name="delete" ><i class="fa fa-trash-o"></i> Delete</a>';
                  }
                  elseif($row["Status"] == "2"){
                      $status = '<span id="revice" class="label label-warning pull-center">revice</span>';
                      $btnConf = '"#" id="confirm" name="confirm" class="btn btn-primary btn-sm" disabled><i class="fa   fa-check-square-o"></i> Confirm</a>';
                      $rev = '"revice.php?id='.$row["iq"].'" class="btn btn-warning btn-sm" name="revice" > <i class="fa fa-mail-forward"></i> Revice</a>';
                      $btnDel = '"#" class="btn btn-danger btn-sm" name="delete" disabled><i class="fa fa-trash-o"></i> Delete</a>';
                  }
                  elseif($row["Status"] == "3"){
                      $status = '<span id="revice" class="label label-primary pull-center">complete</span>';
                      $btnConf = '"#" id="confirm" name="confirm" class="btn btn-primary btn-sm" disabled><i class="fa   fa-check-square-o"></i> Confirm</a>';
                      $rev = '"#" class="btn btn-warning btn-sm" name="revice" disabled> <i class="fa fa-mail-forward"></i> Revice</a>';
                      $btnDel = '"delete_job_order.php?id='.$row["iq"].'" class="btn btn-danger btn-sm" name="delete" ><i class="fa fa-trash-o"></i> Delete</a>';
                  }
                    echo 
                    "
                  <tr>
                    <td value ='".$row['Status']."' align='center'>".$no."</td>
                    <td value ='".$row['Status']."' class='orderdate_col' align='left'>".$row['order_date']."</td>
                    <td value ='".$row['Status']."' class='code_sales_col' align='left' class='text-nowrap'>".$row['name']."</td>
                    <td value ='".$row['Status']."' class='loaddate_col' align='left' class='text-nowrap'>".$row['load_date']."</td>
                    <td value ='".$row['Status']."' class='customer_col' align='left'>".$row['name_cos']."</td>
                    <td value ='".$row['Status']."' class='Shipping_col' align='center'>".$row['purchased']."</td>
                    <td value ='".$row['Status']."' class='Address_col' align='left'>".$row['Address']."</td>
                    <td value ='".$row['Status']."' class='ppn_col' align='left'>".$row['ppn']."</td>
                    <td value ='".$row['Status']."' class='insurance_col' align='left'>".$row['insurance']."</td>
                    <td value ='".$row['Status']."' class='ppftz03_col' align='left'>".$row['ppftz03']."</td>
                    <td value ='".$row['Status']."' class='service_type_col' align='left'>".$row['service']."</td>
                    <td value ='".$row['Status']."' class='shipping_name_col' align='left'>".$row['shipping_name']."</td>
                    <td value ='".$row['Status']."' class='vessel_name_col' align='left'>".$row['vessel_n']."</td>
                    <td value ='".$row['Status']."' class='Voyage_col' align='left'>".$row['voy']."</td>
                    <td value ='".$row['Status']."' class='c20_col' align='left'>".$row['container']."</td>
                    <td value ='".$row['Status']."' class='type_jo_col' align='left'>".$row['type_jo']."</td>
                    <td value ='".$row['Status']."' class='type_jo_col' align='left'>".$row['type']."</td>
                    <td value ='".$row['Status']."' class='ETD_col' align='left'>".$row['etd']."</td>
                    <td value ='".$row['Status']."' class='ETA_Dest_col' align='left'>".$row['eta']."</td>
                    <td value ='".$row['Status']."' id='status' align='left'>".$status."</td>
                    <td value ='".$row['Status']."' class='_col' align='center'>
                      <a href=$btnDel
                    </td>
                    <td value ='".$row['Status']."' align='center'>
                      <a  href=$rev 
                      <a href=$btnConf
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
                title:     'Report Job Order',
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

  $("td").ready(function(){
       var idStatus = $('td').val('id');
            if(idStatus =='2' ) {
              $('td._col').hide();
            }else{
              $('td._col').show();
            }
  });

</script>
</body>
</html>