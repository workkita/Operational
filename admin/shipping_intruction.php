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

  

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
        <h3>Shipping Intruction</h3>
    </div>
  <!--/.span3-->
<form class="form-inline" method="post" action="add_shippingIntruction.php">
	
  <div class="post clearfix">
 	<div class="form-row">
  	<div class="form-group">
    <div class="container">
      
      <div class="row" style="margin-top: 20px;">

      <!-- title -->
      <div class="post clearfix">
        <div class="col-sm-6">
          <label style='margin-left: 20px' class="control-label">Shipper Details</label>
        </div>
        <div class="col-sm-6">
          <label style='margin-left: -240px' class="control-label">Consingnee Details</label>
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
              <label class="col-sm control-label">Name</label>
          </div>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="Name_shippper" name='Name_shippper'>
              <label class="col-sm control-label" id="tjo">Name</label>
              <input type="text" class="form-control" id="name_cos" name='name_cos' placeholder="Name" >
          

                 
        </div>
      </div>
    </div>

        
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Address</label>
        </div>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="Address_shipper" placeholder="Address shipper" >
          <label class="col-sm control-label" id="ins">Address</label>
          <input type="text" class="form-control" id="Address_cos" placeholder="Address cutomer"  >
         
        </div>
      </div>
    </div>
	  
 
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Telphone Number</label>
        </div>
          <div class="col-sm-10">
                  <input type="text" class="form-control" id="tlp_shipper" placeholder="Telphone Number" >
          
                  <label class="control-label col-sm" id="vessel">Telphone Number</label>
                  <input type="text" class="form-control" id="tlp_cos" placeholder="Telphone Number" >
          
  
            </div>
          </div>
      </div>
    </div>  
  

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Phone Number</label>
        </div>
          <div class="col-sm-10">
                  <input type="text" class="form-control" id="pn_Shipper" placeholder="Phone Number" >
          
                  <label class="col-sm control-label" id="eta">Phone Number</label>
                  <input type="text" class="form-control" id="pn_cos" placeholder="Phone Number" >
  
            </div>
          </div>
      </div>
    </div>  
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">Email Address</label>
        </div>
          <div class="col-sm-10">
                  <input type="text" class="form-control" id="email_Shipper" placeholder="Email Address" >
          
                  <label class="col-sm control-label" id="eta">Email Address</label>
                  <input type="text" class="form-control" id="email_cos" placeholder="Email Address" >
  
            </div>
          </div>
      </div>
    </div>  
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-2">
            <label class="col-sm control-label">NPWP</label>
        </div>
          <div class="col-sm-10">
                  <input type="text" class="form-control" id="npwp_Shipper" placeholder="NPWP" >
          
                  <label class="col-sm control-label" id="eta">NPWP</label>
                  <input type="text" class="form-control" id="npwp_cos" placeholder="NPWP" >
  
            </div>
          </div>
      </div>
    </div>  
		  
      
	  <div class="post clearfix">
    <div class="container"><h3>Shipment Details / Informasi Pengiriman</h3></div>
      <div class="container">
           <h4>Owner Cargo</h4>
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Name</label>
          </div>
            <div class="col-sm-10">
                    <input type="text" class="form-control" id="Name_ow" placeholder="Name" >
            
                    <label class="col-sm control-label" id="eta">Port of Loading</label>
                    <input type="text" class="form-control" id="pol" placeholder="Port of Loading" >
    
              </div>
            </div>
	
        <div class="row" style="margin-top: 4px;">
          <div class="form-group col-sm-2">
              <label class="col-sm control-label">Address</label>
          </div>
            <div class="col-sm-10">
                    <input type="text" class="form-control" id="Address_ow" placeholder="Address" >
            
                    <label class="col-sm control-label" id="eta">Shipping Term</label>
                    <input type="text" class="form-control" id="shippTerm" placeholder="Shipping Term" >
    
              </div>
            </div>
        <div class="row" style="margin-top: 4px;">
          
            <div class="col-sm-10">
                    <label class="col-sm control-label" id="eta">Vessel Name</label>
                    <input type="text" class="form-control" id="Vesseln" placeholder="Vessel Name" >
    
              </div>
          </div>
          
        <div class="row" style="margin-top: 4px;">
          
            <div class="col-sm-10">
                    <label class="col-sm control-label" id="eta">Voyage no</label>
                    <input type="text" class="form-control" id="voyageno" placeholder="Voyage no" >
    
              </div>
          </div>
    </div>

    <hr>
    <div class="container"><h3>Billing & Payment /  Penagihan & Pembayaran</h3></div>

    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-3">
            <label class="col-sm control-label">Ocean Freight</label>
        </div>
          <div class="col-sm-9">
            <select class="form-control" name="ocf" id="">
              <option value="">--Select--</option>
              <option value="">Prepaid</option>
              <option value="">Collect at</option>
            </select>
          </div>
        </div>
    </div>
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-3">
            <label class="col-sm control-label">Port of Loading Charges</label>
        </div>
          <div class="col-sm-9">
              <select class="form-control" name="ocf" id="">
                <option value="">--Select--</option>
                <option value="">Prepaid</option>
                <option value="">Collect at</option>
              </select>
            </div>
          </div>
        </div>
		  
    <div class="container">
      <div class="row" style="margin-top: 4px;">
        <div class="form-group col-sm-3">
            <label class="col-sm control-label">Port of Loading Discharge Charges</label>
        </div>
        <div class="col-sm-9">
            <select class="form-control" name="ocf" id="">
              <option value="">--Select--</option>
              <option value="">Prepaid</option>
              <option value="">Collect at</option>
            </select>
          </div>
        </div>
    </div>
     
		  
       
<div class="container"><h3>Cargo Details</h3></div>
        <div class="row">
        <div class="container">
          <table>
          <thead class='bg-info'>
            <tr>
              <th ><label style='margin-left: 30px;' for="">Container Number</label></th> 
              <th ><label style='margin-left: 30px;' for="">Seal No</label></th> 
              <th ><label style='margin-left: 30px;' for="">TYPE</label></th> 
              <th ><label style='margin-left: 30px;' for="">WEIGHT</label></th> 
              <th ><label style='margin-left: 30px;' for="">Cargo</label></th> 
              <th ><label style='margin-left: 30px;' for="">Harga</label></th> 
            </tr>
            </thead>
            
            <tbody>
            <tr style="height: 40px;">
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
            </tr>
            </tbody>
          </table>
            <div id="Tdata" ></div>
            <button  class='btn btn-sm btn-success'  type="button" style=' margin-left: 16px ; margin-top: 4px; margin-bottom: 4px;' onclick="tambah(); return false;"><i class="fa fa-plus"></i></button>
            <button class='btn btn-sm btn-danger' style='margin-top: 4px; margin-bottom: 4px;' onclick='hapusElemen()'><i class="fa fa-close"></i></button>
          
          
          </div>
        
        </div>
        <div class="row">
        <div class="container">
          <table>
          <thead class='bg-info'>
            <tr>
              <th ><label style='margin-left: 30px;' for="">No Invoice</label></th> 
              <th ><label style='margin-left: 30px;' for="">Tanggal Invoice</label></th> 
              <th ><label style='margin-left: 30px;' for="">No Po</label></th> 
              <th ><label style='margin-left: 30px;' for="">No Do</label></th> 
              <th ><label style='margin-left: 30px;' for="">Jumlah</label></th> 
              <th ><label style='margin-left: 30px;' for="">Volume</label></th> 
            </tr>
            </thead>
            
            <tbody>
            <tr style="height: 45px;">
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
            </tr>
            </tbody>
          </table>
            <div id="Tdata1" ></div>
            <button  class='btn btn-sm btn-success'  type="button" style=' margin-left: 16px ; margin-top: 4px; margin-bottom: 4px;' onclick="tambah1(); return false;"><i class="fa fa-plus"></i></button>
            <button class='btn btn-sm btn-danger' style='margin-top: 4px; margin-bottom: 4px;' onclick='hapusElemen1()'><i class="fa fa-close"></i></button>
          
          
          </div>
        </div>
       
        <div class="row">
        <div class="container">
          <table>
          <thead class='bg-info'>
            <tr>
              <th ><label style='margin-left: 30px;' for="">Hs Code :</label></th> 
              <th ><label style='margin-left: 30px;' for="">Faktur Pajak :</label></th> 
              <th ><label style='margin-left: 30px;' for="">Tanggal :</label></th> 
              <th ><label style='margin-left: 30px;' for="">Net Wett</label></th> 
            </tr>
            </thead>
            
            <tbody>
            <tr style="height: 45px;">
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
            </tr>
            </tbody>
          </table>
            <div id="Tdata2" ></div>
            <button  class='btn btn-sm btn-success'  type="button" style=' margin-left: 16px ; margin-top: 4px; margin-bottom: 4px;' onclick="tambah2(); return false;"><i class="fa fa-plus"></i></button>
            <button class='btn btn-sm btn-danger' style='margin-top: 4px; margin-bottom: 4px;' onclick='hapusElemen2()'><i class="fa fa-close"></i></button>
          
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
        
        .col-sm-6{
          margin-bottom: 4px;
        }
        
        .col-sm-2{
          width: 160px;
        }
        .col-sm{
          margin-left: 20px;
        }
        input#name_cos{
          margin-left: 60px;
        }
       input#Address_cos{
         margin-left: 54px;
       }

       input#pn_cos{
         margin-left: -11px;
       }
       input#email_cos{
         margin-left: -6px;
       }

       select#inpjk{
         margin-left: 100px;
       }
       input#dateload{
         width: 177px;
       }
       label#vessel{
         margin-left: 22px;
         margin-right: 23px;
       }
       input#descppftz{
         width: 200px
       }
       input#npwp_cos{
        margin-left: 44px;
       }
       input#pol{
         margin-left: -14px;
       }
       input#shippTerm{
        margin-left: -9px;
       }
       input#Vesseln{
         margin-left: 6px;
       }
       input#voyageno{
         margin-left: 21px;
       }
       label#eta{
         margin-left: 24px;
         margin-right: 50px;
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
      input.ca{
        width: 130px;
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
function tambah(){
$('#Tdata').append( `<tr id ="hps" style="height: 40px;" >
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                </tr>
                `).children(':last');
}
function hapusElemen() {
     $('#hps').remove();
}
function tambah1(){
$('#Tdata1').append( `<tr id='hps1' style="height: 40px;">
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
            </tr>
                `).children(':last');
}
function hapusElemen1() {
     $('#hps1').remove();
}
function tambah2(){
$('#Tdata2').append( `<tr id ="hps2" style="height: 40px;" >
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                  <td><input type="text" class="form-control ca"></td>
                </tr>
                `).children(':last');
}
function hapusElemen2() {
     $('#hps2').remove();
   }
</script>
</body>
</html>
