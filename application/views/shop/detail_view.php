<div class="row-fluid">
<div class="span3"> <!--Sidebar content-->
<ul id="viewedList" class="span10 nav nav-tabs nav-stacked">
	<li><a href=""><h3><?php echo $info['item_name']; ?></h3></a></li>
	<input id="cookie_item_id" type="hidden" name="cookie_item_id" value="<?php echo $info['id']; ?>">
	<input id="cookie_item_name" type="hidden" name="cookie_item_name" value="<?php echo $info['item_name']; ?>">
	<li><a href=""><h4>您还浏览过:</h4></a></li>
</ul>

<img width="200px" src="<?php echo base_url();?>images/slide-img.png" />
<img width="200px" src="<?php echo base_url();?>images/slide-img-2.png" />
</div>
<div class="span9"> <!--Body content-->
	<div class="row"> <!-- breadcrumb -->
		<div class="span12"> 
			<ul class="breadcrumb">
			    <?php for($i = 0; $i < count($breadcrumb) - 1; $i++) : ?>
					<li><a href="<?php echo $breadcrumb[$i]['url']; ?>"><?php echo $breadcrumb[$i]['name']; ?></a><span class="divider">/</span></li>
				<?php endfor; ?>
			    <li class="active"><?php echo $breadcrumb[count($breadcrumb) - 1]; ?></li>
			    <a href="" class="pull-right">Need help?</a>
		    </ul>
		</div> 
	</div> <!-- breadcrumb -->
	<?php if(isset($info) && count($info) > 0): ?>
	<div class="row"> <!-- detailstop -->
		<div class="span4"> <!-- imgarea -->
		
		
		<!-- ZOOM -->
		<!--	
        An anchor with class of 'cloud-zoom' should surround the small image.
        The anchor's href should point to the big zoom image.
        Any options can be specified in the rel attribute of the anchor.
        Options should be specified in regular JavaScript object format,
        but without the braces.
        -->
    	
        <a href="<?php if(sizeof($item_imgs) > 0) { echo base_url().$item_imgs[0]['img_address']; } else { echo 'http://placehold.it/300x200'; } ?>" class = 'cloud-zoom' id='zoom1'
            rel="adjustX: 10, adjustY:-4, softFocus:true">
            <img src="<?php if(sizeof($item_imgs) > 0) { echo base_url().$item_imgs[0]['thumb_address']; } else { echo 'http://placehold.it/300x200'; } ?>" class="img-polaroid" alt='' align="left" title="Optional title display" />
        </a>
        
    <!--	
        You can optionally create a gallery by creating anchors with a class of 'cloud-zoom-gallery'.
        The anchor's href should point to the big zoom image.
        In the rel attribute you must specify the id of the zoom to use (useZoom: 'zoom1'),
        and also the small image to use (smallImage: /images/....)
        -->
        
		<ul class="span12" id="zoomthumbs">
				<?php foreach($item_imgs as $item_img): ?>
					<li>
			    	 <a href="<?php echo base_url().$item_img['img_address']; ?>" class='cloud-zoom-gallery' title='Thumbnail 1'
        	rel="useZoom: 'zoom1', smallImage: '<?php echo base_url().$item_img['thumb_address']; ?>' ">
        <img src="<?php echo base_url().$item_img['tiny_address']; ?>" class="img-polaroid" alt = "Thumbnail 1"/></a>
			    </li>
				<?php endforeach; ?>
			    
		    </ul>
	
	<!-- ZOOM -->
		
			
		</div> <!-- imgarea -->
		<div class="span7"> <!-- info area -->
			<form id="add_to_cart_form" action="<?php echo base_url().'cart/add_cart'; ?>" method="post">
			<h2><?php echo $info['item_name']; ?></h2>
			<input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
			<input type="hidden" name="name" value="<?php echo $info['item_name']; ?>" />
			<span class="ratings-imgs"></span>
			<p>Rate and recommends</p>
			<ul class="reviewul">
				<li><a href="#">Read Review</a></li>
				<li><span class="divider">|</span></li>
				<li><a href="#">Read Review</a></li>
			</ul>
			<hr />
			<?php foreach($options as $option): ?>
				<p>Select <?php echo $option['Option Name English']; ?></p>
				<select name="<?php echo $option['Option Name English']; ?>">
					<?php $valueIds = explode(',', $option['ValuesID']); ?>
					<?php $values = explode(',', $option['Values In English']); ?>
					<?php foreach($valueIds as $key => $valueId): ?>
							<option value="<?php echo $valueId.','.$values[$key]; ?>"><?php echo $values[$key]; ?></option>
					<?php endforeach; ?>
		        </select>
			<?php endforeach; ?>
			<p>Quantity</p>
			<input id="required_qty" type="text" class="input-mini" size="1" name="quantity" value="1" />
			
			<div id="buttonbox"> <!-- buttonbox -->
					<div class="span6">
						<p>Price</p><strong>£ <?php echo number_format($info['price'],2); ?></strong>
						<input type="hidden" name="price" value="<?php echo number_format($info['price'],2); ?>" />
					</div>
					<a id="buy_btn" class="span6 btn btn-success pull-right btn-large">Buy now</a>
					
				
			</div> <!-- buttonbox -->
			<div id="willbechange">
					<p>Made by Community Fair Trade supplier Teddy Exports in India</p>
					<ul>
						<li>Long lasting Canvas bag</li>
						<li>Reusable</li>
						<li>Durable</li>
					</ul>
			</div>
			</form>
		</div> <!-- info area -->
	</div> <!-- detailstop -->
	<?php endif; ?>
	<div class="row"> <!-- detailsbottom -->
	<div class="span12">
		<ul class="nav nav-tabs">
			<?php for($counter = 0; $counter < sizeof($descs_info); $counter++): ?>
				<li<?php if($counter == 0) echo ' class="active"'; ?>><a href="#<?php echo $descs_info[$counter]['id']; ?>" data-toggle="tab"><?php echo $descs_info[$counter]['tab_name']; ?></a></li>
			<?php endfor; ?>
			<li<?php if(sizeof($descs_info) == 0) echo ' class="active"'; ?>><a href="#comment" data-toggle="tab">评论</a></li>
        </ul>
        <div id="myTabContent" class="tab-content"> <!-- myTabContent -->
        	<?php for($counter = 0; $counter < sizeof($descs_info); $counter++): ?>
        		<div class="tab-pane fade<?php if($counter == 0) echo ' in active'; ?>" id="<?php echo $descs_info[$counter]['id'];?>">
        		<p><?php echo $descs_info[$counter]['tab_content']; ?></p>
        		</div>
        	<?php endfor; ?>
        	<div class="tab-pane fade<?php if(sizeof($descs_info) == 0) echo ' in active'; ?>" id="comment">
        		<?php foreach($comments as $comment): ?>
        			<p><?php echo $comment['first_name'].' says: '.$comment['content']; ?></p>
        		<?php endforeach; ?>
        		<form class="form-horizontal" method="post" action="<?php echo base_url()."shop/addComment"; ?>" >
	        		<fieldset>
	        			<input type="hidden" name="itemId" value="<?php echo $info['id']; ?>">
	        			<input type="hidden" name="userId" value="<?php echo 1; ?>">
	        			<div class="control-group<?php if(strlen(form_error('comment')) > 0) echo " error"; ?>">
						  <!-- Text input-->
						  <label class="control-label" for="comment">留言:</label>
						  <div class="controls">
						    <input id="comment" name="comment" placeholder="" class="input-medium" type="text" value="<?php echo set_value('comment'); ?>">
						    <p class="help-block"><?php echo form_error('comment'); ?></p>
						  </div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">提交</button>
						</div>
	        		</fieldset>
	        	</form>
        	</div>
        </div> <!-- myTabContent -->
    <hr />
	</div>
	</div> <!-- detailsbottom -->
	
</div>
</div><!--Body content-->
