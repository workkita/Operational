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
     <label for="inputPassword4" class="col-sm-4 control-label">Tanggal Kasbon</label>
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
      <label for="inputPassword4" class="col-sm-4 control-label">NIK</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="No. Induk Karyawan">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Nama</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Nama Karyawan">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
	  
  <div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Departemen</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Dept./Bagian">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Kasbon</label>
		<div class="col-sm-8">
      		<input type="number" class="form-control" id="inputPassword4" placeholder="Nominal">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
	  
  <div class="form-row">
    	<div class="form-group col-md-4">
      		<label for="nama" class="col-sm-4 control-label">Pembayaran</label>
			<div class="col-sm-8">
        		<select class="form-control" name="inpjk">
                      <option>Angsuran</option>
                      <option>Cash</option>
                    </select>
			</div>
   		</div>
    <div class="form-group col-md-4">
    	<label for="inputPassword4" class="col-sm-3 control-label">Jumlah Angsuran</label>
		<div class="col-sm-9">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Jumlah Angsuran">
		</div>
    </div>
	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-3 control-label">Lama Angsuran</label>
		<div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword4" placeholder="Lama Angsuran">
		</div>
    </div>
  </div>
	  </div>
	  
	<div class="post clearfix">
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Tanggal Pencairan</label>
		<div class="col-sm-8">
      		<input type="date" class="form-control" id="inputPassword4" placeholder="Tanggal Pencairan">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Jenis Pencairan</label>
		<div class="col-sm-8">
      		<select class="form-control" name="inpjk">
            	<option>Transfer</option>
            	<option>Cash</option>
            </select>
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
	  
  <div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">No.Rekening</label>
		<div class="col-sm-8">
      		<input type="text" class="form-control" id="inputPassword4" placeholder="Nomor Rekening">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
		  
	<div class="form-row">
  	<div class="form-group col-md-4">
      <label for="inputPassword4" class="col-sm-4 control-label">Nama Bank</label>
		<div class="col-sm-8">
      		<input type="number" class="form-control" id="inputPassword4" placeholder="Nama Bank">
		</div>
    </div>
  <div class="col-md-8">
    </div>
	  <label for="inputPassword4" class="col-sm-12 control-label"></label>
  </div>
  </div>
	  
	  <div class="row">
		  <div class="col-sm-12">
			  <button type="submit" class="btn btn-primary">Save</button>
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
