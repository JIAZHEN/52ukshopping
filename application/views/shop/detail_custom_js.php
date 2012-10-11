<script type="text/javascript">
$(document).ready(function() {
	$("#buy_btn").click(function() { 
		var optionValues = "";
		<?php foreach($options as $option): ?>
			optionValues = optionValues + $('select[name="<?php echo $option['Option Name English']; ?>"] option:selected').val() + ";";
		<?php endforeach; ?>
		var required_qty = $('#required_qty').val();
		$.ajax({  
               type:"post",
               dataType: "json",
               data: "item_id=" + <?php echo $info['id']; ?> + "&qty=" + required_qty + "&options=" + optionValues,  
               url:"<?php echo site_url('shop/isInStock'); ?>",  
               success: function(data){
               		if(data.flag == "true") {
	               		$("#add_to_cart_form").submit();
               		} else {
	               		alert("Sorry, the item only has " + data.left + " quantities in stock");
               		}
               }, 
	           error: function() {  
	                alert("Sorry, the item is now out of stock");  
	           }  
       });
	
	});

});
	
</script>
