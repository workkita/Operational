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
                Service Type
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="door_to_door.php">Door to Door</a></li>
                    <li><a href="door_to_port.php">Door to Port</a></li>
                    <li><a href="door_to_cy.php">Door to CY</a></li>
                    <li><a href="port_to_door.php">Port to Door</a></li>
                    <li><a href="port_to_port.php">Port to Port</a></li>
                    <li><a href="port_to_cy.php">Port to CY</a></li>
                    <li><a href="etc.php">ETC</a></li>
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

