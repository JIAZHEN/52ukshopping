<?php
class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('d_category_model');
		$this->load->model('f_item_model');
		$this->load->model('f_item_img_model');
	}
	
	public function test() {
		$item_query = $this->f_item_model->getItemsForPagination(18, 3, (1 - 1) * 3);
		foreach	($item_query as $item_key => $item_value) {
			print_r($item_value);
			echo '<br>';
		}
	}
	
	public function index() 
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_name'] = $session_data['first_name'];
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
		
		$js_data['jses'] = array(	 'js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/navigation.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');

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
	     $nav_data['session_name'] = $session_data['first_name'];
	    }

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/shop/category.css',
								'css/footer.css');
		
		$js_data['jses'] = array(	'js/jquery-1.8.0.min.js',
									'bootstrap/js/bootstrap.js',
									'js/navigation.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/category_view', $category_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');

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
	     $nav_data['session_name'] = $session_data['first_name'];
	    }
	    
	    $per_page = 5;
		$max_pagenum = 3;

	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    
	    $browse_data['cat_id'] = $lv3_cat_id;
	    $browse_data['items'] = $this->f_item_model->getItemsForPagination($lv3_cat_id, $per_page, 0);
	    $browse_data['items_img'] = array();
	    foreach($browse_data['items'] as $key => $value) {
		    $browse_data['items_img'][$key] = $this->f_item_img_model->getImgsByItemIdForBrowse($value['id']);
	    }
	    
	    $browse_data['breadcrumb'] = $this->d_category_model->getBreadcrumb($lv3_cat_id);
	    
	    $item_query = $this->f_item_model->getNumOfItems($lv3_cat_id);
	    
	    $custom['total_page_amount'] = intval($item_query['total'] / $per_page) + 1;
	    $custom['max_pagenum'] = $max_pagenum;
	    
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/shop/category.css',
								'css/jpaginate/style.css',
								'css/footer.css',);
		
		$js_data['jses'] = array(	 'js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/jpaginate/jquery.paginate.js',
									 'js/shop/browse.js',
									 'js/navigation.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/browse_view', $browse_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('shop/browse_custom_js', $custom);
		$this->load->view('templates/close');

	}

	public function detail($id)
	{
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_name'] = $session_data['first_name'];
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
		
		$js_data['jses'] = array(		'js/jquery-1.8.0.min.js',
										'js/shop/detail.js',
										'js/cloud-zoom.1.0.2.js',
										'bootstrap/js/bootstrap.js',
										'js/navigation.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/detail_view', $detail_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');
	}
	
	public function pagination() {
	
		$cat_id = $this->input->post('cat_id');
		$pagenum = $this->input->post('pagenum');
		$per_page = 2;
		
		$item_query = $this->f_item_model->getItemsForPagination($cat_id, $per_page, ($pagenum - 1) * $per_page);
		
		echo json_encode($item_query);
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */