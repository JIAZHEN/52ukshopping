<footer>
<div class="row">
<div class="span3">
	<dl>
	     <dt>About us</dt>
	     <dd><a href="">About us</a></dd>
	     <dd><a href="">Career</a></dd>
	</dl>
</div>
<div class="span3">
	<dl>
	     <address>
        <strong>TVlike文化有限公司</strong><br>
        哪个省哪个市无名大道404号<br>
        佚名大厦89层64号<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>
	</dl>
</div>
<div class="span3">
	<dl>
	     <dt>Using the website</dt>
	     <dd><a href="">Site map</a></dd>
	     <dd><a href="">Tearms&conditions</a></dd>
	     <dd><a href="">privacy policy</a></dd>
	</dl>
</div>
</div>

	<hr />
	<p>
		We accept the following credit/debit cards:<img src="<?php echo base_url();?>images/accepted-cards.gif" />
	</p>
</footer>
<strong>&copy; 2012</strong>	
</div> <!-- The main body of the website -->

<?php if(isset($jses)) {  foreach ($jses as $js_path): ?>
	<script type="text/javascript" src="<?php echo base_url().$js_path; ?>"></script> <!-- loop for javascript -->
<?php endforeach; } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/navigation.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	    $("#ajaxbtn").click(function(){  
                       //post the pictureID to controller and return the picture and embed it to the photoboard.  
                       $.ajax({  
                               type:"post",
                               dataType: "json",
                               data: "id=" + $(this).attr("id"),  
                               url:"<?php echo site_url('shop/pagination'); ?>",  
                               success: function(data){
                               			var skuname = "<?php echo 'I am here'; ?>";
                               			var price = 5;
                               			var html_string = '<ul class="thumbnails">';
                               			html_string += '<li class="span3">';
                               			html_string += '<div class="thumbnail">';
                               			html_string += '<a class="visual" href="#" title="' + skuname + '">';
                               			html_string += '<img class="product" src="http://www.thebodyshop.co.uk/images/product/Med_Large/06973m_m_l.jpg" /></a>';
                               			html_string += '<div class="caption">';
                               			html_string += '<h4 class="name"><a href="#">'+skuname+'</a></h4>';
                               			html_string += '<p><strong>£'+price+'</strong></p>';
                               			html_string += '<br />';
                               			html_string += '<a href="" class="btn btn-primary">Detail</a>';
		              
                               			html_string += '</div></div></li></ul>';
                                         $("#display").empty();
                                         $("#display").html(html_string);
                               },  
  
                                error: function() {  
                                          alert("ajax error");  
                                }  
                       }); 
      
    });  
});
	
</script>
</body>
</html>