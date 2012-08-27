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
	
	public function test($cat_id) {
		$item_query = $this->f_item_model->getNumOfItems($cat_id);
		echo $item_query['total'];
	}
	
	public function index() 
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    $category_data['lv_cat'] = $this->d_category_model->getCategoryByLevel(1);
	    $category_data['breadcrumb'] = $this->d_category_model->getBreadcrumb(0);
	    
		$data['page_title'] = 'Shop';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_data);
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
		$category_data['breadcrumb'] = $this->d_category_model->getBreadcrumb($cat_id);			 
		
		$category_data['lv_cat'] = $this->d_category_model->getCategoryByLevelAndParent(
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
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_data);
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
	    
	    $per_page = 2;
		$max_pagenum = 3;

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    
	    $browse_data['items'] = $this->f_item_model->getItemByCatId($lv3_cat_id);
	    
	    $browse_data['breadcrumb'] = $this->d_category_model->getBreadcrumb($lv3_cat_id);
	    
	    $item_query = $this->f_item_model->getNumOfItems($lv3_cat_id);
	    $browse_data['total_page_amount'] = intval($item_query['total'] / $per_page) + 1;
	    $browse_data['max_pagenum'] = $max_pagenum;
	    
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$footer_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/shop/browse.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/browse_view', $browse_data);
		$this->load->view('templates/footer_custom_js_view', $footer_data);

	}

	public function detail($id)
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_email'] = $session_data['email'];
	    }
	    
	    if ($id > 0) {
		    $detail_data['info'] = $this->f_item_model->getItemById($id);
		    $detail_data['breadcrumb'] = $this->d_category_model->getBreadcrumbForDetail(
		    														$detail_data['info']['category_id'],
		    														$detail_data['info']['item_name']);
	    }
	    $detail_data['ini'] = '';
	    
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = 'Detail';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/shop/detail.css',
								'css/cloud-zoom.css',
								'css/footer.css');
		
		$footer_data['jses'] = array(	'js/jquery-1.8.0.min.js',
										'js/shop/detail.js',
										'js/cloud-zoom.1.0.2.js',
										'bootstrap/js/bootstrap.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/detail_view', $detail_data);
		$this->load->view('templates/footer', $footer_data);
	}
	
	public function pagination($cat_id) {
		$item_query = $this->f_item_model->getNumOfItems($cat_id);
		$output = array('message' => 'This is json', 'location' => 'location 2', 'total' => $item_query['total']);
		echo json_encode($output);
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */