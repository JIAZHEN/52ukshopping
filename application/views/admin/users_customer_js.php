<script type="text/javascript">
$(document).ready(function() {
	
	var $modal = $('#modal-from-dom');
	$modal.modal({backdrop: true, keyboard: true, show: false});

	$('.delete-btn').click(function(event) {
	
	    event.preventDefault();
	    var user_id = $(this).attr("data-id");
	    var user_email = $(this).attr("data-email");
	    
	    $('#id_tooltip').html(user_id);
	    $('#id_tooltip').attr('title', user_email);
	    $('#id_delete').attr('value', user_id);
	    
	    // Showing twice
	    $modal.modal('show');
	});
			
});
</script>