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
	<div class="row"> <!-- detailstop -->
		<div class="span12">
			<?php for($row = 0; $row < intval(count($items) / 4) + 1; $row++) : ?>
				<ul class="thumbnails">
				<?php for($column = 0; $column < 4; $column++ ): ?>
					<?php if( ($row*4 + $column) < count($items)) : ?>
				<li class="span3">
		          <div class="thumbnail">
		            <a class="visual" href="#" title="<?php echo $items[$row*4 + $column]['item_name']; ?>"></a>
					<img class="product" src="http://www.thebodyshop.co.uk/images/product/Med_Large/06973m_m_l.jpg" /></a>
		            <div class="caption">
		              <h4 class="name"><a href="#"><?php echo $items[$row*4 + $column]['item_name']; ?></a></h4>
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