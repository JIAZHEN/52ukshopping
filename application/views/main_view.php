<div class="row-fluid">
	<div class="span12">
		<div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
            	<?php foreach($carousels as $key => $carousel): ?>
            		<div class="item<?php if($key == 0) echo ' active'; ?>">
		                <img class="carouselsize" src="<?php echo base_url().$carousel['img_address']; ?>" width="1024" height="400" alt="">
		                <div class="carousel-caption">
		                  <h4><?php echo $carousel['name']; ?></h4>
		                  <p><?php echo $carousel['description']; ?>
		                  </p>
		                </div>
		            </div>
            	<?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
	</div>
</div>

<div class="row"> <!-- warrantiesrow -->
<div class="span2 offset1">
<img src="images/locker" width="39" height="47" /><a href="">Security payment</a>
</div>
<div class="span2 offset1">
<img src="images/return" width="39" height="47" /><a href="">Security payment</a>
</div>
<div class="span2 offset1">
<img src="images/delivery" width="39" height="47" /><a href="">Security payment</a>
</div>
</div> <!-- warrantiesrow -->

<div class="sliders well"> <!-- sliders -->
	<a class="prev browse left"></a> <!-- "previous page" action -->
	<div class="scrollable" id="scrollable"> <!-- scrollable -->
	  <div class="items"> <!-- items -->

	    <!-- 1-5 -->
	      <?php $showCounter = 0; ?>
	      <?php foreach($deskShowInfo as $info): ?>
	      	<?php if($showCounter % 5 == 0) echo '<div>'; ?>
	      		<a href="<?php echo base_url().'shop/detail/'.$info['item_id']; ?>"><img src="<?php echo base_url().$info['img_address']; ?>" /></a>
	      	<?php if($showCounter % 5 == 0) echo '</div>'; ?>
	      	<?php $showCounter++; ?>
	      <?php endforeach; ?>
	
	  </div> <!-- items -->
	</div> <!-- scrollable -->
	<a class="next browse right"></a> <!-- "next page" action -->
</div> <!-- sliders -->

<div> <!-- tbsarea -->
	<?php if(isset($lv_cat) && count($lv_cat) > 0): ?>
				<?php for($row = 0; $row < intval(count($lv_cat) / 3) + 1; $row++): ?>
				<ul class="thumbnails">
					<?php for($column = 0; $column < 3; $column++ ): ?>
					<?php if( ($row*3 + $column) < count($lv_cat)) : ?>
				<li>
		          <div class="thumbnail">
		            <a class="visual" href="<?php echo base_url().'shop/category/'.$lv_cat[$row*3 + $column]['id']; ?>" title="<?php echo $lv_cat[$row*3 + $column]['category_name']; ?>">
					<img class="product" onload="if(this.width>300)this.width=300" height="200" src="<?php if(is_null($lv_cat[$row*3 + $column]['img_address'])) echo 'http://placehold.it/300x200'; else echo base_url().$lv_cat[$row*3 + $column]['img_address']; ?>"></a>
		            <div class="caption">
		              <h4 class="name"><a href="<?php echo base_url().'shop/category/'.$lv_cat[$row*3 + $column]['id']; ?>"><?php echo $lv_cat[$row*3 + $column]['category_name']; ?></a></h4>
		              <span class="ratings-imgs" title="4.9/5" data-ratings="4.9"></span>
		              <p class="detail">(4.9 / 5)</p>
		              <br />
		              <a href="<?php echo base_url().'shop/category/'.$lv_cat[$row*3 + $column]['id']; ?>" class="btn btn-primary">View</a>
		            </div>
		          </div>
		        </li>
			        <?php endif; ?>
			        <?php endfor; ?>
				</ul>
				<?php endfor;?>
			<?php endif; ?>
</div> <!-- tbsarea -->
