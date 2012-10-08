<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>提示</h3>
	</div>
	<form action="<?php echo base_url().'admin/delete_order'; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
	<div class="modal-body">
		<p>确定要删除ID为 <a href="#" id="id_tooltip" title=""></a>的物品吗？</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-dismiss="modal" class="btn">取消</a>
		<button href="#" type="submit" class="btn btn-primary">确认</button>
	</div>
	</form>
</div>

<h3><a>订单信息</a></h3>

<table class="table table-striped table-condensed table-hover table-bordered">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
					<th><?php echo $field; ?></th>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($orders_info as $info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					 	<td><?php echo $info[$field]; ?></td>
				 <?php endforeach;?>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
</table>

</div>