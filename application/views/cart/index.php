<div class="row-fluid">
	<div class="span8">
		<h4><a href="">My cart</a></h4>
	</div>
	<div class="span4">
	<h5>There are <a href=""><?php echo $this->cart->total_items(); ?></a> items, in total <a href=""><?php echo $this->cart->total(); ?></a> pounds</h5>
	</div>
</div>
<form action="<?php echo base_url().'cart/update_cart'; ?>" method="post">
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
</table>
<div class="row">
<div class="span1">
	<a href="<?php echo base_url().'cart/destroy_cart'; ?>" class="btn btn-danger btn-small">Clean</a>
</div>
<div class="span2 offset7">
	<button class="btn btn-primary btn-small" type="submit">Update</button>
	<a href="" class="btn btn-success btn-small"><i class="icon-shopping-cart icon-white"></i>Checkout</a>
</div>

</div>
</form>