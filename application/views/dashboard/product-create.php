<section class="content-header">
    <h1>
        Products
        <small>Add New One</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">Products</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <form id="addProduct" class="form-horizontal" action="<?php echo site_url("products/insert"); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="cat_name" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-2">
                            <select name="category" id="category" required class="form-control">
                                <option value="">Select One</option>
                                <?php if($category) {
                                    foreach ($category as $item) {
                                        echo '<option value="' . $item->cat_id . '">' . $item->cat_name . '</option>';
                                    }
                                }?>
                            </select>
                        </div>
                        <label for="cat_name" class="col-sm-2 control-label">Sub Category 1</label>
                        <div class="col-sm-2" id="sub-cat1">
                            <select name="sub-cat1" required class="form-control">
                                <option value="">Select One</option>
                            </select>
                        </div>
                        <label for="cat_name" class="col-sm-2 control-label">Sub Category 2</label>
                        <div class="col-sm-2" id="sub-cat2">
                            <select name="sub-cat2" class="form-control">
                                <option value="">Select One</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cat_name" class="col-sm-2 control-label">Product Name</label>
                        <div class="col-sm-5">
                            <input type="text" required class="form-control" required name="product_name" id="product_name" placeholder="Product Name">
                        </div>
                        <label for="cat_name" class="col-sm-2 control-label">Current Price</label>
                        <div class="col-sm-2">
                            <input type="text" required class="form-control" required name="product_price" id="product_price" placeholder="Product Price">
                        </div>
                        <label for="cat_name" class="col-sm-1 control-label text-left">BDT</label>
                    </div>

                    <div class="form-group">
                        <label for="product_code" class="col-sm-2 control-label">Serial Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Serial Code">
                        </div>
                        <label for="product_old_price" class="col-sm-2 control-label">Old Price</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" required name="product_old_price" id="product_old_price" placeholder="Product Old Price">
                        </div>
                        <label for="cat_name" class="col-sm-1 control-label text-left">BDT</label>
                    </div>

                    <div class="form-group">
                        <label for="product_size" class="col-sm-2 control-label">Product Size</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="product_size" id="product_size" placeholder="Product Size">
                        </div>
                        <label for="product_weight" class="col-sm-2 control-label">Product Weight</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="product_weight" id="product_weight" placeholder="Product Weight">
                        </div>
                        <label for="product_quantity" class="col-sm-2 control-label">Stock Quantity</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="product_quantity" id="product_quantity" placeholder="Stock Quantity">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_desc" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="product_desc" id="product_desc" placeholder="Product Description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="product_spec" class="col-sm-2 control-label">Specification</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="product_spec" id="product_spec" placeholder="Product Specification"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="delivery_process" class="col-sm-2 control-label">Delivery System</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="delivery_process" id="delivery_process">
                        </div>
                        <label for="userfile" class="col-sm-2 control-label">Product Image</label>
                        <div class="col-sm-4">
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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

<script>
    $(document).ready( function () {
        $("#addProduct").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: e.currentTarget.method,
                url: e.currentTarget.action,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#center-loading").html('<div class="loading">Loading&#8230;</div>');
                    $("button[type=submit]").attr("disabled", true);
                },
                success: function (getData, status, xhr) {
                    alert(getData);
                    $( "#center-loading" ).html( "" );
                    $( "input[type=file]" ).val( "" );
                    $( "button[type=submit]" ).attr("disabled", false);
                    if(getData == 'ok') {
                        location.reload();
                    } else
                        $.notify(getData, "error");
                }
            });
            return false;
        });
        
        $("#category").on("change", function (e) {
            var id  = $("#category").val();
            var url = '<?php echo site_url("products/get_category/sc"); ?>/' + id;
            $.ajax({
                type: 'post',
                url: url,
                data: {id: url},
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#sub-cat1").html('<img src="<?php echo base_url("assets/loading_bar.gif"); ?>" style="width: 80%;" />');
                },
                success: function (getData, status, xhr) {
                    $( "#sub-cat1" ).html(getData);
                }
            });
            return false;
        });
        $("body").on("change", "#subcategory", function (e) {
            var id  = $("#subcategory").val();
            var url = '<?php echo site_url("products/get_category/ssc"); ?>/'+id;
            $.ajax({
                type: 'post',
                url: url,
                data: {id: url},
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#sub-cat2").html('<img src="<?php echo base_url("assets/loading_bar.gif"); ?>" style="width: 80%;" />');
                },
                success: function (getData, status, xhr) {
                    $( "#sub-cat2" ).html(getData);
                }
            });
            return false;
        });
    });
</script>