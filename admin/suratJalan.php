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
      Create Surat Jalan
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
    $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM surat_jalan");
    $data = mysqli_fetch_array($query);
    $codeSJ = $data['maxCode'];
    $list = (int) substr($codeSJ, 4, 4);
    $list++;
    $code = "CEL";
    $surat = "SJ";
    $month = date('F');
    $year = date('Y');
    $codeSJ = sprintf("%05s", $list)."/".$surat."/".$month."/".$year;

  ?>

  

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Create Surat Jalan</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="add_sj.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
    <div class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">SJ Number</label>
        </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="sj" name="sj" value="<?=$codeSJ?>" readonly>
            <label class="col-sm control-label" id='no_ba'>Joborder Num.</label>
            <select name="code_jo" id="code_jo" onchange="autofill_data()" class="form-control pos" required>
              <option value="">--select--</option>
              <?php
                $sql = "SELECT * FROM delivery";
                $query = $conn->query($sql);
                while($row = $query->fetch_assoc()){
                      echo "
                <option value=".$row['code_jo'].">".$row['code_jo']."</option>";
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
            <label class="col-sm control-label">Consignee</label>
        </div>
          <div class="col-sm-9">
                <input type="text" class="form-control" id="receipent" name="receipent" placeholder="consignee">
                <label class="col-sm control-label brg">Delivery Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Delivery Address">
          </div>
      </div>
</div>

    </div>
  </div>
</div>


	  
<div class="post clearfix">
  <div class="form-row">
    <div class="container">
        <table>
          <thead class='bg-info'>
          <tr>
            <th> <label class="col-sm control-label">Goods</label></th>
            <th><label class="control-label col-sm" id='qty'>Quantity</label></th>
            <th><label class="control-label col-sm">Unit</label></th>
          </tr>
          </thead>

          <tbody>
          <tr>
            <td>
            <div class="col-sm-9">
                <select name="goods[]" id="goods" class="form-control" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM barang";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo "
                    <option value=".$row['name'].">".$row['name']."</option>";
                    }
                  ?>
                </select>
            </td>
            <td><input type="text" id="quantity" name="quantity[]" class="form-control"></td>
            <td>
              <select name="unit[]" id="unit" class="form-control" required>
                  <option value="">--select--</option>
                    <?php
                      $sql = "SELECT * FROM barang";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                            echo "
                      <option value=".$row['unit'].">".$row['unit']."</option>";
                      }
                  ?>
                </select>
            </td>
          </tr>
          </tbody>
        </table>
          <div id="Tdata"></div>

          <button  class='btn btn-sm btn-success'  type="button" style=' margin-left: 16px ; margin-top: 4px;' onclick="tambah(); return false;"><i class="fa fa-plus"></i></button>
         <button class='btn btn-sm btn-danger' style='margin-top: 4px;' onclick='hapusElemen()'><i class="fa fa-close"></i></button>
          
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
       
        span.select2{
        width: 177px;
        margin-bottom: -4px; 
        margin-left: 67px; 
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


    function tambah(){
    $('#Tdata').append( `<tr id ="hps" style="margin-top: -10px; margin-bottom: -40px;" >
    <td>
            <div class="col-sm-9">
                <select name="goods[]" style=" margin-top : 4px;"  id="goods" class="form-control" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM barang";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo "
                    <option value=".$row['name'].">".$row['name']."</option>";
                    }
                  ?>
                </select>
            </td>
            <td><input type="text" id="quantity" name="quantity[]" style=" width: 50px; margin-right: 65px; margin-top : -27px;" class="form-control"></td>
            <td>
              <select name="unit[]" id="unit" class="form-control" style="margin-top : -27px;" required>
                  <option value="">--select--</option>
                    <?php
                      $sql = "SELECT * FROM barang";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                            echo "
                      <option value=".$row['unit'].">".$row['unit']."</option>";
                      }
                  ?>
                </select>
            </td>
            
            </tr> `).children(':last');
    }

    function hapusElemen() {
        $('#hps').remove();
      }

  

  
  function autofill_data() {
    var code = $('select#code_jo').val();
    $.ajax({
      url: "data/surat_jalan_data.php",
      data: "code_jo=" + code,
    }).done(function(data) {
      var json = data;
      obj = JSON.parse(json);
      $('#container').val(obj.container_num);
      $('#shipper').val(obj.customer);
      $('#receipent').val(obj.consignee);
      $('#address').val(obj.addres_cnse);
    });

  }


  $(document).ready(function(){
      $('select#code_jo').on('change', function(){
      if( $('select#code_jo').val() !== ''){
        $('#container').prop('readonly', true);
        $('#shipper').prop('readonly', true);
        $('#receipent').prop('readonly', true);
        $('#address').prop('readonly', true);
      }
    });
  });

  $(document).ready(function(){
      $('select#code_jo').on('change', function(){
      if( $('select#code_jo').val() == ''){
        $('#container').removeAttr('readonly');
        $('#container').val('');
        $('#shipper').removeAttr('readonly');
        $('#shipper').val('');
        $('#receipent').removeAttr('readonly');
        $('#receipent').val('');
        $('#address').removeAttr('readonly');
        $('#address').val('');
      }
    });
  });
</script>
</body>
</html>
