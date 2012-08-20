<div class="header">
	<div class="logo span2">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="" /></a></div>
	<div class="searcharea">
		    <form class="well form-search">
		    <input type="text" placeholder="Type here" class="input-medium search-query">
		    <button type="submit" class="btn">Search</button>
		    </form>
	</div>
	<div class="basket">
		<ul>
		<li><a href="<?php echo base_url().'cart'; ?>" class="btn btn-success"><i class="icon-shopping-cart icon-white"></i>Items <?php echo $this->cart->total_items(); ?></a></li>
          	<?php if(isset($session_email)) { 	echo '<li><a href="'.base_url().'main/logout" class="btn btn-danger">logout</a></li>';
          										//echo '<li><span class="divider">|</span></li>';
          										echo '<li><a class="btn btn-info">Welcome '.$session_email.'</a></li>'; }
          		  else {	echo '<li><a href="'.base_url().'login" class="btn btn-primary">login</a></li>';
	          		  		//echo '<li><span class="divider">|</span></li>';
	          		  		echo '<li><a href="'.base_url().'users/register" class="btn btn-primary">register</a></li>';
          		  } ?>
		</ul>
		
	</div>
</div>
<!-- delta -112px -->
<div class="oe_nav"> <!-- oe_nav -->
	<div id="oe_overlay" class="oe_overlay"></div>
	<ul id="oe_menu" class="oe_menu"> <!-- oe_menue -->
		<li><a href="<?php echo base_url(); ?>">Home</a>
		</li>
		<!-- loop through the categories -->
		<?php $startValue = -111;
			  $counter = 0;
			  $interval = -112; 
			foreach ($first_level_category as $row): ?>
			<li><a href=""><?php echo $row['category_name']; ?></a>
			<div style="left:<?php echo ($startValue + $interval * $counter++); ?>px;">
				<ul>
					<li class="oe_heading">Summer 2011</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Special Events</a></li>
					<li><a href="#">Runway Show</a></li>
					<li><a href="#">Overview</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Winter 2010</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">New York</a></li>
					<li><a href="#">Behind the scenes</a></li>
					<li><a href="#">Interview</a></li>
					<li><a href="#">Photos</a></li>
					<li><a href="#">Download</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Categories</li>
					<li><a href="#">Casual</a></li>
					<li><a href="#">Business</a></li>
					<li><a href="#">Underwear</a></li>
					<li><a href="#">Nature Pure</a></li>
					<li><a href="#">Swimwear</a></li>
					<li><a href="#">Evening</a></li>
				</ul>
			</div>
			</li>
		<?php endforeach;?>
	</ul><!-- oe_menue -->
</div><!-- oe_nav -->