<h1>Here is your cart</h1>
<h3>There are <strong><?php echo $this->cart->total_items(); ?></strong> items</h3>
<h3>In total <strong><?php echo $this->cart->total(); ?></strong> pounds</h3>

<form action="<?php echo base_url().'entry/update_cart'; ?>" method="post">

<?php foreach($this->cart->contents() as $item) : ?>
	<input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>" />
	<p><a href=""><?php echo $item['name']; ?></a></p>
	<?php if ($this->cart->has_options($item['rowid'])): ?>
		<?php foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value ) : ?>
			<strong><?php echo $option_name; ?></strong>: <?php echo $option_value; ?> <br />
		<?php endforeach; ?>
	<?php endif; ?>
	<p>price: <?php echo $this->cart->format_number($item['price']); ?> </p>
	<input type="text" name="qty" value="<?php echo $item['qty']; ?>" />
	<p>price: <?php echo $this->cart->format_number($item['subtotal']); ?></p>
<?php endforeach; ?>
	<a href="<?php echo base_url().'entry/cart_destroy'; ?>">Clean Cart</a>
	<button type="submit">Update
		
</form>