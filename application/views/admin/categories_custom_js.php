<script type="text/javascript">
$(document).ready(function() {
	
		var $modal = $('#modal-from-dom');
		$modal.modal({backdrop: true, keyboard: true, show: false});
	
		$('.delete-btn').click(function(event) {

	    	event.preventDefault();
		    var id = $(this).attr("data-id");
		    var name = $(this).attr("data-name");
		    
		    var level = $(this).attr("data-level");
		    
		    $('#id_tooltip').html(id);
		    $('#id_tooltip').attr('title', name);
		    $('#id_delete').attr('value', id);
		    $('#alert-div').remove();
		    $('.modal-body').append('<div id="alert-div" class="alert alert-error">注意！如果删除此目录，该目录下所有子目录和商品将被删除！</div>');
		    
		    // Showing twice
		    $modal.modal('show');
	    });
			
});
</script>