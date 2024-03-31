<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package education
 */

get_header();?>
<?php if ( have_posts() ) : ?>
	<!-- Header Start -->
	<div class="container-fluid page-header">
		<div class="container">
			<div class="d-flex flex-column justify-content-center" style="min-height: 300px">
				<h3 class="display-4 text-white text-uppercase">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</h3>

			</div>
		</div>
	</div>
	<!-- Header End -->
	<?php endif; ?>

	<!-- Detail Start -->
	<div class="container-fluid py-5">
		<div class="container py-5">
			<div class="row">
				<div class="col-lg-8">
					<div class="mb-3">

						<main id="primary" class="site-main">

							<?php if ( have_posts() ) : ?>


								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/post-content', get_post_type() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>

						</main><!-- #main -->
					</div>

				</div>

				<div class="col-lg-4 mt-5 mt-lg-0">

					<!-- Category List -->
					<div class="mb-5">
						<h3 class="text-uppercase mb-4">Some Important Links</h3>
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								<a href="" class="text-decoration-none h6 m-0">Prelims Test Series 2022</a>
								<span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right"
										aria-hidden="true"></i></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								<a href="" class="text-decoration-none h6 m-0">Distance Learning Program</a>
								<span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right"
										aria-hidden="true"></i></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								<a href="" class="text-decoration-none h6 m-0">PCS</a>
								<span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right"
										aria-hidden="true"></i></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								<a href="" class="text-decoration-none h6 m-0">Practice Quiz</a>
								<span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right"
										aria-hidden="true"></i></span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center px-0">
								<a href="" class="text-decoration-none h6 m-0">Daily Current Affairs and Editorials</a>
								<span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right"
										aria-hidden="true"></i></span>
							</li>
						</ul>
					</div>

					<!-- Dates -->
					<div class="mb-5">


					</div>



					<!-- Recent Post -->
					<div class="mb-5 mt-4">
						<h3 class="text-uppercase mb-4 mt-5">Recent Post</h3>


						<?php $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 3, 
                            'post_type'=> 'post',
                            'post_status' => 'publish', 
                            'orderby'          => 'post_date',
                            'order'            => 'DESC',
                            //'posts_per_page' => -1,
                            
                        ));
                 //  print_r($recent_posts); die;
                    foreach($recent_posts as $post) : ?>
						<?php
                            
                            if(get_the_post_thumbnail($post['ID'], 'full') ){
                    
                                $articalThubUrl=get_the_post_thumbnail_url($post['ID'], 'thumbnail');
                            }else {
                                $articalThubUrl="/artical.png";
                            }

                            $permalink=get_permalink( $post['ID'] );

                            $postDaate=date("M d, Y",strtotime($post['post_date']));
                        ?>



						<a class="d-flex align-items-center text-decoration-none mb-3" href="<?php echo $permalink;?>">

							<div class="pl-0">
								<h6 class="m-1"><?php echo $post['post_title'] ?>"</h6>
								<small><?php echo $postDaate;?></small>
							</div>
						</a>

						<?php endforeach; wp_reset_query(); ?>


					</div>


				</div>
			</div>
		</div>
	</div>
	<!-- Detail End -->

<?php
get_sidebar();
get_footer();
