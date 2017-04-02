<section class="content-header">
    <h1>
        Products
        <small>All Products</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">Products</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">All Products</h3>
            <div class="box-tools pull-right">
                <a href="<?php echo site_url("products/create"); ?>" class="btn btn-box-tool" id="add-new-product" data-toggle="tooltip" title="Add New Product">
                    <i class="fa fa-plus"></i></a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                <tr>
                    <th style="width: 3%;">#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Category</th>
                    <th>Sub category</th>
                    <th>Sub category</th>
                    <th style="width: 9%;">Action</th>
                </tr>
                <?php if($products) { $sl = (int) $uri['segment2'];
                    foreach ($products as $key => $item) {
                ?>
                        <tr>
                            <td><?php echo ++$sl; ?></td>
                            <td><?php echo $item->product_name; ?></td>
                            <td><?php echo $item->product_price + 0; ?></td>
                            <td><?php echo $item->product_quantity; ?></td>
                            <td><?php echo $item->category; ?></td>
                            <td><?php echo $item->subcategory1; ?></td>
                            <td><?php echo $item->subcategory2; ?></td>
                            <td>
                                <a href="<?php echo site_url("products/view/$item->product_id"); ?>" data-toggle="tooltip" class="text-info" title="View">
                                    <i class="fa fa-openid"></i>
                                </a> &nbsp;
                                <a href="<?php echo site_url("products/edit/$item->product_id"); ?>" data-toggle="tooltip" class="text-gray" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a> &nbsp;
                                <a href="<?php echo site_url("products/delete/$item->product_id"); ?>" data-toggle="tooltip" class="text-danger" title="Remove">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else { echo '<tr><td align="center" colspan="8">No data found now.</td></tr>'; }
                ?>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>