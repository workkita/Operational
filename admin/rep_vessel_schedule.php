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
        Report Data Vessel Schedule
      </h1>
     
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
      <div class="row" style="margin-top: 55px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
				<h4>Report Table Vessel Schedule</h4>
        
            
        </div>
        <div class="panel-body table-responsive text-nowrap">
				<table id="example4" width="100%" class="table table-striped table-bordered table-hover">
          <thead style="background-color:#367FA9">
            <tr>
							<th style="color: #FFFFFF">No</th>
							<th id="input_d_col_head" style="color: #FFFFFF">Input Date </th>
              <th id="origin_port_col_head" style="color: #FFFFFF">Origin Port</th>
							<th id="Destination_Por_col_head" style="color: #FFFFFF">Destination Port</th>
              <th id="Address_col_head" style="color: #FFFFFF">Address</th>
              <th id="Shipping_col_head" style="color: #FFFFFF">Shipping</th>
              <th id="Vessel_Name_col_head" style="color: #FFFFFF">Vessel Name</th>
              <th id="Voyage_col_head" style="color: #FFFFFF">Voyage</th>
              <th id="ETD_jakarta_col_head" style="color: #FFFFFF">Ex. ETD jakarta</th>
              <th id="TD_jakarta_col_head" style="color: #FFFFFF">Ex. TD jakarta</th>
              <th id="Closing_Date_col_head" style="color: #FFFFFF">Closing Date</th>
              <th id="Closing_Time_col_head" style="color: #FFFFFF">Closing Time</th>
              <th id="ETD_Jakarta_col_head" style="color: #FFFFFF">ETD Jakarta</th>
              <th id="ETA_Dest_col_head" style="color: #FFFFFF">ETA Dest.</th>
              <th id="c20_col_head" style="color: #FFFFFF">20"</th>
              <th id="_col_head" style="color: #FFFFFF">21"</th>
              <th id="_col_head" style="color: #FFFFFF">40"</th>
              <th id="_col_head" style="color: #FFFFFF">40"HC</th>
              <th id="_col_head" style="color: #FFFFFF">41"</th>
              <th id="_col_head" style="color: #FFFFFF" >ACTION</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "SELECT * FROM schedship";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                    echo 
                    "
                  <tr>
                    <td align='center'>".$no."</td>
                    <td class='input_d_col' align='left'>".$row['input_date']."</td>
                    <td class='origin_port_col' align='left' class='text-nowrap'>".$row['from_port']."</td>
                    <td class='Destination_Por_col' align='left' class='text-nowrap'>".$row['to_port']."</td>
                    <td class='Address_col' align='left'>".$row['address']."</td>
                    <td class='Shipping_col' align='left'>".$row['shipping']."</td>
                    <td class='Vessel_Name_col' align='left'>".$row['vessel_n']."</td>
                    <td class='Voyage_col' align='left'>".$row['voy']."</td>
                    <td class='ETD_jakarta_col' align='left'>".$row['xtd_j']."</td>
                    <td class='TD_jakarta_col' align='left'>".$row['td_j']."</td>
                    <td class='Closing_Date_col' align='left'>".$row['closing_d']."</td>
                    <td class='Closing_Time_col' align='left'>".$row['clt']."</td>
                    <td class='ETD_Jakarta_col' align='left'>".$row['etd_j']."</td>
                    <td class='ETA_Dest_col' align='left'>".$row['eta']."</td>
                    <td class='c20_col' align='left'>".$row['c20']."</td>
                    <td class='_col' align='left'>".$row['c21']."</td>
                    <td class='_col' align='left'>".$row['c40']."</td>
                    <td class='_col' align='left'>".$row['c40hc']."</td>
                    <td class='_col' align='left'>".$row['c41']."</td>
                    <td class='_col' align='center'>
                      <a href='edit_schedship.php?id=".$row['id']."' class='btn btn-success btn-sm' ><i class='fa fa-edit'></i> Edit</a>
                      <a  href='delete_schedship.php?id=".$row['id']."' class='btn btn-danger btn-sm'  onclick='return checkDelete()'><i class='fa fa-trash-o'></i> Delete</a>
                    </td>
                  </tr>" ;
                      $no++;
                    }
              ?>
            </tbody>
        </table>
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
  th{
    font-weight: lighter;
  }
  .container.col-lg-12{
     width: 450px;
   }
  input[type='checkbox']{
    margin-right: 4px;
  }
  
 button.btn.btn-default{
   margin-left: 4px;
   margin-right: 4px;
 }
 .box{
   margin-top: -50px;
 }
 
</style>
<?php include 'includes/scripts.php'; ?>


</body>
</html>

