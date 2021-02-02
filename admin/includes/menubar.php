<style>
.sidebar-item {
	position: fixed;
	top: 0;
	left: 0;
}
</style>

<aside class="main-sidebar sidebar-item">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['level']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
	    	<li class="treeview"><a href="#"><i class="fa fa-check-square"></i>
            <span style="color: white; font-size: 18px;"><b>OPERATIONAL</b></span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span> </a>
          <ul class="treeview-menu">
            <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="rep_joborder.php"><i class="fa fa-briefcase"></i> <span>Job Order</span></a></li>
            <li ><a href="blankInput_master.php"><i class="fa fa-file-text"></i><span>Data Master</span> </a></li>
           

          <li class="treeview"><a href="#"><i class="fa fa-check-square"></i>
            <span style="color: white; font-size: 14px;"><b>Container Document</b></span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span> </a>
            <ul class="treeview-menu">
              <li ><a href="suratJalan.php"><i class="fa fa-file-text-o"></i><span>Surat Jalan</span></a></li>
              <li ><a href="surat_jalan.php"><i class="fa fa-file-text-o"></i><span>Surat Jalan</span></a></li>
              <li ><a href="Bast.php"><i class="fa fa-newspaper-o "></i><span>Berita Acara (BAST)</span></a></li>
              <li ><a href="rep_Bast.php"><i class="fa fa-newspaper-o"></i><span>Report BAST</span></a></li>
              <li ><a href="packingList.php"><i class="fa fa-cube"></i><span>Packing List Standard</span></a></li>
              <li ><a href="rep_packingList.php"><i class="fa fa-cube"></i><span>Report Packing</span></a></li>
              <li ><a href="insurance.php"><i class="fa fa-shield"></i><span>Insurance</span></a></li>
              <li ><a href="rep_insurance.php"><i class="fa fa-shield"></i><span>Report Insurance</span></a></li>
              <li ><a href="shipping_intruction.php"><i class="fa fa-truck"></i><span>Shipping Intruction</span></a></li>
              <li><a href="schedship.php"><i class="fa fa-clock-o"></i> <span>Vessel Schedule</span></a></li>
              <li><a href="rep_vessel_schedule.php"><i class="fa fa-ship"></i> <span>Report Schedule Kapal</span></a></li>
            </ul>
          </li>

          <li class="treeview"><a href="#"><i class="fa fa-check-square"></i>
            <span style="color: white; font-size: 14px;"><b>Activity Control</b></span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span> </a>
            <ul class="treeview-menu">
              <li ><a href="rep_delivery.php"><i class="fa fa-table"></i><span>Delivery Report</span></a></li>
              <li><a href="rep_dooring.php"><i class="fa fa-bar-chart"></i> <span>Report Dooring</span></a></li>
              <li><a href="blankData_master.php"> <i class="fa fa-book"></i><span>Report Master Data</span></a></li>

            </ul>
          </li>

		    	</ul>
        </li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>