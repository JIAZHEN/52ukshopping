<div class="row-fluid">
<div class="span3"> <!--Sidebar content-->
<ul class="span10 nav nav-tabs nav-stacked">
	<li><a href=""><h3><?php echo $info['item_name']; ?></h3></a></li>
	<div class="accordion" id="accordion2">
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
              Collapsible Group Item #1
            </a>
          </div>
          <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
              Collapsible Group Item #2
            </a>
          </div>
          <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
              Collapsible Group Item #3
            </a>
          </div>
          <div id="collapseThree" class="accordion-body collapse">
            <div class="accordion-inner">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
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
    	
        <a href='http://www.professorcloud.com/images/zoomengine/bigimage00.jpg' class = 'cloud-zoom' id='zoom1'
            rel="adjustX: 10, adjustY:-4, softFocus:true">
            <img src="http://www.professorcloud.com/images/zoomengine/smallimage.jpg" class="img-polaroid" alt='' align="left" title="Optional title display" />
        </a>
        
    <!--	
        You can optionally create a gallery by creating anchors with a class of 'cloud-zoom-gallery'.
        The anchor's href should point to the big zoom image.
        In the rel attribute you must specify the id of the zoom to use (useZoom: 'zoom1'),
        and also the small image to use (smallImage: /images/....)
        -->
        
		<ul class="span12" id="zoomthumbs">
			    <li>
			    	 <a href='http://www.professorcloud.com/images/zoomengine/bigimage00.jpg' class='cloud-zoom-gallery' title='Thumbnail 1'
        	rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage.jpg" class="img-polaroid" alt = "Thumbnail 1"/></a>
			    </li>
			    <li>
			    	<a href='http://www.professorcloud.com/images/zoomengine/bigimage01.jpg' class='cloud-zoom-gallery' title='Thumbnail 2'
        	rel="useZoom: 'zoom1', smallImage: ' http://www.professorcloud.com/images/zoomengine/smallimage-1.jpg'">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-1.jpg" class="img-polaroid" alt = "Thumbnail 2"/></a>
			    </li>
			    <li>
			    	<a href='http://www.professorcloud.com/images/zoomengine/bigimage02.jpg' class='cloud-zoom-gallery' title='Thumbnail 3'
        	rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage-2.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-2.jpg" class="img-polaroid" alt = "Thumbnail 3"/></a>
			    </li>
			    <li>
			    	 <a href='http://www.professorcloud.com/images/zoomengine/bigimage00.jpg' class='cloud-zoom-gallery' title='Thumbnail 1'
        	rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage.jpg" class="img-polaroid" alt = "Thumbnail 1"/></a>
			    </li>
			    <li>
			    	<a href='http://www.professorcloud.com/images/zoomengine/bigimage01.jpg' class='cloud-zoom-gallery' title='Thumbnail 2'
        	rel="useZoom: 'zoom1', smallImage: ' http://www.professorcloud.com/images/zoomengine/smallimage-1.jpg'">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-1.jpg" class="img-polaroid" alt = "Thumbnail 2"/></a>
			    </li>
			    <li>
			    	<a href='http://www.professorcloud.com/images/zoomengine/bigimage02.jpg' class='cloud-zoom-gallery' title='Thumbnail 3'
        	rel="useZoom: 'zoom1', smallImage: 'http://www.professorcloud.com/images/zoomengine/smallimage-2.jpg' ">
        <img src="http://www.professorcloud.com/images/zoomengine/tinyimage-2.jpg" class="img-polaroid" alt = "Thumbnail 3"/></a>
			    </li>
		    </ul>
	
	<!-- ZOOM -->
		
			
		</div> <!-- imgarea -->
		<div class="span7"> <!-- info area -->
			<form action="<?php echo base_url().'cart/add_cart'; ?>" method="post">
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
			<p>Select a size</p>
			<label class="radio inline"><input checked="checked" value="small" name="size" type="radio" />S</label>
			<label class="radio inline"><input value="medium" name="size" type="radio" />M</label>
			<label class="radio inline"><input value="large" name="size" type="radio" />L</label>
			<div class="selectarea"> <!-- selectarea -->
				<ul class="ul-select">
					<li>Colour</li>
					<li>
						<select name="colour">  
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
						<input type="hidden" name="price" value="<?php echo number_format($info['price'],2); ?>" />
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
		<ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
          <li><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#dropdown1" data-toggle="tab">Third</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active" id="home">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="tab-pane fade" id="profile">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="tab-pane fade" id="dropdown1">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
    <hr />
	</div>
	
	</div> <!-- detailsbottom -->
	
</div>
</div><!--Body content-->
