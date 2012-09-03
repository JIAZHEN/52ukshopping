<script type="text/javascript">

$(document).ready(function() {
	$('#birthday').datepicker();
	
	var validator = $('#change_password').validate({
	    rules: {
	      inputoldpsw: {
	        required: true,
	        remote: {
		        url: "<?php echo base_url(); ?>" + "users/check_password?fresh=" + Math.random(),
		        type: "post",
		        dataType: "json",
		        data: {
		        	old_psw: function() {
			            return $("#inputoldpsw").val();
			        },
			        user_id: function() {
			            return $("#my_id").val();
			        }
		        	
		        }
		    }  
	      },
	      inputnewpassword: {
	        required: true,
	        minlength: 6
	      },
	      inputnewpasswordconf: {
	      	minlength: 6,
	        required: true,
	        equalTo: "#inputnewpassword"
	      }
	    },
	    messages: {
	    	inputoldpsw: {
		    	remote: "wrong password"
	    	},
		    inputnewpasswordconf: {
		    	required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			}
	    },
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    },
	    submitHandler:function(form){
            form.submit();
            alert("successful change! Please use the new password to login from next time.");
        } 
	  });
	
	$('#reset').click(function() {
		$('#change_password').find('.control-group').removeClass('error success');
		validator.resetForm();
    });
    
    
    
    var validator_personal = $('#change_personal').validate({
	    rules: {
	      firstname: {
	        	required: true
	      },
	      lastname: {
	        	required: true
	      },
	      birthday: {
	        	required: true,
	        	date: true
	      },
	      postcode: {
		      	required: true
	      },
	      housename: {
		      	required: true
	      },
	      address_one: {
		      	required: true
	      },
	      city: {
		      	required: true
	      },
	      country: {
		      	required: true
	      },
	      passport: {
		      	required: true,
		      	minlength: 5
	      }
	    },
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    },
	    submitHandler:function(form){
            form.submit();
            alert("successful change!");
        } 
	  });
	  
	  var fun_person_reset = function() {
					$('#change_personal').each (function(){
				    	this.reset();
				    });
				    $('#change_personal').find('.control-group').removeClass('error success');
					validator_personal.resetForm();
		  };		
	  
	  $('#start_update').click(function() {
	  	if ($('#personal_submit').attr('data-event') == undefined) {
	  		// submit button
		  	$('#personal_submit').attr('data-event', 'click');
		  	$("#personal_submit").removeAttr("disabled");
		  	$('#personal_submit').bind("click", function() {
					$('#change_personal').submit();
			});
			// reset button
			$("#personal_reset").removeAttr("disabled");
			$('#personal_reset').bind("click", fun_person_reset);
			// input
			$('#change_personal').find('input').removeAttr('disabled');
	  		$('#change_personal').find('select').removeAttr('disabled');
			
	  	} else {
	  		// submit button
		  	$('#personal_submit').removeAttr('data-event');
		  	$("#personal_submit").unbind("click");
		  	$("#personal_submit").attr('disabled', 'true');
		  	// reset button
		  	$("#personal_reset").unbind("click");
		  	$("#personal_reset").attr('disabled', 'true');
		  	// input
			$('#change_personal').find('input').attr('disabled', 'true');
	  		$('#change_personal').find('select').attr('disabled', 'true');
	  		fun_person_reset();
	  	}

	  });
    
});

</script>