<?php
class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('d_category_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_name'] = $session_data['first_name'];
	    }
	    
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = 'My cart';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/footer.css');
		
		$js_data['jses'] = array(	 'js/jquery.tools.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/cart/cart.js',
									 'js/navigation.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('cart/index');
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');
	}
	
	public function add_cart() 
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$size = $this->input->post('size');
		$colour = $this->input->post('colour');
		
		$data = array(
					'id' 	  => $id,
					'qty' 	  => $qty,
					'price'	  => $price,
					'name' 	  => $name,
					'options' => array('size' => $size, 'colour' => $colour)
					);
		$this->cart->insert($data);
		
		redirect(base_url().'cart');
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
		
		redirect(base_url().'cart');
	}
	
	function destroy_cart() {
		$this->cart->destroy();
		redirect(base_url().'cart');
	}
}
/* End of file cart.php */
/* Location: ./application/controllers/cart.php */