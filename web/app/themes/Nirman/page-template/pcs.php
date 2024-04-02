<?php
/**
 * Template Name: Pcs Page
 */

 function upsc_state_data(){

    global $wpdb;
    $page_slug=basename(get_permalink());
    //echo $page_slug; die;
    $user_query = "SELECT * FROM `wp_upsc_state_link` WHERE `state` = '$page_slug'";

    $query_results = $wpdb->get_results( $user_query, ARRAY_A );
    // return result array to prepare_items.
    return $query_results;
 }
    //print_r(upsc_state_data() ); die;

    $upsc_state_data=upsc_state_data();
?>
<!doctype html>
<?php get_header(); ?>
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">PCS</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">PCS</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Team Start -->
    <div class="container-fluid ">
        <div class="container pt-5 pb-3">

            <div class="row">

                <?php foreach ($upsc_state_data as $key => $value):?>

                    <div class="col-md-4 col-lg-3 text-center team mb-4">
                        <a href="<?php echo $value['link'];?>">
                            <div class="team-item rounded overflow-hidden mb-2">
                                <div class="team-img position-relative">
                                    <img class="" src="<?php echo get_template_directory_uri(); ?>/resources/img/study-pattern.png"
                                        alt="">
                                    <div class="team-social">

                                    </div>
                                </div>
                                <div class="current-bg p-2">
                                    <h5><?php echo $value['title'];?></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
               

            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Detail Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                       <?php global $post; ?>

                       <?php while (have_posts()):
                            the_post();

                            the_content();

                            endwhile;
                            wp_reset_query();
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
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">

                            <div class="pl-0">
                                <h6 class="m-1">Mains Practice Question (GS paper 3)-"Food processing plays a crucial
                                    role in enhancing the value of agricultural produce and..."</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">

                            <div class="pl-0">
                                <h6 class="m-1">Mains Practice Question (GS paper 3)-"Food processing plays a crucial
                                    role in enhancing the value of agricultural produce and..."</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none mb-3" href="">

                            <div class="pl-0">
                                <h6 class="m-1">Mains Practice Question (GS paper 3)-"Food processing plays a crucial
                                    role in enhancing the value of agricultural produce and..."</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

<?php get_footer(); ?>