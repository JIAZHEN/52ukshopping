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
	    $('#big_img').imgAreaSelect({ maxWidth: 250, maxHeight: 330, handles: true, 
	    
	    	onSelectEnd: function (img, selection) {
	            $('input[name="x1"]').val(selection.x1);
	            $('input[name="y1"]').val(selection.y1);
	            $('input[name="selection-width"]').val(selection.width);
	            $('input[name="selection-height"]').val(selection.height);
	            if(selection.x1 == 0 && selection.x2 == 0 && selection.width == 0 && selection.height == 0) {
		            $('#thums-btn').attr('disabled', 'true');
	            } else {
		            $('#thums-btn').removeAttr('disabled');
	            }
	        }
	    
	    });
			
});
</script>