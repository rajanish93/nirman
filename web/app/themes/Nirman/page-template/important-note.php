<?php
/**
 * Template Name: Important Note

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
            <h3 class="display-4 text-white text-uppercase"><?php echo $parentPageTitle;?> </h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase"><?php echo $parentPageTitle;?></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase"><?php the_title(); ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Courses Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h1>Important Notes</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                <?php $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'important-note',
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

                    <div class="col-md-3 col-lg-3 text-center team mb-4">
                        <div class="team-item rounded overflow-hidden mb-2">
                            <div class="bg-secondary p-4">
                                <a href="<?php echo $permalink; ?>">
                                    <h5><?php echo $value->post_title;?></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $postDaate;?></p>
                                 </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php endforeach;   ?>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- Courses End -->


<?php get_footer(); ?>