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
        Report Data Master
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Report Table Vessel</li>
      </ol>
    </section>
    <?php include 'includes/dropdown_menu_report.php'; ?>
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
      <div class="row"  style="margin-top: 55px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
				<h4>Report Table Vessel</h4>
      <div class="panel-body table-responsive text-nowrap">
				<table width="100%" class="table table-striped table-bordered table-hover" id="example4">
        <thead style="background-color:#367FA9">
          <tr>
							<th style="color: #FFFFFF">No </th>
              <th style="color: #FFFFFF">Vessel Name</th>
              <th style="color: #FFFFFF">ACTION</th>
          </tr>
        </thead>
              <tbody>
						  <?php
                    $no = 1;
                    $sql = "SELECT * FROM vessel_name";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo 
                          "
                        <tr>
                          <td align='center'>".$no."</td>
                          <td align='left'>".$row['vessel_name']."</td>
                          <td align='center'>
                            <a  data-toggle='modal' data-target='#myModal".$row['id']."' class='btn btn-success btn-sm' ><i class='fa fa-edit'></i> Edit</a>
                            <a  href='delete_subtracking.php?id=".$row['id']."' class='btn btn-danger btn-sm' ><i class='fa fa-trash-o'></i> Delete</a>
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
             <!-- Modal Edit Vessel-->
                    <div class="modal fade" id="myModal<?= $data['id']; ?>" role="dialog">
                    <div class="modal-dialog">
                                
            <?php include 'edit_vessel.php'; ?>
        </div>
      </div>
    </section>   
  </div>
       
  <?php include 'includes/footer.php'; ?>
</div>
<style>
  
  
  th{
    text-align: center;
    font-weight: lighter;
  }
  button.btn.btn-default{
   margin-left: 4px;
   margin-right: 4px;
 }
</style>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
