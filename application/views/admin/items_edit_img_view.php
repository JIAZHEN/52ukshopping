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
			      <img src="<?php echo base_url().$item_imgs[$row*4 + $column]['thumb_address']; ?>" alt="" width="300px" height="20px">
			    </a>
			    <br />
			    <?php if($item_imgs[$row*4 + $column]['is_desk_show'] == 0): ?>
			    	<a class="span11 btn btn-info" href="<?php echo base_url().'admin/setItemImgShow/'.$item_imgs[$row*4 + $column]['id'].'/1/'.$item_imgs[$row*4 + $column]['item_id']; ?>">设置在桌面</a>
			    <?php else: ?>
			    	<a class="span11 btn btn-danger" href="<?php echo base_url().'admin/setItemImgShow/'.$item_imgs[$row*4 + $column]['id'].'/0/'.$item_imgs[$row*4 + $column]['item_id']; ?>">取消显示</a>
			    <?php endif;?>
			  </li>
		  	<?php endif; ?>
		<?php endfor; ?>
		</ul>
	<?php endfor;?>
</div>
<hr />
<h5>上传新图片</h5>
<form action="<?php echo base_url().'admin/upload_item_img'; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input id="return_item_id" type="hidden" name="return_item_id" value="<?php echo $item_info['id']; ?>" />

<input type="file" name="userfile" />
<input type="submit" value="upload" class="btn btn-success" />
<p class="help-block"><?php if(isset($error)) echo $error;?></p>
</form>


</div>