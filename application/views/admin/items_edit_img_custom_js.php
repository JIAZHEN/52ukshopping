<script type="text/javascript">
$(document).ready(function() {
	
		var $modal = $('#modal-from-dom');
		$modal.modal({backdrop: true, keyboard: true, show: false});
	
		$('.img-options').click(function(event) {

	    	event.preventDefault();
		    var id = $(this).attr('data-id');
		    var img_src = $(this).attr('data-src');
		    
		    $('#id_tooltip').html(id);
		    $('#id_delete').attr('value', id);
		    $('.modal-body img').attr('src', img_src);
		    
		    // Showing twice
		    $modal.modal('show');
	    });
			
});
</script>