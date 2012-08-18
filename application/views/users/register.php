
<div class="row">
<div class="span10">
				    
<form class="form-horizontal" method="post" action="<?php echo base_url()."users/register"; ?>" >
<fieldset>
<div id="legend" class="">
<legend class="">Register - 52UKSHOPPING</legend>
	<em>In order to register with us, we need to know a little bit about you. Please complete your registration by filling out your details below and clicking ‘register’.</em>
	<h5><em>* indicate required </em></h5>
</div><!-- legen -->
	
<div class="control-group">
      <label class="control-label">Title</label>
      <div class="controls">
	      <!-- Inline Radios -->
	      <label class="radio inline"><input checked="checked" value="Miss" name="title" type="radio" <?php echo set_radio('title', 'Miss', TRUE); ?>>Miss</label>
	      <label class="radio inline"><input value="Mrs" name="title" type="radio" <?php echo set_radio('title', 'Mrs'); ?>>Mrs</label>
	      <label class="radio inline"><input value="Mr" name="title" type="radio" <?php echo set_radio('title', 'Mr'); ?>>Mr</label>
	      <label class="radio inline"><input value="Ms" name="title" type="radio" <?php echo set_radio('title', 'Ms'); ?>>Ms</label>
	      <label class="radio inline"><input value="Dr" name="title" type="radio" <?php echo set_radio('title', 'Dr'); ?>>Dr</label>
	  </div>
</div>

<div class="control-group<?php if(strlen(form_error('firstname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="firstname">First Name</label>
  <div class="controls">
    <input id="firstname" name="firstname" placeholder="" class="input-medium" type="text" value="<?php echo set_value('firstname'); ?>">
    <p class="help-block"><?php echo form_error('firstname'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('lastname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="lastname">Last Name</label>
  <div class="controls">
    <input id="lastname" name="lastname" placeholder="" class="input-medium" type="text" value="<?php echo set_value('lastname'); ?>">
    <p class="help-block"><?php echo form_error('lastname'); ?></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="birthday">Birthday</label>
  <div class="controls">
    <div class="input-append date" id="birthday" data-date="1980-01-01" data-date-format="yyyy-mm-dd">
		<input class="span2 input-medium" name="birthday" type="text" value="<?php echo set_value('birthday'); ?>" readonly>
		<span class="add-on"><i class="icon-th"></i></span>
	</div>
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('postcode')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="postcode">Postcode</label>
  <div class="controls">
    <input id="postcode" name="postcode" placeholder="" class="input-small" type="text" value="<?php echo set_value('postcode'); ?>">
    <p class="help-block"><?php echo form_error('postcode'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('housename')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="housename">House Name/Number</label>
  <div class="controls">
    <input id="housename" name="housename" placeholder="" class="input-small" type="text" value="<?php echo set_value('housename'); ?>">
    <p class="help-block"><?php echo form_error('housename'); ?></p>
  </div>
</div>
	
<div class="control-group<?php if(strlen(form_error('address_one')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="address_one">Address line 1</label>
  <div class="controls">
    <input id="addressone" name="address_one" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('address_one'); ?>">
    <p class="help-block"><?php echo form_error('address_one'); ?></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="address_two">Address line 2</label>
  <div class="controls">
    <input id="addresstwo" name="address_two" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('address_two'); ?>">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group<?php if(strlen(form_error('city')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="city">Town/City</label>
  <div class="controls">
    <input id="city" name="city" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('city'); ?>">
    <p class="help-block"><?php echo form_error('city'); ?></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge" >
		<option value="UK" <?php echo set_select('country', 'UK', TRUE); ?>>UK</option>
		<option value="CHN" <?php echo set_select('country', 'CHN'); ?>>CHN</option>
		<option value="US" <?php echo set_select('country', 'US'); ?>>US</option>
	</select>
  </div>
</div>
	
<div class="control-group<?php if(strlen(form_error('email')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="email">Email Address</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('email'); ?>">
    <p class="help-block"><?php echo form_error('email'); ?></p>
  </div>
</div>
	        
<div class="control-group<?php if(strlen(form_error('emailconfirm')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="emailconfirm">Confirm Email Address</label>
  <div class="controls">
    <input id="emailconfirm" name="emailconfirm" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('emailconfirm'); ?>">
    <p class="help-block"><?php echo form_error('emailconfirm'); ?></p>
  </div>
</div>
	        
<div class="control-group<?php if(strlen(form_error('password')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="password">Password</label>
  <div class="controls">
    <input id="password" name="password" placeholder="" class="input-xlarge" type="password" >
    <p class="help-block">6~12 charecters<?php echo form_error('password'); ?></p>
  </div>
</div>
	        
<div class="control-group<?php if(strlen(form_error('passwordconfirm')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="passwordconfirm">Comfirm Password</label>
  <div class="controls">
    <input id="passwordconfirm" name="passwordconfirm" placeholder="" class="input-xlarge" type="password">
    <p class="help-block"><?php echo form_error('passwordconfirm'); ?></p>
  </div>
</div>
	        
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="passport">Passport</label>
  <div class="controls">
    <input id="passport" name="passport" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('passport'); ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="identity_cn">Identity_cn</label>
  <div class="controls">
    <input id="identity_cn" name="identity_cn" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('identity_cn'); ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="mobile">Mobile</label>
  <div class="controls">
    <input id="mobile" name="mobile" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('mobile'); ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input id="telephone" name="telephone" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('telephone'); ?>">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>
</div>

</div> <!-- The main body of the website -->

<?php if(isset($jses)) {  foreach ($jses as $js_path): ?>
	<script type="text/javascript" src="<?php echo base_url().$js_path; ?>"></script> <!-- loop for javascript -->
<?php endforeach; } ?>
</body>
</html>