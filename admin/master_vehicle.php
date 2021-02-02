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
        Input Data Master Vehicle
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Vehicle</li>
      </ol>
    </section>
    <?php include 'includes/dropdown_menu_input.php'; ?>   
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

      <div class="row" style="margin-top: 50px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
	            <h3>Add New Vehicle</h3>
            </div>
            <div class="box-body">
              <form class="form-inline" method="post" action="add_vehicle.php">
	
  <div class="post clearfix">

      <div class="container">
        <div class="container">
          <div class="row">
           <div class="form-group col-sm-2">
             <label class="col-sm control-label">Join Date</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="date" id="join_date" name="join_date" placeholder="Join Date">
                  </div>
                  <div class="col-sm-2">
                    <label class="col-sm control-label">Vehicle ID</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="vehicle_id" name="vehicle_id" placeholder="Vehicle ID">
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">Vehicle Number</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="vehicle_number" placeholder="Vehicle Number">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputPassword4" class="col-sm control-label">Status</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="status_v" name="status_v" placeholder="Status">
                  </div>
                </div>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">Brand</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="brand" id="brand" placeholder="Brand">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputPassword4" class="col-sm control-label">Type</label>
                  </div>
                  <div class="col-sm-1">
                    <select class="form-control" name="type" id="type">
                      <option value="New">New</option>
                      <option value="Scond">Scond</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">Manufacture Year</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="manufacture" id="manufacture" placeholder="Manufacture Year">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputPassword4" class="col-sm control-label">Cylinder Capacity</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="Cylinder_c" name="Cylinder_c" placeholder="CC">
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">Identity Number</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="identity" id="identity" placeholder="Identidy Number">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputPassword4" class="col-sm control-label">Fuel Type</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="fuel_t" name="fuel_t" placeholder="Fuel Type">
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">License Plate</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="license_p" id="license_p" placeholder="License Plate">
                  </div>
                  <div class="col-sm-2">
                    <label class="col-sm control-label">Registration Year</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="registration_y" name="registration_y" placeholder="Registration Year">
                  </div>
                </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
             <label for="nama" class="col-sm control-label">Location Code</label>
            </div>
          	<div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="location_c" id="location_c" placeholder="Location Code">
                  </div>
                  <div class="col-sm-2">
                    <label for="inputPassword4" class="col-sm control-label">Engine Number</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="engine_n" name="engine_n" placeholder="Engine Number">
                  </div>
                </div>
            </div>
          </div>
        </div>
        
  </div>
</div>
  
	  <div class="row">
		  <div class="col-sm-12">
			  <button type="submit" class="btn btn-primary" name="save">Save</button>
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
    

  <style>
      @media screen and (min-width:1000px){
        .container{
          margin-top: 4px;
        }
        .col-sm-2{
          width: 150px;
        }
        .alert{
          margin-bottom: -50px;
          margin-top: 60px;
        }
        input#join_date{
          width: 190px;
        }

      }

      @media screen and (max-width:1000px){
        .container{
          margin-top: 4px;
        }
        .col-sm-2{
          margin-left: 20px;
          width: 120px;
        }
        label{
          font-size: 10px;
        }
        .form-control::-webkit-input-placeholder{
        font-size: 10px;
        }
        h3{
          font-size: 20px;
          margin-top: 4px;
        }
      }
    
    </style>

  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
