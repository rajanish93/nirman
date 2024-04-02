<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<div id="wpbody" role="main">

    <div id="wpbody-content">
 
        <div class="wrap">
            <h1 class="wp-heading-inline"> Edit Toper</h1>
           <form action="<?php echo esc_html(admin_url('admin-post.php')); ?>" method="post"
               enctype="multipart/form-data">
               <input type="hidden" name="action" value="ct_admin_update_upsc">
               <input type="hidden" name="upsc_id" value="<?php echo $data['id'];?>">
               <?php wp_nonce_field('ct_admin_update_upsc', 'ct_admin'); ?>
               
                <div class="form-group">
                    <label for="inputAddress">State</label>
                    <select class="form-control" name="state" id="" required>
                        <option value="">Select State For Show Page</option>
                        <option <?php  echo $data['state']=='pcs-bihar'? 'selected':'';?> value="pcs-bihar">Pcs Bihar
                        </option>
                        <option <?php  echo $data['state']=='pcs-up'?'selected':'';?> value="pcs-up">Pcs UP</option>
                        <option <?php  echo $data['state']=='pcs-mp'?'selected':'';?> value="pcs-mp">Pcs MP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $data['title'];?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Page Link</label>
                    <input type="text" name="link" class="form-control" value="<?php echo $data['link'];?>"
                        required>
                </div>
                
               
               <button type="submit" name="topersubmit" class="btn btn-primary">Update</button>
           </form>

            
        </div>

        <div class="clear"></div>
    </div><!-- wpbody-content -->
    
</div>
