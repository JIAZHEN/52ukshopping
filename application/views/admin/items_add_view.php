<div class="span10">

<form class="form-horizontal" method="post" action="<?php echo base_url()."admin"; ?>" >
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
  <label class="control-label" for="descript">Last Name</label>
  <div class="controls">
    <input id="descript" name="descript" placeholder="" class="input-medium" type="text" value="<?php echo set_value('descript'); ?>">
    <p class="help-block"><?php echo form_error('descript'); ?></p>
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