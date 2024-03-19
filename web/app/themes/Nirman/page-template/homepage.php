<?php
/**
 * Template Name: Home Page

 */
?>
<?php get_header(); ?>

<!-- Carousel Start -->
<?php echo do_shortcode('[homepageslider]');?>
<!-- Carousel End -->

<!-- Courses Start -->

<?php echo do_shortcode('[popular_corce]');?>
<!-- Courses End -->

<!-- Testimonial Start -->
<?php echo do_shortcode('[current_affair]');?>
<!-- Testimonial End -->

<!--Achivment Start -->
<div class="container-fluid bg-achivments py-5">
  <div class="container">
    <div class="row">
      <div class="four col-md-3">
        <div class="counter-box "> <span class="counter">1000</span>
          <p>Students</p>
        </div>
      </div>
      <div class="four col-md-3">
        <div class="counter-box"> <span class="counter">100</span>
          <p>Selection</p>
        </div>
      </div>
      <div class="four col-md-3">
        <div class="counter-box"> <span class="counter">289</span>
          <p>Available Products</p>
        </div>
      </div>
      <div class="four col-md-3">
        <div class="counter-box"> <span class="counter">1563</span>
          <p>Saved Trees</p>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- Achivment End -->

<!-- Our Video -->
<div class="container-fluid py-5">
  <div class="container pt-5 pb-3">
    <div class="text-center mb-5">
      <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Video</h5>
    </div>

    <div class="row pb-3">
      <?php echo do_shortcode('[ourvideo]');?>

    </div>
  </div>
</div>
</div>
<!-- Our Video End -->

<!-- app download Start -->
<div class="container-fluid bg-registration py-5" style="margin:0  0 0px;">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="mb-4">
          <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Need Any Courses</h5>
          <h1 class="text-white">Nirman IAS Academy is now on your Phone</h1>
        </div>
        <p class="text-white">Get access all the classroom recorded videos, online test, classroom timings
          and much more after registration with Vajirao IAS Academy Android App. Only available at
          Playstore.</p>
        <ul class="list-inline text-white m-0">
          <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Live Classes.</li>
          <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>All India Test Series.</li>
          <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Current Affairs.</li>

        </ul>
        <p><img src="<?php echo get_template_directory_uri(); ?>/resources/img/play-store.png"></p>

      </div>
      <div class="col-lg-5">
        <div class="card border-0">
          <div class="card-header bg-light text-center p-4">
            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/download-app.png" width="100%">
          </div>

        </div>
      </div>
    </div>

  </div>

</div>
<!-- app download End -->

<!-- Testimonial Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="text-center mb-5">
      <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Testimonial</h5>
      <h1>What Say Our Students</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="owl-carousel testimonial-carousel">
          <?php echo do_shortcode('[testmimonial]');?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Testimonial End -->

<?php global $post; ?>

<?php while (have_posts()):
  the_post();

  //the_content();

endwhile;
wp_reset_query();
?>

<?php get_footer(); ?>