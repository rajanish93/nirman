<?php
/**
 * Template Name: Previous Year Ppaper

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
if (wp_get_post_parent_id(get_the_ID()))
{
$parentPageTitle="MAIN";
$metaValue="Main";
}else{
$parentPageTitle="PRELIMS";
$metaValue="Prelims";
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
            <h1>Previous year pape</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                <?php $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'previous-year-paper',
                        'posts_per_page' => -1,
                        'orderby' => 'ID',
                        'order' => 'DESC',
                        'meta_key' => 'for_mainprelims',
                        'meta_value' => $metaValue
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

                        $newsLink=get_permalink( $value->ID );
                        // echo $newsLink; die;
                        $file = get_field( 'previous_year_paper', $value->ID );
                        //print_r($file); die;
                    ?>

                    <div class="col-md-3 col-lg-3 text-center team mb-4">
                        <div class="team-item rounded overflow-hidden mb-2">
                            <div class="bg-secondary p-4">
                                <h5><?php echo $value->post_title;?></h5>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $postDaate;?></p>
                                <p class="m-0"><a target="_blank" href="<?php echo $file;?>"> <i class="fa fa-download"
                                            aria-hidden="true"></i> Download</a></p>
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