<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/deleteOption'; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
	<div class="modal-body">
		<p>确定要删除ID为 <a href="#" id="id_tooltip" title=""></a>的商品可选项吗？</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" class="btn">取消</a>
		<button href="#" type="submit" class="btn btn-primary">确认</button>
	</div>
	</form>
</div>

<h3><a>商品可选项</a></h3>

<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
				<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($options_info as $info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
						<td><?php echo $info[$field]; ?></td>
				 <?php endforeach;?>
				 <th><a href="<?php echo base_url().'admin/editOption/'.$info['id']; ?>" class="btn btn-small">编辑</a></th>
				 <th><button data-id="<?php echo $info['id']; ?>" data-name="<?php echo $info['name_en']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>

<hr />
<h3><a>添加可选项</a></h3>

<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/options"; ?>" >
<fieldset>

<div class="control-group<?php if(strlen(form_error('option_name_en')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="option_name_en">Option Name English</label>
  <div class="controls">
    <input id="option_name_en" name="option_name_en" placeholder="" class="input-medium" type="text" value="<?php echo set_value('option_name_en'); ?>">
    <p class="help-block"><?php echo form_error('option_name_en'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('option_name_cn')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="option_name_cn">选项名中文</label>
  <div class="controls">
    <input id="option_name_cn" name="option_name_cn" placeholder="" class="input-medium" type="text" value="<?php echo set_value('option_name_cn'); ?>">
    <p class="help-block"><?php echo form_error('option_name_cn'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>
</div>