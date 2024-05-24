<?php

/**
 * Template Name: Blog
 * Template Post Type: post, page
 * The template for displaying Blog
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
?>
<!doctype html>
<?php get_header(); ?>
<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row pb-3">


                    <?php $recent_posts = wp_get_recent_posts(array(
                        //'numberposts' => 3, 
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC',
                        'posts_per_page' => -1,

                    ));
                    //  print_r($recent_posts); die;
                    foreach ($recent_posts as $post) : ?>
                        <?php
                        //$post_thum_image = get_field( 'post_thumbnail_image',$post['ID'] );

                        if (get_the_post_thumbnail($post['ID'], 'full')) {
                            // echo 343434; die;
                            $articalThubUrl = get_the_post_thumbnail_url($post['ID'], 'full');
                        } else {
                            // echo 11; die;
                            $articalThubUrl = "/artical.png";
                        }

                        $categories = get_the_category();

                        if (!empty($categories)) {
                            $cateName = $categories[0]->name;
                        }

                        $permalink = get_permalink($post['ID']);
                        $postDaate = date("M d, Y", strtotime($post['post_date']));
                        ?>

                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="<?php echo $articalThubUrl ?>" alt="" />
                                <!-- <p><a class="btn btn-light-gray" href="<?php echo $permalink; ?>">READ more</a>
								</p> -->
                                <a class="blog-overlay text-decoration-none" href="<?php echo $permalink; ?>">
                                    <h5 class="text-white mb-3"><?php echo $post['post_title'] ?></h5>
                                    <p class="text-primary m-0"><?php echo $postDaate; ?></p>
                                </a>
                            </div>
                        </div>

                    <?php endforeach;
                    wp_reset_query(); ?>


                    <!-- <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Author Bio -->
                <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/resources/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                    <h3 class="text-primary mb-3">John Doe</h3>
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tag Cloud</h3>
                    <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit
                        no ut est ipsum erat kasd amet elitr</p>
                </div>

                <!-- Search Form -->
                <div class="mb-5">
                    <form role="search" action="">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Keyword" name="s">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Categories</h3>

                    <ul class="list-group list-group-flush">

                        <?php $categories = get_categories();
                        foreach ($categories as $category) {
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="' . get_category_link($category->term_id) . '"
                                    class="text-decoration-none h6 m-0">' . $category->name . '</a>
                                 <span class="badge badge-primary badge-pill">' . $category->category_count . '</span>
                            </li>';
                        } ?>


                    </ul>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h3>




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
                            <img class="img-fluid rounded" width="80" src="<?php echo $articalThubUrl ?>" alt="">
                            <div class="pl-3">
                                <h6 class="m-1"><?php echo $post['post_title'] ?></h6>
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
<!-- Blog End -->

<?php get_footer(); ?>