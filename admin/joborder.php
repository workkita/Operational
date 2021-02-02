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
    $query = mysqli_query($conn, "SELECT max(code_jo) as maxCode FROM delivery");
    $data = mysqli_fetch_array($query);
    $customerCode = $data['maxCode'];
    $list = (int) substr($customerCode, 5, 5);
    $list++;
    $code = "JO-";
    $customerCode = $code . sprintf("%05s", $list);

  ?>

  <?php
      $id = $_GET['id'];
      $status = '1';
      $query = mysqli_query($conn, "UPDATE inquiry_container SET `status`='$status' where id = '$id'");

      //mengambil data
      $query = mysqli_query($conn, "select *, i.id as iiq, i.customer, s.name
      FROM inquiry_container i 
      JOIN sales s ON i.sales_code = s.code
      INNER JOIN
      vessel_name vn ON i.vessel_name = vn.id
      where i.id='$id'");
      $row = $query->fetch_assoc();
      
    
  ?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Job order</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="add_joborder.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
    <div class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Job Order</label>
        </div>
          <div class="col-sm-9">
                <input required type="text" class="form-control" id="code_jo" name="code_jo" value="<?=$customerCode?>" placeholder="Job Order Number" readonly>
                <label class="col-sm control-label" id="ro">RO Number</label>
                <input required type="text" class="form-control" id="ro_number" name="ro_number" placeholder="RO Number">
          </div>
      </div>
    </div>  

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Purchased</label>
        </div>
          <div class="col-sm-9">
                <input required type="text" class="form-control" id="purechased" name="purechased" value="<?= $row['purchased']?>"  readonly>
                <label class="col-sm control-label" id="ro">Address</label>
                <input required type="text" class="form-control" id="address" name="address" value="<?= $row['Address']?>" readonly>
          </div>
      </div>
    </div>  


  </div>
</div>
</div>

	  
  <div class="post clearfix">
  <div class="form-row">

  <div class="container">
      <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
            <label class="col-sm control-label">Sales</label>
          </div>
          <div class="col-sm-9">
           <input required type="text" class="form-control" value="<?= $row['name']?>" readonly>
          </div>
      </div>
    </div>

  <div class="container">
      <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Load Date</label>
          </div>
          <div class="col-sm-9">
              <input required type="hidden" value="<?= $row['iiq']?>" name="id_inquery" id="id_inquery">
              <input required type="hidden" id="id_inqury" name="id_inqury" value="<?= $row['id']?>">
              <input required type="text" class="form-control" id="dateload" value="<?= $row['load_date']?>" readonly>
              <label class="col-sm control-label" id="tjo">Type J.O</label>
              <input required type="text" class="form-control" id="tjo" placeholder="Type Job Order" value="<?= $row['type_jo']?>" readonly>
          

              <label class="col-sm control-label" id="type_bm">Type</label>
              <input required type="text" class="form-control" id="tbm"  value="<?= $row['type']?>" readonly>
                 
        </div>
      </div>
    </div>

        
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">ppn</label>
        </div>
        <div class="col-sm-9">
          <input required type="text" class="form-control" id="ppn" placeholder="ppn" value="<?= $row['ppn']?>" readonly>
          <label class="col-sm control-label" id="ins">insurance</label>
          <input required type="text" class="form-control" id="insurance" placeholder="insurance" value="<?= $row['insurance']?>" readonly>
          <label class="col-sm control-label" id="ppf">PPFTZ 03</label>
          <input required type="text" class="form-control" id="PPFTZ 03" placeholder="PPFTZ 03" value="<?= $row['ppftz03']?>" readonly>
         
        </div>
      </div>
    </div>
	  
 
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Shipping</label>
        </div>
          <div class="col-sm-9">
                  <input required type="text" class="form-control" id="Pelayaran" placeholder="Pelayaran" value="<?= $row['shipping_name']?>" readonly>
          
                  <label class="control-label col-sm" id="vessel">Vess.Name</label>
                  <input required type="text" class="form-control" id="vesselname" placeholder="Vessel Name" value="<?= $row['vessel_n']?>" readonly>
          
                  <label class="control-label col-sm" id="vy">Voy</label>
                  <input required type="text" class="form-control" id="voy" placeholder="Voy" value="<?= $row['voy']?>" readonly>
  
            </div>
          </div>
      </div>
    </div>  
  

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">ETD</label>
        </div>
          <div class="col-sm-9">
                  <input required type="text" class="form-control" id="ETD" placeholder="ETD" value="<?= $row['etd']?>" readonly>
          
                  <label class="col-sm control-label" id="eta">ETA</label>
                  <input required type="text" class="form-control" id="ETA" placeholder="ETA" value="<?= $row['eta']?>" readonly>
  
                  <label class="col-sm control-label" id="eta">Container</label>
                  <input required type="text" class="form-control" id="container" value='<?= $row["container"]?>' readonly>
  
            </div>
          </div>
      </div>
    </div>  
		  
   
	  
	  <div class="post clearfix">
	<div class="form-row">

  <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label" id="tn">Tracking name</label>
        </div>
          <div class="col-sm-9">
                  <select name="tracking_n" id="tracking_n" class="form-control" required>
                            <option value="">--select--</option>
                            <?php
                              $sql = "SELECT * FROM subtracking";
                              $query = $conn->query($sql);
                              while($row = $query->fetch_assoc()){
                                    echo "
                              <option value=".$row['id'].">".$row['tracking_name']."</option>";
                              }
                            ?>
                    </select>
                  <label class="control-label col-sm" id="unit">Unit</label>
                  <input required type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required>
          
                  <label class="control-label col-sm" id="type">Type</label>
                  <select class="form-control" id="type_track" name="type_track" required>
                    <option value="Double Combo">Double Combo</option>
                    <option value="Single">Single</option>
                    <option value="Double panjang">Double panjang</option>
                </select>
  
            </div>
          </div>
    </div>  

    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Driver Name</label>
          </div>
        <div class="col-sm-9">
          <input required type="text" class="form-control" id="driver" name="driver" placeholder="Driver">
          <label class="col-sm control-label" id="noC">No.Container</label>
          <input required type="text" class="form-control" style="margin-left: -12px;" id="no_Container" name="no_Container" placeholder="No.Container">
          <label class="col-sm control-label">No.Seal</label>
          <input required type="text" class="form-control" id="no_Seal" name="no_Seal" placeholder="No.Seal">                   
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Phone Number</label>
          </div>
        <div class="col-sm-9">
          <input required type="text" class="form-control" id="no_handphone" name="no_handphone" placeholder="No.Handphone">

          
          <label class="control-label col-sm">Origin Port</label>
                    <select name="origin_port" id="origin_port" class="form-control" required>
                      <option value="">--select--</option>
                      <?php
                        $sql = "SELECT * FROM port";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                              echo "
                        <option value=".$row["id"].">".$row["port_name"]."</option>";
                        }
                      ?>
                    </select>

                  <label class="control-label col-sm">Dest. Port</label>
                    <select name="destination_port" id="destination_port" class="form-control" required>
                      <option value="">--select--</option>
                      <?php
                        $sql = "SELECT * FROM port";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                              echo "
                        <option value=".$row["id"].">".$row["port_name"]."</option>";
                        }
                      ?>
                    </select>
        </div>
      </div>
    </div>
	
    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Load Type</label>
          </div>
        <div class="col-sm-9">
          <input required type="text" class="form-control" id="load_type" name="load_type" placeholder="Load Type">
          <label class="col-sm control-label">Address</label>
          <input required type="text" class="form-control" id="address_cons" name="address_cons" placeholder="Address">
        </div>
      </div>
    </div>
		  
    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Consignee</label>
          </div>
        <div class="col-sm-9">
          <input required type="text" class="form-control" id="recipient" name="recipient" placeholder="Consignee">
              <label class="col-sm control-label">Phone Number</label>
          <input required type="text" class="form-control" id="rec_no_hp" name="rec_no_hp" placeholder="Consignee">
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">No.Truck</label>
          </div>
        <div class="col-sm-9">
          <select name="no_truck" id="no_truck" class="form-control" required>
            <option value="">--select--</option>
            <?php
              $sql = "SELECT * FROM subtracking";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                    echo "
              <option value=".$row['number_truck'].">".$row['number_truck']."</option>";
              }
            ?>
          </select>
          
          
        </div>
      </div>
    </div>
		  
  
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Route</label>
              </div>
                <div class="col-sm-9">
                <select name="route" id="route" class="form-control" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM add_route";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                          echo "
                    <option value=".$row['destination'].">".$row['destination']."</option>";
                    }
                  ?>
                </select>
                  
          
  
            </div>
          </div>
      </div>
    </div>  
		  
    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
          <label class="col-sm control-label">Agent</label>
          </div>
        <div class="col-sm-9">
          
            <select name="agent" id="agent" class="form-control" required>
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
        .col-sm-2{
          width: 145px;
        }
        .col-sm{
          margin-left: 20px;
        }
        input#warehouse{
          margin-left: 23px;
        }
       input#jo_cus{
         width: 100px;
       }
       input#address{
         margin-left: 22px;
       }
       input#no_Seal{
         margin-left: 34px;
       }

       select#origin_port{
         margin-left: 23px;
       }
       select#destination_port{
         margin-left: 21px;
       }

       select#inpjk{
         margin-left: 100px;
       }
       input#dateload, select#type_track{
         width: 177px;
       }
       label#vessel{
         margin-left: 22px;
         margin-right: 23px;
       }
       input#descppftz{
         width: 200px
       }
       label#type{
        margin-right: 73px;
        margin-left: 30px;
       }
       label#vy{
         margin-left: 22px;
         margin-right: 56px;
       }
       input#voy{
         width: 177px;
       }
       input#address_cons{
         margin-left: 42px;
       }
       label#noC{
         margin-right: 21px;
       }
       label#eta{
         margin-left: 24px;
         margin-right: 50px;
       }
       input#container{
         margin-left: -34px;
       }
       label#tjo{
         margin-right: 39px;
       }
       label#ins{
         margin-right: 32px;
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
       input#ETA{
         margin-left: 15px; 
       }
       label#unit{
         margin-right: 65px;
       }
       label#type{
         margin-left: 22px;
         margin-right: 49px;
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
  
</script>
</body>
</html>
