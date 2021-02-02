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
        Report Data Surat Jalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Report Table BAST</li>
      </ol>
    </section>
    <?php include 'includes/dropdown_menu_report.php'; ?>
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
      <div class="row"  style="margin-top: 55px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
				<h4>Report Table Surat Jalan</h4>
      <div class="panel-body table-responsive text-nowrap">
				<table width="100%" class="table table-striped table-bordered table-hover" id="example5">
        <thead style="background-color:#367FA9">
          <tr>
							<th style="color: #FFFFFF">No</th>
							<th style="color: #FFFFFF">Nomor Surat</th>
							<th style="color: #FFFFFF">status</th>
              <th style="color: #FFFFFF">Action</th>
          </tr>
        </thead>
              <tbody>
						  <?php
                    $no = 1;
                    $sql = "SELECT surat_jalan.id, surat_jalan.code, surat_jalan.status
                    FROM surat_jalan where surat_jalan.code";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row["status"] == "0"){
                        $status = '<span class="label label-danger pull-center" title="belum dicetak">Not printed</span>';
                        $edit = '<a title="Edit" data-placement="right" class="btn btn-success btn-sm trashedt" data-toggle="modal" href="#myModalEdit" data-id='.$row['code'].'><i class="fa fa-edit"></i> Edit</a>';
                        $cetak = '<a title="print" data-placement="right" class="btn btn-warning btn-sm trashprint" data-toggle="modal" href="#printModal" data-id='.$row['code'].'><i class="fa  fa-print"></i>Print</a>';
                        $btnDel = '<a title="delete" data-placement="right" class="btn btn-danger btn-sm trash" data-toggle="modal" href="#myModal" data-id='.$row['code'].'><i class="fa fa-trash"></i> Delete</a>';
                      }
                      elseif($row["status"] == "1"){
                        $status = '<span class="label label-success pull-center" title="belum dicetak">printed</span>';
                        $edit = '<a title="Edit" disabled data-placement="right" class="btn btn-success btn-sm trashedt" data-toggle="modal" href="#" data-id='.$row['code'].'><i class="fa fa-edit"></i> Edit</a>';
                        $cetak = '<a disabled title="print" data-placement="right" class="btn btn-warning btn-sm print" data-toggle="modal" href="#" data-id='.$row['code'].'><i class="fa  fa-print"></i>Print</a>';
                        $btnDel = '<a title="delete" data-placement="right" class="btn btn-danger btn-sm trash" data-toggle="modal" href="#myModal" data-id='.$row['code'].'><i class="fa fa-trash"></i> Delete</a>';
                      }
                          echo 
                          "
                        <tr>
                          <td align='center'>".$no."</td>
                          <td align='center'>".$row['code']."</td>
                          <td align='center'>".$status."</td>
                          <td align='center'>
                            $edit
                            $btnDel
                            $cetak
                          </td>
                        </tr>" ;
                            $no++;
                          }
                    ?>
                    </tbody>
                </table>


            <!-- modal edit  -->
        <div class="modal fade" id='myModalEdit' tabindex="-1" role="dialog" aria-labelledby="myModalEditLabel" aria-hidden="true">
            <div class="modal-dialog" style="background: #021e4f">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <form method="post" action="update_sj.php">
                      <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name='idg' id='idg' >
                      <div class="form-group">
                        <label for="">SJ Number</label>
                        <input class='form-control banum' type="text" id='sj'  name='sj' readonly>
                      </div>
                      <div class="form-group">
                      <label for="">Name</label>
                      <select name="goods" style=" margin-top : 4px;"  id="goods" class="form-control goods" required>
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
                      </div>
                      <div class="form-group">
                        <label for="">Quantity</label>
                        <input class='form-control qty' type="text" id='qty' name='qty'>
                      </div>

                      <div class="form-group">
                        <label for="">unit</label>
                        <select name="unit" id="unit" class="form-control unit" required>
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
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <button class='btn btn-primary btn-sm edt' type='submit' id='btn-yes' name='save'>save</button>
                  </form>
                </div>
                </div>
                </div>
              </div>
            </div>



            <!-- modal print -->
            
            <div class="modal fade" id='printModal' tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background: #021e4f">
                  <div class="modal-content">
                    <div class="modal-header">
                    
                    <input type="hidden" name="code" id="code">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Create Print Surat Jalan</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah anda yakin data ini akan <b>Cetak</b>?</h4>
                    
                        </div>
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <a class='btn btn-primary btn-sm print' type='submit' id='btn-print' name="print">create</a>
                    </div>
                    </div>
                    </div>
                  </div>

            <!-- modal hapus -->
              <div class="modal fade" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="background: #021e4f">
                  <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah anda yakin data ini akan <b>dihapus</b>?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                      <a class='btn btn-primary btn-sm hps' id='btn-yes'>Yes</a>
                    </div>
                    </div>
                    </div>
                  </div>




            </div>
          </div>
            </div>
            
        </div>
      </div>
    </section>   
  </div>
       
  <?php include 'includes/footer.php'; ?>
</div>
<style>

.btn.btn-default.buttons-print{
  background-color: blue;
}
  i{
    color: #fff;
  }
  th{
    text-align: center;
    font-weight: lighter;
  }
  button.btn.btn-default{
   margin-left: 4px;
   margin-right: 4px;
 }
</style>
<?php include 'includes/scripts.php'; ?>
<script>

$(document).ready(function() {
    var table = $('#example5').DataTable( {
        'scrollX'     : true,
        'responsive'  : true,
        lengthChange: false,
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                title: 'Report Job Order',
                className: 'btn-primary'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title: 'Report Job Order',
                titleAttr: 'Excel',
                className: 'btn-success'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',  
                title: 'Report Job Order',
                titleAttr: 'CSV',
                className: 'btn-info'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                title: 'Report Job Order',
                className: 'btn-danger',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
              title: 'Report Job Order',
              extend:'print',
              text: 'Print <i class="fa  fa-print"></i>',
              orientation: 'landscape',
              pageSize: 'A4'
            }, 
             {

              extend:'colvis', 
              text: 'Coloumn visibility <i class="fa  fa-columns"></i>'
             } 
            
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example5_wrapper .col-sm-6:eq(0)' );
  });



// modal edit
$('.trashedt').click(function(){
        var code=$(this).data('id');
    $.ajax({
      url: "data/goods_data.php",
      data: "sj=" +code,
    }).done(function(data) {
      var json = data;
      obj = JSON.parse(json);
      $('#idg').val(obj.id);
      $('.sj').val(obj.sj);
      $('.goods').val(obj.nama_barang);
      $('.qty').val(obj.quantity);
      $('.unit').val(obj.unit);
      var json = data;
        hsl = JSON.parse(json);
        for (var i = 0; i < hsl.length; ++i) {
        $("#data").prepend(
          '<tr id="value"><td align="left">'+ hsl[i].nama_barang +'</td>'+
          '<td align="left">' + hsl[i].quantity + '</td>' +
          '<td align="left">' + hsl[i].unit + '</td></tr>');
        }
       });  
     });

  $('.trashprint').click(function(){
        var idf=$(this).data('id');
        $('.print').attr('href','print_suratJalan.php?code='+idf);
    })

    $('.trash').click(function(){
        var codesj=$(this).data('id');
        $('.hps').attr('href','delete_sj.php?code='+codesj);
    })

</script>
</body>
</html>
