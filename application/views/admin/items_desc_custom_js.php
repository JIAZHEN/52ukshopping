<script type="text/javascript">
$(document).ready(function() {
	
		var $modal = $('#modal-from-dom');
		$modal.modal({backdrop: true, keyboard: true, show: false});
	
		$('.delete-btn').click(function(event) {

	    	event.preventDefault();
		    var id = $(this).attr("data-id");
		    var name = $(this).attr("data-sku");
		    
		    $('#id_tooltip').html(id);
		    $('#id_tooltip').attr('title', name);
		    $('#id_delete').attr('value', id);
		    
		    // Showing twice
		    $modal.modal('show');
	    });
			
});
</script>