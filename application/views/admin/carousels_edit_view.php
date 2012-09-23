<div class="span10">

<form class="form-horizontal" action="<?php echo base_url().'admin/edit_carousel_info/'.$carousel_info['id']; ?>" method="post">
<fieldset>

<div class="control-group<?php if(strlen(form_error('carousel_name')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="carousel_name">Carousel Name</label>
  <div class="controls">
    <input id="carousel_name" name="carousel_name" placeholder="" class="input-medium" type="text" value="<?php echo $carousel_info['name']; ?>">
    <p class="help-block"><?php echo form_error('carousel_name'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('description')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="description">Description</label>
  <div class="controls">
    <textarea rows="5" class="span7" id="description" name="description" placeholder="" value="<?php echo $carousel_info['description']; ?>"><?php echo $carousel_info['description']; ?></textarea>
    <p class="help-block"><?php echo form_error('description'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

<div class="page-header">
  <a><h1>更新图片</h1></a>
</div>

<div class="control-group">
      <div class="controls">
	      <img src="<?php if(is_null($carousel_info['img_address'])) echo 'http://placehold.it/300x200'; else echo base_url().$carousel_info['img_address']; ?>"
		  <p class="help-block"></p>
	  </div>
</div>

<form action="<?php echo base_url().'admin/update_carousel_img'; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input id="return_cat_id" type="hidden" name="return_carousel_id" value="<?php echo $carousel_info['id']; ?>" />

<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />
<p class="help-block"><?php if(isset($error)) echo $error;?></p>
</form>

</div>

</div>