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
        Report Data Newprice
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Marketing</li>
        <li class="active">Report Table Newprice</li>
      </ol>
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
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3>Report New Price</h3>
            </div>
            <div class="box-body">

    <div class="panel-body text-nowrap">
        <table width="100%" class="table table-striped table-bordered table-hover" id="example4">
          <thead style="background-color:#367FA9">
            <tr>
            <th style="color: #FFFFFF">No</th>
            <th style="color: #FFFFFF">Date </th>
            <th style="color: #FFFFFF">From Date</th>
            <th style="color: #FFFFFF">End Date</th>
            <th style="color: #FFFFFF">Service</th>
            <th style="color: #FFFFFF">Costumer Code</th>
            <th style="color: #FFFFFF">Costumer</th>
            <th style="color: #FFFFFF">Route code</th>
            <th style="color: #FFFFFF">Route </th>
            <th style="color: #FFFFFF">Type</th>
            <th style="color: #FFFFFF">PPN</th>
            <th style="color: #FFFFFF">Insurance</th>
            <th style="color: #FFFFFF">PPFTZ03</th>
            <th style="color: #FFFFFF">Insurance</th>
            <th style="color: #FFFFFF">Total Unit</th>
            <th style="color: #FFFFFF">Type Unit</th>
            <th style="color: #FFFFFF">Container Type</th>
            <th style="color: #FFFFFF">Description</th>
            <th style="color: #FFFFFF">Price</th>
            <th style="color: #FFFFFF">ACTION</th>
            <th style="color: #FFFFFF">ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
          
            $no = 1;
              $sql = "SELECT *, c.name_cos, r.destination FROM newprice n, customer c, add_route r  where c.code = n.customer and r.code = n.route";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                    echo 
                    "
                  <tr>
                    <td align='center'>".$no."</td>
                    <td align='left'>".$row['date']."</td>
                    <td align='left'>".$row['from_date']."</td>
                    <td align='left'>".$row['to_date']."</td>
                    <td align='left'>".$row['service_type']."</td>
                    <td align='left'>".$row['customer']."</td>
                    <td align='left'>".$row['name_cos']."</td>
                    <td align='left'>".$row['route']."</td>
                    <td align='left'>".$row['destination']."</td>
                    <td align='left'>".$row['type']."</td>
                    <td align='left'>".$row['marketing']."</td>
                    <td align='left'>".$row['ppn']."</td>
                    <td align='left'>".$row['insurance']."</td>
                    <td align='left'>".$row['ppftz03']."</td>
                    <td align='left'>".$row['unit_total']."</td>
                    <td align='left'>".$row['type_c']."</td>
                    <td align='left'>".$row['type_container_v']."</td>
                    <td align='left'>".$row['des']."</td>
                    <td align='left'>".$row['total']."</td>
                    <td align='center'>
                     <a href='edit_newprice.php?id=".$row['id']."' class='btn btn-success btn-sm' name='edit' ><i class='fa fa-trash-o'></i> Edit</a>
                    </td>
                    <td align='center'>
                      <a href='delete_job_order.php?id=".$row['id']."' class='btn btn-danger btn-sm' name='delete' onclick='return checkDelete()'><i class='fa fa-trash-o'></i> Delete</a>
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
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<style>
th{
  font-weight: lighter;
}
button.btn.btn-default{
   margin-left: 4px;
   margin-right: 4px;
 }
</style>
<?php include 'includes/scripts.php'; ?>
<script>

  function checkDelete(){
      return confirm('Are you sure?');
  }

</script>
</body>
</html>
