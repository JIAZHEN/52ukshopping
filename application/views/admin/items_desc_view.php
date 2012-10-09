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
				 <th><a href="<?php echo base_url().'admin/edit_item_detail_desc/'.$item_info['id'].'/'.$tab_info['tabID']; ?>" class="btn btn-small">编辑</a></th>
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
  	<textarea rows="5" class="span7" id="descript" name="descript" placeholder="" value="<?php echo set_value('descript'); ?>"></textarea>
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