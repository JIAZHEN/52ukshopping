<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title ?> - 52UKSHOPPING</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="jiazhen">
	<link rel="shortcut icon" href="<?php echo base_url().'images/logo.jpg'; ?>">
	<?php if(isset($csses)) {  foreach ($csses as $css_path): ?>
		<link rel="stylesheet" href="<?php echo base_url().$css_path; ?>" /> <!-- loop for CSS -->
	<?php endforeach; } ?>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<div style="width: 1024px;margin: 0px auto; padding: 0px; border: 0px;"> <!-- The main body of the website -->
	