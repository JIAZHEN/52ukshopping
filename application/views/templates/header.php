<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title ?> - 52UKSHOPPING</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php if(isset($csses)) {  foreach ($csses as $css_path): ?>
		<link rel="stylesheet" href="<?php echo base_url().$css_path; ?>" /> <!-- loop for CSS -->
	<?php endforeach; } ?>
</head>
<body>
	<div style="width: 1024px;margin: 0px auto; padding: 0px; border: 0px;"> <!-- The main body of the website -->
	