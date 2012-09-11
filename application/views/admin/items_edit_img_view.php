<div class="span10">

<div id="modal-from-dom" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>浏览</h3>
	</div>
	<form action="<?php echo base_url().'admin/delete_img'; ?>" method="post" accept-charset="utf-8">
		<input id="id_delete" type="hidden" name="id_delete" value="" />
		<input id="return_item_id" type="hidden" name="return_item_id" value="<?php echo $item_info['id']; ?>" />
	<div class="modal-body">
		<img src="" alt="">
	</div>
	<div class="modal-footer">
		<a data-dismiss="modal" class="btn">取消</a>
		<button type="submit" class="btn btn-primary">删除</button>
	</div>
	</form>
</div>

<h5>ID: <code><?php echo $item_info['id']; ?></code></h5>
<h5>Name: <code><?php echo $item_info['item_name']; ?></code></h5>

<h5>已有图片:</h5>
<div class="row-fluid">
	<?php for($row = 0; $row < intval(count($item_imgs) / 4) + 1; $row++) : ?>
		<ul class="thumbnails">
		<?php for($column = 0; $column < 4; $column++ ): ?>
			<?php if( ($row*4 + $column) < count($item_imgs) 
						&& $item_imgs[$row*4 + $column]['thumb_address'] != 'none' ) : ?>
			  <li class="span3">
			    <a class="thumbnail img-options" data-id="<?php echo $item_imgs[$row*4 + $column]['id']; ?>" data-src="<?php echo base_url().$item_imgs[$row*4 + $column]['img_address']; ?>">
			      <img src="<?php echo base_url().$item_imgs[$row*4 + $column]['thumb_address']; ?>" alt="">
			    </a>
			  </li>
		  	<?php endif; ?>
		<?php endfor; ?>
		</ul>
	<?php endfor;?>
</div>
<hr />
<h5>上传新图片</h5>
<form action="<?php echo base_url().'admin/do_upload'; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input id="return_item_id" type="hidden" name="return_item_id" value="<?php echo $item_info['id']; ?>" />

<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />
<p class="help-block"><?php if(isset($error)) echo $error['error'];?></p>
</form>
<hr />

<?php if(isset($img_address)): ?>
	<h5>预览</h5>
	<img id="big_img" src="<?php echo base_url().$img_address; ?>">
	<hr />
	<form action="<?php echo base_url().'admin/create_thumbs'; ?>" method="post">
	  <input id="img_id" type="hidden" name="img_id" value="<?php echo $img_id; ?>" />
	  <input id="return_item_id" type="hidden" name="return_item_id" value="<?php echo $item_info['id']; ?>" />
	  <input type="hidden" name="x1" value="" />
	  <input type="hidden" name="y1" value="" />
	  <input type="hidden" name="real-width" value="<?php echo $image_real_width; ?>" />
	  <input type="hidden" name="real-height" value="<?php echo $image_real_height; ?>" />
	  <input type="hidden" name="img-width" value="" />
	  <input type="hidden" name="img-height" value="" />
	  <input type="hidden" name="selection-width" value="" />
	  <input type="hidden" name="selection-height" value="" />
	  <input type="hidden" name="img_path" value="<?php echo $img_address; ?>" />
	  <input id="thums-btn" type="submit" class="btn btn-info" name="submit" value="创建缩略图" disabled="true" />
	</form>
<?php endif; ?>  


</div>