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
        Input Data Master Agent
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Agent</li>
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



        <!-- funtion code -->
   
        <?php
            include 'conn.php';
            $query = mysqli_query($conn, "SELECT max(number_subtracking) as maxCode FROM subtracking");
            $data = mysqli_fetch_array($query);
            $subtrkCode = $data['maxCode'];
            $list = (int) substr($subtrkCode, 3, 3);
            $list++;
            $code = "TRK";
            $subtrkCode = $code . sprintf("%03s", $list);
        ?>

      <div class="row" style="margin-top: 50px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
	            <h3>Add New Subtracking</h3> 
            </div>
            <div class="box-body">
    <form class="form-inline" id="agent"  method="POST" action="add_subtracking.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
			  
        <div class="container">
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm control-label">Subracking Number</label>
              </div>
              <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $subtrkCode ?>" id="tracking_no" name="tracking_no" readonly>
              </div>
          </div>

          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm control-label">Tracking Name</label>
              </div>
              <div class="col-sm-9">
                    <input type="text" class="form-control" title="Tracking name must be entered" id="tracking_n" name="tracking_n" placeholder="Subtracking" required>
              </div>
          </div>
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm control-label">Truck Number</label>
            </div>
          
              <div class="col-sm-9">
                    <input type="text" class="form-control" id="truck" name="truck" required>
              </div>
          </diV>
        </div>
    </div>
    <hr>
	  <div class="row" style="margin-top: 4px;">
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
          width: 160px;
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
<script src="includes/validate.js"></script>

<script>
    $(document).ready(function () {
      $("form[id='agent']").validate({ // initialize the plugin
          rules: {
            agent_name: {
            required : true
              }
          },
        messages :{
            agent_name: {
            required : "Enter username"
              }
          }
      });
    });
  </script>
</body>
</html>
