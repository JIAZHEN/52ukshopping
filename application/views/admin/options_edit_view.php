<div class="span10">

<h3><a>编辑可选项</a></h3>

<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/editOption/".$option_info['id']; ?>" >
<fieldset>

<input id="id_edit" type="hidden" name="id_edit" value="<?php echo $option_info['id']; ?>" />

<div class="control-group<?php if(strlen(form_error('name_en')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="name_en">Option Name English</label>
  <div class="controls">
    <input id="name_en" name="name_en" placeholder="" class="input-medium" type="text" value="<?php echo $option_info['name_en']; ?>">
    <p class="help-block"><?php echo form_error('name_en'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('name_cn')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="name_cn">选项名中文</label>
  <div class="controls">
    <input id="name_cn" name="name_cn" placeholder="" class="input-medium" type="text" value="<?php echo $option_info['name_cn']; ?>">
    <p class="help-block"><?php echo form_error('name_cn'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>
</div>