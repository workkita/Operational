<?php include '../../session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <?php include 'conn.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Master Voyage
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Input Data Master Voyage</li>
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
        $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM voyage");
        $data = mysqli_fetch_array($query);
        $voyageCode = $data['maxCode'];
        
        $list = (int) substr($voyageCode, 3, 3);
        
        $list++;

        $code = "SHIP";
        $voyageCode = $code . sprintf("%03s", $list);

        ?>
   
   
      <!-- end funtion code -->




      <div class="row" style="margin-top: 50px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
	            <h3>Add New Voyage</h3>
            </div>
            <div class="box-body">
              <form class="form-inline" method="POST" action="add_voyage.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
   <div class="container" style="margin-top: -25px;">    


            <div class="container">
              <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Code</label>
                    </div>
                            
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="code" name="code"  value="<?php echo $voyageCode ?>" readonly>
                    </div>
                  </div>  
                </div>  


              <div class="container" style="margin-top: 4px;">
                <div class="row">
                  <div class="form-group col-sm-2">
                      <label class="col-sm control-label">Shipping Name</label>
                  </div>
                
                    <div class="col-sm-9">
                          <select  class="form-control" name="voyagename" id="voyagename">
                            <option value="">-- Select --</option>
                            <option value="PT. Samudera Indonesia">PT. Samudera Indonesia</option>
                            <option value="PT. Meratus Line">PT. Meratus Line</option>  
                            <option value="PT. Spil Surabaya">PT. Spil Surabaya</option>
                            <option value="PT.Tanto Intim Line">PT. Tanto Intim Line</option>
                            <option value="PT. Korin Global Mandiri">PT. Korin Global Mandiri</option>
                            <option value="PT.Jasindo Duta Segara">PT. Jasindo Duta Segara</option> 
                            <option value="PT.Buana Lintas Lautan">PT. Buana Lintas Lautan</option>
                            <option value="PT. Bahana Line">PT. Bahana Line</option>
                            <option value="PT.Limin Marine & OffShore">PT. Limin Marine & OffShore</option>
                            <option value="PT Baruna Raya Logistic">PT Baruna Raya Logistic</option>
                            <option value="PT. Berlian Laju Tanker">PT. Berlian Laju Tanker</option>
                            <option value="Equinox Bahari Utama">Equinox Bahari Utama</option>
                            <option value="Arpeni Pratama Line">Arpeni Pratama Line</option> 
                            <option value="Bisco Management Indonesia">Bisco Management Indonesia</option> 
                            <option value="ABM & Circle Navigation">ABM & Circle Navigation</option> 
                            <option value="Amas Indonesia">Amas Indonesia</option> 
                            <option value="Maersk Line Indonesia">Maersk Line Indonesia</option> 
                            <option value="EVERGREEN Shipping Indonesia">EVERGREEN Shipping Indonesia</option> 
                            <option value="PT. Pelni">PT. Pelni</option> 
                          </select>
                    </div>
                </div>
              </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Marketing Name</label>
                    </div>
                  
                      <div class="col-sm-9">
                          <input  class="form-control" type="text" title="mohon diisi nama marketing" id="marketing_name" name="marketing_name" placeholder="Marketing Name">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Area</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input  class="form-control" type="text" class="form-control" id="area_voyage" name="area_voyage" placeholder="Area">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Email</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="email_voyage" name="email_voyage" placeholder="Email">
                      </div>
                  </div>
                </div>

                <div class="container" style="margin-top: 4px;">
                  <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="col-sm control-label">Phone Number</label>
                    </div>
                  
                      <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone_voyage" name="phone_voyage" placeholder="Phone Number">
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
        .col-sm-2{
          width: 150px;
        }
        .alert{
          margin-bottom: -50px;
          margin-top: 60px;
        }
        label{
          margin-left: 14px;
        }
        select#voyagename{
          width: 178px;
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
        option{
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
      <script>
       $( function() {
          $(document).tooltip();
        } );
      </script>
</body>
</html>
