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
		<li><a href="<?php echo base_url(); ?>">首页</a>
		</li>
		<li><a href="">英国流行大牌</a>
			<div style="left:-111px;">
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
		<li><a href="">劲爆化妆品</a>
			<div style="left:-223px;">
				<ul>
					<li class="oe_heading">Fashion Shows</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">New York</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Events</li>
					<li><a href="#">Fashion Party 2011</a></li>
					<li><a href="#">Evening specials</a></li>
					<li><a href="#">Fashion Day Milano</a></li>
					<li><a href="#">Model Workshops</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Media</li>
					<li><a href="#">Wallpapers</a></li>
					<li><a href="#">Downloads</a></li>
					<li><a href="#">Images</a></li>
					<li><a href="#">Contest 2011</a></li>
					<li><a href="#">Fashion Mania</a></li>
					<li><a href="#">Green Earth Day</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">英国养生品</a>
			<div style="left:-335px;">
				<ul class="oe_full">
					<li class="oe_heading">Fashion Fragrances</li>
					<li><a href="#">Deálure</a></li>
					<li><a href="#">Violet Woman</a></li>
					<li><a href="#">Deep Blue for Men</a></li>
					<li><a href="#">New York, New York</a></li>
					<li><a href="#">Illusion</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">英国奶制品</a>
			<div style="left:-447px;">
				<ul>
					<li class="oe_heading">Shows 2010</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">New York</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Shows 2011</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">New York</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Special Events</li>
					<li><a href="#">Fashion Party 2011</a></li>
					<li><a href="#">Fashion Countdown Party 2010</a></li>
					<li><a href="#">Fashion Day Milano</a></li>
					<li><a href="#">Model Workshops</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">奢侈品代购寄卖</a>
			<div style="left:-559px;">
				<ul>
					<li class="oe_heading">Europe</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Asia</li>
					<li><a href="#">Hong Kong</a></li>
					<li><a href="#">Tokio</a></li>
					<li><a href="#">New Delhi</a></li>
					<li><a href="#">Beijing</a></li>
				</ul>
				<ul>
					<li class="oe_heading">United States</li>
					<li><a href="#">New York</a></li>
					<li><a href="#">Los Angeles</a></li>
					<li><a href="#">Seattle</a></li>
					<li><a href="#">Miami</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">当季英国风</a>
			<div style="left:-671px;">
				<ul>
					<li class="oe_heading">Europe</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Asia</li>
					<li><a href="#">Hong Kong</a></li>
					<li><a href="#">Tokio</a></li>
					<li><a href="#">New Delhi</a></li>
					<li><a href="#">Beijing</a></li>
				</ul>
				<ul>
					<li class="oe_heading">United States</li>
					<li><a href="#">New York</a></li>
					<li><a href="#">Los Angeles</a></li>
					<li><a href="#">Seattle</a></li>
					<li><a href="#">Miami</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">预定您的特别品</a>
			<div style="left:-783px;">
				<ul>
					<li class="oe_heading">Europe</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Asia</li>
					<li><a href="#">Hong Kong</a></li>
					<li><a href="#">Tokio</a></li>
					<li><a href="#">New Delhi</a></li>
					<li><a href="#">Beijing</a></li>
				</ul>
				<ul>
					<li class="oe_heading">United States</li>
					<li><a href="#">New York</a></li>
					<li><a href="#">Los Angeles</a></li>
					<li><a href="#">Seattle</a></li>
					<li><a href="#">Miami</a></li>
				</ul>
			</div>
		</li>
		<li><a href="">官方微博</a>
			<div style="left:-895px;">
				<ul>
					<li class="oe_heading">Europe</li>
					<li><a href="#">Milano</a></li>
					<li><a href="#">Paris</a></li>
					<li><a href="#">Berlin</a></li>
					<li><a href="#">London</a></li>
				</ul>
				<ul>
					<li class="oe_heading">Asia</li>
					<li><a href="#">Hong Kong</a></li>
					<li><a href="#">Tokio</a></li>
					<li><a href="#">New Delhi</a></li>
					<li><a href="#">Beijing</a></li>
				</ul>
				<ul>
					<li class="oe_heading">United States</li>
					<li><a href="#">New York</a></li>
					<li><a href="#">Los Angeles</a></li>
					<li><a href="#">Seattle</a></li>
					<li><a href="#">Miami</a></li>
				</ul>
			</div>
		</li>
	</ul><!-- oe_menue -->
</div><!-- oe_nav -->