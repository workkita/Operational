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
        Pinjaman & UJS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">New Pinjaman</li>
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
            </div>
            <div class="box-body">
              <form class="form-inline">
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group col-md-4">
     <label for="inputPassword4" class="col-sm-4 control-label">Tanggal J.O</label>
		<div class="col-sm-5">
      		<input type="date" class="form-control" id="inputPassword4">
		</div>
    </div>
  	<div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  	</div>
	  
	<div class="form-row">
  	<div class="form-group col-md-4">
     <label for="inputPassword4" class="col-sm-4 control-label">Job Order</label>
		<div class="col-sm-4">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Job Order Number">
		</div>
    </div>
  	<div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  	</div>
	  
	<div class="form-row">
  	<div class="form-group col-md-4">
     <label for="inputPassword4" class="col-sm-4 control-label">Voucher Number</label>
		<div class="col-sm-4">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Voucher Number">
		</div>
    </div>
  	<div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  	</div>
  </div>
	  
  <div class="post clearfix">
  <div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Nama Sopir</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Nama Sopir">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">No.Handphone</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="No.Handphone">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
	  </div>
	  
	<div class="post clearfix">
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Tanggal Muat</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Jenis Muatan">
		</div>
    </div>
  		<div class="col-md-8">
    	</div>
		<label for="inputPassword4" class="col-sm-12 control-label"></label>
  	</div>
		  
 	<div class="form-row">
    	<div class="form-group col-md-4">
      		<label for="nama" class="col-sm-4 control-label">Route</label>
			<div class="col-sm-8">
        		<input class="form-control" type="text" name="inpnama" placeholder="Route">
			</div>
   		</div>
    <div class="form-group col-md-4">
    	<label for="inputPassword4" class="col-sm-3 control-label">Port Asal</label>
		<div class="col-sm-9">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Port Asal">
		</div>
    </div>
	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">Port Tujuan</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="Port Tujuan">
		</div>
    </div>
  </div>
		  
		  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nama" class="col-sm-4 control-label">Customer</label>
		<div class="col-sm-8">
        <input class="form-control" type="text" name="inpnama" placeholder="Customer">
		</div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">Tujuan</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="Tujuan">
		</div>
    </div>
	<div class="col-md-4">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
    <div class="form-group col-md-4">
      <label for="nama" class="col-sm-4 control-label">No.Truck</label>
		<div class="col-sm-8">
        <input class="form-control" type="text" name="inpnama" placeholder="No.Truck">
		</div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">No.Container</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="No.Container">
		</div>
    </div>
	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">No.Seal</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="No.Seal">
		</div>
    </div>
  </div>
		  
	<div class="form-row">
    <div class="form-group col-md-4">
      <label for="nama" class="col-sm-4 control-label">Pelayaran</label>
		<div class="col-sm-8">
        <input class="form-control" type="text" name="inpnama" placeholder="Pelayaran">
		</div>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">Vess.Name</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="Vessel Name">
		</div>
    </div>
	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">Voy</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="Voy">
		</div>
    </div>
  </div>
  </div>
	  
	  <div class="row">
		  <div class="col-sm-12">
			  <button type="submit" class="btn btn-primary">Save & Print</button>
		  </div>
	  </div>
</form>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
