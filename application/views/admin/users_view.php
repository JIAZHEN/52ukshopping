<div class="span10">
<table class="table table-striped table-condensed">
    <thead class="table">
		<tr>
			<?php foreach($fields as $field): ?>
				<?php if($field != 'password'): ?>
					<th><?php echo $field; ?></th>
				<?php endif; ?>
			<?php endforeach;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users_info as $user_info): ?>
			<tr>
				<?php foreach($fields as $field): ?>
					<?php if($field != 'password'): ?>
				 		<td><?php echo $user_info[$field]; ?></td>
				 	<?php endif; ?>
				 <?php endforeach;?>
			</tr>
		<?php endforeach; ?>
	</tbody>
		
	</table>
</div>