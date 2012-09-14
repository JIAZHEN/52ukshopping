<div class="span10">

<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/add_category"; ?>" >
<fieldset>

<div class="control-group<?php if(strlen(form_error('categroy_name')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="categroy_name">Categroy Name</label>
  <div class="controls">
    <input id="categroy_name" name="categroy_name" placeholder="" class="input-medium" type="text" value="<?php echo set_value('categroy_name'); ?>">
    <p class="help-block"><?php echo form_error('categroy_name'); ?></p>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="category_level">Category Level</label>
  <div class="controls">
    <select id="category_level" name="category_level" class="input-medium" >
    	<?php foreach($cat_levels as $cat_level): ?>
    		<option value="<?php echo $cat_level['cat_level']; ?>"><?php echo $cat_level['cat_level']; ?></option>
    	<?php endforeach; ?>
	</select>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="parent_cat">Parent Categories</label>
  <div class="controls">
    <select id="parent_cat" name="parent_cat" class="input-xlarge">
	</select>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>