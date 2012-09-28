<div class="row-fluid">
	<div class="span8">
		<h4><a href="">My cart</a></h4>
	</div>
	<div class="span4">
	<h5>There are <a href=""><?php echo $this->cart->total_items(); ?></a> items, in total <a href=""><?php echo $this->cart->total(); ?></a> pounds</h5>
	</div>
</div>
<form id="cartform" action="<?php echo base_url().'cart/update_cart'; ?>" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="qiulu_1345737075_biz@gmail.com">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="lc" value="UK">
<input type="hidden" name="return" value="http://www.sqlview.com/payment/notify.php">
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
	<?php $item_counter = 1; ?>
	<?php foreach($this->cart->contents() as $item) : ?>
		<?php $productarray = $this->cart->product_options($item['rowid']); ?>
		<tr>
		<td><input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>" /></td>
		
		<td><a href=""><?php echo $item['name']; ?></a></td>
		<input type="hidden" name="item_name_<?php echo $item_counter; ?>" value="<?php echo $item['name']; ?>">
		
		<td><?php echo $this->cart->format_number($item['price']); ?> </td>
		<input type="hidden" name="amount_<?php echo $item_counter; ?>" value="<?php echo $this->cart->format_number($item['price']); ?>">
		
		<td><input type="text" class="input-mini" size="1" name="qty" value="<?php echo $item['qty']; ?>" /></td>
		<input type="hidden" name="quantity_<?php echo $item_counter; ?>" value="<?php echo $item['qty']; ?>">
		
		<td><?php echo $productarray['size']; ?></td>
		<input type="hidden" name="on0_<?php echo $item_counter; ?>" value="size">
		<input type="hidden" name="os0_<?php echo $item_counter; ?>" value="<?php echo $productarray['size']; ?>">
		<?php if(isset($productarray['colour'])): ?>
			<td><?php echo $productarray['colour']; ?></td>
			<input type="hidden" name="on1_<?php echo $item_counter; ?>" value="colour">
			<input type="hidden" name="os1_<?php echo $item_counter; ?>" value="<?php echo $productarray['colour']; ?>">
		<?php else : ?>
			<td><?php echo ''; ?></td>
		<?php endif; ?>
		
		<td><?php echo $this->cart->format_number($item['subtotal']); ?></td>
		
		</tr>
		
		
		
		
	<?php $item_counter++; ?>
	<?php endforeach; ?>
</tbody>

</table>
<div class="row">
<div class="span1">
	<a href="<?php echo base_url().'cart/destroy_cart'; ?>" class="btn btn-danger btn-small">Clean</a>
</div>
<div class="span2 offset7">
	<a class="btn btn-primary btn-small" href="<?php echo base_url().'cart/paid_cart'; ?>">Test paid</a>
	<button id="update" class="btn btn-primary btn-small" type="submit">Update</button>
	<button id="checkout" class="btn btn-success btn-small"><i class="icon-shopping-cart icon-white"></i>Checkout</button>
</div>

</div>
</form>