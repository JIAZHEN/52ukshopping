<div class="span2">
	<ul class="nav nav-list">
	    <li class="nav-header">用户管理</li>
	    	<li<?php if($active_option == 'users_browse') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin'; ?>"><i class="icon-book"></i> 浏览</a></li>
		    <li<?php if($active_option == 'users_edit') echo ' class="active"'; ?>><a href="#"><i class="icon-pencil"></i> 编辑用户</a></li>
		    <li<?php if($active_option == 'users_add') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/add_user'; ?>"><i class="icon-plus"></i> 添加用户</a></li>
		<li class="divider"></li>
		<li class="nav-header">目录管理</li>
	    	<li<?php if($active_option == 'categories_browse') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/categories'; ?>"><i class="icon-book"></i> 浏览</a></li>
		    <li<?php if($active_option == 'categories_edit') echo ' class="active"'; ?>><a href="#"><i class="icon-pencil"></i> 编辑目录</a></li>
		    <li<?php if($active_option == 'categories_add') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/add_category'; ?>"><i class="icon-plus"></i> 添加目录</a></li>
		<li class="divider"></li>
	    <li class="nav-header">商品管理</li>
	    	<li<?php if($active_option == 'skus_browse') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/items'; ?>"><i class="icon-book"></i> 浏览</a></li>
	    	<li<?php if($active_option == 'skus_option') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/options'; ?>"><i class="icon-book"></i> 商品选项</a></li>
		    <li<?php if($active_option == 'skus_edit') echo ' class="active"'; ?>><a href="#"><i class="icon-pencil"></i> 编辑商品资料</a></li>
		    <li<?php if($active_option == 'skus_edit_img') echo ' class="active"'; ?>><a href="#"><i class="icon-pencil"></i> 编辑商品图片</a></li>
		    <li<?php if($active_option == 'skus_add') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/add_item'; ?>"><i class="icon-plus"></i> 添加商品</a></li>
		<li class="divider"></li>
		<li class="nav-header">界面管理</li>
	    <li>
			<div class="dropdown">
			    <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href=""><i class="icon-th-large"></i> 走马灯<b class="caret"></b>
			    </a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a href="<?php echo base_url().'admin/carousels'; ?>"><i class="icon-book"></i> 浏览</a></li>
			    	<li><a href="<?php echo base_url().'admin/add_carousel'; ?>"><i class="icon-plus"></i> 添加</a></li>
			    </ul>
		    </div>
	    </li>
		    <li<?php if($active_option == 'nav_edit') echo ' class="active"'; ?>><a href="<?php echo base_url().'admin/editNav'; ?>"><i class="icon-th-large"></i> 导航栏</a></li>
		    <li<?php if($active_option == 'uis_add') echo ' class="active"'; ?>><a href="#"><i class="icon-plus"></i> 添加用户</a></li>
		<li class="divider"></li>
    </ul>
    <a href="<?php echo base_url().'admin/logout'; ?>" class="btn btn-danger btn-small"> 退出</a>
</div>
