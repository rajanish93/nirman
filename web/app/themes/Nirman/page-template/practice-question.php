<?php
/**
 * Template Name: Practice Question

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
?>

<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Editorial</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Current Affairs </p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Editorial </p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">

                <h1>PRACTICE QUESTIONS</h1>
            </div>

            <div class="row">
                <div class="col-lg-8">

                   <?php the_content(); ?>

                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">


                    <div class="rounded overflow-hidden mb-2">

                        <div class="bg-secondary p-4">

                            <div class="h5" href="">To View Editorial, please select date below</div>
                            <div class="border-top mt-4 pt-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="date-pciker-outer"><input type="text"
                                                class="form-control form-control-lg" placeholder="Date"></div>
                                    </div>
                                </div>
                                <div class="row mt-4 pt-2"><button class="btn btn-primary py-2 px-4 m-auto"
                                        type="submit" id="sendMessageButton">Submit</button></div>
                                <div class="clearfix"></div>

                            </div>

                        </div>

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
            <div class="row text-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="rounded overflow-hidden mb-2 ">

                        <div class="bg-secondary p-4">

                            <div class="h5" href="">today Editorial Annalysis</div>
                            <div class="border-top mt-4">
                                <div class="row">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/RCd_WC2nsQg?si=JG-kR93GohOfjlAu"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe> </div>

                                </div>
                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->


<?php get_footer(); ?>