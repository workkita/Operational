<!-- jQuery 3 -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<!-- <script src="../../../../SI-Karyawan-master/Include/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../../SI-Karyawan-master/Include/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/raphael/raphael.min.js"></script>
<script src="../../../../SI-Karyawan-master/Include/bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../../../SI-Karyawan-master/Include/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../../../SI-Karyawan-master/Include/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/moment/min/moment.min.js"></script>
<script src="../../../../SI-Karyawan-master/Include/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../../../SI-Karyawan-master/Include/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../../../SI-Karyawan-master/Include/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../../SI-Karyawan-master/Include/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../SI-Karyawan-master/Include/dist/js/pages/dashboard.js"></script>
    <!-- Select2 -->
<script src="../../../../SI-Karyawan-master/Include/bower_components/select2/dist/js/select2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../SI-Karyawan-master/Include/dist/js/demo.js"></script>
<!-- autonumeric -->
<!-- autonumeric -->
<script src="https://cdn.jsdelivr.net/autonumeric/2.0.0/autoNumeric.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'scrollX'     : false,
      'responsive'  : true,
      
    });
    $('#example3').DataTable({
      'scrollX'     : true,
      'responsive'  : true
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      
    });
   
  });
  $(document).ready(function() {
    var table = $('#example4').DataTable( {
      'scrollX'     : true,
      'responsive'  : true,
        lengthChange: false,
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                title: 'Operasional',
                className: 'btn-sm btn-flat'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                title: 'Operasional',
                className: 'btn-success'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                title: 'Operasional',
                className: 'btn-info'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                title: 'Operasional',
                className: 'btn-danger',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
              extend:'print',
              title: 'Operasional',
              text: 'Print <i class="fa  fa-print"></i>'
            }, 
             {

              extend:'colvis', 
              text: 'Coloumn visibility <i class="fa  fa-columns"></i>'
             } 
            
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example4_wrapper .col-sm-6:eq(0)' );
} );
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>