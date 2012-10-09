<div class="span10">

<h3><a>对商品<code><?php echo $item_info['item_name']; ?></code>的描述<code><?php echo $tab_info['tab_name']; ?></code>进行编辑</a></h3>
<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/edit_item_detail_desc/".$item_info['id']."/".$tab_info['id']; ?>" >
<fieldset>

<div class="control-group<?php if(strlen(form_error('tabname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="tabname">Tab Name</label>
  <div class="controls">
    <input id="tabname" name="tabname" placeholder="" class="input-medium" type="text" value="<?php echo $tab_info['tab_name']; ?>">
    <p class="help-block"><?php echo form_error('tabname'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('descript')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="descript">Description</label>
  <div class="controls">
  	<textarea rows="5" class="span7" id="descript" name="descript" placeholder="" value="<?php echo $tab_info['tab_content']; ?>"><?php echo $tab_info['tab_content']; ?></textarea>
    <p class="help-block"><?php echo form_error('descript'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>