<div class="row-fluid">
<div class="span3"> <!--Sidebar content-->
<ul id="selectable">
     <li class="ui-widget-content">copyright</li>
     <li class="ui-widget-content">sitemap</li>
     <li class="ui-widget-content">contact</li>
     <li class="ui-widget-content">to top</li>
     <li class="ui-widget-content">copyright</li>
     <li class="ui-widget-content">sitemap</li>
     <li class="ui-widget-content">contact</li>
     <li class="ui-widget-content">to top</li>
     <li class="ui-widget-content">copyright</li>
     <li class="ui-widget-content">sitemap</li>
     <li class="ui-widget-content">contact</li>
     <li class="ui-widget-content">to top</li>
</ul>
<img class="imgstyle" src="<?php echo base_url();?>images/slide-img.png" />
<img class="imgstyle" src="<?php echo base_url();?>images/slide-img-2.png" />
</div>
<div class="span9"> <!--Body content-->
	<div class="row"> <!-- breadcrumb -->
		<div class="span12"> 
			<ul class="breadcrumb">
			    <li><a href="#">Home</a><span class="divider">/</span></li>
			    <li><a href="#">Shop</a> <span class="divider">/</span></li>
			    <li class="active">Detail</li>
			    <a href="" class="pull-right">Need help?</a>
		    </ul>
		</div> 
	</div> <!-- breadcrumb -->
	<?php if(isset($info)): ?>
	<div class="row"> <!-- detailstop -->
		<div class="span5"> <!-- imgarea -->
			<img src="<?php echo base_url().$info['image'];?>" />
			<div>
				<ul class="thumbnails">
				    <li class="span4">
				    	<a href="#" class="thumbnail">
				    		<img class="visual-S" src="<?php echo base_url();?>images/tbsareaBigPic.jpg" />
				    	</a>
				    </li>
				    <li class="span4">
				    	<a href="#" class="thumbnail">
				    		<img class="visual-S" src="<?php echo base_url();?>images/tbsareaBigPic.jpg" />
				    	</a>
				    </li>
				    <li class="span4">
				    	<a href="#" class="thumbnail">
				    		<img class="visual-S" src="<?php echo base_url();?>images/tbsareaBigPic.jpg" />
				    	</a>
				    </li>
			    </ul>
			</div>
		</div> <!-- imgarea -->
		<div class="span7"> <!-- info area -->
			<form action="<?php echo base_url().'cart/add_cart'; ?>" method="post">
			<h2>SKU name</h2>
			<input type="hidden" name="id" value="3" />
			<input type="hidden" name="name" value="SKU" />
			<span class="ratings-imgs"></span>
			<p>Rate and recommends</p>
			<ul class="reviewul">
				<li><a href="#">Read Review</a></li>
				<li><span class="divider">|</span></li>
				<li><a href="#">Read Review</a></li>
			</ul>
			<hr />
			<p>Select a size</p>
			<label class="radio inline"><input checked="checked" value="small" name="size" type="radio" />S</label>
			<label class="radio inline"><input value="medium" name="size" type="radio" />M</label>
			<label class="radio inline"><input value="large" name="size" type="radio" />L</label>
			<div class="selectarea"> <!-- selectarea -->
				<ul class="ul-select">
					<li>Colour</li>
					<li>
						<select name="colour" class="selectbox">  
					        <option value="yellow">yellow</option>  
					        <option value="blue">blue</option>  
					        <option value="red">red</option> 
				        </select>
				    </li>
				</ul>
				<ul class="ul-select">
					<li>Quantity</li>
					<li><input type="text" class="input-mini" size="1" name="quantity" value="1" />
				    </li>
				</ul>
			</div> <!-- selectarea -->
			<div id="buttonbox"> <!-- buttonbox -->
					<div class="span6">
						<p>Price</p><strong>£ <?php echo number_format($info['price'],2); ?></strong>
						<input type="hidden" name="price" value="5" />
					</div>
					<button class="span6 btn btn-success pull-right btn-large" type="submit">Buy now</button>
					
				
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
			<div id="tabs"> <!-- tabs -->
				<ul>
					<li><a href="#tabs-1">Review</a></li>
					<li><a href="#tabs-2">Q&A's</a></li>
					<li><a href="#tabs-3">Delivery</a></li>
				</ul>
				<div id="tabs-1">
					<p>Review</p>
				</div>
				<div id="tabs-2">
					<p>Q&A's</p>
				</div>
				<div id="tabs-3">
					<p>Delivery</p>
				</div>
			</div> <!-- tabs -->
	</div>
	</div> <!-- detailsbottom -->
</div>
</div><!--Body content-->
