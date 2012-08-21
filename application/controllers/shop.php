<?php
class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('d_category_model');
		$this->load->model('f_item_model');
	}
	
	public function index() 
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    $category_date['first_lv_cat'] = $this->d_category_model->getCategoryByLevel(1);
	    $category_date['page_title'] = 'Shop';
	    
		$data['page_title'] = 'Shop';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css', 
								'jqueryui/css/ui.selectmenu.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery.tools.min.js',
									 'js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'jqueryui/js/ui.selectmenu.js',
									 'js/shop/detail.js',
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_date);
		$this->load->view('templates/footer', $footer_data);

	}
	
	public function category() 
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = 'Category';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css', 
								'jqueryui/css/ui.selectmenu.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery.tools.min.js',
									 'js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'jqueryui/js/ui.selectmenu.js',
									 'js/shop/detail.js',
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view');
		$this->load->view('templates/footer', $footer_data);

	}

	public function detail($id)
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }
	    
	    if ($id > 0) {
		    $detail_data['info'] = $this->f_item_model->getItemById($id);
	    }
	    $detail_data['ini'] = '';
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = 'Detail';
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
		$this->load->view('shop/detail_view', $detail_data);
		$this->load->view('templates/footer', $footer_data);
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */