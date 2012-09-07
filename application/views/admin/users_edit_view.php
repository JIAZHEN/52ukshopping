<div class="span10">

<form class="form-horizontal" id="change_personal" method="post" action="">

<div class="control-group">
      <label class="control-label">Title</label>
      <div class="controls">
      	<input type="hidden" id="id_for_personal" name="id_for_personal" value="<?php echo $user_info['id']; ?>">
	      <!-- Inline Radios -->
	      <label class="radio inline"><input checked="checked" value="Miss" name="title" type="radio" <?php if($user_info['title'] == 'Miss') echo ' checked="true"'; ?>>Miss</label>
	      <label class="radio inline"><input value="Mrs" name="title" type="radio" <?php if($user_info['title'] == 'Mrs') echo ' checked="true"'; ?>>Mrs</label>
	      <label class="radio inline"><input value="Mr" name="title" type="radio" <?php if($user_info['title'] == 'Mr') echo ' checked="true"'; ?>>Mr</label>
	      <label class="radio inline"><input value="Ms" name="title" type="radio" <?php if($user_info['title'] == 'Ms') echo ' checked="true"'; ?>>Ms</label>
	      <label class="radio inline"><input value="Dr" name="title" type="radio" <?php if($user_info['title'] == 'Dr') echo ' checked="true"'; ?>>Dr</label>
	  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="firstname">First Name</label>
  <div class="controls">
    <input id="firstname" name="firstname" placeholder="" class="input-medium" type="text" value="<?php echo $user_info['first_name']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="lastname">Last Name</label>
  <div class="controls">
    <input id="lastname" name="lastname" placeholder="" class="input-medium" type="text" value="<?php echo $user_info['last_name']; ?>">
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
    <input id="postcode" name="postcode" placeholder="" class="input-small" type="text" value="<?php echo $user_info['postcode']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="housename">House Name/Number</label>
  <div class="controls">
    <input id="housename" name="housename" placeholder="" class="input-small" type="text" value="<?php echo $user_info['house_name']; ?>">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="address_one">Address line 1</label>
  <div class="controls">
    <input id="address_one" name="address_one" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['address_one']; ?>">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="address_two">Address line 2</label>
  <div class="controls">
    <input id="addresstwo" name="address_two" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['address_two']; ?>">
    <p class="help-block"></p>
  </div>
</div>
	
<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="city">Town/City</label>
  <div class="controls">
    <input id="city" name="city" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['city']; ?>">
    <p class="help-block"></p>
  </div>
</div>

	
<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="country">Country</label>
  <div class="controls">
    <select id="country" name="country" class="input-xlarge">
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
    <input id="passport" name="passport" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['passport']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="identity_cn">Identity_cn</label>
  <div class="controls">
    <input id="identity_cn" name="identity_cn" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['identity_cn']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="mobile">Mobile</label>
  <div class="controls">
    <input id="mobile" name="mobile" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['mobile']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="control-group">
  <!-- Text input-->
  <label class="control-label" for="telephone">Telephone</label>
  <div class="controls">
    <input id="telephone" name="telephone" placeholder="" class="input-xlarge" type="text" value="<?php echo $user_info['telephone']; ?>">
    <p class="help-block"></p>
  </div>
</div>

<div class="form-actions">
<button type="reset" id="reset" class="btn btn-danger">取消</button>
<button type="submit" class="btn btn-primary">确定</button>
</div>
</form>

</div>