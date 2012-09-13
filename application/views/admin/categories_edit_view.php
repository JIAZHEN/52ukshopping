<div class="span10">

<form class="form-horizontal" id="change_personal" method="post" action="<?php echo base_url().'admin/update_category'; ?>">

<div class="control-group">
      <label class="control-label" for="category_id">Id</label>
      <div class="controls">
	      <input placeholder="" class="input-medium" type="text" value="<?php echo $cat_info['id']; ?>" disabled="true">
	      <input id="category_id" type="hidden" name="category_id" value="<?php echo $cat_info['id']; ?>">
		  <p class="help-block"></p>
	  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="category_name">Category Name</label>
  <div class="controls">
    <input id="category_name" name="category_name" placeholder="" class="input-medium" type="text" value="<?php echo $cat_info['category_name']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="category_level">Category Level</label>
  <div class="controls">
    <select id="category_level" name="category_level" class="input-xlarge">
    	<?php foreach($cat_levels as $cat_level): ?>
    		<option value="<?php echo $cat_level['cat_level']; ?>"<?php if($cat_level['cat_level']==$cat_info['cat_level']) echo ' selected="selected"'; ?>><?php echo $cat_level['cat_level']; ?></option>
    	<?php endforeach;?>
	</select>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="parent_cat">Parent Categories</label>
  <div class="controls">
    <select id="parent_cat" name="parent_cat" class="input-xlarge">
    	<?php foreach($lv_categories as $category): ?>
    		<option value="<?php echo $category['id']; ?>"<?php if($category['id']==$cat_info['parent_id']) echo ' selected="selected"'; ?>><?php echo $category['category_name']; ?></option>
    	<?php endforeach;?>
	</select>
  </div>
</div>

<div class="form-actions">
<button type="reset" id="reset" class="btn btn-danger">取消</button>
<button type="submit" class="btn btn-primary">确定</button>
</div>
</form>

</div>