<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Topers</h1>
        <div class="row">
            <div class="col-md-6"><a href="admin.php?page=ct-admin-forms-upsc"
                    class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add New Upsc Link
                </a></div>
        </div>
    </div>
    <div class="">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Topers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" width="100%" cellspacing="0" class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="20%">SR.No</th>
                            <th width="20%">Sate</th>
                            <th width="20%">Title</th>
                            <th width="20%">Link</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php  $i=0; foreach ($data as $data):  $i++; ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $data['state']?></td>
                            <td><?php echo $data['title']?></td>
                            <td><?php echo $data['link']?></td>

                            <td style="">
                                <a href="admin.php?page=ct-admin-forms-upsc_edit_upsc&upsc_id=<?php echo $data['id'];?>"
                                    class="">Edit</a> |&nbsp;
                                <a onclick="return confirm('Are you sure?')"
                                    href="admin.php?page=ct-admin-forms-upsc_delete_upsc&upsc_id=<?php echo $data['id'];?>"
                                    class="">Delete</i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>