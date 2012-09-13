<script type="text/javascript">
$(document).ready(function() {
	
		$('#category_level').change(function() {
			$.ajax({  
	               type:"post",
	               dataType: "json",
	               data: "cat_level=" + ($(this).val() - 1),  
	               url:"<?php echo site_url('admin/edit_categories_change_level'); ?>",  
	               success: function(data){
	               		$('#parent_cat option').remove();
	               		for(var index = 0; index < data.length; index++) {
		               		$('#parent_cat').append('<option value="'+data[index].id+'">'+data[index].category_name+'</option>');
	               		}
	               },  
	               error: function() {  
	                  alert("ajax error");  
	               }  
	        });
		});
			
});
</script>