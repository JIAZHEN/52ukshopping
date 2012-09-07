<div class="span10">
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
		<?php foreach($users_info as $user_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					<?php if(in_array($field, $display_fields)): ?>
					 	<td><?php echo $user_info[$field]; ?></td>
				 	<?php endif; ?>
				 <?php endforeach;?>
				 <th><button name="" class="btn btn-small">编辑</button></th>
				 <th><button name="" class="btn btn-small btn-danger">删除</button></th>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
	</table>
</div>