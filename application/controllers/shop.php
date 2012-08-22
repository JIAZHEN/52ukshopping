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
	    $category_date['lv_cat'] = $this->d_category_model->getCategoryByLevel(1);
	    $category_date['breadcrumb'] = array('0' => array('name' => 'Home', 'url' => base_url()), 
	    									 '1' => 'Shop');
	    
		$data['page_title'] = 'Shop';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css', 
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'js/shop/detail.js', // will be replaced
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_date);
		$this->load->view('templates/footer', $footer_data);

	}
	
	public function category($cat_id) 
	{
	
		// detect if cat_id is null or negative
		if(isset($cat_id) == false || $cat_id <= 0) {
			redirect(base_url().'shop');
		}
		$cat_query = $this->d_category_model->getCategoryById($cat_id);
		// go to browse
		if($cat_query['cat_level'] == 3) {
			redirect(base_url().'shop/browse/'.$cat_id);;
		}
		// conduct breadcrumb
		$category_date['breadcrumb'] = array('0' => array('name' => 'Home', 'url' => base_url()), 
	    									 '1' => array('name' => 'Shop', 'url' => base_url().'shop') );			 
		
		if($cat_query['cat_level'] == 1) {
			$category_date['breadcrumb'][2] = $cat_query['category_name'];
		} else if ($cat_query['cat_level'] == 2) {
			$lv1_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
			$category_date['breadcrumb'][2] = array('name' => $lv1_cat_query['category_name'], 
													'url' => base_url().'shop/category/'.$lv1_cat_query['id']);
			$category_date['breadcrumb'][3] = $cat_query['category_name'];
		} else {
			$lv2_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
			$lv1_cat_query = $this->d_category_model->getCategoryById($lv2_cat_query['parent_id']);
			$category_date['breadcrumb'][2] = array('name' => $lv1_cat_query['category_name'], 
													'url' => base_url().'shop/category/'.$lv1_cat_query['id']);
			$category_date['breadcrumb'][3] = array('name' => $lv2_cat_query['category_name'], 
													'url' => base_url().'shop/category/'.$lv2_cat_query['id']);
			$category_date['breadcrumb'][4] = $cat_query['category_name'];
		}
		$category_date['lv_cat'] = $this->d_category_model->getCategoryByLevelAndParent(
															$cat_query['cat_level'] + 1, 
															$cat_id);
	
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'js/shop/detail.js', // will be replaced
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_date);
		$this->load->view('templates/footer', $footer_data);

	}
	
	public function browse($lv3_cat_id) {
	
		// detect if cat_id is null or negative
		if(isset($lv3_cat_id) == false || $lv3_cat_id <= 0) {
			redirect(base_url().'shop');
		}
		$cat_query = $this->d_category_model->getCategoryById($lv3_cat_id);
		if($cat_query['cat_level'] != 3) {
			redirect(base_url().'shop/category/'.$lv3_cat_id);
		}
		
		
	
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    
	    $browse_data['items'] = $this->f_item_model->getItemByCatId($lv3_cat_id);
	    
	    
	    $browse_data['breadcrumb'] = array( '0' => array('name' => 'Home', 'url' => base_url()), 
	    									'1' => array('name' => 'Shop', 'url' => base_url().'shop'));
	    									
	    $lv2_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
		$lv1_cat_query = $this->d_category_model->getCategoryById($lv2_cat_query['parent_id']);
		$browse_data['breadcrumb'][2] = array('name' => $lv1_cat_query['category_name'], 
												'url' => base_url().'shop/category/'.$lv1_cat_query['id']);
		$browse_data['breadcrumb'][3] = array('name' => $lv2_cat_query['category_name'], 
												'url' => base_url().'shop/category/'.$lv2_cat_query['id']);
		$browse_data['breadcrumb'][4] = $cat_query['category_name'];
	    
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'jqueryui/css/ui-lightness/jquery-ui-1.8.22.custom.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'js/shop/detail.js', // will be replace
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/browse_view', $browse_data);
		$this->load->view('templates/footer', $footer_data);

	}

	public function detail($id)
	{
		// detect if cat_id is null or negative
		if(isset($id) == false || $id <= 0) {
			redirect(base_url().'shop');
		}
	
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
								'css/shop/detail.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'jqueryui/js/jquery-ui-1.8.22.custom.min.js',
									 'js/shop/detail.js',
									 'bootstrap/js/bootstrap.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/detail_view', $detail_data);
		$this->load->view('templates/footer', $footer_data);
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */