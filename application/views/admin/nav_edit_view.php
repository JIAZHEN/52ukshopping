<div class="span10">

<form class="form-horizontal" action="<?php echo base_url()."admin/editNav"; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<fieldset>

<div class="control-group<?php if(strlen(form_error('nav_colour')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="nav_colour">Navigation Colour</label>
  <div class="controls">
    <input id="nav_colour" name="nav_colour" placeholder="" class="input-medium" type="text" value="<?php echo set_value('nav_colour'); ?>">
    <p class="help-block"><?php echo form_error('nav_colour'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>