<!DOCTYPE html>
<html>
	<head>
		<title>Digital Dairy</title>

		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
		
	    <link rel="stylesheet" href="<?php echo base_url() ?>css/custom.css">
	    <link rel="stylesheet" href="<?php echo base_url() ?>css/custom_bootstrap.css">
	    
	    <!-- js -->
	    <script src="<?php echo base_url() ?>js/jquery-2.1.3.min.js"></script>
	    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	</head>

	<body id="page">
		<div class="container">	
			<header id="site-header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-8">
						<div class="logo">
							<h1><a href="index.html"><b>Digital Diary</a></h1>
						</div>
					</div><!-- col-md-4 -->
					<div class="col-md-8 col-sm-7 col-xs-4">
						<nav class="main-nav" role="navigation">
							<div class="navbar-header">
  								<button type="button" id="trigger-overlay" class="navbar-toggle">
    								<span class="ion-navicon"></span>
  								</button>
							</div>

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  								<ul class="nav navbar-nav navbar-right">
    								<li class="cl-effect-11"><a href="<?php echo base_url() ?>" data-hover="Home">Home</a></li>
    								<li class="cl-effect-11"><a href="<?php echo base_url('registration'); ?>" data-hover="Registration">Registration</a></li>
    								<li class="cl-effect-11"><a href="about.html" data-hover="About">About</a></li>
    								<li class="cl-effect-11"><a href="contact.html" data-hover="Contact">Contact</a></li>
  								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
						<div id="header-search-box">
							<a id="search-menu" href="#"><span id="search-icon" class="ion-ios-search-strong"></span></a>
							<div id="search-form" class="search-form">
								<form role="search" method="get" id="searchform" action="#">
									<input type="search" placeholder="Search" required>
									<button type="submit"><span class="ion-ios-search-strong"></span></button>
								</form>				
							</div>
						</div>
					</div><!-- col-md-8 -->
				</div>
			</header>
		</div>
