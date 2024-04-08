<?php
/**
 * Template Name: Essy

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
if (wp_get_post_parent_id(get_the_ID()))
{
$parentPageTitle="MAIN";
}else{
$parentPageTitle="PRELIMS";
}
?>

<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Essy</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"><?php echo $parentPageTitle;?></i>
                <p class="m-0 text-uppercase">Essay</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h1>Essy</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="row">

                <?php $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'essay',
                        'posts_per_page' => -1,
                        'orderby' => 'ID',
                        'order' => 'DESC',
                    );

                    $previousYearPaper = get_posts($args);
                    //print_r($previousYearPaper); die;
                    foreach ($previousYearPaper as $value) :?>

                    <?php
                        $postDaate=date("M d, Y",strtotime($value->post_date));

                        if(get_the_post_thumbnail($value->ID, 'full') ){

                        $articalThubUrl=get_the_post_thumbnail_url($value->ID, 'thumbnail');
                        }else {
                        $articalThubUrl="/artical.png";
                        }

                        $permalink=get_permalink( $value->ID );
                        // echo $newsLink; die;
                        $file = get_field( 'previous-year-paper', $value->ID );
                        //print_r($file); die;
                    ?>

                    <div class="col-md-6 col-lg-6 text-center team mb-4">
                        <div class="team-item rounded overflow-hidden mb-2">

                            <a href="<?php echo $permalink; ?>">
                                <div class="bg-secondary p-4">

                                    <h5><?php echo $value->post_title;?></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $postDaate;?></p>
                                </div>
                            </a>
                        </div>
                    </div>

                   
                    <?php endforeach;   ?>

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




                  <!-- Recent Post -->
                  <div class="mb-5 mt-4">
                      <h3 class="text-uppercase mb-4 mt-5">Recent Post</h3>


                      <?php $recent_posts = wp_get_recent_posts(
                        array(
                            'numberposts' => 3,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            //'posts_per_page' => -1,
                    
                        )
                    );
                    //  print_r($recent_posts); die;
                    foreach ($recent_posts as $post): ?>
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
                              <h6 class="m-1">
                                  <?php echo $post['post_title'] ?>"
                              </h6>
                              <small>
                                  <?php echo $postDaate; ?>
                              </small>
                          </div>
                      </a>

                      <?php endforeach;
                    wp_reset_query(); ?>


                  </div>


              </div>
            

        </div>

    </div>
</div>
<!-- Courses End -->


<?php get_footer(); ?>