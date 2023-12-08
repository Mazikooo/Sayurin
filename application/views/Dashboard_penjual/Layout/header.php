<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url('assets/img/daun.png') ?>" type="image/ico" />

    <title>Admin Sayurin</title>

  <!-- Bootstrap -->
<link href="<?php echo base_url('admin/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url('admin/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
<!-- 
<link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">

<link href="<?php echo base_url('admin/vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">


<link href="<?php echo base_url('admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">

<link href="<?php echo base_url('admin/vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
 -->
<link href="<?php echo base_url('admin/vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?php echo base_url('admin/build/css/custom.min.css'); ?>" rel="stylesheet"> 

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Dashboard Penjual</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/img/user.png') ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">

              <!-- Gunakan var_dump() untuk memeriksa nilai variabel -->



                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('Username')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">

                  <li><a href="<?php echo site_url('Dashboard_penjual');?>"><i class="fa fa-users"></i> Penjualan <span class=""></span></a>
                  </li>

                  

                  <li><a href="<?php echo site_url('Dashboard_penjual/Kategori');?>"><i class="fa fa-newspaper-o"></i> Kategori <span class=""></span></a>
                  </li>

              </div>
              
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo site_url('Dashboard_penjual/logout');?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"> </i> <?php echo $this->session->userdata('penjual'); ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                   
                    <a class="dropdown-item"  href="<?php echo site_url('Dashboard_penjual/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->