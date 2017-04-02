<select name="sub-cat2" class="form-control">
    <option value="">Select One</option>

<?php

if($data) {
    foreach ($data as $item) {
        echo '<option value="'.$item->ssc_id.'">'.$item->sub_cat_name.'</option>';
    }
}

?>
</select>