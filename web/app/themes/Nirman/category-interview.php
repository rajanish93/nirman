<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package education
 */

get_header();
?>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Interview</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Interview</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">

        <div class="row pb-3">


            <?php

            $args = array(
                'post_status' => 'publish',
                'post_type' => 'ourvideo',
                'posts_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'DESC',
                'category' => 21
            );

            $dailynews = get_posts($args);
            foreach ($dailynews as $value): ?>

                <?php
                $you_tube_link = get_field( 'you_tube_link', $value->ID );
                $postDaate = date("M d, Y", strtotime($value->post_date));

                if (get_the_post_thumbnail($value->ID, 'full')) {

                    $articalThubUrl = get_the_post_thumbnail_url($value->ID, 'thumbnail');
                } else {
                    $articalThubUrl = "/artical.png";
                }

                $newsLink = get_permalink($value->ID);
                // echo $newsLink; die;
                ?>

                <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img class="img-fluid" src="<?php echo $articalThubUrl;?>" alt="">
                            <a target="_blank" href="<?php echo $you_tube_link;?>"
                                class="popup-youtube light video-play-button item-center">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>


<?php get_footer(); ?>