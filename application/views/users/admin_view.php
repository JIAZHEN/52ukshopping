<div class="row-fluid">
	<div class="span3 well"> <!--Sidebar content-->
		<ul class="nav nav-list">
			<li class="nav-header">Personal</li>
				<li<?php if($active_tab == 'tab1') echo ' class="active"'; ?>><a href="#tab1" data-toggle="tab">Profile</a></li>
				<li<?php if($active_tab == 'tab2') echo ' class="active"'; ?>><a href="#tab2" data-toggle="tab">Change password</a></li>
			<li class="nav-header">Order history</li>
				<li><a href="#">Orders</a></li>
			<li class="divider"></li>
				<li><a href="#">Help</a></li>
		</ul>
		
	</div> <!--Sidebar content-->
	<div class="span9"> <!--Body content-->
	 	
	 	<ul class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Home</a><span class="divider">/</span></li>
		    <li class="active">My account</li>
		    <a href="" class="pull-right">Need help?</a>
		</ul>
		<div class="tab-content">
				    <div class="tab-pane<?php if($active_tab == 'tab1') echo ' active'; ?>" id="tab1"> <!-- tab1 -->
				    	    <form id="change_personal" class="form-horizontal" method="post" action="<?php echo base_url().'users/update_info'; ?>" >
<fieldset>
<div id="legend" class="">
<legend class="">Personal detail - 52UKSHOPPING</legend>
</div><!-- legen -->
	
<div class="control-group">
      <label class="control-label">Title</label>
      <div class="controls">
      	<input type="hidden" id="id_for_personal" name="id_for_personal" value="<?php echo $user_id; ?>">
	      <!-- Inline Radios -->
	      <label class="radio inline"><input checked="checked" value="Miss" name="title" type="radio" <?php if($user_info['title'] == 'Miss') echo ' checked="true"'; ?> disabled="true">Miss</label>
	      <label class="radio inline"><input value="Mrs" name="title" type="radio" <?php if($user_info['title'] == 'Mrs') echo ' checked="true"'; ?> disabled="true">Mrs</label>
	      <label class="radio inline"><input value="Mr" name="title" type="radio" <?php if($user_info['title'] == 'Mr') echo ' checked="true"'; ?> disabled="true">Mr</label>
	      <label class="radio inline"><input value="Ms" name="title" type="radio" <?php if($user_info['title'] == 'Ms') echo ' checked="true"'; ?> disabled="true">Ms</label>
	      <label class="radio inline"><input value="Dr" name="title" type="radio" <?php if($user_info['title'] == 'Dr') echo ' checked="true"'; ?> disabled="true">Dr</label>
	  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="firstname">First Name</label>
  <div class="controls">
    <input id="firstname" name="firstname" placeholder="" class="input-medium" type="text" value="<?php echo $user_info['first_name']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="lastname">Last Name</label>
  <div class="controls">
    <input id="lastname" name="lastname" placeholder="" class="input-medium" type="text" value="<?php echo $user_info['last_name']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="birthday">Birthday</label>
  <div class="controls">
    <div class="input-append date" id="birthday" data-date="1980-01-01" data-date-format="yyyy-mm-dd">
		<input class="span8 input-medium" name="birthday" type="text" value="<?php echo $user_info['birthday']; ?>" readonly>
		<span class="add-on"><i class="icon-th"></i></span>
	</div>
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="postcode">Postcode</label>
  <div class="controls">
    <input id="postcode" name="postcode" placeholder="" class="input-small" type="text" value="<?php echo $user_info['postcode']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="housename">House Name/Number</label>
  <div class="controls">
    <input id="housename" name="housename" placeholder="" class="input-small" type="text" value="<?php echo $user_info['house_name']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="address_one">Address line 1</label>
  <div class="controls">
    <input id="address_one" name="address_one" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['address_one']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="address_two">Address line 2</label>
  <div class="controls">
    <input id="addresstwo" name="address_two" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['address_two']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="city">Town/City</label>
  <div class="controls">
    <input id="city" name="city" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['city']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

	
<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge" disabled="true">
    	<?php foreach($countries as $country): ?>
    		<option value="<?php echo $country['code']; ?>" <?php if($user_info['country'] == $country['code']) echo 'selected="selected"'; ?>><?php echo $country['name'].', '.$country['code']; ?></option>
    	<?php endforeach;?>
	</select>
  </div>
</div>
	        
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="passport">Passport</label>
  <div class="controls">
    <input id="passport" name="passport" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['passport']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="identity_cn">Identity_cn</label>
  <div class="controls">
    <input id="identity_cn" name="identity_cn" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['identity_cn']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="mobile">Mobile</label>
  <div class="controls">
    <input id="mobile" name="mobile" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['mobile']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input id="telephone" name="telephone" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['telephone']; ?>" disabled="true">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="button" id="start_update" class="btn btn-primary" data-toggle="button">Start update</button>
    <button id="personal_reset" class="btn" disabled="true">Cancel</button>
	<button id="personal_submit" class="btn btn-primary" disabled="true">Submit</button>
	
</div>    
	
</fieldset>
</form>
				    </div> <!-- tab1 -->
				    
				    
				    
				    <div class="tab-pane<?php if($active_tab == 'tab2') echo ' active'; ?>" id="tab2"> <!-- tab2 -->
<form class="form-horizontal" id="change_password" method="post" action="<?php echo base_url().'users/update_password'; ?>">

<div class="control-group">
<label class="span4 control-label" for="inputoldpsw" id="test">Old Password</label>
<div class="span4 controls">
<input type="password" id="inputoldpsw" name="inputoldpsw" placeholder="Old Password">
<input type="hidden" id="my_id" name="my_id" value="<?php echo $user_id; ?>">
</div>
</div>

<div class="control-group">
<label class="span4 control-label" for="inputnewpassword">New Password</label>
<div class="span4 controls">
<input type="password" id="inputnewpassword" name="inputnewpassword" placeholder="New Password">
</div>
</div>

<div class="control-group">
<label class="span4 control-label" for="inputnewpasswordconf">Confirm New Password</label>
<div class="span4 controls">
<input type="password" id="inputnewpasswordconf" name="inputnewpasswordconf" placeholder="Confirm New Password">
</div>
</div>

<div class="form-actions">
<button type="reset" id="reset" class="btn btn-danger offset3">Reset</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
 
				    </div> <!-- tab2 -->
		</div> <!-- tab contant -->
		
		
	</div> <!--Body content-->
</div>