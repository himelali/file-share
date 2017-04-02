<section class="content-header">
    <h1>
        Category
        <small>All Categories</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">Category</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View all categories</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" id="add-new-cat" data-toggle="tooltip" title="Add New">
                    <i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th style="width: 2%;">#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th style="width: 8%;">Action</th>
                </tr>
                <?php if($categories) { $sl = 0;
                    foreach ($categories as $key => $item) {
                ?>
                        <tr>
                            <td><?php echo ++$sl; ?>.</td>
                            <td><a href="<?php echo site_url("categories/subcategory/view/$item->cat_id"); ?>" data-toggle="tooltip" title="View Subcategories"><?php echo $item->cat_name; ?></a></td>
                            <td><?php echo $item->cat_desc; ?></td>
                            <td>
                                <a href="#" data-toggle="tooltip" class="text-info" title="Open">
                                    <i class="fa fa-openid"></i>
                                </a> &nbsp;
                                <a href="#" data-toggle="tooltip" class="text-gray" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a> &nbsp;
                                <a href="<?php echo site_url("categories/category/delete/$item->cat_id"); ?>" data-toggle="tooltip" class="text-danger" title="Remove">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4" align="center">Sorry. No data available.</td></tr>';
                } ?>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

<!-- Add New Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="Add New Category">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
            </div>

            <form id="addCategory" class="form-horizontal" action="<?php echo site_url("categories/category/insert")?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="cat_name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required name="cat_name" id="cat_name" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cat_desc" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="cat_desc" id="cat_desc" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userfile" class="col-sm-3 control-label">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" accept="image/*" name="userfile" id="userfile">
                            <p class="help-block">Only jpg and png file, Max size 4MB</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function () {
        $("#add-new-cat").on("click", function (e) {
            $('#addnew').modal({
                backdrop: 'static',
                keyboard: false
            })
        });
        $("#addCategory").on("submit", function (e) {
            if(formSubmit(e, this)) {
                $('#addnew').modal('hide');
                $('#addCategory')[0].reset();
            }
        });

    });

</script>
