<?php

class Main extends CI_Controller {

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
	     $nav_data['session_email'] = $session_data['email'];
	    }
	    
	    $nav_data['first_level_category'] = $this->d_category_model->get_first_level_categories();
		$data['page_title'] = 'Welcome';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css', 
								'css/style.css',
								'css/scroll.css', 
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery.tools.min.js', 
									 'js/scrollable.js', 
									 'js/main_view.js',
									 'bootstrap/js/bootstrap-carousel.js',
									 'bootstrap/js/bootstrap.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('main_view.php');
		$this->load->view('templates/footer', $footer_data);
	}
	
	function logout() {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect(base_url().'main');
	}
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */