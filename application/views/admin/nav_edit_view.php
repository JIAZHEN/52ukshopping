<div class="span10">

<form class="form-horizontal" action="<?php echo base_url()."admin/editNav"; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<fieldset>

<div class="control-group<?php if(strlen(form_error('nav_colour')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="nav_colour">导航条颜色</label>
  <div class="controls">
    <input id="nav_colour" name="nav_colour" placeholder="" class="input-medium" type="text" value="#123456" readonly>
    <div id="colourpicker"></div>
    <p class="help-block"><?php echo form_error('nav_colour'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('nav_colour')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="nav_front_colour">导航条字体颜色</label>
  <div class="controls">
    <input id="nav_front_colour" name="nav_front_colour" placeholder="" class="input-medium" type="text" value="#123456" readonly>
    <div id="frontcolour"></div>
    <p class="help-block"><?php echo form_error('nav_colour'); ?></p>
  </div>
</div>

<input id="lessFile" type="hidden" name="lessFile" value="less/nav.less">
<input id="cssFile" type="hidden" name="cssFile" value="css/nav.css">
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>