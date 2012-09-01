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
		<div class="btn-toolbar" style="margin: 0;">
              <?php if(isset($session_name)) : ?> 
               <div class="btn-group">
               		<a class="btn btn-info"><?php echo 'Welcome '.$session_name; ?></a>
               		<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    <ul class="dropdown-menu">
				    <li><a href="#"><i class="icon-pencil"></i> Edit Profile</a></li>
				    <li><a href="#"><i class="icon-user"></i> View Profile</a></li>
				    <li><a href="#"><i class="icon-th-list"></i> Order History</a></li>
				    <li class="divider"></li>
				    <li><a href="#"><i class="icon-wrench"></i> Change password</a></li>
				    </ul>
               </div>
                <div class="btn-group">
               		<a href="<?php echo base_url().'main/logout'; ?>" class="btn btn-danger">logout</a>
               </div>
               <?php else: ?>
               		<div class="btn-group">
               			<a href="<?php echo base_url().'login'; ?>" class="btn btn-primary">login</a>
               		</div>
               		<div class="btn-group">
	          			<a href="<?php echo base_url().'users/register'; ?>" class="btn btn-primary">register</a>
	          		</div>
	          <?php endif; ?>
	          <div class="btn-group">
                <a href="<?php echo base_url().'cart'; ?>" class="btn btn-success"><i class="icon-shopping-cart icon-white"></i>Items <?php echo $this->cart->total_items(); ?></a>
              </div><!-- /btn-group -->
          		  
              
             
		</div>
	</div>
</div>

<!-- delta -112px -->
<div class="oe_nav"> <!-- oe_nav -->
	<div id="oe_overlay" class="oe_overlay"></div>
	<ul id="oe_menu" class="oe_menu"> <!-- oe_menue -->
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<!-- loop through the categories -->
		<?php $startValue = -111;
			  $counter = 0;
			  $interval = -112; 
			foreach($category as $key => $value): ?> <!-- first category -->
				<li><a href="<?php if($key == 8) { echo base_url().'shop'; } else {echo base_url().'shop/category/'.$key;} ?>"><?php echo $value['name']; ?></a>
				<?php if(sizeof($value['children']) > 0) : ?>
					<div style="left:<?php echo ($startValue + $interval * $counter); ?>px;">
					<?php foreach($value['children'] as $sub_key => $sub_value): ?> <!-- second category -->
						<ul>
							<li class="oe_heading"><?php echo $sub_value['name']; ?></li>
							<?php if(sizeof($sub_value['children']) > 0) : ?>
								<?php foreach($sub_value['children'] as $third_cat_key => $third_cat_value): ?>
									<li><a href="<?php echo base_url().'shop/category/'.$third_cat_key; ?>"><?php echo $third_cat_value; ?></a></li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					<?php endforeach; ?>
					</div>
				<?php endif; $counter++; ?>
			</li>
		<?php endforeach;?>
	</ul><!-- oe_menue -->
</div><!-- oe_nav -->