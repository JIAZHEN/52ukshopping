<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/delete_category'; ?>" method="post" accept-charset="utf-8">
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

<h3><a>目录信息</a></h3>
<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
				<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($categories_info as $category_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					 <td><?php echo $category_info[$field]; ?></td>
				 <?php endforeach;?>
				 <th><a href="<?php echo base_url().'admin/edit_categories/'.$category_info['id']; ?>" class="btn btn-small">编辑</a></th>
				 <th><button data-id="<?php echo $category_info['id']; ?>" data-name="<?php echo $category_info['category_name']; ?>" data-level="<?php echo $category_info['cat_level']; ?>" class="btn btn-small btn-danger delete-btn">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>
</div>