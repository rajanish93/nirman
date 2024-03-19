<?php
	get_header();
	$pid = get_the_id();
	$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

?>
<div class="container-fluid page-header" style="margin-bottom: 90px;">
	<div class="container">
		<div class="d-flex flex-column justify-content-center" style="min-height: 300px">
			<h3 class="display-4 text-white text-uppercase">About</h3>
			<div class="d-inline-flex text-white">
				<p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
				<i class="fa fa-angle-double-right pt-1 px-3"></i>
				<p class="m-0 text-uppercase">About</p>
			</div>
		</div>
	</div>
</div>

<?php the_content(); ?>



<?php  get_footer(); ?>