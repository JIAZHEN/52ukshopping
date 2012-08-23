$(document).ready(function() {
 $('#checkout').click(function() {
       	$('#cartform').attr('action', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
    });
    
 $('#update').click(function() {
       	$('#cartform').attr('action', 'cart/update_cart');
    });
});