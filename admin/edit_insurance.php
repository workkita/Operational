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


<!-- data -->
<?php
  $id = $_GET['id'];
  //mengambil data
  
  $query = mysqli_query($conn, "SELECT insurance.code, insurance.rate, insurance.value, insurance.total, insurance.code_del, insurance.id, insurance.rate as rate, 
  insurance.value as val, insurance.td_j as td, port.port_name,
  inquiry_container.container, delivery.load_type, inquiry_container.customer, delivery.receipent, v.vessel_n as vn
  FROM insurance
  INNER JOIN delivery on delivery.code_jo = insurance.code_del 
  INNER JOIN inquiry_container ON delivery.id_inquiry_container = inquiry_container.id
  INNER JOIN port on delivery.destination_port = port.id
  INNER JOIN vessel_name v ON inquiry_container.vessel_name = v.id where insurance.id ='$id'");
  $data = $query->fetch_assoc()
  ?>
  

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Edit Insurance</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="update_insurance.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
 
	  
  <div class="post clearfix">
  <div class="form-row">

  <div class="container">
      <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Insurance Num.</label>
          </div>
          <div class="col-sm-9">
          <input type="hidden" name="id" value='<?= $data['id'] ?>'>
              <input type="text" class="form-control" id="ins_code" name="ins_code" value='<?= $data['code'] ?>' readonly>
              <label class="col-sm control-label" id='no_ba'>Joborder Num.</label>
            <input type="text" name="code_jo" id="code_jo"  value='<?= $data['code_del'] ?>' class="form-control pos" required readonly> </input>
                 
        </div>
      </div>
    </div>

  <div class="container">
      <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Nilai</label>
          </div>
          <div class="col-sm-9">
              <input type="text" class="form-control rp" id="nilai" name="nilai" value='<?= $data['value'] ?>' >
              <label class="col-sm control-label" id="tjo">Rate</label>
              <input type="text" class="form-control" id="percent" name="percent"  value='<?= $data['rate'] ?>'  placeholder="%">
              <input type="text" class="form-control rp" id="rate" name="rate" value='<?= $data['total'] ?>'>
                 
        </div>
      </div>
    </div>

        
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Destination Port</label>
        </div>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control" id="destination_p" value='<?= $data['port_name'] ?>'name="destination_p" placeholder="destination_p" >
          <label class="col-sm control-label">Container</label>
          <input type="text" readonly class="form-control" id="container" name="container" value='<?= $data['container'] ?>' placeholder="container">
        </div>
      </div>
    </div>
	  
 
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Customer</label>
        </div>
          <div class="col-sm-9">
                  <input type="text" readonly class="form-control" id="shipper" name="shipper" value='<?= $data['customer'] ?>' placeholder="shipper" >
          
                  <label class="control-label col-sm" id="vessel">Consignee</label>
                  <input type="text" readonly class="form-control" id="consignee" name="consignee" value='<?= $data['receipent'] ?>' placeholder="consignee" >

            </div>
          </div>
      </div>
    </div>  
  

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">TD Jakarta</label>
        </div>
          <div class="col-sm-9">
                  <input type="date" class="form-control" id="TD_Jakarta" name="TD_Jakarta" value='<?= $data['td'] ?>' placeholder="TD Jakarta" >
          
                  <label class="col-sm control-label" id="ship">Vessel Name</label>
                  <input type="text" readonly class="form-control" id="Ship" name="Ship" value='<?= $data['vn'] ?>' placeholder="Ship Name" >
  
            </div>
          </div>
      </div>
    
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Load Type</label>
        </div>
          <div class="col-sm-9">
                  <input type="text" readonly class="form-control" id="load_m"  value='<?= $data['load_type'] ?>' name="load_m" placeholder="Load" >
  
            </div>
          </div>
      </div>
    </div>  
		  
   
  </div>
</div>

</div>
	  
<div class="row">
            <div style="margin-bottom: 20px; margin-left: 30px" class="col-sm-12">
              <button type="submit" class="btn btn-primary" name="save" >Save</button>
            </div>	  
          </div>
      </form>
                </div>
        </div>
      </div>

      </section>

      <!-- right col -->
    </div>



    <style>
      @media screen and (min-width:1000px){
        select#agent, select#destination_port, input#TD_Jakarta, select#route, select#no_truck, select#tracking_n{
          width: 177px;
        }
        input#Ship{
            margin-left: -12px
        }
        input#percent{
          margin-right: -83px;
          margin-left: 78px; 
          width: 50px;
        }
        .col-sm-2{
          width: 160px;
        }
        .col-sm{
          margin-left: 20px;
        }
       input#container{
        margin-left: 45px;
      }
       input#consignee{
        margin-left: 42px;
      }
       input#code_jo{
        margin-left: 13px;
      }
       input#rate{
        margin-left: 79px;
      }
       label#ship{
        margin-right: 40px;
      }
       
       label#ro{
         margin-right: 21px;
       }
       label#ppf{
         margin-right: 25px;
       }
       label#type_bm{
         margin-right: 51px;
       }
      
      }

      @media screen and (max-width:1000px){
        .col-sm-2{
          width: 120px;
        }
        input#code_sales{
          width: 80px;
        }
        input#costumer, input#purchased, input#address{
          width: 80px;
        }
        input#purchased, input#address{
          margin-left: -10px;
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
  	<?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<script>
   $(document).ready(function() {
        $('.pos').select2({
          width: 'resolve'
        });
    });
  


    function autofill_data() {
    var code = $('select#code_jo').val();
    $.ajax({
      url: "data/jobOrder_data.php",
      data: "code_jo=" + code,
    }).done(function(data) {
      var json = data;
      obj = JSON.parse(json);
      $('#destination_p').val(obj.Destination_port);
      $('#container').val(obj.container);
      $('#shipper').val(obj.customer);
      $('#consignee').val(obj.consignee);
      $('#Ship').val(obj.vessel_name);
      $('#load_m').val(obj.load_type);
    });

  }


  $(document).ready(function(){
      $('select#code_jo').on('change', function(){
      if( $('select#code_jo').val() !== ''){
        $('#destination_p').prop('readonly', true);
        $('#container').prop('readonly', true);
        $('#shipper').prop('readonly', true);
        $('#consignee').prop('readonly', true);
        $('#Ship').prop('readonly', true);
        $('#load_m').prop('readonly', true);
      }
    });
  });

  $(document).ready(function(){
      $('select#code_jo').on('change', function(){
      if( $('select#code_jo').val() == ''){
        $('#destination_p').removeAttr('readonly');
        $('#destination_p').val('');
        $('#container').removeAttr('readonly');
        $('#container').val('');
        $('#shipper').removeAttr('readonly');
        $('#shipper').val('');
        $('#consignee').removeAttr('readonly');
        $('#consignee').val('');
        $('#Ship').removeAttr('readonly');
        $('#Ship').val('');
        $('#load_m').removeAttr('readonly');
        $('#load_m').val('');
      }
    });
  });


// percent total
  $(document).ready(function(){
    $('input#nilai, input#percent').on('keyup', function(){
        var nilai =  $('input#nilai').val();
        var percent =  $('input#percent').val();
        
        total = (nilai - ( nilai * percent / 100 )); 
        if(percent == ''){
          $('input#rate').val('');
          $('input#rate').prop('readonly', true);
        }else{
          $('input#rate').prop('readonly', true);
        $('input#rate').val('Rp. '+total);
        }
      

    });
  });

</script>
</body>
</html>

