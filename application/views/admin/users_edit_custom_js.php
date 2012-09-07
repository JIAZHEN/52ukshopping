<script type="text/javascript">

$(document).ready(function() {
	$('#birthday').datepicker();
	
	var validator = $('#change_personal').validate({
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
            alert("successful change! Please use the new password to login from next time.");
        } 
	  });
	
	$('#reset').click(function() {
		$('#change_personal').find('.control-group').removeClass('error success');
		validator.resetForm();
    });
    
    
});

</script>