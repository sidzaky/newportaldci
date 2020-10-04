<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" id="sidebar-app">
      <!-- Optionally, you can add icons to the links -->
      <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-pie-chart"></i> <span>Dashboard</span></a></li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users "></i> <span>Visitor Menu</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url(); ?>visitor">Visitor Management</a></li>
          <li><a href="<?php echo base_url(); ?>visitor">DC Request</a></li>
          <li><a href="<?php echo base_url(); ?>visitor">Jadwal Masuk DC</a></li>
        </ul>
      </li>

      <li><a href="<?php echo base_url(); ?>pmslan"><i class="fa fa-usb"></i> <span>Pms Lan</span></a></li>
      <li><a href="<?php echo base_url(); ?>pmslan"><i class="fa fa-briefcase"></i> <span>Asset Management</span></a></li>
      <li><a href="<?php echo base_url(); ?>pmslan"><i class="fa fa-book"></i> <span>Document</span></a></li>
      <li><a href="<?php echo base_url(); ?>pmslan"><i class="fa fa-cogs"></i> <span>Controll Panel</span></a></li>
      <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-power-off"></i> <span>Log Out</span></a></li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>