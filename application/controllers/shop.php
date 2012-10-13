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
		$this->load->model('h_item_option_model');
		$this->load->model('f_item_desc_tabs_model');
		$this->load->model('f_item_comment_model');
		$this->num_per_page = 8;
		$this->max_pagenum = 2;
	}
	
	public function sendEmail() {
		$config['protocol'] = 'smtp';
		  $config['smtp_host'] = 'smtp.163.com';
		  $config['smtp_user'] = 'jiazhenxie515@163.com';
		  $config['smtp_pass'] = 'lql0775xjz';
		  $config['charset'] = 'utf-8';
		  $config['wordwrap'] = TRUE;
		  $config['mailtype'] = 'html';
		  $this -> load -> library('email');
		  $this->email->initialize($config);
		  $this->email->from('jiazhenxie515@163.com');
		  $this->email->to('fdf515@gmail.com');
		  $this->email->subject('SEND OK');
		  $this->email->message('TEST EMAIL');
		  if( ! $this->email->send()){
		   echo 'SEND OK!';
		  }else{
		   echo 'SEND FAILS!';
		  }
		  echo $this->email->print_debugger();
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
	
	public function browse($lv3_cat_id, $pageNum = false) {
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
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    // get amount of item pages
		$num_query = $this->f_item_model->getNumOfItems($lv3_cat_id);
		if ($num_query['total'] % $this->num_per_page == 0) {
			$content_data['total_page_num'] = intval($num_query['total'] * 1.0 / $this->num_per_page);
		} else {
			$content_data['total_page_num'] = intval($num_query['total'] * 1.0 / $this->num_per_page) + 1;
		}
		// get active page num
		if($pageNum) {
			$pageNum = $pageNum - 1;
		} else {
			$pageNum = 0;
		}
		// get display pagination
		$pageOffset = intval(($pageNum) / $this->max_pagenum);
		if ($content_data['total_page_num'] % $this->max_pagenum == 0) {
			$amount_pagination = intval($content_data['total_page_num'] * 1.0 / $this->max_pagenum);
		} else {
			$amount_pagination = intval($content_data['total_page_num'] * 1.0 / $this->max_pagenum) + 1;
		}
		$content_data['display_paginations'] = array();
		for($i = 1; $i <= $this->max_pagenum; $i++) {
			if(($pageOffset * $this->max_pagenum + $i) <= $content_data['total_page_num']) {
				$content_data['display_paginations'][] = $pageOffset * $this->max_pagenum + $i;
			}
		}
		// set page offset to show ...
		$content_data['pageOffset'] = $pageOffset;
		$content_data['amount_pagination'] = $amount_pagination;
		$content_data['max_pagenum'] = $this->max_pagenum;
		$content_data['pageNum'] = $pageNum;
			
	    $content_data['cat_id'] = $lv3_cat_id;
	    $content_data['items'] = $this->f_item_model->getItemsForPagination($lv3_cat_id, $this->num_per_page, $pageNum * $this->num_per_page);
	    $content_data['items_img'] = array();
	    foreach($content_data['items'] as $key => $value) {
		    $content_data['items_img'][$key] = $this->f_item_img_model->getImgsByItemIdForBrowse($value['id']);
	    }
	    $content_data['breadcrumb'] = $this->d_category_model->getBreadcrumb($lv3_cat_id);
	    $content_data['pageLink'] = 'shop/browse/'.$lv3_cat_id;
		$data['page_title'] = $cat_query['category_name'];
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/footer.css',);
		
		$js_data['jses'] = array(	 'js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/navigation.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/browse_view', $content_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('templates/close');
	}
	
	public function search($search = false, $pageNum = false) {
		if($this->session->userdata('logged_in')) {
	     $session_data = $this->session->userdata('logged_in');
	     $nav_data['session_name'] = $session_data['first_name'];
	    }
	    $nav_data['category'] = $this->d_category_model->conduct_categories();
	    
	    if($search === false) {
		    $search = $this->input->post('searchkeyword',true);
	    }
	    // get amount of item pages
		$num_query = $this->f_item_model->getNumberOfItemsBySearch($search);
		if ($num_query['total'] % $this->num_per_page == 0) {
			$content_data['total_page_num'] = intval($num_query['total'] * 1.0 / $this->num_per_page);
		} else {
			$content_data['total_page_num'] = intval($num_query['total'] * 1.0 / $this->num_per_page) + 1;
		}
		// get active page num
		if($pageNum) {
			$pageNum = $pageNum - 1;
		} else {
			$pageNum = 0;
		}
		// get display pagination
		$pageOffset = intval(($pageNum) / $this->max_pagenum);
		if ($content_data['total_page_num'] % $this->max_pagenum == 0) {
			$amount_pagination = intval($content_data['total_page_num'] * 1.0 / $this->max_pagenum);
		} else {
			$amount_pagination = intval($content_data['total_page_num'] * 1.0 / $this->max_pagenum) + 1;
		}
		$content_data['display_paginations'] = array();
		for($i = 1; $i <= $this->max_pagenum; $i++) {
			if(($pageOffset * $this->max_pagenum + $i) <= $content_data['total_page_num']) {
				$content_data['display_paginations'][] = $pageOffset * $this->max_pagenum + $i;
			}
		}
		// set page offset to show ...
		$content_data['pageOffset'] = $pageOffset;
		$content_data['amount_pagination'] = $amount_pagination;
		$content_data['max_pagenum'] = $this->max_pagenum;
		$content_data['pageNum'] = $pageNum;
			
	    $content_data['items'] = $this->f_item_model->getItemsBySearch($search, $this->num_per_page, $pageNum * $this->num_per_page);
	    $content_data['items_img'] = array();
	    foreach($content_data['items'] as $key => $value) {
		    $content_data['items_img'][$key] = $this->f_item_img_model->getImgsByItemIdForBrowse($value['id']);
	    }
	    $content_data['breadcrumb'] = array(	'0' => array('name' => 'Home', 'url' => base_url()), 
	    										'1' => 'Search Result' );
	    $content_data['pageLink'] = 'shop/search/'.$search;
		$data['page_title'] = 'Search Result of '.$search;
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css',
								'css/footer.css',);
		
		$js_data['jses'] = array(	 'js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js',
									 'js/navigation.js');
									 
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/browse_view', $content_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
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
	    
	    $detail_data['item_imgs'] = $this->f_item_img_model->getImgsByItemId($id);
	    $detail_data['options'] = $this->h_item_option_model->getItemAllOptions($id);
	    $detail_data['descs_info'] = $this->f_item_desc_tabs_model->getTabByItemId($id);
	    $detail_data['comments'] = $this->f_item_comment_model->getCommentsByItemId($id);
	    
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
										'js/navigation.js',
										'js/jquery.cookie.js');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $nav_data);
		$this->load->view('shop/detail_view', $detail_data);
		$this->load->view('templates/footer');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('shop/detail_custom_js');
		$this->load->view('templates/close');
	}
	
	public function pagination() {
	
		$cat_id = $this->input->post('cat_id');
		$pagenum = $this->input->post('pagenum');
		$per_page = 2;
		
		$item_query = $this->f_item_model->getItemsForPagination($cat_id, $per_page, ($pagenum - 1) * $per_page);
		
		echo json_encode($item_query);
	}
	
	public function addComment() {
		$itemId = $this->input->post('itemId', true);
		$userId = $this->input->post('userId', true);
		$content = $this->input->post('comment', true);
		$this->f_item_comment_model->addComment($itemId, $userId, $content);
		redirect(base_url().'shop/detail/'.$itemId);
	}
	
	public function isInStock() {
		$optionArr = array();
		$webOptions = $this->input->post('options', true);
		$rawArr = explode(';', $webOptions);
		foreach($rawArr as $value) {
			if(sizeof($value) != 0) {
				$splitArr = explode(',', $value);
				$optionArr[] = $splitArr[0];
			}
		}
		$item_id = $this->input->post('item_id', true);
		$qty = $this->input->post('qty', true);
		$result = $this->h_item_option_model->checkStock($item_id,$optionArr);
		$stock = $result['stock'];
		$flag = '';
		if($stock >= $qty) {
			$flag = 'true';
		} else {
			$flag = 'false';
		}
		$output = array(
			'flag' => $flag,
			'left' => $stock
		);
		echo json_encode($output);		
	}
}
/* End of file shop.php */
/* Location: ./application/controllers/shop.php */