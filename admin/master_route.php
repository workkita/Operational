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
        Input Data Master Route
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Route</li>
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
            	<h3>Add New Route</h3>
            </div>
            <div class="box-body">
              <form class="form-inline" method="post" action="add_route.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
			  
   <div class="container" style="margin-top: 4px;">
      <div class="row">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Route Code</label>
        </div>
      
          <div class="col-sm-10">
                  <input type="text" class="form-control" id="route_code" name="route_code" placeholder="Route ID">
          </div>
      </div>
    </div>

      <div class="container" style="margin-top: 4px;">
        <div class="row">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Description</label>
          </div>
        
            <div class="col-sm-9">
                  <input type="text" class="form-control" id="description" name="description" placeholder="Description">
            </div>
        </div>
      </div>

      <div class="container" style="margin-top: 4px;">
        <div class="row">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Destination</label>
          </div>
        
            <div class="col-sm-9">
                  <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination">
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
        .col-sm-2{
          width: 135px;
        }
        div.post.clearfix{
          height: 150px;
        }
        .alert{
          margin-bottom: -50px;
          margin-top: 60px;
        }
      

      }

      @media screen and (max-width:1000px){
        .col-sm-2{
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
