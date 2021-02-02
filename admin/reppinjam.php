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
        Input Data Master
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Data Master</li>
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
				<div class="pull-left">
                <form method="POST" class="form-inline" id="payForm">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-left col-sm-8" id="reservation" name="date_range" value="">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class="glyphicon glyphicon-print"></span> Print1</button>
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="payslip"><span class="glyphicon glyphicon-print"></span> Print2</button>
                </form>
              </div>
            </div>
            <div class="box-body">
				<!-- Search form -->
				<div class="form-row">
    <div class="form-group col-md-4">
      <label for="customer" class="col-sm-2">NIK</label>
		<div class="col-sm-9">
        <select id="country" class="form-control">
 <option value="">Select</option>
 <option value="001">Cel001</option>
 <option value="002">Cel002</option>
 <option value="003">Cel003</option>
 <option value="004">Cel004</option>
 <option value="005">Cel005</option>
</select>
		</div>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4" class="col-sm-12 control-label"></label>
    </div>
	<div class="form-group col-md-3">
		<div class="col-sm-12">
      <input class="form-control" type="text" placeholder="Search" aria-label="Search">
		</div>
    </div>
  </div>

				<!--./Search form-->
              <div class="panel-body table-responsive text-nowrap">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead style="background-color:#367FA9">
                        <tr>
                          <th style="color: #FFFFFF">Tanggal Kasbon</th>
                          <th style="color: #FFFFFF">Voucher Number</th>
                          <th style="color: #FFFFFF">NIK</th>
                          <th style="color: #FFFFFF">Nama</th>
                          <th style="color: #FFFFFF">Departemen/Bagian</th>
                          <th style="color: #FFFFFF">Kasbon</th>
                          <th style="color: #FFFFFF">Pembayaran</th>
                          <th style="color: #FFFFFF">Jumlah Angsuran</th>
                          <th style="color: #FFFFFF">Lama Angsuran</th>
                          <th style="color: #FFFFFF">Tanggal Pencairan</th>
                          <th style="color: #FFFFFF">Jenis Pencairan</th>
                          <th style="color: #FFFFFF">Nomor Rekening</th>
                          <th style="color: #FFFFFF">Nama Bank</th>
                          <th style="color: #FFFFFF" colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
						
                      <tr>
                        <td align="center"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="right">
                          <a href="edit_karyawan.php?id_karyawan=<?php echo $row['id_karyawan'] ?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td align="right">
                          <a href="hapus_karyawan.php?id_karyawan=<?php echo $row['id_karyawan'] ?>" onclick="hapus()"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
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
