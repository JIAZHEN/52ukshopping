<?php

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('d_category_model');
		$this->load->model('f_carousel_model');
		$this->load->model('f_item_img_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_name'] = $session_data['first_name'];
	    }
	 	    
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    $content_data['carousels'] = $this->f_carousel_model->getAllCarousels();
	    $content_data['deskShowInfo'] = $this->f_item_img_model->getDeskShow();
	    $content_data['lv_cat'] = $this->d_category_model->getCategoryByLevel(1);
	    
		$data['page_title'] = 'Welcome';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css',
								'css/style.css',
								'css/nav.css',
								'css/scroll.css', 
								'css/footer.css');
		
		$js_data['jses'] = array(
									 'js/jquery-1.8.2.js',
									 'js/jquery.tools.min.js',
									 'js/scrollable.js', 
									 'js/main_view.js',
									 'bootstrap/js/bootstrap.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('main_view.php', $content_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');
	}
	
	function logout() {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect(base_url().'main');
	}
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */