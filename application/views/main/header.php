<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.js"></script>
    
    <script src="<?php echo base_url(); ?>asset/js/jquery.table.addrow.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
    <!--<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>-->
    <script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/script.js"></script>
    
    <!-- Page Specific Plugins -->
    <script src="<?php base_url(); ?>asset/js/morris/chart-data-morris.js"></script>
    <script src="<?php base_url(); ?>asset/js/morris/morris.js"></script>
    <script src="<?php base_url(); ?>asset/js/tablesorter/jquery.tablesorter.js"></script>
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>asset/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page Specific CSS -->
    <script src="<?php base_url(); ?>asset/js/dinamik.js"></script>

    <script src="<?php echo base_url(); ?>asset/js/dinamik.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-migrate.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.cookie.js"></script>
    <style type="text/css">
    #pop-up { display: none; }
    @media print
    {
      #non-printable { display: none; }
      #pop-up { display: block; }
    }
  </style>
    </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('dashboard/')?>">Kedai Soe-Soe Application  </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i>&nbsp;Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('dashboardLaporan/laporan_harian');?>">Per Hari</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('dashboardLaporan/laporan_bulanan');?>">Per Bulan</a></li>
              </ul>
            </li>
            <?php if($pengguna->level =='2')
          {
            
          }else{
            echo'<li class="dropdown alerts-dropdown">';
              echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-asterisk"></i> Navigasi     <b class="caret"></b></a>';
              echo'<ul class="dropdown-menu">';
                echo"<li><a href=".site_url('dashboardAdmin').">Dashboard Admin</a></li>";
                echo'<li class="divider"></li>';
                echo"<li><a href=".site_url('dashboardDapur').">Dashboard Dapur</a></li>";
                echo'<li class="divider"></li>';
                echo"<li><a href=".site_url('dashboard').">Dashboard Kasir</a></li>";
              echo'</ul>';
            echo'</li>';
            }?>
            <li class="dropdown user-dropdown" style="margin-right:30px;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              </i>
                  <i class="fa fa-user"></i> <?php echo $pengguna->nama;?>  <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li class="divider"></li>
                <li><?php echo anchor('loginControl/logout', 'Logout');?></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      
      <!-- /#wrapper -->
        
    <!-- JavaScript -->
    
    
   
    
  </body>
</html>
