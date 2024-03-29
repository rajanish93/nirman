<?php
/**
 * Template Name: Topers

 */
$pid = get_the_id();
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

 function prepare_result($data)
 {
    $result = [];
    foreach ($data as $record) {
        if (!isset($result[$record['toperid']])) {
            $result[$record['toperid']] = array(
                'toperid' => (int) $record['toperid'],
                'topername' => $record['name'],

                'file' => array(
                    array(
                        'file_name' => $record['file_name'],
                        'toper_id' => $record['toper_id'],
                        'file_id' => $record['file_id'],
                        'file_path' => $record['file_path']
                    )
                )
            );
        } else {
            $result[$record['toperid']]['file'][] = array(
                'file_name' => $record['file_name'],
                'toper_id' => $record['toper_id'],
                'file_id' => $record['file_id'],
                'file_path' => $record['file_path']
            );
        }
    }

    sort($result);

    return $result;
 }
 function toper_list(){
    // render the List Table
    global $wpdb;

    $wpdb_table = $wpdb->prefix . 'toper';
    $wpdb_table_file = $wpdb->prefix . 'toper_file';

    $user_query = "SELECT wp_toper.id as toperid,wp_toper.name ,
    wp_toper_file.id file_id,wp_toper_file.toper_id,wp_toper_file.file_name,wp_toper_file.file_path FROM
    wp_toper JOIN wp_toper_file ON wp_toper.id = wp_toper_file.toper_id";

    // query output_type will be an associative array with ARRAY_A.
    $query_results = $wpdb->get_results( $user_query, ARRAY_A );
    // return result array to prepare_items.

    return prepare_result($query_results);
 }
   // print_r(toper_list() ); die;
   $toper_list=toper_list();
?>

<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Toppers Copy</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">CSE Toppers</p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Toppers Copy</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<?php //the_content(); ?>

<!-- wp:html -->
<?php foreach ($toper_list as $key => $value): ?>
   <div class="container pt-5 pb-3">
       <div class="text-center mb-5">
           <h1><?php echo $value['topername'];?></h1>
       </div>
       <div class="row">
        <?php foreach($value['file'] as $file):?>
           <div class="col-md-4 col-lg-4 text-center">
               <div class="topers-download p-2">
                   <h5>
                        <i class="fa fa-file-pdf" aria-hidden="true"></i>
                        <a target="_blank" href="<?php echo $file['file_path'];?>"><?php echo $file['file_name']?></a>
                    </h5>
               </div>
           </div>
           <?php endforeach;?>
           
       </div>
   </div>
   <?php endforeach;?>




<?php get_footer(); ?>