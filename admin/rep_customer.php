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
        Report Data Master
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Operational</li>
        <li class="active">Report Table Customer</li>
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
      <div class="row" style="margin-top: 55px;">
        <div class="col-xs-12">
          <div class="box" id="table">
            <div class="box-header with-border">
				<h4>Report Table Customer</h4>
        </div>
        <div class="panel-body text-nowrap">
				<table width="100%" class="table table-striped table-bordered table-hover" id="example4">
          <thead style="background-color:#367FA9">
            <tr>
							<th style="color: #FFFFFF">No </th>
              <th id="code_col_head" style="color: #FFFFFF">Customer ID </th>
							<th id="customer_col_head" style="color: #FFFFFF">Company</th>
              <th id="street_col_head" style="color: #FFFFFF";>Street</th>
              <th id="office_col_head" style="color: #FFFFFF";>Office</th>
              <th id="country_col_head" style="color: #FFFFFF";>Country</th>
              <th id="region_col_head" style="color: #FFFFFF";>Region</th>
              <th id="pobox_col_head" style="color: #FFFFFF";>PO BOX</th>
              <th id="language_col_head" style="color: #FFFFFF";>Language</th>
              <th id="telephonecos_col_head" style="color: #FFFFFF">Customer Telephone</th>
              <th id="exttelephonecos_col_head" style="color: #FFFFFF";>Telephone Ext</th>
              <th id="Customer_Phone_Number_col_head" style="color: #FFFFFF">Customer Phone Number</th>
              <th id="Fax_col_head" style="color: #FFFFFF";>Fax</th>
              <th id="Ext_Fax_col_head" style="color: #FFFFFF";>Ext Fax</th>
              <th id="Email_col_head" style="color: #FFFFFF";>Email</th>
              <th id='Operational_col_head' style="color: #FFFFFF";>Operational</th>
              <th id='OP_Phone_Number_col_head' style="color: #FFFFFF";>OP Phone Number</th>
              <th id='OP_Telephone_Number_col_head' style="color: #FFFFFF";>OP Telephone Number</th>
              <th id='OPTelephoneNumberExt_col_head' style="color: #FFFFFF";>OP Telephone Number Ext.</th>
              <th id='OPEmail_col_head' style="color: #FFFFFF";>OP Email</th>
              <th id='Marketing_col_head' style="color: #FFFFFF";>Marketing</th>
              <th id='MarPhoneNumber_col_head' style="color: #FFFFFF";>Mar Phone Number</th>
              <th id='MarTelephoneNumber_col_head' style="color: #FFFFFF";>Mar Telephone Number</th>
              <th id='MarTelephoneExt_col_head' style="color: #FFFFFF";>Mar Telephone Number Ext.</th>
              <th id='MarEmail_col_head' style="color: #FFFFFF";>Mar Email</th>
              <th id='action_col_head' style="color: #FFFFFF"; ></th>
              <th id='action_col_head' style="color: #FFFFFF"; ></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
              $sql = "SELECT * FROM customer";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
                    echo 
                    "
            <tr>
              <td align='center'>".$no."</td>
              <td class='code_col' align='left'>".$row['code']."</td>
              <td class='customer_col' align='left'>".$row['name_cos']."</td>
              <td class='street_col' align='left'>".$row['street']."</td>
              <td class='office_col' align='left'>".$row['office']."</td>
              <td class='country_col' align='left'>".$row['country']."</td>
              <td class='region_col' align='left'>".$row['region']."</td>
              <td class='pobox_col' align='left'>".$row['po_box']."</td>
              <td class='language_col' align='left'>".$row['language']."</td>
              <td class='telephonecos_col' align='left'>".$row['telphone']."</td>
              <td class='exttelephonecos_col' align='left'>".$row['ext_t']."</td>
              <td class='Customer_Phone_Number_col' align='left'>".$row['phone_number']."</td>
              <td class='Fax_col' align='left'>".$row['fax']."</td>
              <td class='Ext_Fax_col' align='left'>".$row['ext_f']."</td>
              <td class='Email_col' align='left'>".$row['email']."</td>
              <td class='Operational_col' align='left'>".$row['name_op']."</td>
              <td class='OP_Phone_Number_col' align='left'>".$row['phone_number_op']."</td>
              <td class='OP_Telephone_Number_col' align='left'>".$row['telephone_op']."</td>
              <td class='OPTelephoneNumberExt_col' align='left'>".$row['ext_t_o']."</td>
              <td class='OPEmail_col' align='left'>".$row['email_op']."</td>
              <td class='Marketing_col' align='left'>".$row['name_mar']."</td>
              <td class='MarPhoneNumber_col' align='left'>".$row['phone_number_mar']."</td>
              <td class='MarTelephoneNumber_col' align='left'>".$row['telephone_mar']."</td>
              <td class='MarTelephoneExt_col' align='left'>".$row['ext_m']."</td>
              <td class='MarEmail_col' align='left'>".$row['email_mar']."</td>
              <td class='action_col' align='center'>
                <a href='edit_delete/edit_customer.php?code=".$row['code']."' class='btn btn-success btn-sm' ><i class='fa fa-edit'></i> Edit</a>
              </td>
              <td class='action_col' align='center'>
                <a  href='delete_customer.php?code=".$row['code']."' class='btn btn-danger btn-sm' ><i class='fa fa-trash-o'></i> Delete</a>
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
    </section>   
  </div>
  
<style>
   .container.col-lg-12{
     width: 450px;
   }
  input[type='checkbox']{
    margin-right: 4px;
  }

    th{
      font-weight: lighter;
    }
    button.btn.btn-default{
   margin-left: 4px;
   margin-right: 4px;
 }
</style>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
