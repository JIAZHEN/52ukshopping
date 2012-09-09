<div class="span10">

<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/add_item"; ?>" >
<fieldset>

<div class="control-group<?php if(strlen(form_error('itemname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="itemname">Item Name</label>
  <div class="controls">
    <input id="itemname" name="itemname" placeholder="" class="input-medium" type="text" value="<?php echo set_value('itemname'); ?>">
    <p class="help-block"><?php echo form_error('itemname'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('descript')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="descript">Description</label>
  <div class="controls">
  	<textarea rows="5" class="span7" id="descript" name="descript" placeholder="" value="<?php echo set_value('descript'); ?>"></textarea>
    <p class="help-block"><?php echo form_error('descript'); ?></p>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="category">Category</label>
  <div class="controls">
    <select id="category" name="category" class="input-medium" >
    	<option value="oo">1</option>
	</select>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('price')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="price">Price</label>
  <div class="controls">
    <input id="price" name="price" placeholder="" class="input-medium" type="text" value="<?php echo set_value('price'); ?>">
    <p class="help-block"><?php echo form_error('price'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('cost')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="cost">Cost</label>
  <div class="controls">
    <input id="cost" name="cost" placeholder="" class="input-medium" type="text" value="<?php echo set_value('cost'); ?>">
    <p class="help-block"><?php echo form_error('cost'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('stock')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="stock">Stock</label>
  <div class="controls">
    <input id="stock" name="stock" placeholder="" class="input-medium" type="text" value="<?php echo set_value('stock'); ?>">
    <p class="help-block"><?php echo form_error('stock'); ?></p>
  </div>
</div>

<div class="control-group">
	<label class="control-label" for="image">Image</label>
	<div class="controls">
		<input type="file" class="input-xlarge" id="image">
	</div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>