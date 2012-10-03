<div class="span10">

<h3><a>已有可选项</a></h3>

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
				 <th><a href="<?php echo base_url().'admin/editOption/'; ?>" class="btn btn-small">编辑</a></th>
				 <th><a href="<?php echo base_url().'admin/deleteItemOption/?item_id='.$item_id.'&option_id='.$info['Option Id']; ?>" class="btn btn-small btn-danger delete-btn">删除</a></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>

<hr />

<h3><a>添加可选项</a><small> 多值请用逗号(,)分开; 中英文必须对应</small></h3>

<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/edit_item_option/'.$item_id; ?>" >
<fieldset>
<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="option">Options</label>
  <div class="controls">
    <select id="option" name="option" class="input-xlarge" >
    	<?php foreach($options as $option): ?>
    		<option value="<?php echo $option['id']; ?>"><?php echo $option['name_cn'].' ('.$option['name_en'].')'; ?></option>
    	<?php endforeach;?>
	</select>
  </div>
</div>
	
<div class="control-group<?php if(strlen(form_error('val_cn')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="val_cn">Values in Chinese</label>
  <div class="controls">
    <input id="val_cn" name="val_cn" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('val_cn'); ?>">
    <p class="help-block"><?php echo form_error('val_cn'); ?></p>
  </div>
</div>
	
<div class="control-group<?php if(strlen(form_error('val_en')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="val_en">Values in English</label>
  <div class="controls">
    <input id="val_en" name="val_en" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('val_en'); ?>">
    <p class="help-block"><?php echo form_error('val_en'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

<hr />

<h3><a>修改库存</a></h3>
<h4>总库存:<code><?php echo $total_stock; ?></code></h4>
<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($stocks_info_fields as $field): ?>
				<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($stocks_info as $info): ?>
		<form method="post" action="<?php echo base_url().'admin/edit_item_stock/'.$item_id; ?>" >
			<input type="hidden" name="value_id" value="<?php echo $info['value_id']; ?>">
			<tr>
				<?php foreach($stocks_info_fields as $field): ?>
						<?php if($field == 'stock'): ?>
							<td><input type="text" class="input-small" name="stock" value="<?php echo $info[$field]; ?>"></td>
						<?php else: ?>
							<td><?php echo $info[$field]; ?></td>
						<?php endif; ?>
				 <?php endforeach;?>
				 <th><button type="submit" class="btn btn-small">更新</button></th>
			</tr>
		</form>
		<?php endforeach; ?>
	</tbody>
		
</table>

</div>