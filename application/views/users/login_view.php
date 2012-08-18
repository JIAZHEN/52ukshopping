<form class="form-horizontal" method="post" action="<?php echo base_url()."verifylogin"; ?>" >
  	<fieldset>
	    <div id="myModal" class="modal">
        <div class="modal-header">
          <a class="close" data-dismiss="modal" >&times;</a>
          <h3>Login</h3>
        </div>
        <div class="modal-body">
			<div class="control-group<?php if(strlen(form_error('email')) > 0) echo " error"; ?>">
			  <!-- Text input-->
			  <label class="control-label" for="email">Email Address</label>
			  <div class="controls">
			    <input id="email" name="email" placeholder="" class="input-xlarge" type="text" value="<?php echo set_value('email'); ?>">
			    <p class="help-block"><?php echo form_error('email'); ?></p>
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
				
			<label class="control-label" for="forgetpassword">Forget password?</label>
			  <div class="controls">
			    <a class="btn btn-info">Click here</a>
			  </div>    
		</div>
    <div class="modal-footer">
      <a class="btn">Cancell</a>
      <button class="btn btn-success" type="submit">Login
    </div>
  </div>
</fieldset>
</form>
