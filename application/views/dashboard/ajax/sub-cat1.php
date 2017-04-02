<select name="sub-cat1" class="form-control" id="subcategory">
    <option value="">Select One</option>

<?php

if($data) {
    foreach ($data as $item) {
        echo '<option value="'.$item->sub_cat_id.'">'.$item->sub_cat_name.'</option>';
    }
}

?>
</select>
