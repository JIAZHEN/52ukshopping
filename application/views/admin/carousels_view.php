<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/delete_carousel'; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
	<div class="modal-body">
		<p>确定要删除ID为 <a href="#" id="id_tooltip" title=""></a>的目录吗？</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" class="btn">取消</a>
		<button href="#" type="submit" class="btn btn-primary">确认</button>
	</div>
	</form>
</div>

<h3><a>走马灯</a></h3>

<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
				<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($carousels_info as $carousel_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					<?php if($field == 'img_address'): ?>
						<td><img src="<?php echo base_url().$carousel_info[$field]; ?>" width="100px" height="10px"/></td>
					<?php else: ?>
						<td><?php echo $carousel_info[$field]; ?></td>
					<?php endif; ?>
					 
				 <?php endforeach;?>
				 <th><a href="<?php echo base_url().'admin/edit_carousel_info/'.$carousel_info['id']; ?>" class="btn btn-small">编辑</a></th>
				 <th><button data-id="<?php echo $carousel_info['id']; ?>" data-name="<?php echo $carousel_info['name']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>
</div>