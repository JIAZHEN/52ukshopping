<?php
class Entry extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
	}

	public function index()
	{
		 
		$this->load->view('good_view');
	}
	
	public function add_cart() 
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$size = $this->input->post('size');
		
		$data = array(
					'id' 	  => $id,
					'qty' 	  => $qty,
					'price'	  => $price,
					'name' 	  => $name,
					'options' => array('Size' => $size)
		
					);
		$this->cart->insert($data);
		
		redirect(base_url().'entry/flow');
	}
	
	public function update_cart() 
	{
		$id = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		
		$data = array(
					'rowid' 	  => $id,
					'qty' 	  => $qty
		
					);
		$this->cart->update($data);
		
		redirect(base_url().'entry/flow');
	}
	
	public function flow() 
	{
		$this->load->view('flow_view');
	}
	
	function cart_destroy() {
		$this->cart->destroy();
		redirect(base_url().'entry/flow');
	}
}
/* End of file entry.php */
/* Location: ./application/controllers/entry.php */