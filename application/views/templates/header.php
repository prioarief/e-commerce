<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/Users/img/icon.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>TokoLapak | <?php echo $title; ?></title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/linearicons.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/mystyle.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/themify-icons.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/nouislider.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/magnific-popup.css">
	
	<link rel="stylesheet" href="<?= base_url(); ?>assets/Users/css/main.css">
</head>

<body>

<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url(); ?>"><img src="<?= base_url() ?>assets/Users/img/shopLogo1.png" alt="logo"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
							<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>Transaksi/CartShop"><i class="fa fa-shopping-cart"></i> Cart <span class="text-danger">(<?= $countCart; ?>)</span></a></li>
							  
							
							<?php if($this->session->userdata('email')){?>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false"><i class="fa fa-user"></i> <?=$user['username']; ?> <?=$userr['username']; ?></a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>User/Profile/<?= $this->session->userdata('username')  ?>"><i class="fa fa-user"></i> Profile</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= base_url() ?>Auth/Logout"><i class="fa fa-sign-out"></i> Logout</a></li>
								</ul>
							</li>
							<?php } ?>
							

						</ul>
						<!-- <ul class="nav navbar-nav navbar-right">

							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul> -->
					</div>
				</div>
			</nav>
		</div>
		
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<img src="<?= base_url() ?>assets/Users/img/logo2.png" class="logo" alt="logo">
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
