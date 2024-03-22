<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Topers</h1>
        <div class="row">
            <div class="col-md-6"><a href="admin.php?page=ct-admin-forms"
                    class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add New Toper
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
                            <th width="20%">Toper Name</th>
                            <th width="20%">Toper File</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php  $i=0; foreach ($data as $data):  $i++; ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $data['topername']?></td>

                            <td>
                                 <?php foreach ($data['file'] as $value): ?>
                                    <?php end($data['file'])===$value?$symb='':$symb='|';?>
                                    <a href="<?php echo $value['file_path'];?>"><?php echo $value['file_name'];?></a><?php echo $symb;?>
                                 <?php endforeach;?>
                            </td>

                            <td style="">
                                <a href="admin.php?page=ct-admin-forms_edittoper&toper=<?php echo $data['toperid'];?>"
                                    class="">Edit</a> |&nbsp;
                                <a onclick="return confirm('Are you sure?')"
                                    href="admin.php?page=ct-admin-forms_deletetoper&toper=<?php echo $data['toperid'];?>"
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