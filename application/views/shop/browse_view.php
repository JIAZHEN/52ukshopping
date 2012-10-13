<div class="row-fluid">

<div class="span3"> <!--Sidebar content-->
<ul class="span10 nav nav-tabs nav-stacked">
	<li><a href=""><h3><?php echo $page_title; ?></h3></a></li>
<?php if(isset($lv_cat) && count($lv_cat) > 0): ?>
<?php foreach($lv_cat as $value):?>
	 <li><a href="<?php echo base_url().'shop/category/'.$value['id']; ?>"><?php echo $value['category_name']; ?><i class="icon-chevron-right pull-right"></i></a></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<img width="200px" src="<?php echo base_url();?>images/slide-img.png" />
<img width="200px" src="<?php echo base_url();?>images/slide-img-2.png" />
</div> <!--Sidebar content-->

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
	<?php if(sizeof($display_paginations) != 0): ?>
	<div class="row"> <!-- pagination -->
	<div class="pagination">
	  <ul>
	    <li><a href="<?php echo base_url().$pageLink; ?>">&laquo;</a></li>
	   <?php if($pageOffset != 0): ?>
	    	<li><a href="<?php echo base_url().$pageLink.'/'.($display_paginations[0] - 1); ?>">...</a></li>
	    <?php endif; ?>
	    <?php foreach($display_paginations as $display_pagination): ?>
	    	<li<?php if($display_pagination==($pageNum+1)) echo ' class="disabled"'; ?>><a href="<?php echo base_url().$pageLink.'/'.$display_pagination; ?>"><?php echo $display_pagination; ?></a></li>
	    <?php endforeach; ?>
	    <?php if($pageOffset != ($amount_pagination - 1)): ?>
	    	<li><a href="<?php echo base_url().$pageLink.'/'.($display_paginations[count($display_paginations) - 1] + 1); ?>">...</a></li>
	    <?php endif; ?>
	    <li><a href="<?php echo base_url().$pageLink.'/'.$total_page_num; ?>">&raquo;</a></li>
	 </ul>
	</div>
	</div><!-- pagination -->
	
	<div class="row"> <!-- detailstop -->
		<div id="display" class="span12">
			<?php for($row = 0; $row < intval(count($items) / 4) + 1; $row++) : ?>
				<ul class="thumbnails">
				<?php for($column = 0; $column < 4; $column++ ): ?>
					<?php if( ($row*4 + $column) < count($items)) : ?>
				<li class="span3">
		          <div class="thumbnail">
		            <a class="visual" href="<?php echo base_url().'shop/detail/'.$items[$row*4 + $column]['id']; ?>" title="<?php echo $items[$row*4 + $column]['item_name']; ?>">
					<img class="span12 product" src="<?php if(count($items_img[$row*4 + $column]) != 0 && !is_null($items_img[$row*4 + $column]['thumb_address'])) echo base_url().$items_img[$row*4 + $column]['thumb_address']; else echo 'http://placehold.it/300x200'; ?>" /></a>
		            <div class="caption">
		              <h4 class="name"><a href="<?php echo base_url().'shop/detail/'.$items[$row*4 + $column]['id']; ?>"><?php echo $items[$row*4 + $column]['item_name']; ?></a></h4>
		              <p><strong>£<?php echo $items[$row*4 + $column]['price']; ?></strong></p>
		              <br />
		              <a href="<?php echo base_url().'shop/detail/'.$items[$row*4 + $column]['id']; ?>" class="btn btn-primary">Detail</a>
		            </div>
		          </div>
		        </li>
		        
		        <?php endif; ?>
			    <?php endfor; ?>
				</ul>
				<?php endfor; ?>
		</div>
	</div> <!-- detailstop -->
	
	<div class="row"> <!-- pagination -->
	<div class="pagination">
	  <ul>
	    <li><a href="<?php echo base_url().$pageLink; ?>">&laquo;</a></li>
	   <?php if($pageOffset != 0): ?>
	    	<li><a href="<?php echo base_url().$pageLink.'/'.($display_paginations[0] - 1); ?>">...</a></li>
	    <?php endif; ?>
	    <?php foreach($display_paginations as $display_pagination): ?>
	    	<li<?php if($display_pagination==($pageNum+1)) echo ' class="disabled"'; ?>><a href="<?php echo base_url().$pageLink.'/'.$display_pagination; ?>"><?php echo $display_pagination; ?></a></li>
	    <?php endforeach; ?>
	    <?php if($pageOffset != ($amount_pagination - 1)): ?>
	    	<li><a href="<?php echo base_url().$pageLink.'/'.($display_paginations[count($display_paginations) - 1] + 1); ?>">...</a></li>
	    <?php endif; ?>
	    <li><a href="<?php echo base_url().$pageLink.'/'.$total_page_num; ?>">&raquo;</a></li>
	 </ul>
	</div>
	</div><!-- pagination -->
	<?php else: ?>
		<div class="row"> <!-- pagination -->
			<p>对不起, 没有找到相关的商品, 请重新输入</p>
		</div><!-- pagination -->
	
	<?php endif; ?>
	
</div>
</div><!--Body content-->


