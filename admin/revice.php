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
        Job Order
      </h1>

		
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Job Order</li>
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

<?php
      $id = $_GET['id'];
      $status = '2';
      $query = mysqli_query($conn, "UPDATE inquiry_container SET `status`='$status' where id = '$id'");


      //mengambil data
      $query = mysqli_query($conn, "SELECT *, inquiry_container.id as iq  FROM inquiry_container
      INNER JOIN
       sales ON inquiry_container.sales_code = sales.code
       INNER JOIN
       customer ON inquiry_container.customer = customer.code where inquiry_container.id='$id'");
      $row = $query->fetch_assoc();
      
    
  echo "

      
<div class='row'>
  <div class='col-xs-12'>
    <div class='box'>
      <div class='box-header with-border'>
        <h3>Revice Inqury Container</h3>
      </div>
              <!--/.span3-->
  <form class='form-inline' method='post' action='revice_inqury_container.php'>

  <div class='post clearfix'>
    <div class='container'>
      <div class='container'>  
        <div class='row' style='margin-top: 20px;'>
          <div class='form-group col-sm-2'>
              <label class='col-sm control-label'>Order Date</label>
          </div>
            <div class='col-sm-9'>
              <input type='hidden' value='".$row['iq']."' name='id'>
              <input type='date' class='form-control' id='orderdate'  name='orderdate' value='".$row['order_date']."' required>
            </div>
        </div>
        <div class='row' style='margin-top: 4px;'>
          <div class='form-group col-sm-2'>
              <label class='col-sm control-label'>Sales name</label>
          </div>
            <div class='col-sm-9'>
              <input type='text' class='form-control' style='width: 100px' id='code_sales' name='code_sales' placeholder='code' value='".$row['sales_code']."' required>
              <input type='text' class='form-control' style='width: 370px;' id='name_sales' name='name_sales' value='".$row['name']."'> 
            </div>
        </div>
      </div>

        <hr> 
          <div class='container'>
            <div class='row'>
                <div class='form-group col-sm-2'>
                    <label class='col-sm control-label'>Load Date</label>
                </div>
                <div class='col-sm-9'>
                      <input type='date' class='form-control' id='loaddate' name='loaddate' value='".$row['load_date']."' required>
                </div>
            </div>
          </div>

          <div class='container'>
            <div class='row' style='margin-top: 4px;'>
              <div class='form-group col-sm-2'>
                  <label class='col-sm control-label'>Customer</label>
              </div>
              <div class='col-sm-9'>
                  <input type='text' class='form-control' id='customer' name='customer' value='".$row['customer']."' required>
                  <label style='margin-right: 20px; margin-left: 30px;' class='col control-label'>Purchased</label>
                  <input type='text' class='form-control' id='purchased' name='purchased' placeholder='Purchased' value='".$row['purchased']."' required>
                  <label style='margin-right: 20px; margin-left: 30px;' class='col control-label' >Address</label>
                  <input type='text' class='form-control' id='address' name='address' placeholder='Address' value='".$row['Address']."' required>
              </div>
            </div>
          </div>

          <div class='container'>
                <div class='row' style='margin-top: 4px;'>
                    <div class='form-group col-sm-2'>
                        <label for='inputPassword4' class='col-sm control-label'>PPN</label>
                    </div>
                    <div class='col-9'>
                      <div class='col-sm-1'>
                        <input type='checkbox' name='ppn' id='ppn' value='include' required>
                        <label >Include</label>
                      </div>
                    </div>
                    <div class='col-sm-1'>
                        <input type='checkbox' name='ppn' id='ppn' value='exclude' required>
                        <label >Exclude</label>
                    </div>
                </div>
              </div>

              <div class='container'>
                <div class='row' style='margin-top: 4px;'>
                    <div class='form-group col-sm-2'>
                        <label for='inputPassword4' class='col-sm control-label' >Insurance</label>
                    </div>
                    <div class='col-9'>
                      <div class='col-sm-1'>
                        <input type='checkbox' name='insurance' id='insurance' value='include' required>
                        <label >Include</label>
                      </div>
                    </div>
                    <div class='col-sm-1'>
                        <input type='checkbox' name='insurance' id='insurance' value='exclude' required>
                        <label >Exclude</label>
                    </div>
                </div>
              </div>

              <div class='container'>
                <div class='row' style='margin-top: 4px;'>
                    <div class='form-group col-sm-2'>
                        <label for='inputPassword4' class='col-sm control-label' >PPFTZ03</label>
                    </div>
                    <div class='col-9'>
                      <div class='col-sm-1'>
                        <input type='checkbox' name='ppftz03' id='ppftz03' value='include' required>
                        <label >Include</label>
                      </div>
                    </div>
                    <div class='col-sm-1'>
                        <input type='checkbox' name='ppftz03' id='ppftz03' value='exclude' required>
                        <label  >Exclude</label>
                    </div>
                </div>
              </div> 
        <hr>
        <div class='container'>
            <div class='row'  style='margin-top: 4px;'>
                  <div class='form-group col-sm-2' >
                  <label for='service_type'  class='col-sm control-label'>Service Type</label>
                  </div>
                    <div class='col-sm-9'>
                      <select name='service_type'  id='service_type' value='".$row['service']."' class='form-control' required>
                        <option disabled>Service type</option>
                        <option value='Door to Door'>Door to Door</option>
                        <option value='Door to Port'>Door to Port</option>
                        <option value='Door to CY'>Door to CY</option>
                        <option value='Port to Door'>Port to Door</option>
                        <option value='Port to Port'>Port to Port</option>
                        <option value='Port to CY'>Port to CY</option>
                      </select>
                  </div>
                </div>
          </div>
          <div class='container'>
            <div class='row'>
              <div class='form-group col-sm-2' >
              <label for='shippingn' class='col-sm control-label'>Shipping Name</label>
              </div>
                <div class='col-sm-9' style='margin-top: 4px;'>
                <select  class='form-control' name='shippingn' id='shippingn' value='".$row['shipping_name']."' required>
                            <option value=''>-- Select --</option>
                            <option value='PT. Samudera Indonesia'>PT. Samudera Indonesia</option>
                            <option value='PT. Meratus Line'>PT. Meratus Line</option>  
                            <option value='PT. Spil Surabaya'>PT. Spil Surabaya</option>
                            <option value='PT.Tanto Intim Line'>PT. Tanto Intim Line</option>
                            <option value='PT. Korin Global Mandiri'>PT. Korin Global Mandiri</option>
                            <option value='PT.Jasindo Duta Segara'>PT. Jasindo Duta Segara</option> 
                            <option value='PT.Buana Lintas Lautan'>PT. Buana Lintas Lautan</option>
                            <option value='PT. Bahana Line'>PT. Bahana Line</option>
                            <option value='PT.Limin Marine & OffShore'>PT. Limin Marine & OffShore</option>
                            <option value='PT Baruna Raya Logistic'>PT Baruna Raya Logistic</option>
                            <option value='PT. Berlian Laju Tanker'>PT. Berlian Laju Tanker</option>
                            <option value='Equinox Bahari Utama'>Equinox Bahari Utama</option>
                            <option value='Arpeni Pratama Line'>Arpeni Pratama Line</option> 
                            <option value='Bisco Management Indonesia'>Bisco Management Indonesia</option> 
                            <option value='ABM & Circle Navigation'>ABM & Circle Navigation</option> 
                            <option value='Amas Indonesia'>Amas Indonesia</option> 
                            <option value='Maersk Line Indonesia'>Maersk Line Indonesia</option> 
                            <option value='EVERGREEN Shipping Indonesia'>EVERGREEN Shipping Indonesia</option> 
                            <option value='PT. Pelni'>PT. Pelni</option> 
                          </select>
                          ";?>
                      <label  class='col-sm control-label' style='margin-right: 20px; margin-left: 30px;' id='labelv' for='vesseln'>Vessel Name</label>
                        <select name='vessel_n' id='vessel_n' class='form-control' value=".$row['vessel_name']." required>
                              <option value=''>--select--</option>
                          <?php
                             
                              $sql = "SELECT * FROM vessel_name";
                              $query = $conn->query($sql);
                              while($row = $query->fetch_assoc()){
                                    echo "
                               <option value=".$row['id'].">".$row['vessel_n']."</option>";
                              }
                           ?>
                        </select>
                  

                       <?php 
                       $query = mysqli_query($conn, "SELECT * FROM inquiry_container
                        INNER JOIN
                         sales ON inquiry_container.sales_code = sales.code
                         INNER JOIN
                         customer ON inquiry_container.customer = customer.code where inquiry_container.id='$id'");
                        $row = $query->fetch_assoc(); 
                        echo "
                      <label  class='col-sm control-label' style='margin-right: 20px; margin-left: 30px;' for=''>Voy</label>
                      <input class='form-control' type='text' id='Voy' name='voy' value='".$row['voy']."' required>
              </div>
            </div>
         
        <hr>


        <div class='container' id='jo'>
            <div class='row' style='margin-top: 4px;'>
              <div class='form-group col-sm-2'>
                <label class='col control-label'>Type J.O</label>
              </div>
              <div class='col-sm-9'>
                 <select name='type_JO'  id='type_JO' class='form-control' value='".$row['type_jo']."' required>
                    <option value='Domestic'>Domestic</option>
                    <option value='International'>International</option>
                  </select>
                
                  <label style='margin-right: 13px; margin-left: 30px;' class='col control-label' >Type</label>
                  <select name='type'  id='type' class='form-control' value='".$row['type']."' required>
                    <option value='Bongkar'>Bongkar</option>
                    <option value='Muat'>Muat</option>
                  </select>
              </div>
            </div>
          </div>


          
          <div class='container' id='et'>
            <div class='row' style='margin-top: 4px;'>
                <div class='form-group col-sm-2'>
                    <label class='control-label'>ETD</label>
                </div>
                <div class='col-sm-9'>
                
                      <input type='date' class='form-control' id='etd' name='etd' value='".$row['etd']."' required>
                      <label class='control-label' style='margin-right: 20px; margin-left: 30px;' >ETA</label>
                      <input type='date' class='form-control' id='eta' name='eta' value='".$row['eta']."' required>
                        
  ";
   ?>
                </div>
            </div>
          </div>

      </div>
    </div>
</div>
	  
	  <div class='row'>
		  <div style='margin-bottom: 20px; margin-left: 30px' class='col-sm-12'>
		  <div style='margin-bottom: 20px; margin-left: 30px' class='col-sm-12'>
			  <button type='submit' class='btn btn-primary' name='save'>Save</button>
		  </div>	  
	  </div>
</form>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>

<style>
      @media screen and (min-width:1000px){
        .col-sm-2{
          width: 135px;
        }
        input#c20, input#c21, input#c40, input#c41{
          width: 50px;
          margin-left: 30px;
        }
        input#c40hc{
          width: 50px;
          margin-left: 12px;
        }
        select#type_JO, input[type="text"]{
          width: 176px;
        }
        input#eta, input#etd, input#orderdate, input#loaddate{
          width: 176px;
        }
        .container#ro,.container#jo,.container#et{
          margin-left:-16px;
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
        input#c20, input#c21, input#c40, input#c41{
          width: 50px;
          margin-left: 30px;
        }
        input#c40hc{
          width: 50px;
          margin-left: 17px;
        }
      }
    
    </style>


<?php include 'includes/scripts.php'; ?>
<script>
$(function() {
  $('input#ppn').change(function() {
    var val = $(this).val();
    if (val == "include") {

      $("input[value='exclude']#ppn").val('exclude').prop("disabled", $(this).is(":checked"));

    } else if (val == "exclude") {

      $("input[value='include']#ppn").prop("disabled", $(this).is(":checked"));

    }
 });
});

$(function() {
  $('input#insurance').change(function() {
    var val = $(this).val();
    if (val == "include") {

      $("input[value='exclude']#insurance").val('exclude').prop("disabled", $(this).is(":checked"));

    } else if (val == "exclude") {

      $("input[value='include']#insurance").prop("disabled", $(this).is(":checked"));

    }
 });
});

$(function() {
  $('input#ppftz03').change(function() {
    var val = $(this).val();
    if (val == "include") {

      $("input[value='exclude']#ppftz03").val('exclude').prop("disabled", $(this).is(":checked"));

    } else if (val == "exclude") {

      $("input[value='include']#ppftz03").prop("disabled", $(this).is(":checked"));

    }
 });
});




</script>
</body>
</html>
