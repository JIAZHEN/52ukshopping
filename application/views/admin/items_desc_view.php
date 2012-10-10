<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/deleteItemDesc/'.$item_info['id']; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
	<div class="modal-body">
		<p>确定要删除ID为 <a href="#" id="id_tooltip" title=""></a>的描述吗？</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" class="btn">取消</a>
		<button href="#" type="submit" class="btn btn-primary">确认</button>
	</div>
	</form>
</div>

<h3><a>商品描述信息</a></h3>

<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
					<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($all_info as $tab_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
						<?php if($field == 'tab_content'): ?>
							<td><?php echo substr($tab_info[$field],0,12)."……"; ?></td>
						<?php else: ?>
					 		<td><?php echo $tab_info[$field]; ?></td>
					 	<?php endif; ?>
				 <?php endforeach;?>
				 <th><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/1/'.$tab_info['tabID']; ?>" class="btn btn-small">编辑</a></th>
				 <th><button data-id="<?php echo $tab_info['tabID']; ?>" data-sku="<?php echo $tab_info['tab_name']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>
<hr />

<h3><a>对商品<code><?php echo $item_info['item_name']; ?></code>添加描述</a></h3>
<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/add_item_detail_desc/".$item_info['id']; ?>" >
<fieldset>

<div class="control-group<?php if(strlen(form_error('tabname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="tabname">Tab Name</label>
  <div class="controls">
    <input id="tabname" name="tabname" placeholder="" class="input-medium" type="text" value="<?php echo set_value('tabname'); ?>">
    <p class="help-block"><?php echo form_error('tabname'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('descript')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="descript">Description</label>
  <div class="controls">
  	<textarea rows="20" class="span10" id="descript" name="descript" placeholder="Enter..." value=""></textarea>
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
    <li><a href="<?php echo base_url().'admin/add_item_detail_desc/'.$item_info['id'].'/1'; ?>">&laquo;</a></li>
   <?php if($pageOffset != 0): ?>
    	<li><a href="<?php echo base_url().'admin/add_item_detail_desc/'.$item_info['id'].'/'.($display_paginations[0] - 1); ?>">...</a></li>
    <?php endif; ?>
    <?php foreach($display_paginations as $display_pagination): ?>
    	<li<?php if($display_pagination==($pageNum+1)) echo ' class="disabled"'; ?>><a href="<?php echo base_url().'admin/add_item_detail_desc/'.$item_info['id'].'/'.$display_pagination; ?>"><?php echo $display_pagination; ?></a></li>
    <?php endforeach; ?>
    <?php if($pageOffset != ($amount_pagination - 1)): ?>
    	<li><a href="<?php echo base_url().'admin/add_item_detail_desc/'.$item_info['id'].'/'.($display_paginations[count($display_paginations) - 1] + 1); ?>">...</a></li>
    <?php endif; ?>
    <li><a href="<?php echo base_url().'admin/add_item_detail_desc/'.$item_info['id'].'/'.$total_page_num; ?>">&raquo;</a></li>
 </ul>
</div>
<?php endif; ?>

<table class="table table-striped table-condensed table-hover table-bordered">
	<tbody>
		<?php foreach($desc_imgs as $desc_img_info): ?>
			<tr>
				<td><img src="<?php echo base_url().$desc_img_info['img_address']; ?>" width="50" height="50"/></td>
				<td><?php echo base_url().$desc_img_info['img_address']; ?></td>
				<th><a href="<?php echo base_url().'admin/delete_item_detail_desc/'.$item_info['id'].'/'.$desc_img_info['id']; ?>" class="btn btn-small btn-danger">删除</a></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<hr />
<h5>上传新图片</h5>
<form action="<?php echo base_url().'admin/update_item_detail_desc/'.$item_info['id']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />
<p class="help-block"><?php if(isset($error)) echo $error;?></p>
</form>

</div>