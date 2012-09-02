<script type="text/javascript">

$(document).ready(function() {

  var validator = $('#change_password').validate({
	    rules: {
	      inputoldpsw: {
	        required: true,
	        remote: {
		        url: "http://192.168.1.4/transaction/users/check_password?fresh=" + Math.random(),
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
    
    $('#birthday').datepicker();
    
});

</script>