
<!-- Footer Start -->
<div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
	<div class="container">
		<div class="row pt-5">

			<div class="col-lg-4 col-md-12 mb-5">
				<h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Newsletter</h5>
				<p><?php the_custom_logo(); ?></p>
				<p><?php if ( is_active_sidebar( 'newsletter' ) ) { ?>
					<?php dynamic_sidebar('newsletter'); ?>
					<?php } ?></p>
				<div class="w-100">
				</div>
			</div>
			
			<div class="col-lg-8 col-md-12">
				<div class="row">

					<div class="col-md-4 mb-5">
						<h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Our Courses</h5>
						<div class="d-flex flex-column justify-content-start">
						
							<?php
							if ( has_nav_menu( 'menu-1' ) ) {
								wp_nav_menu( array( 
									'theme_location' => 'our_cources',
									'add_a_class' => 'text-white mb-2', // By filter in function
									'menu_class' => 'navbar-nav ml-auto'
									) ); 
								}
							?>

						</div>
					</div>

					<div class="col-md-3 mb-5">
						<h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Useful links</h5>
						<div class="d-flex flex-column justify-content-start">
							<?php
							if ( has_nav_menu( 'menu-1' ) ) {
									 wp_nav_menu( array(
										'theme_location' => 'useful_links',
										//'add_li_class' => 'nav-item',
										'add_a_class' => 'text-white mb-2', // By filter in function
										'menu_class' => 'navbar-nav ml-auto',
										//'items_wrap' => '%3$s',
									)); 
								}
							?>

						</div>
					</div>

					<?php if ( is_active_sidebar( 'get_in_tuch' ) ) { ?>
						<?php dynamic_sidebar('get_in_tuch'); ?>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
	style="border-color: rgba(256, 256, 256, .1) !important;">
	<div class="row">
		<div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
			<p class="m-0 text-white">&copy; All Rights Reserved by <a href="#">Nirman IAS</a>
			</p>
		</div>
		<div class="col-lg-6 text-center text-md-right">
			<!-- <ul class="nav d-inline-flex">
				<li class="nav-item">
					<a class="nav-link text-white py-0" href="#">Privacy</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white py-0" href="#">Terms</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white py-0" href="#">FAQs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white py-0" href="#">Help</a>
				</li>
			</ul> -->

			<?php
				if ( has_nav_menu( 'menu-1' ) ) {
							wp_nav_menu( array(
							'theme_location' => 'footer_links',
							'menu_class' => 'nav d-inline-flex',
							'add_li_class' => 'nav-item',
							'add_a_class' => 'nav-link text-white py-0', // By filter in function
							//'items_wrap' => '%3$s',
							 
						)); 
					}
				?>
		</div>
	</div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/lib/easing/easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?php echo get_template_directory_uri(); ?>/resources/mail/jqBootstrapValidation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/resources/mail/contact.js"></script>
<!-- Template Javascript -->

<!-- Template Javascript -->
<script src="<?php echo get_template_directory_uri(); ?>/resources/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>