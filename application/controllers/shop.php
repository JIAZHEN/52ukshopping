<?php
class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }
	    
	    $nav_data['init'] = "";
		$data['page_title'] = 'Welcome';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css', 
								'jqueryui/css/ui.selectmenu.css',
								'css/shop/detail.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery.tools.min.js',
									 'js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'js/shop/detail.js',
									 'jqueryui/js/ui.selectmenu.js',
									 'bootstrap/js/bootstrap.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/detail_view');
		$this->load->view('templates/footer', $footer_data);
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */