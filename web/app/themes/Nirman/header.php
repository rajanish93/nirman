<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Nirman IAS</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Nirman IAS" name="keywords">
	<meta content="Nirman IAS" name="description">

	<!-- Favicon -->
	<link href="<?php echo get_template_directory_uri(); ?>/resources/img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Customized Bootstrap Stylesheet -->

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="<?php echo get_template_directory_uri(); ?>/resources/lib/owlcarousel/assets/owl.carousel.min.css"
		rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?php echo get_template_directory_uri(); ?>/resources/css/style.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body>
	<!-- Topbar Start -->
	<div class="container-fluid d-none d-lg-block light-red">
		<div class="container">
			<div class="row align-items-center  px-xl-5">
				<div class="col-lg-3">

					<!-- <img src="<?php echo get_template_directory_uri(); ?>/resources/img/logo.png"> -->
					<?php the_custom_logo(); ?>

				</div>
				<div class="col-lg-3 text-right">
					<div class="d-inline-flex align-items-center">
						<i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
						<div class="text-left">
							<h6 class="font-weight-semi-bold mb-1">Our Office</h6>
							<small><?php if ( is_active_sidebar( 'office' ) ) { ?>
								<?php dynamic_sidebar('office'); ?>
								<?php } ?></small>
						</div>
					</div>
				</div>
				<div class="col-lg-3 text-right">
					<div class="d-inline-flex align-items-center">
						<i class="fa fa-2x fa-envelope text-primary mr-3"></i>
						<div class="text-left">
							<h6 class="font-weight-semi-bold mb-1">Email Us</h6>
							<small><?php if ( is_active_sidebar( 'email' ) ) { ?>
								<?php dynamic_sidebar('email'); ?>
								<?php } ?></small>
						</div>
					</div>
				</div>
				<div class="col-lg-3 text-right">
					<div class="d-inline-flex align-items-center">
						<i class="fa fa-2x fa-phone text-primary mr-3"></i>
						<div class="text-left">
							<h6 class="font-weight-semi-bold mb-1">Call Us</h6>
							<small><?php if ( is_active_sidebar( 'phone' ) ) { ?>
								<?php dynamic_sidebar('phone'); ?>
								<?php } ?></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Topbar End -->


	<!-- Navbar Start -->
	<div class="container-fluid bg-red  navbar-sticky">
		<div class="container-fluid">

			<nav class="navbar navbar-expand-lg  navbar-light py-3 py-lg-0 px-0" style="margin: auto;">
				<a href="index.html" class="text-decoration-none d-block d-lg-none">
					<h1 class="m-0"><img src="<?php echo get_template_directory_uri(); ?>/resources/img/logo.png"></h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<div class="navbar-nav py-0">
						<?php
							if ( has_nav_menu( 'menu-1' ) ) {
								wp_nav_menu( array( 
									'menu' => 'menu',
									'container' => 'div',
									'container_class' => 'container_class',
									'container_id' => 'container_id',
									'menu_class' => 'nav-item dropdown',
									'items_wrap' => '<div id="%1$s" class="navbar-nav py-0">%3$s</div>',
									'item_spacing' => 'preserve',
									'theme_location' => 'menu-1',
									//'add_li_class' => 'nav-item',
									'add_a_class' => 'nav-item nav-link',
									
									) ); 
								}
							?>
					</div>

				</div>
			</nav>


		</div>
	</div>
	<!-- Navbar End -->
