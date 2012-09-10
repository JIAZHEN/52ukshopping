<form class="form-horizontal" method="post" action="<?php echo base_url()."admin/login"; ?>" >
<fieldset>
	    <div id="myModal" class="modal">
	        <div class="modal-header">
	          <a class="close" data-dismiss="modal" >&times;</a>
	          <h3>Login</h3>
	        </div>
	        <div class="modal-body">
				<div class="control-group<?php if(strlen(form_error('username')) > 0) echo " error"; ?>">
				  <!-- Text input-->
				  <label class="control-label" for="username">Username</label>
				  <div class="controls">
				    <input id="username" name="username" placeholder="Username" class="input-xlarge" type="text" value="<?php echo set_value('username'); ?>">
				    <p class="help-block"><?php echo form_error('username'); ?></p>
				  </div>
				</div>	        
				<div class="control-group<?php if(strlen(form_error('password')) > 0) echo " error"; ?>">
				  <!-- Text input-->
				  <label class="control-label" for="password">Password</label>
				  <div class="controls">
				    <input id="password" name="password" placeholder="Password" class="input-xlarge" type="password" >
				    <p class="help-block"><?php echo form_error('password'); ?></p>
				  </div>
				</div>  
			</div>
		    <div class="modal-footer">
		      <a class="btn">Cancell</a>
		      <button class="btn btn-success" type="submit">Login</button>
		    </div>
	    </div>
</fieldset>
</form>