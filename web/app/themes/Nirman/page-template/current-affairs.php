<?php

/**
 * Template Name: Current Affairs

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
?>

<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Current Affairs</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Current Affairs</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="text-center mb-5">

            <h1>Current Affairs</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rounded overflow-hidden mb-2">

                    <div class=" current-bg  p-4">

                        <a class="h5" href=""><i class="fa fa-newspaper text-white mr-2"></i> Daily News</a>

                    </div>

                    <div class="bg-secondary p-4">

                        <div class="">
                            <?php

                            $args = array(
                                'post_status' => 'publish',
                                'post_type' => 'dailynews',
                                'posts_per_page' => 4,
                                'orderby' => 'ID',
                                'order' => 'ASC',
                            );

                            $dailynews = get_posts($args);
                            foreach ($dailynews as $value) : ?>

                                <?php
                                $postDaate = date("M d, Y", strtotime($value->post_date));

                                if (get_the_post_thumbnail($value->ID, 'full')) {

                                    $articalThubUrl = get_the_post_thumbnail_url($value->ID, 'thumbnail');
                                } else {
                                    $articalThubUrl = "/artical.png";
                                }

                                $newsLink = get_permalink($value->ID);
                                // echo $newsLink; die;
                                ?>

                                <a class="d-flex align-items-center text-decoration-none mb-3" href="<?php echo $newsLink; ?>">
                                    <img class="img-fluid rounded" src="<?php echo $articalThubUrl; ?>" alt="">
                                    <div class="pl-3">
                                        <h6 class="m-1"><?php echo $value->post_title; ?></h6>
                                        <small><i class="fa fa-calendar"></i><?php echo $postDaate; ?></small>
                                    </div>
                                </a>
                            <?php endforeach;   ?>


                            <div class="row mt-4">
                                <a href="<?php echo home_url("/current-affairs/"); ?>" class="btn btn-primary py-2 px-4 m-auto">Learn More</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="rounded overflow-hidden mb-2">

                    <div class=" current-bg  p-4">

                        <a class="h5" href=""><i class="fa fa-pen text-white mr-2"></i> Important Editorials</a>

                    </div>

                    <div class="bg-secondary p-4">

                        <div class="">

                            <?php

                            $args = array(
                                'post_status' => 'publish',
                                'post_type' => 'editorials',
                                'posts_per_page' => 4,
                                'orderby' => 'ID',
                                'order' => 'ASC',
                            );

                            $editorials = get_posts($args);
                            foreach ($editorials as  $value) : ?>

                                <?php
                                $postDaate = date("M d, Y", strtotime($value->post_date));

                                if (get_the_post_thumbnail($value->ID, 'full')) {

                                    $articalThubUrl = get_the_post_thumbnail_url($value->ID, 'thumbnail');
                                } else {
                                    $articalThubUrl = "/artical.png";
                                }

                                $editorialsLink = get_permalink($value->ID);

                                ?>

                                <a class="d-flex align-items-center text-decoration-none mb-3" href="<?php echo $editorialsLink; ?>">
                                    <img class="img-fluid rounded" src="<?php echo $articalThubUrl; ?>" alt="">
                                    <div class="pl-3">
                                        <h6 class="m-1"><?php echo $value->post_title; ?></h6>
                                        <small><i class="fa fa-calendar"></i><?php echo $postDaate; ?></small>
                                    </div>
                                </a>
                            <?php endforeach;   ?>
                            <div class="row mt-4">
                                <a href="<?php echo home_url("/editorial/"); ?>" class="btn btn-primary py-2 px-4 m-auto">Learn More</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0">

                <!-- Category List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Some Important Links</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Prelims Test Series 2022</a>
                            <span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Distance Learning Program</a>
                            <span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">PCS</a>
                            <span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Practice Quiz</a>
                            <span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="" class="text-decoration-none h6 m-0">Daily Current Affairs and Editorials</a>
                            <span class="badge badge-primary badge-pill"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </li>
                    </ul>
                </div>


                <!-- Recent Post -->
                <div class="mb-5 mt-4">
                    <h3 class="text-uppercase mb-4 mt-5">Recent Post</h3>


                    <?php $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 3,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC',
                        //'posts_per_page' => -1,

                    ));
                    //  print_r($recent_posts); die;
                    foreach ($recent_posts as $post) : ?>
                        <?php

                        if (get_the_post_thumbnail($post['ID'], 'full')) {

                            $articalThubUrl = get_the_post_thumbnail_url($post['ID'], 'thumbnail');
                        } else {
                            $articalThubUrl = "/artical.png";
                        }

                        $permalink = get_permalink($post['ID']);

                        $postDaate = date("M d, Y", strtotime($post['post_date']));
                        ?>



                        <a class="d-flex align-items-center text-decoration-none mb-3" href="<?php echo $permalink; ?>">

                            <div class="pl-0">
                                <h6 class="m-1"><?php echo $post['post_title'] ?>"</h6>
                                <small><?php echo $postDaate; ?></small>
                            </div>
                        </a>

                    <?php endforeach;
                    wp_reset_query(); ?>


                </div>


                <!-- Tag Cloud -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                    <div class="d-flex flex-wrap m-n1">

                        <?php
                        $tags = get_tags();
                        // print_r($tags); die;
                        foreach ($tags as $tag) :

                            $tag_link = get_tag_link($tag->term_id);

                        ?>
                            <a href="<?php echo $tag_link; ?>" class="btn btn-outline-primary m-1"><?php echo $tag->name; ?> </a>

                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Courses End -->


<?php get_footer(); ?>