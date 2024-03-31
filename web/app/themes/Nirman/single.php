<?php
/**
 * Template Name: Syllabus

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
?>

<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid page-header">
	<div class="container">
		<div class="d-flex flex-column justify-content-center" style="min-height: 300px">
			<h3 class="display-4 text-white text-uppercase">Blog </h3>
			
		</div>
	</div>
</div>
<!-- Header End -->


<!-- Detail Start -->
<div class="container-fluid py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-lg-8">
				<div class="mb-3">

					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/post-content', get_post_type() );

							// the_post_navigation(
							// 	array(
							// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'education' ) . '</span> <span class="nav-title">%title</span>',
							// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'education' ) . '</span> <span class="nav-title">%title</span>',
							// 	)
							// );

							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;

						endwhile; // End of the loop.
						?>
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

<?php get_footer(); ?>