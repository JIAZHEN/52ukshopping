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

<h3><a>商品信息</a></h3>

<div class="pagination pagination-left">
  <ul>
    <li><a href="<?php echo base_url().'admin/items'; ?>">&laquo;</a></li>
   <?php if($pageOffset != 0): ?>
    	<li><a href="<?php echo base_url().'admin/items/'.($display_paginations[0] - 1); ?>">...</a></li>
    <?php endif; ?>
    <?php foreach($display_paginations as $display_pagination): ?>
    	<li<?php if($display_pagination==($pageNum+1)) echo ' class="disabled"'; ?>><a href="<?php echo base_url().'admin/items/'.$display_pagination; ?>"><?php echo $display_pagination; ?></a></li>
    <?php endforeach; ?>
    <?php if($pageOffset != ($amount_pagination - 1)): ?>
    	<li><a href="<?php echo base_url().'admin/items/'.($display_paginations[count($display_paginations) - 1] + 1); ?>">...</a></li>
    <?php endif; ?>
    <li><a href="<?php echo base_url().'admin/items/'.$total_page_num; ?>">&raquo;</a></li>
 </ul>
</div>

<table class="table table-striped table-condensed table-hover table-bordered">
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
				 <th><a href="<?php echo base_url().'admin/edit_item_info/'.$item_info['id']; ?>" class="btn btn-small">编辑资料</a></th>
				 <th><a href="<?php echo base_url().'admin/edit_item_images/'.$item_info['id']; ?>" class="btn btn-small">编辑图片</a></th>
				 <th><button data-id="<?php echo $item_info['id']; ?>" data-sku="<?php echo $item_info['item_name']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>

</div>