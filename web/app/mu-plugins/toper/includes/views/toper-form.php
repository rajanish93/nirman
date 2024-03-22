<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<div id="wpbody" role="main">

    <div id="wpbody-content">
 
        <div class="wrap">
            <h1 class="wp-heading-inline">
                Add New Toper</h1>

           <form action="<?php echo esc_html(admin_url('admin-post.php')); ?>" method="post"
               enctype="multipart/form-data">
               <input type="hidden" name="action" value="ct_admin_save">
               <?php wp_nonce_field('ct_admin_save', 'ct_admin'); ?>
                <div class="form-group">
                    <label for="inputAddress">Toper Name</label>
                    <input type="text" name="topername" class="form-control" id="inputAddress" placeholder="" required>
                </div>
                <div id="newinput">
                    <div class="form-row" id="row">
                        <div class="form-group col-md-5">
                            <label for="inputEmail4">File Name</label>
                            <input type="text" class="form-control" id="inputEmail4" name="filename[]" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">File</label>
                            <input type="file" class="form-control" id="" name="file[]" required>
                        </div>
                        <div class="form-group col-md-3">
                            <button id="rowAdder" class="btn btn-primary">Add</button>
                        </div>
                    </div>
               </div>
               
               <button type="submit" name="topersubmit" class="btn btn-primary">Add</button>
           </form>

            
        </div>

        <div class="clear"></div>
    </div><!-- wpbody-content -->
    
</div>

<script type="text/javascript">
    $("#rowAdder").click(function (event) {
          event.preventDefault();
        var newRowAdd =`<div class="form-row" id="row">
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" id="inputEmail4" name="filename[]" required>
                </div>
                <div class="form-group col-md-4">
                    <input type="file" class="form-control" id="" name="file[]" required>
                </div>
                <div class="form-group col-md-3">
                    <button id="DeleteRow" class="btn btn-primary" >Delete</button>
                </div>
            </div>`;

        $('#newinput').append(newRowAdd);
    });
    $("body").on("click", "#DeleteRow", function (event ) {
        event.preventDefault();
        $(this).parents("#row").remove();
    })
</script>