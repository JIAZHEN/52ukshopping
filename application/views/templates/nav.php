<div class="row-fluid">
  <div class="span2">
  		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.jpg" alt=""></a>
  </div>
  <div class="span5">
	<form class="well form-search" method="post" action="<?php echo base_url().'shop/search'; ?>">
    	<input name="searchkeyword" type="text" placeholder="Type here" class="input-large search-query">
    	<button type="submit" class="btn">Search</button>
    </form></div>
  <div class="span5 well">
	  <div class="btn-toolbar" style="margin: 0;">
          <?php if(isset($session_name)) : ?> 
           <div class="btn-group">
           		<a class="btn btn-info"><?php echo 'Welcome '.$session_name; ?></a>
           		<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			    <ul class="dropdown-menu">
			    <li><a href="<?php echo base_url().'users'; ?>"><i class="icon-pencil"></i> Edit Profile</a></li>
			    <li><a href="<?php echo base_url().'users'; ?>"><i class="icon-user"></i> View Profile</a></li>
			    <li><a href=""><i class="icon-th-list"></i> Order History</a></li>
			    <li class="divider"></li>
			    <li><a href="<?php echo base_url().'users/index/tab2'; ?>"><i class="icon-wrench"></i> Change password</a></li>
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

<div class="row-fluid">
	<div class="span12">
		<div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <a class="brand" href="<?php echo base_url(); ?>">首页</a>
                  <div class="nav-collapse">
                  <?php foreach($category as $value): ?>
                  	<ul class="nav">
                  		<li class="dropdown">
                        <a href="<?php echo base_url().'shop/category/'.$value['id']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $value['name']; ?> <b class="caret"></b></a>
                        <?php if(sizeof($value['children']) > 0) : ?>
                        	<ul class="dropdown-menu">
                        		<?php foreach($value['children'] as $sub_value): ?> <!-- second category -->
                        			<li class="nav-header"><?php echo $sub_value['name']; ?></li>
                        			<?php if(sizeof($sub_value['children']) > 0) : ?>
                        				<?php foreach($sub_value['children'] as $third_cat_value): ?>
											<li><a href="<?php echo base_url().'shop/category/'.$third_cat_value['id']; ?>"><?php echo $third_cat_value['name']; ?></a></li>
										<?php endforeach; ?>
                        			<?php endif; ?>
                        		<?php endforeach; ?>
	                        </ul>
                        <?php endif; ?>
                        </li>
                        <li class="divider-vertical"></li>
                  	</ul>
                  <?php endforeach; ?>
                  <ul class="nav pull-right">
                  	<li><a href="<?php echo base_url().'shop/'; ?>">浏览全部</a></li>
                  </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
	</div>
</div>