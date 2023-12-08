<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Sayurin</title>
	

	<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-l132-U8I07f3_lBP"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/daun.png') ?>">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css') ?>">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css') ?>">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css') ?>">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/meanmenu.min.css') ?>">
	<!-- main style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">
	

</head>
<body>
	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="<?php echo site_url('Main');?>">
								<img src="<?php echo base_url('assets/img/LOGO1-removebg (2).png') ?>" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="<?php echo site_url('Main');?>">Home</a>
									
								</li>
								<li><a href="<?php echo site_url('About');?>">About</a></li>
								<!-- menu start <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li>-->
								<li><a href="<?php echo site_url('News');?>">News</a>
									
								</li>
								<li><a href="<?php echo site_url('Contact');?>">Contact</a></li>
								<li><a href="<?php echo site_url('Shop');?>">Shop</a>
									
								</li>

								
								<li>
    <?php if(empty($this->session->userdata('member'))){ ?>
        <div class="header-icons">
            <a class="Register" href="<?php echo site_url('Register');?>">Register</a>
			<a class="Register" href="<?php echo site_url('Register/login_member');?>">Login</a>
        </div>
    <?php } else { ?>
        <div class="header-icons">
            <a class="Register">Welcome, <?php echo $this->session->userdata('member'); ?>!</a>
            <a class="shopping-cart" href="<?php echo site_url('Cart');?>"><i class="fas fa-shopping-cart"></i></a>
            <a class="Register" href="<?php echo site_url('Register/logout');?>">Logout</a>
            <!-- menu end <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>-->
        </div>
    <?php }?> 
</li>

							</ul>
						</nav>

						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->




					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->