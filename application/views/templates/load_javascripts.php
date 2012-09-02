<?php if(isset($jses)) {  foreach ($jses as $js_path): ?>
	<script type="text/javascript" src="<?php echo base_url().$js_path; ?>"></script> <!-- loop for javascript -->
<?php endforeach; } ?>