<?php include '../../session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
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
        Schedule Kapal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Schedule Kapal</li>
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
	



  <div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3>Vessel Schedule</h3>
         <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> import Data</a>
      
      <!-- modal box -->
      <div class="modal fade" id='addnew' tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
        <div class="modal-dialog" style="background: #021e4f">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <form action="upload_scheduleShip.php" enctype="multipart/form-data" method="post">
                  <h4 class="modal-title">Upload Data Schedule Ship</h4>
                </div>
                <div class="modal-body">
                  <input required type="file" id="schedule" name="schedule" accept=".xls,.xlsx">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
                  <button class='btn btn-primary btn-sm' type="submit" id='save' name='save' value='save'>Yes</button>

              </form>
                </div>
                </div>
            </div>
          </div>
        </div>
      




      <div class="box-body">
  <form class="form-inline" method="post" action="add_schedship.php">
	
  <div class="post clearfix">
 	<div id="tab-content1" class="content">
    <div class="container" id="cont">
        <div class="container">
          <div class="row" style="margin-top: 20px;">
            <div class="form-group col-sm-2">
                <label class="col-sm control-label">Input Date</label>
            </div>
              <div class="col-sm-9">
                    <input required type="date" class="form-control" id="input_date" name="input_date">
              </div>
          </div>
        </div>

          <div class="container">
            <div class="row">
              <div class="form-group col-sm-2">
                  <label class="col-sm control-label">Origin Port</label>
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <select required name="from_port" id="from_port" name="from_port" class="form-control">
                        <?php
                          $sql = "SELECT * FROM port";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                                echo "
                         <option value=".$row["port_name"].">".$row["port_name"]."</option>";}
                        ?>
                    </select>
                  </div>
                  <div class="col-sm-9">
                    <label class="col control-label" id="port">Destination Port</label>
                    <select required name="to_port" id="to_port" name="to_port" class="form-control">
                      <?php
                        $sql = "SELECT * FROM port";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                              echo "
                        <option value=".$row["port_name"].">".$row["port_name"]."</option>";}
                      ?>
                   </select>
                    <label class="col control-label" >Address</label>
                    <input required type="text" class="form-control" id="address" name="address" placeholder="Address">
                  </div>
                </div>
              </div>
            </div>
          </div>
            
            <div class="container">
              <div class="row">
                <div class="form-group col-sm-2">
                    <label class="col-sm control-label">Shipping</label>
                </div>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-3">
                       <select required class="form-control" name="shipping" id="shipping">
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
                    <div class="col-sm-9">
                      <label class="col control-label" id="vessel">Vess.Name</label>
                        <select required name="vessel_n" id="vessel_n" class="form-control">
                          <?php
                            $sql = "SELECT * FROM vessel_name";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                  echo "
                          <option value=".$row["vessel_n"].">".$row["vessel_n"]."</option>";}
                          ?>
                        </select>
                      <label class="col control-label" >Voy</label>
                      <input required type="text" class="form-control" id="voy" name="voy" placeholder="Voy">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="form-group col-sm-2">
                    <label class="col-sm control-label">Ex. ETD jakarta</label>
                </div>
                <div class="col-sm-9">
                    <input required type="date" class="form-control" id="xtd_j" name="xtd_j" placeholder="Ex. ETD jakarta">
                    <label class="col control-label" id="ex_td_j">Ex. TD jakarta</label>
                    <input required type="date" class="form-control" id="td_j" name="td_j" placeholder="Ex. TD jakarta">
                </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="form-group col-sm-2">
                    <label class="col-sm control-label">Closing Date</label>
                </div>
                <div class="col-sm-9">
                    <input required type="date" class="form-control" id="closing_d" name="closing_d" placeholder="Closing Date">
                    <label class="col control-label" id="closing">Closing Time</label>
                    <input required type="time" class="form-control" id="clt" name="clt" placeholder="Closing Time">
                </div>
              </div>
            </div>

          <div class="container">
            <div class="row">
              <div class="form-group col-sm-2">
                  <label class="col-sm control-label">ETD Jakarta</label>
              </div>
              <div class="col-sm-9">
                  <input required type="date" class="form-control" id="etd_j" name="etd_j" placeholder="ETD Jakarta">
                  <label class="col control-label" id="eta">ETA Dest.</label>
                  <input required type="date" class="form-control" id="eta" name="eta" placeholder="ETA Dest.">
              </div>
            </div>
          </div>

        <hr> 
       
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
      @media screen and (min-width:1204px){
        .container#cont{
          margin-top: -25px;
        }
        select#shipping, select#vessel_n{
          width: 176px;
        }
        select#vessel_n{
          margin-left: 73px;
          margin-right: 25px;
        }
        .container, .row#con{
          margin-top: 4px;
        }
        input#input_date, select#from_port, select#to_port{
          width: 176px;
        }
        .col-sm-2{
          width: 150px;
        }
         input#closing_d, input#xtd_j, input#td_j, input#etd_j, input#eta{
          width: 177px;
        }
        select#to_port{
          margin-left: 40px; 
          margin-right: 25px; 
        }
        input#vessel_n{
          margin-left: 72px; 
          margin-right: 25px; 
        }
        input#voy{
          margin-left: 67px; 
        }
        input#address{
          margin-left: 39px;
        }
        input#td_j{
          margin-left: 56px;
        }
        input#clt{
          margin-left: 56px;
        }
        input#eta{
          margin-left: 55px;
        }
        label#ex_td_j{
          margin-left: 39px;
        }
        label#closing{
          margin-left: 39px;
          margin-right: 5px;
        }
        label#eta{
          margin-left: 40px;
          margin-right: 27px;
        }
        input#c20, input#c21, input#c40, input#c41{
          width: 50px;
          margin-left: 30px;
        }
        input#c40hc{
          width: 50px;
          margin-left: 12px;
        }

      }

      @media screen and (max-width:1204px){
        .container{
          margin-top: 4px;
        }
        .col-sm-2{
          margin-left: 20px;
          width: 120px;
        }
        select#from_port, select#to_port, input#address{
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
          margin-left: 12px;
        }
      }
    
    </style>

  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($ontime, $oquery->num_rows);

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";
    $lquery = $conn->query($sql);
    array_push($late, $lquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);

?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?> 
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'payroll.php?range='+range;
  });

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payroll_generate.php');
    $('#payForm').submit();
  });

  $('#payslip').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payslip_generate.php');
    $('#payForm').submit();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}


</script>
	
<script src="../../../SI-Karyawan-master/Include/bower_components/jquery/src/select2.min.js"></script>
<script>
$("#country").select2( {
 placeholder: "Select . .",
 allowClear: true
 } );
</script>
	
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
