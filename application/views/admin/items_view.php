<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/delete_item'; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
	<div class="modal-body">
		<p>确定要删除ID为 <a href="#" id="id_tooltip" title=""></a>的商品吗？</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" class="btn">取消</a>
		<button href="#" type="submit" class="btn btn-primary">确认</button>
	</div>
	</form>
</div>

<table class="table table-striped table-condensed">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
				<?php if(in_array($field, $display_fields)): ?>
					<th><?php echo $field; ?></th>
				<?php endif; ?>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($items_info as $item_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					<?php if(in_array($field, $display_fields)): ?>
					 	<td><?php echo $item_info[$field]; ?></td>
				 	<?php endif; ?>
				 <?php endforeach;?>
				 <th><a href="<?php echo base_url().'admin/user_edit/'.$item_info['id']; ?>" class="btn btn-small">编辑</a></th>
				 <th><button data-id="<?php echo $item_info['id']; ?>" data-sku="<?php echo $item_info['item_name']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>

</div>