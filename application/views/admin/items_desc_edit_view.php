<div class="span10">

<h3><a>对商品<code><?php echo $item_info['item_name']; ?></code>的描述<code><?php echo $tab_info['tab_name']; ?></code>进行编辑</a></h3>
<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/edit_item_detail_desc/".$item_info['id']."/1/".$tab_info['id']; ?>" >
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
  	<textarea rows="20" class="span10" id="descript" name="descript" placeholder="" value="<?php echo $tab_info['tab_content']; ?>"><?php echo $tab_info['tab_content']; ?></textarea>
    <p class="help-block"><?php echo form_error('descript'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

<hr />
<h5>已有图片</h5>

<?php if(sizeof($display_paginations) > 0): ?>
<div class="pagination pagination-left">
  <ul>
    <li><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/1/'.$tab_info['id']; ?>">&laquo;</a></li>
   <?php if($pageOffset != 0): ?>
    	<li><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/'.($display_paginations[0] - 1).'/'.$tab_info['id']; ?>">...</a></li>
    <?php endif; ?>
    <?php foreach($display_paginations as $display_pagination): ?>
    	<li<?php if($display_pagination==($pageNum+1)) echo ' class="disabled"'; ?>><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/'.$display_pagination.'/'.$tab_info['id']; ?>"><?php echo $display_pagination; ?></a></li>
    <?php endforeach; ?>
    <?php if($pageOffset != ($amount_pagination - 1)): ?>
    	<li><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/'.($display_paginations[count($display_paginations) - 1] + 1).'/'.$tab_info['id']; ?>">...</a></li>
    <?php endif; ?>
    <li><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/'.$total_page_num.'/'.$tab_info['id']; ?>">&raquo;</a></li>
 </ul>
</div>
<?php endif; ?>

<table class="table table-striped table-condensed table-hover table-bordered">
	<tbody>
		<?php foreach($desc_imgs as $desc_img_info): ?>
			<tr>
				<td><img src="<?php echo base_url().$desc_img_info['img_address']; ?>" width="50" height="50"/></td>
				<td><?php echo base_url().$desc_img_info['img_address']; ?></td>
				<th><a href="<?php echo base_url().'admin/delete_item_detail_desc/'.$item_info['id'].'/'.$desc_img_info['id'].'/'.$tab_info['id']; ?>" class="btn btn-small btn-danger">删除</a></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<hr />
<h5>上传新图片</h5>
<form action="<?php echo base_url().'admin/update_item_detail_desc/'.$item_info['id'].'/'.$tab_info['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />
<p class="help-block"><?php if(isset($error)) echo $error;?></p>
</form>

</div>