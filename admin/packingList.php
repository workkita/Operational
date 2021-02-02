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



<!-- code -->
<?php
    $query = mysqli_query($conn, "SELECT max(code) as maxCode FROM packing_lst");
    $data = mysqli_fetch_array($query);
    $codePkl = $data['maxCode'];
    $list = (int) substr($codePkl, 4, 4);
    $list++;
    $code = "PKLS";
    $month = date('F');
    $year = date('Y');
    $codePkl = sprintf("%04s", $list)."/".$code."/".$month."/".$year;

  ?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Packing List Standard</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="add_packing.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">

    <div class="container">
          <div class="row">
            <div class="form-group col-sm-2">
            <label class="col-sm control-label">Packing Num.</label>
            </div>
              <div class="col-sm-9">
                <input type="text" id="code" class="form-control" name="code" value="<?=  $codePkl ?>" readonly>
                <label class="col-sm control-label agentn">Agent Name</label>
                <select name="agentn" id="agentn" class="form-control pos" required>
                <option value="">--select--</option>
                <?php
                  $sql = "SELECT * FROM agent";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                        echo "
                  <option value=".$row['name_agent'].">".$row['name_agent']."</option>";
                  }
                ?>
              </select>
              </div>
          </div>
      </div>


    <div class="container">
      <div class="row">
        <div class="form-group col-sm-2">
                <label class="col-sm control-label" id='no_ba'>Vessel</label>
        </div>
          <div class="col-sm-9">
                <select name="vessel" id="vessel" class="form-control pos" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM vessel_name";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo "
                    <option value=".$row['id'].">".$row['vessel_n']."</option>";
                    }
                  ?>
                </select>
                <label class="col-sm control-label  prt">Port</label>
                <select name="port" id="port" class="form-control pos" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM port";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo "
                    <option value=".$row['id'].">".$row['port_name']."</option>";
                    }
                  ?>
                </select>
               
          </div>
      </div>
    </div>  

<div class="container">
      <div class="row">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">TD Jakarta</label>
        </div>
          <div class="col-sm-9">
              <input type="date" class="form-control" id="td_j" name="td_j" placeholder="TD Jakarta">
          </div>
      </div>
</div>
<hr>

<div class="post clearfix">
  <div class="container">
    <div class="row">
      <div class="form-group">
            <table class="table">
                <thead class="bg-info">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Container</th>
                    <th scope="col">seal</th>
                    <th scope="col">Type</th>
                    <th scope="col">Consignee</th>
                    <th scope="col">BA Number</th>
                  </tr>
                </thead>
                <tbody id='data'>
                  
                </tbody>
            </table>
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
        select#agentn, select#vessel , select#port, input#td_j {
          width: 177px;
        }
        .row{
          margin-top: 4px;
        }
        .agentn{
          margin-right: 37px;
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
        .prt{
          margin-right: 84px;
        }
        #seal{
          margin-left: 79px;
        }
       #no_ba{
          margin-right: 90px;

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
          margin-left: 97px;
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
// select2

   $(document).ready(function() {
        $('.pos').select2({
          width: 'resolve'
        });
    });
  

// tambah data

function tambah(){
    $('#Tdata').append( `
      <select name="no_ba" id="no_ba" style="margin-top: 4px;" class="form-control" required>
          <option value="">--select--</option>
          <?php
            $sql = "SELECT * FROM bast";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
                  echo "
            <option value=".$row['code'].">".$row['code']."</option>";
            }
          ?>
        </select>
          
      `).children(':last');
          }

    function hapusElemen() {
        $('#hps').remove();
      }




  $('#vessel, #port').on('change', function(){
    var Vessel = $('select#vessel').val();
    var Port = $('select#port').val();
    if((Vessel != '')||(Port != '')){
      $.ajax({
        url: "data/packingList_data.php",
      data: {vessel: Vessel, port: Port },
      }).done(function(data) {
        var json = data;
        var no = 1;
        hsl = JSON.parse(json);
        for (var i = 0; i < hsl.length; ++i) {
        $("#data").prepend(
          '<tr id="value"><td align="left">'+ no +'</td>'+
          '<td align="left">'+ hsl[i].container +'</td>'+
          '<td align="left">' + hsl[i].seal + '</td>' +
          '<td align="left">' + hsl[i].type + '</td>' +
          '<td align="left">' + hsl[i].receipent + '</td>' +
          '<td align="left">' + hsl[i].code + '</td></tr>');
          no++;
        }
    });  
    }else{
     $('tr#value').detach();
    }


  })




  $(document).ready(function(){
      $('select#no_ba').on('change', function(){
      if( $('select#no_ba').val() !== ''){
        $('#seal').prop('readonly', true);
        $('#container').prop('readonly', true);
        $('#receipent').prop('readonly', true);
        $('#address').prop('readonly', true);
        $('#goods').prop('readonly', true);
        $('#vessel').prop('readonly', true);
      }
    });
  });

  $(document).ready(function(){
      $('select#no_ba').on('change', function(){
      if( $('select#no_ba').val() == ''){
        $('#seal').removeAttr('readonly');
        $('#seal').val('');
        $('#container').removeAttr('readonly');
        $('#container').val('');
        $('#receipent').removeAttr('readonly');
        $('#receipent').val('');
        $('#address').removeAttr('readonly');
        $('#address').val('');
        $('#goods').removeAttr('readonly');
        $('#goods').val('');
        $('#vessel').removeAttr('readonly');
        $('#vessel').val('');
      }
    });
  });

</script>
</body>
</html>
