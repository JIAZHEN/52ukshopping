<div class="span10">

<div class="page-header">
  <a><h1>编辑</h1></a>
</div>


<form class="form-horizontal" method="post" action="<?php echo base_url().'admin/edit_item_info/'.$item_info['id']; ?>" >
<fieldset>

<div class="control-group">
      <label class="control-label" for="item_id">Id</label>
      <div class="controls">
	      <input placeholder="" class="input-medium" type="text" value="<?php echo $item_info['id']; ?>" disabled="true">
	      <input id="item_id" type="hidden" name="item_id" value="<?php echo $item_info['id']; ?>">
		  <p class="help-block"></p>
	  </div>
</div>

<div class="control-group<?php if(strlen(form_error('itemname')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="itemname">Item Name</label>
  <div class="controls">
    <input id="itemname" name="itemname" placeholder="" class="input-medium" type="text" value="<?php echo $item_info['item_name']; ?>">
    <p class="help-block"><?php echo form_error('itemname'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('descript')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="descript">Description</label>
  <div class="controls">
  	<textarea rows="5" class="span7" id="descript" name="descript" placeholder=""><?php echo $item_info['description']; ?></textarea>
    <p class="help-block"><?php echo form_error('descript'); ?></p>
  </div>
</div>

<div class="control-group">
  <!-- Select Basic -->
  <label class="control-label" for="category">Category</label>
  <div class="controls">
    <select id="category" name="category" class="input-medium" >
    	<?php foreach($categories as $category): ?>
    		<option value="<?php echo $category['id']; ?>"<?php if($category['id']==$item_info['category_id']) echo ' selected="selected"'; ?>><?php echo $category['category_name']; ?></option>
    	<?php endforeach; ?>
	</select>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('price')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="price">Price</label>
  <div class="controls">
    <input id="price" name="price" placeholder="" class="input-medium" type="text" value="<?php echo $item_info['price']; ?>">
    <p class="help-block"><?php echo form_error('price'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('cost')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="cost">Cost</label>
  <div class="controls">
    <input id="cost" name="cost" placeholder="" class="input-medium" type="text" value="<?php echo $item_info['cost']; ?>">
    <p class="help-block"><?php echo form_error('cost'); ?></p>
  </div>
</div>

<div class="control-group<?php if(strlen(form_error('stock')) > 0) echo " error"; ?>">
  <!-- Text input-->
  <label class="control-label" for="stock">Stock</label>
  <div class="controls">
    <input id="stock" name="stock" placeholder="" class="input-medium" type="text" value="<?php echo $item_info['stock']; ?>">
    <p class="help-block"><?php echo form_error('stock'); ?></p>
  </div>
</div>
	
<div class="form-actions">
	<button type="submit" class="btn btn-primary">Submit</button>
	<button class="btn">Cancel</button>
</div>    
	
</fieldset>
</form>

</div>