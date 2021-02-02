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

<!--code function-->
<?php
    $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM bast");
    $data = mysqli_fetch_array($query);
    $codeBA = $data['maxCode'];
    $list = (int) substr($codeBA, 4, 4);
    $list++;
    $code = "CEL";
    $month = date('F');
    $year = date('Y');
    $codeBA = sprintf("%05s", $list)."/".$code."/".$month."/".$year;

  ?>

  

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>BAST</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="add_bast.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
    <div class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="form-group col-sm-2">
            <label class="control-label">BA Number</label>
        </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="banum" name="banum" value="<?=$codeBA?>" readonly>
            <label class="col-sm control-label" id='no_ba'>Surat Jalan Num.</label>
            <select name="code_sj" id="code_sj" onchange="autofill_data()" class="form-control pos" required>
              <option value="">--select--</option>
              <?php
                $sql = "SELECT * FROM surat_jalan";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                      echo "
                <option value=".$row['code'].">".$row['code']."</option>";
                }
              ?>
            </select>
          </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Customer</label>
        </div>
          <div class="col-sm-9">
                <input type="text" class="form-control" id="shipper" name="shipper" placeholder="Shipper">
                <label class="col-sm control-label brg">Container Number</label>
                <input type="text" class="form-control" id="container" name="container" placeholder="Container Number">
          </div>
      </div>
    </div>  
<div class="container">
      <div class="row">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Seal Number</label>
        </div>
          <div class="col-sm-9">
                <input type="text" class="form-control" id="seal" name="seal" placeholder="Seal Number">
                <label class="col-sm control-label brg">Delivery Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Delivery Address">
          </div>
      </div> 
</div> 

<div class="container">
      <div class="row">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Consignee</label>
        </div>
          <div class="col-sm-9">
                <input type="text" class="form-control" id="receipent" name="receipent" placeholder="consignee">
          </div>
      </div>
</div>

    </div>
  </div>
</div>


	  
<div class="post clearfix">
    <div class="container">
      <div class="form-group">
        <table class="table">
          <thead class='bg-info'>
          <tr>
            <th ><label class="control-label">Goods</label></th>
            <th ><label class="control-label">Quantity</label></th>
            <th><label class="control-label">Unit</label></th>
          </tr>
          </thead>

          <tbody id="data">
          </tbody>
        </table>

          
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
        select#agent, select#destination_port, select#origin_port, select#route, select#no_truck, select#tracking_n{
          width: 177px;
        }

        span.select2{
        width: 177px;
        margin-bottom: -4px; 
        margin-left: 52px; 
        }
        .row{
          margin-top: 4px;
        }
        .col-sm-2{
          width: 145px;
        }
        .col-sm{
          margin-left: 20px;
        }
        .brg{
          margin-right: 45px;
        }
        input#quantity{
          margin-left: 15px;
        }
        #sj{
          margin-left: 47px;
        }
        #address{
          margin-left: 11px;
        }
        #unit{
          margin-left: -3px;
        }
        #qty{
          margin-right: 55px;
        }
        #goods{
          width: 176px;
        }
        #quantity{
          width: 50px;
        }
      th{
        justify-content: center;
        width: 100px;
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
    var code = $('select#code_sj').val();
    $.ajax({
      url: "data/sj_data.php",
      data: "code=" + code,
    }).done(function(data) {
      var json = data;
      obj = JSON.parse(json);
      $('#container').val(obj.container_num);
      $('#shipper').val(obj.customer);
      $('#receipent').val(obj.consignee);
      $('#seal').val(obj.seal);
      $('#address').val(obj.addres_cnse);
    });

  }

  $(document).on('change', function(){
    var code = $('select#code_sj').val();
    if(code != ''){
      $.ajax({
        url: "data/goods_data.php",
        data: "sj=" + code,
      }).done(function(data) {
        var json = data;
        hsl = JSON.parse(json);
        for (var i = 0; i < hsl.length; ++i) {
        $("#data").prepend(
          '<tr id="value"><td align="left">'+ hsl[i].nama_barang +'</td>'+
          '<td align="left">' + hsl[i].quantity + '</td>' +
          '<td align="left">' + hsl[i].unit + '</td></tr>');
        }
    });  
    }else{
    $('tr#value').detach();
    }
  });



  $(document).ready(function(){
      $('select#code_sj').on('change', function(){
      if( $('select#code_sj').val() !== ''){
        $('#container').prop('readonly', true);
        $('#shipper').prop('readonly', true);
        $('#receipent').prop('readonly', true);
        $('#seal').prop('readonly', true);
        $('#address').prop('readonly', true);
        $('#sj').prop('readonly', true);
      }
    });
  });

  $(document).ready(function(){
      $('select#code_sj').on('change', function(){
      if( $('select#code_sj').val() == ''){
        $('#container').removeAttr('readonly');
        $('#container').val('');
        $('#shipper').removeAttr('readonly');
        $('#shipper').val('');
        $('#receipent').removeAttr('readonly');
        $('#receipent').val('');
        $('#seal').removeAttr('readonly');
        $('#seal').val('');
        $('#address').removeAttr('readonly');
        $('#address').val('');
        $('#sj').removeAttr('readonly');
        $('#sj').val('');
      }
    });
  });
</script>
</body>
</html>
