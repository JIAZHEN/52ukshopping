<h1>XXX SKU</h1>
<h4>There are 0 items in total 0 pounds</h4>
<form action="<?php echo base_url().'cart/add_cart'; ?>" method="post">
	<p>market price: 167</p>
	<p>current price: 158</p>
	<p>size: xl</p>
	<p>quantity:<input type="text" name="quantity" value="1" size="3" /></p>
	
	<input type="hidden" name="id" value="1" />
	<input type="hidden" name="price" value="158" />
	<input type="hidden" name="name" value="sku1" />
	<input type="hidden" name="size" value="XL" />
	<input type="hidden" name="colour" value="" />
	<button type="submit">add to cart</button>
</form>

<form action="<?php echo base_url().'cart/add_cart'; ?>" method="post">
	<p>market price: 167</p>
	<p>current price: 138</p>
	<p>size: sm</p>
	<p>quantity:<input type="text" name="quantity" value="1" size="3" /></p>
	
	<input type="hidden" name="id" value="1" />
	<input type="hidden" name="price" value="138" />
	<input type="hidden" name="name" value="sku2" />
	<input type="hidden" name="size" value="SM" />
	<input type="hidden" name="colour" value="red" />
	<button type="submit">add to cart</button>
</form>
