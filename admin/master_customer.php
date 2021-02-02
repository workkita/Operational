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
        Input Data Master Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><em class="fa fa-dashboard"></em> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Customer</li>
      </ol>
    </section>
    <?php include 'includes/dropdown_menu_input.php'; ?>   
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' style='margin-top: 60px; margin-bottom: -50px;'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible' style='margin-top: 60px; margin-bottom: -50px;'>
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
        $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM customer");
        $data = mysqli_fetch_array($query);
        $customerCode = $data['maxCode'];
        
        $list = (int) substr($customerCode, 3, 3);
        
        $list++;

        $code = "CSR";
        $customerCode = $code . sprintf("%03s", $list);

        ?>
   
   
      <!-- end funtion code -->

<div class="row" style="margin-top: 50px;">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3>Add New Customer</h3>
      </div>
      <div class="box-body">
        <form class="form-inline" method="POST" action="add_customer.php">
	
        <div class="post clearfix">
        <div id="tab-content1" class="content">
              
        <div class="container" style="margin-top: -20px;">     
              <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Code</label>
                  </div>
                
                    <div class="col-sm-9">
                          <input type="text" class="form-control" id="code" name="code" placeholder="Customer Name" value="<?php echo $customerCode ?>" readonly>
                    </div>
                </div>
              </div>

              <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Customer</label>
                  </div>
                
                    <div class="col-sm-9">
                          <input type="text" class="form-control" id="costumer_n" name="costumer_n" placeholder="Customer Name">
                    </div>
                </div>
              </div>

              <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Street</label>
                  </div>
                
                  <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                        </div>
                        <div class="col-md-1">
                          <label class="col control-label">Office</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control" id="office" name="office" placeholder="Office Number">
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Country</label>
                  </div>
                
                    <div class="col-sm-10">
                      <div class="row">
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                          </div>
                          <div class="col-md-1">
                            <label class="col control-label">Region</label>
                          </div>
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="region" name="region" placeholder="Region">
                          </div>
                      </div>
                    </div>
                </div>
              </div>

               

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">PO BOX</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="po_box" name="po_box" placeholder="PO BOX">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Language</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="language" name="language" placeholder="Language">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Telephone</label>
                  </div>
                
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
                        </div>
                        <div class="col-md-1">
                          <label class="col control-label">Ext</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control" id="ext_t" name="ext_t" placeholder="Ext">
                        </div>
                      </div>
                    </div>
                </div>
              </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Phone Number</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_n_c" name="phone_n_c" placeholder="Phone Number">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Fax</label>
                  </div>
                
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="fax_c" name="fax_c" placeholder="Fax">
                        </div>
                        <div class="col-md-1">
                          <label class="col control-label">Ext</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control" id="ext_f" name="ext_f" placeholder="Ext">
                        </div>
                      </div>
                    </div>
                </div>
              </div>
                
                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Email</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="email_c" name="email_c" placeholder="Email">
                      </div>
                  </div>
                </div>
          <hr >
          <h3 style="margin-top: -20px;">Contact Operation</h3>
          <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Name Operation</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_o" name="name_o" placeholder="Name Operation">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Phone Number</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_n_o" name="phone_n_o" placeholder="Phone Number">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Telephone</label>
                  </div>
                
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="telephone_o" name="telephone_o" placeholder="Telephone">
                        </div>
                        <div class="col-md-1">
                          <label class="col control-label">Ext</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control" id="ext_t_o" name="ext_t_o" placeholder="Ext">
                        </div>
                      </div>
                    </div>
                </div>
              </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Email</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="email_o" name="email_o" placeholder="Email">
                      </div>
                  </div>
                </div>
        <hr >
          <h3 style="margin-top: -20px;">Contact Marketing</h3>
          <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Marketing Name </label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_m" name="name_m" placeholder="Marketing Name ">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Phone Number</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_n_m" name="phone_n_m" placeholder="Phone Number">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Telephone</label>
                  </div>
                
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="telephone_m" name="telephone_m" placeholder="Telephone">
                        </div>
                        <div class="col-md-1">
                          <label class="col control-label">Ext</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" class="form-control" id="ext_m" name="ext_m" placeholder="Ext">
                        </div>
                      </div>
                    </div>
                </div>
              </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Email</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="email_m" name="email_m" placeholder="Email">
                      </div>
                  </div>
                </div>


      </div>


	  </div>
	
	  </div>
	  
	  <div class="row">
		  <div class="col-sm-12">
			  <button type="submit" class="btn btn-primary" name="save">Save</button>
        </form>
		  </div>
	  </div>
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
        input#ext_t, input#ext_f, input#ext_t_o, input#ext_t_o, input#ext_m{
          width: 60px;
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
