<div class="row-fluid">
	<div class="span8">
		<h4><a href="">My cart</a></h4>
	</div>
	<div class="span4">
	<h5>There are <a href=""><?php echo $this->cart->total_items(); ?></a> items, in total <a href=""><?php echo $this->cart->total(); ?></a> pounds</h5>
	</div>
</div>
<form id="cartform" action="<?php echo base_url().'cart/update_cart'; ?>" method="post">
<table class="table table-striped table-condensed">
    <thead class="table table-bordered">
	  <tr>
	    <th></th>
	    <th>Name</th>
	    <th>Price</th>
	    <th>Quantity</th>
	    <th>Size</th>
	    <th>Colour</th>
	    <th>Sutotal</th>
	  </tr>
	</thead>
<tbody>
	<?php foreach($this->cart->contents() as $item) : ?>
		<?php $productarray = $this->cart->product_options($item['rowid']); ?>
		<tr>
		<td><input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>" /></td>
		<td><a href=""><?php echo $item['name']; ?></a></td>
		<td><?php echo $this->cart->format_number($item['price']); ?> </td>
		<td><input type="text" class="input-mini" size="1" name="qty" value="<?php echo $item['qty']; ?>" /></td>
		<td><?php echo $productarray['size']; ?></td>
		<td><?php if(isset($productarray['colour'])) echo $productarray['colour']; else echo ''; ?></td>
		<td><?php echo $this->cart->format_number($item['subtotal']); ?></td>
		</tr>
	<?php endforeach; ?>
</tbody>
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="qiulu_1345737075_biz@gmail.com">
<input type="hidden" name="item_name_1" value="San Francisco Bay(32'X32')">
<input type="hidden" name="amount_1" value="250.00">
<input type="hidden" name="quantity_1" value="1">
<input type="hidden" name="item_name_2" value="Mount Hamilton(24'x15')">
<input type="hidden" name="amount_2" value="50.00">
<input type="hidden" name="quantity_2" value="1">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="lc" value="UK">
<input type="hidden" name="return" value="http://www.sqlview.com/payment/notify.php">
</table>
<div class="row">
<div class="span1">
	<a href="<?php echo base_url().'cart/destroy_cart'; ?>" class="btn btn-danger btn-small">Clean</a>
</div>
<div class="span2 offset7">
	<button id="update" class="btn btn-primary btn-small" type="submit">Update</button>
	<button id="checkout" class="btn btn-success btn-small"><i class="icon-shopping-cart icon-white"></i>Checkout</a>
</div>

</div>
</form>