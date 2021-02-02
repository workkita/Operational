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
        Input Data Master Port Depature
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Port Depature</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="box">
    <div class="box-header with-border">
        <div class="box-body">
            <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Input Data master
            <span class="caret"></span>
            </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li> <a class="dropdown-item" href="master_customer.php">Costumer</a></li>
                     <li> <a class="dropdown-item" href="master_voyage.php">Shipping</a></li>
                     <li> <a class="dropdown-item" href="master_vessel.php">Vessel Name</a></li>
                     <li> <a class="dropdown-item" href="master_port.php">Port</a></li>
                     <li> <a class="dropdown-item" href="master_agent.php">Agent Name</a></li>
                     <li> <a class="dropdown-item" href="master_route.php">Route</a></li>
                     <li> <a class="dropdown-item" href="master_barang.php">Barang</a></li>
                     <li> <a class="dropdown-item" href="master_vehicle.php">Vehicle</a></li>
                     <li> <a class="dropdown-item" href="master_sales.php">Sales</a></li>
                     <li> <a class="dropdown-item" href="master_subtracking.php">Subtracking</a></li>
                </ul>
            </div>
			  </div>
    </div>
  </div>  
  </div>

  <style>
    @media screen and (max-width:1000px){

        .box{
            margin-top: -40px;

        }
    }
  </style>
      
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>

