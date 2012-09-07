<script type="text/javascript">
$(document).ready(function() {
	
	var $modal = $('#modal-from-dom');
	$modal.modal({backdrop: true, keyboard: true, show: false});

$('#testbutton').click(function(event) {

    event.preventDefault();
    
    // Showing twice
    $modal.modal('show');
    $modal.modal('show');
});
			
});
</script>