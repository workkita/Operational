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

      <div class="row" style="margin-top: 50px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
	            <h3>Add New Agent Name</h3> 
            </div>
            <div class="box-body">
    <form class="form-inline"  method="POST" action="add_agent.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
			  
        <div class="container">
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm-4 control-label">Name</label>
              </div>
              <div class="col-sm-9">
                    <input type="text" class="form-control" id="name_agent" name="name_agent" placeholder="Nama Agent">
              </div>
          </div>
          <div class="row" style="margin-top: 4px;">
           <div class="form-group col-sm-2">
                <label class="col-sm-4 control-label">Area</label>
            </div>
          
              <div class="col-sm-9">
                    <input type="text" class="form-control" id="area" name="area">
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
                <input type="text" class="form-control" id="cp_agent" name="cp_agent" placeholder="Contact Person"></input>
              </div>
          </diV>

          <div class="row" style="margin-top: 4px;">
              <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Email</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email_agent" name="email_agent" placeholder="Email"></input>
              </div>
          </diV>
          <div class="row" style="margin-top: 4px;">
              <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Telephone</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="telephone_agent" name="telephone_agent" placeholder="Telephone"></input>
              </div>
          </diV>
          <div class="row" style="margin-top: 4px;">
              <div class="form-group col-sm-2">
                  <label class="col-sm-4 control-label">Fax</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="fax_agent" name="fax_agent" placeholder="Fax"></input>
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
</body>
</html>
