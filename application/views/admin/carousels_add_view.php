<div class="span10">

<form class="form-horizontal" action="<?php echo base_url()."admin/add_carousel"; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<fieldset>

<div class="control-group<?php if(strlen(form_error('carousel_name')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="carousel_name">Carousel Name</label>
  <div class="controls">
    <input id="carousel_name" name="carousel_name" placeholder="" class="input-medium" type="text" value="<?php echo set_value('carousel_name'); ?>">
    <p class="help-block"><?php echo form_error('carousel_name'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('description')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="description">Description</label>
  <div class="controls">
    <textarea rows="5" class="span7" id="description" name="description" placeholder="" value="<?php echo set_value('description'); ?>"></textarea>
    <p class="help-block"><?php echo form_error('description'); ?></p>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="img_address">Image</label>
  <div class="controls">
    <input type="file" name="userfile" />
    <p class="help-block"><?php if(isset($error)) echo $error;?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>