<div class="span10">
<h5>ID: <code><?php echo $item_info['id']; ?></code></h5>
<h5>Name: <code><?php echo $item_info['item_name']; ?></code></h5>

<h5>已有图片:</h5>
<div class="row-fluid">
	<?php for($row = 0; $row < intval(count($item_imgs) / 4) + 1; $row++) : ?>
		<ul class="thumbnails">
		<?php for($column = 0; $column < 4; $column++ ): ?>
			<?php if( ($row*4 + $column) < count($item_imgs)) : ?>
			  <li class="span3">
			    <a href="#" class="thumbnail">
			      <img src="http://placehold.it/260x180" alt="">
			    </a>
			  </li>
		  	<?php endif; ?>
		<?php endfor; ?>
		</ul>
	<?php endfor;?>
</div>
<hr />
<h5>上传新图片</h5>
<form action="http://192.168.1.4/transaction/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />

</form>
<hr />   


</div>