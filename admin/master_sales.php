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
            $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM sales");
            $data = mysqli_fetch_array($query);
            $customerCode = $data['maxCode'];
            
            $list = (int) substr($customerCode, 3, 3);
            
            $list++;

            $code = "SLS";
            $customerCode = $code . sprintf("%03s", $list);

            ?>


      <div class="row" style="margin-top: 50px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
	            <h3>Add New Sales Name</h3> 
            </div>
            <div class="box-body">
    <form class="form-inline" id="sales"  method="POST" action="add_sales.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
			  
        <div class="container">
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm-4 control-label">Code</label>
              </div>
              <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?= $customerCode; ?>" id="code_sales" name="code_sales" readonly>
              </div>
          </div>
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm-4 control-label">Name</label>
              </div>
              <div class="col-sm-9">
                    <input type="text" class="form-control" title="name must be entered" id="name_sales" name="name_sales" placeholder="Nama sales" required>
              </div>
          </div>
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm-4 control-label">Area</label>
            </div>
          
              <div class="col-sm-9">
                    <input type="text" class="form-control" id="area" name="area" required>
              </div>
          </diV>
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Address</label>
              </div>
            
                <div class="col-sm-9">
		            	<textarea type="textarea" id="address_a" name="address_a" class="form-control"></textarea>
                </div>
            </div>

          <div class="row" style="margin-top: 4px;">
            <div class="form-group col-sm-2">
                  <label style="margin-left: 15px;" class="col-sm control-label">Contact Person</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="cp_sales" name="cp_sales" placeholder="Contact Person"></input>
              </div>
          </diV>

          <div class="row" style="margin-top: 4px;">
              <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Email</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email_sales" name="email_sales" placeholder="Email"></input>
              </div>
          </diV>
          <div class="row" style="margin-top: 4px;">
              <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Telephone</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="telephone_sales" name="telephone_sales" placeholder="Telephone"></input>
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
          width: 140px;
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
      $("form[id='sales']").validate({ // initialize the plugin
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
