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


 
  <?php
      $id = $_GET['id'];
      $statusd = '2';
      $query = mysqli_query($conn, "UPDATE delivery SET `Status`='$statusd' where id = '$id'");

      //mengambil data
      $query = mysqli_query($conn, "SELECT *, delivery.ro_number as ro, delivery.unit as u, delivery.type_track as t,delivery.driver_n as dn, 
      delivery.no_truck as nt, delivery.no_hp as nh, delivery.no_seal as ns, inquiry_container.address as ad, sales.name as sls,
       vn.vessel_n as v, subtracking.tracking_name as sn
       FROM delivery 
       INNER JOIN inquiry_container on  delivery.id_inquiry_container 
       INNER JOIN sales on  inquiry_container.sales_code = sales.code 
       INNER JOIN vessel_name vn on  inquiry_container.vessel_name = vn.id 
       INNER JOIN subtracking on  delivery.tracking_name = subtracking.id 
       WHERE delivery.id='$id'");
      $data = $query->fetch_assoc();
  ?>




<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Edit Job order</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="update_joborder.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
    <div class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Job Order</label>
        </div>
          <div class="col-sm-9">
                <input type="hidden" name="id" value="<?= $data['id']?>">
                <input type="text" class="form-control" id="code_jo" name="code_jo" value="<?=$data['code_jo']?>" placeholder="Job Order Number" readonly>
                <label class="col-sm control-label" id="ro">RO Number</label>
                <input type="text" class="form-control" id="ro_number" name="ro_number" value="<?= $data['ro']?>" placeholder="RO Number" readonly>
          </div>
      </div>
    </div>  

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Purchased</label>
        </div>
          <div class="col-sm-9">
                <input type="text" class="form-control" id="purechased" name="purechased" value="<?= $data['purchased']?>"  readonly>
                <label class="col-sm control-label" id="ro">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $data['ad']?>" readonly>
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
           <input type="text" class="form-control" value="<?= $data['name']?>" readonly>
          </div>
      </div>
    </div>

  <div class="container">
      <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Load Date</label>
          </div>
          <div class="col-sm-9">
              <input type="hidden" value="<?= $data['id']?>" name="id_inquery" id="id_inquery">
              <input type="hidden" id="id_inqury" name="id_inqury" value="<?= $data['id']?>">
              <input type="text" class="form-control" id="dateload" value="<?= $data['load_date']?>" readonly>
              <label class="col-sm control-label" id="tjo">Type J.O</label>
              <input type="text" class="form-control" id="tjo" placeholder="Type Job Order" value="<?= $data['type_jo']?>" readonly>
          

              <label class="col-sm control-label" id="type_bm">Type</label>
              <input type="text" class="form-control" id="tbm"  value="<?= $data['type']?>" readonly>
                 
        </div>
      </div>
    </div>

        
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">ppn</label>
        </div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="ppn" placeholder="ppn" value="<?= $data['ppn']?>" readonly>
          <label class="col-sm control-label" id="ins">insurance</label>
          <input type="text" class="form-control" id="insurance" placeholder="insurance" value="<?= $data['insurance']?>" readonly>
          <label class="col-sm control-label" id="ppf">PPFTZ 03</label>
          <input type="text" class="form-control" id="PPFTZ 03" placeholder="PPFTZ 03" value="<?= $data['ppftz03']?>" readonly>
         
        </div>
      </div>
    </div>
	  
 
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Shipping</label>
        </div>
          <div class="col-sm-9">
                  <input type="text" class="form-control" id="Pelayaran" placeholder="Pelayaran" value="<?= $data['shipping_name']?>" readonly>
          
                  <label class="control-label col-sm" id="vessel">Vess.Name</label>
                  <input type="text" class="form-control" id="vesselname" placeholder="Vessel Name" value="<?= $data['v']?>" readonly>
          
                  <label class="control-label col-sm" id="vy">Voy</label>
                  <input type="text" class="form-control" id="voy" placeholder="Voy" value="<?= $data['voy']?>" readonly>
  
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
                  <input type="text" class="form-control" id="ETD" placeholder="ETD" value="<?= $data['etd']?>" readonly>
          
                  <label class="col-sm control-label" id="eta">ETA</label>
                  <input type="text" class="form-control" id="ETA" placeholder="ETA" value="<?= $data['eta']?>" readonly>
  
                  <label class="col-sm control-label" id="eta">Container</label>
                  <input type="text" class="form-control" id="container" value='<?= $data["container"]?>' readonly>
  
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
                  <select name="tracking_n" id="tracking_n" class="form-control"  value="<?= $data['sn']?>" required>
                            <option value="">--select--</option>
                            <?php
                              $sql = "SELECT * FROM subtracking";
                              $query = $conn->query($sql);
                              while($data = $query->fetch_assoc()){
                                    echo "
                              <option value=".$data['id'].">".$data['tracking_name']."</option>";
                              }
                            ?>
                    </select>

                    <?php
                        $id = $_GET['id'];

                        //mengambil data
                        $query = mysqli_query($conn, "SELECT *, delivery.ro_number as ro, delivery.unit as u, delivery.type_track as t,delivery.driver_n as dn, 
                        delivery.no_truck as nt, delivery.no_hp as nh, delivery.no_seal as ns, delivery.origin_port as op, delivery.destination_port as dp,
                        delivery.load_type as lt, delivery.address_cons as ac, delivery.receipent as cs,
                        inquiry_container.address as ad, sales.name as sls,
                        vn.vessel_n as v, subtracking.tracking_name as sn
                        FROM delivery 
                        INNER JOIN inquiry_container on  delivery.id_inquiry_container 
                        INNER JOIN sales on  inquiry_container.sales_code = sales.code 
                        INNER JOIN vessel_name vn on  inquiry_container.vessel_name = vn.id 
                        INNER JOIN subtracking on  delivery.tracking_name = subtracking.id 
                        WHERE delivery.id='$id'");
                        $data = $query->fetch_assoc();
                    ?>

                  <label class="control-label col-sm" id="unit">Unit</label>
                  <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" value="<?= $data['u']?>" required>
          
                  <label class="control-label col-sm" id="type">Type</label>
                  <select class="form-control" id="type_track" value="<?= $data['t']?>" name="type_track" required>
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
          <input type="text" class="form-control" id="driver" name="driver" value="<?= $data['dn']?>" placeholder="Driver">
          <label class="col-sm control-label" id="noC">No.Container</label>
          <input type="text" class="form-control" style="margin-left: -12px;" value="<?= $data['nt']?>" id="no_Container" name="no_Container" placeholder="No.Container">
          <label class="col-sm control-label">No.Seal</label>
          <input type="text" class="form-control" id="no_Seal" value="<?= $data['ns']?>" name="no_Seal" placeholder="No.Seal">                   
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">No.Handphone</label>
          </div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="no_handphone" value="<?= $data['nh']?>" name="no_handphone" placeholder="No.Handphone">

          
          <label class="control-label col-sm">Origin Port</label>
                    <select name="origin_port" id="origin_port"  class="form-control" required>
                      <option value="">--select--</option>
                      <?php
                        $sql = "SELECT * FROM port";
                        $query = $conn->query($sql);
                        while($data = $query->fetch_assoc()){
                              echo "
                        <option value=".$data["id"].">".$data["port_name"]."</option>";
                        }
                      ?>
                    </select>

                  <label class="control-label col-sm">Dest. Port</label>
                    <select name="destination_port" id="destination_port" class="form-control" required>
                      <option value="">--select--</option>
                      <?php
                        $sql = "SELECT * FROM port";
                        $query = $conn->query($sql);
                        while($data = $query->fetch_assoc()){
                              echo "
                        <option value=".$data["id"].">".$data["port_name"]."</option>";
                        }
                      ?>
                    </select>
        </div>
      </div>
    </div>
	
    <?php
        $id = $_GET['id'];

        //mengambil data
        $query = mysqli_query($conn, "SELECT *,
        delivery.load_type as lt, delivery.address_cons as ac, delivery.receipent as cs

        FROM delivery 
        INNER JOIN inquiry_container on  delivery.id_inquiry_container 
        INNER JOIN sales on  inquiry_container.sales_code = sales.code 
        INNER JOIN vessel_name vn on  inquiry_container.vessel_name = vn.id 
        INNER JOIN subtracking on  delivery.tracking_name = subtracking.id 
        WHERE delivery.id='$id'");
        $data = $query->fetch_assoc();
    ?>


    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Load Type</label>
          </div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="load_type" name="load_type" value="<?= $data['lt']?>" placeholder="Load Type">
          <label class="col-sm control-label">Address</label>
          <input type="text" class="form-control" id="address_cons" name="address_cons" value="<?= $data['ac']?>" placeholder="Address">
        </div>
      </div>
    </div>
		  
    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Consignee</label>
          </div>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="recipient" name="recipient" value="<?= $data['cs']?>" placeholder="Consignee">
        </div>
      </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">No.Truck</label>
          </div>
        <div class="col-sm-9">
          <select name="no_truck" id="no_truck" value="<?= $data['no_truck']?>" class="form-control" required>
            <option value="">--select--</option>
            <?php
              $sql = "SELECT * FROM subtracking";
              $query = $conn->query($sql);
              while($data = $query->fetch_assoc()){
                    echo "
              <option value=".$data['number_truck'].">".$data['number_truck']."</option>";
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
                <select name="route" id="route" value="<?= $data['route']?>" class="form-control" required>
                  <option value="">--select--</option>
                  <?php
                    $sql = "SELECT * FROM add_route";
                    $query = $conn->query($sql);
                    while($data = $query->fetch_assoc()){
                          echo "
                    <option value=".$data['destination'].">".$data['destination']."</option>";
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
          
            <select name="agent" id="agent" value="<?= $data['agent']?>" class="form-control" required>
              <option value="">--select--</option>
              <?php
                $sql = "SELECT * FROM agent";
                $query = $conn->query($sql);
                while($data = $query->fetch_assoc()){
                      echo "
                <option value=".$data['name_agent'].">".$data['name_agent']."</option>";
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
