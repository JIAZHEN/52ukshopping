<script type="text/javascript">
$(document).ready(function() {

	var itemId = $('#cookie_item_id').val();
	var itemName = $('#cookie_item_name').val();
	var itemImg = $('#zoom1').attr('href');
	
	var canAdd = true; //初始可以插入cookie信息 
	var hisArt = $.cookie("hisArt"); 
	var len = 0; 
	if(hisArt){ 
	    hisArt = eval("("+hisArt+")"); 
	    len = hisArt.length; 
	}
	$(hisArt).each(function(){ 
	    if(this.itemId == itemId){ 
	        canAdd = false; //已经存在，不能插入 
	        return false; 
	    } 
	});
	if(canAdd==true){ 
	    var json = "["; 
	    var start = 0; 
	    if(len>4){start = 1;} 
	    for(var i=start;i<len;i++){ 
	        json = json + "{\"itemId\":\""+hisArt[i].itemId+"\",\"itemName\":\""+hisArt[i].itemName+"\",\"itemImg\":\""+hisArt[i].itemImg+"\"},"; 
	    } 
	    json = json + "{\"itemId\":\""+itemId+"\",\"itemName\":\""+itemName+"\",\"itemImg\":\""+itemImg+"\"}]"; 
	    $.cookie("hisArt",json,{expires:7}); 
	}
	// add to view
	var json = eval("("+$.cookie("hisArt")+")");
    for(var i=0; i<json.length;i++){ 
        $('#viewedList').append("<li><a href='"+json[i].itemId+"' target='_blank'><img src='"+json[i].itemImg+"' width='200' height='50'>"+json[i].itemName+"</a><li>"); 
    }

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
