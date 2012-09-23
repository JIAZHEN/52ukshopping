<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	private $num_per_page;
	private $max_pagenum;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('f_users_model');
		$this->load->model('d_country_model');
		$this->load->model('f_item_model');
		$this->load->model('f_item_img_model');
		$this->load->model('d_category_model');
		$this->load->model('f_carousel_model');
		$this->load->helper(array('form', 'url'));
		
		$this->num_per_page = 5;
		$this->max_pagenum = 2;
	}
	
	public function testLess() {
		require "js/lessc.inc.php";

		$less = new lessc;
		$less->setVariables(array(
		  "border-color" => "red",
		  "base" => "960px"
		));
		$less->checkedCompile("less/test.less", "css/output.css");
	}
	
	private function uploadImg($folder) {
		$config['upload_path'] = './images/'.$folder;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;
		$config['max_size']	= '3072';
		$config['max_width']  = '4000';
		$config['max_height']  = '3000';

		$this->upload->initialize($config);

		if (!$this->upload->do_upload()) {
			return array('result' => 'false', 'info' => $this->upload->display_errors('', ''));
		} else {
			$file_info = $this->upload->data();
			// remove ./
			$img_address = substr($config['upload_path'], 2, strlen($config['upload_path'])).$file_info['file_name'];
			return array('result' => 'true', 'info' => $img_address);
		}
	}
	
	private function resizeImg(	$img_address, 
								$width, $height, 
								$newImage = false, 
								$resizeName = false) {
		if($newImage) {
			$pos = strpos($img_address, '.');
			$extend = substr($img_address, $pos, strlen($img_address));
			$new_img_path = substr($img_address, 0, $pos).$resizeName.$extend;
			$config['new_image'] = $new_img_path;
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = $img_address;
		$config['master_dim'] = 'height';
		$config['width'] = $width;
		$config['height'] = $height;
		
		$this->image_lib->initialize($config); 
		
		if (!$this->image_lib->resize()) {
		    return array('result' => 'false', 'info' => $this->image_lib->display_errors());
		} else if($newImage) {
			return array('result' => 'true', 'info' => $config['new_image']);
		} else {
			return array('result' => 'true');
		}
	}
	
	public function index($pageNum = false) {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'Users management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
			// get amount of item pages
			$num_query = $this->f_users_model->getNumOfUsers();
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
			
			$content_data['fields'] = $this->f_users_model->getFields();
			$content_data['users_info'] = $this->f_users_model->getUsersForPagination($this->num_per_page, $pageNum * $this->num_per_page);
			$content_data['display_fields'] = array('id', 'email', 'first_name', 'last_name');
			$content_data['max_pagenum'] = $this->max_pagenum;
			$content_data['pageNum'] = $pageNum;
			
			$slide_data['active_option'] = 'users_browse';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/container');
			$this->load->view('admin/slide_view', $slide_data);
			$this->load->view('admin/users_view', $content_data);
			$this->load->view('admin/close');
			$this->load->view('templates/load_javascripts', $js_data);
			$this->load->view('admin/users_custom_js');
			$this->load->view('templates/close');
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function user_edit($user_id = false) {
	
		if($this->session->userdata('admin')) {
			if($user_id) {
				$data['page_title'] = 'Users management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css',
										'bootstrap/css/datepicker.css',
										'css/validate.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js',
										 'bootstrap/js/bootstrap-datepicker.js',
										 'js/jquery.validate.js');
										 
				$session_data = $this->session->userdata('admin');
				$content_data['id'] = $session_data['id'];
				$content_data['user_info'] = $this->f_users_model->get_users($user_id);
				$content_data['countries'] = $this->d_country_model->getAllCountries();
				
				$slide_data['active_option'] = 'users_edit';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/users_edit_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/users_edit_custom_js');
				$this->load->view('templates/close');
			} else {
				redirect(base_url().'admin');
			}
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function add_user() {
		if($this->session->userdata('admin')) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$register_data['countries'] = $this->d_country_model->getAllCountries();
			
			$this->form_validation->set_error_delimiters('', '');
			
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|xss_clean');
			$this->form_validation->set_rules('housename', 'Hourse Name/Number', 'trim|required|xss_clean');
			$this->form_validation->set_rules('address_one', 'Address line one', 'trim|required|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|matches[emailconfirm]|is_unique[f_users.email]|xss_clean');
			$this->form_validation->set_rules('emailconfirm', 'Email Confirmation', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passwordconfirm]|md5|xss_clean');
			$this->form_validation->set_rules('passwordconfirm', 'Password Confirmation', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Users management';
			
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css',
										'bootstrap/css/datepicker.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js',
										 'bootstrap/js/bootstrap-datepicker.js');
										 
				$session_data = $this->session->userdata('admin');
				
				$slide_data['active_option'] = 'users_add';
				
				$content_data['countries'] = $this->d_country_model->getAllCountries();
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/users_add_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/users_add_custom_js');
				$this->load->view('templates/close');
			} else {
				$this->f_users_model->set_users();
				redirect(base_url().'admin');
			}
			
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function items($pageNum = false) {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'SKUs management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
			// get amount of item pages
			$num_query = $this->f_item_model->getNumOfAllItems();
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
			
			$content_data['fields'] = $this->f_item_model->getFields();
			$content_data['items_info'] = $this->f_item_model->getItemsForAdminPagination($this->num_per_page, $pageNum * $this->num_per_page);
			$content_data['display_fields'] = array('id', 'description', 'item_name', 'price', 'cost', 'stock', 'category_id');
			
			$slide_data['active_option'] = 'skus_browse';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/container');
			$this->load->view('admin/slide_view', $slide_data);
			$this->load->view('admin/items_view', $content_data);
			$this->load->view('admin/close');
			$this->load->view('templates/load_javascripts', $js_data);
			$this->load->view('admin/items_custom_js');
			$this->load->view('templates/close');
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function add_item() {
		if($this->session->userdata('admin')) {
		
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('', '');
				
			$this->form_validation->set_rules('itemname', 'Item Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('descript', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('cost', 'Cost', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('stock', 'Stock', 'trim|required|is_natural_no_zero|xss_clean');
		
			if ($this->form_validation->run() === FALSE) {
							
				
				$data['page_title'] = 'SKU management';
			
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
										 
				$session_data = $this->session->userdata('admin');
				$content_data['categories'] = $this->d_category_model->getCategoryByLevel(3);
				
				$slide_data['active_option'] = 'skus_add';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/items_add_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('templates/close');
			} else {
				$this->f_item_model->add_item();
				redirect(base_url().'admin/items');
			}
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function edit_item_info($item_id = false) {
		if($this->session->userdata('admin')) {
			if($item_id) {
			
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_error_delimiters('', '');
					
				$this->form_validation->set_rules('itemname', 'Item Name', 'trim|required|xss_clean');
				$this->form_validation->set_rules('descript', 'Description', 'trim|required|xss_clean');
				$this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
				$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('cost', 'Cost', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('stock', 'Stock', 'trim|required|is_natural_no_zero|xss_clean');
				
				if ($this->form_validation->run() === FALSE) {
					$data['page_title'] = 'SKU management';
				
					$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
											'bootstrap/css/bootstrap-responsive.css');
											
					$js_data['jses'] = array('js/jquery-1.8.0.min.js',
											 'bootstrap/js/bootstrap.js');
					
					$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
					$content_data['categories'] = $this->d_category_model->getCategoryByLevel(3);
					
					$slide_data['active_option'] = 'skus_edit';
					
					$this->load->view('templates/header', $data);
					$this->load->view('admin/container');
					$this->load->view('admin/slide_view', $slide_data);
					$this->load->view('admin/items_edit_view', $content_data);
					$this->load->view('admin/close');
					$this->load->view('templates/load_javascripts', $js_data);
					$this->load->view('templates/close');
				} else {
					$this->f_item_model->add_item();
					redirect(base_url().'admin/items');
				}
			} else {
				redirect(base_url().'admin/items');
			}
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	public function edit_item_images($item_id = false) {
		if($this->session->userdata('admin')) {
			if($item_id) {
				$data['page_title'] = 'SKU management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
				
				$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
				$content_data['item_imgs'] = $this->f_item_img_model->getImgsByItemId($item_id);
				
				$slide_data['active_option'] = 'skus_edit_img';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/items_edit_img_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/items_edit_img_custom_js');
				$this->load->view('templates/close');
			} else {
				redirect(base_url().'admin/items');
			}
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function upload_item_img() {
		$item_id = $this->input->post('return_item_id', true);
		$upload_info = $this->uploadImg('product/');
		if ($upload_info['result'] == 'false') {
			$content_data['error'] = $upload_info['info'];
		} else {
			$content_data['img_id'] = $this->f_item_img_model->add_item_img($item_id, $upload_info['info']);
			$thumb_info = $this->resizeImg($upload_info['info'], 255, 255, true, '_thumb');
			$this->f_item_img_model->update_thumbs($content_data['img_id'], $thumb_info['info']);
			
			$tiny_info = $this->resizeImg($upload_info['info'], 48, 48, true, '_tiny');
			$this->f_item_img_model->update_tiny($content_data['img_id'], $tiny_info['info']);
		}
		$data['page_title'] = 'SKU management';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css');
								
		$js_data['jses'] = array('js/jquery-1.8.0.min.js',
								 'bootstrap/js/bootstrap.js');
		
		$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
		$content_data['item_imgs'] = $this->f_item_img_model->getImgsByItemId($item_id);
		
		
		$slide_data['active_option'] = 'skus_edit_img';
		
		$this->load->view('templates/header', $data);
		$this->load->view('admin/container');
		$this->load->view('admin/slide_view', $slide_data);
		$this->load->view('admin/items_edit_img_view', $content_data);
		$this->load->view('admin/close');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('admin/items_edit_img_custom_js');
		$this->load->view('templates/close');
	}
	
	public function categories($pageNum = false) {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'Categories management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
			// get amount of item pages
			$num_query = $this->d_category_model->getNumOfAllCategories();
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
									 
									 
			$content_data['fields'] = $this->d_category_model->getFields();
			$content_data['categories_info'] = $this->d_category_model->getCategorieForPagination($this->num_per_page, $pageNum * $this->num_per_page);
			
			$slide_data['active_option'] = 'categories_browse';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/container');
			$this->load->view('admin/slide_view', $slide_data);
			$this->load->view('admin/categories_view', $content_data);
			$this->load->view('admin/close');
			$this->load->view('templates/load_javascripts', $js_data);
			$this->load->view('admin/categories_custom_js');
			$this->load->view('templates/close');
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function edit_categories($cat_id = false) {
		if($this->session->userdata('admin')) {
			if($cat_id) {
				$data['page_title'] = 'Categories management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
				
				$content_data['cat_info'] = $this->d_category_model->getCategoryById($cat_id);
				$content_data['cat_levels'] = $this->d_category_model->getAllLevels();
				
				$content_data['lv_categories'] = $this->d_category_model->getCategoryByLevel($content_data['cat_info']['cat_level'] - 1);
				
				$slide_data['active_option'] = 'categories_edit';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/categories_edit_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/categories_edit_custom_js');
				$this->load->view('templates/close');
			} else {
				redirect(base_url().'admin/items');
			}
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function edit_categories_change_level() {
		$cat_level = $this->input->post('cat_level', true);
		$cat_query = $this->d_category_model->getCategoryByLevel($cat_level);
		echo json_encode($cat_query);
	}
	
	function add_category() {
		if($this->session->userdata('admin')) {
		
		$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('', '');
				
			$this->form_validation->set_rules('categroy_name', 'Categroy Name', 'trim|required|is_unique[d_category.category_name]|xss_clean');
			$this->form_validation->set_rules('category_level', 'Category Level', 'trim|required|xss_clean');
		
			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Categories management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
						
				$slide_data['active_option'] = 'categories_add';
				
				$content_data['cat_levels'] = $this->d_category_model->getAllLevels();
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/categories_add_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/categories_add_custom_js');
				$this->load->view('templates/close');
			} else {
				$this->d_category_model->addCategory();
				redirect(base_url().'admin/categories');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	function upload_cat_img()
	{
		$return_cat_id = $this->input->post('return_cat_id', true);
		$upload_info = $this->uploadImg('category/');
		if ($upload_info['result'] == 'false') {
			$content_data['error'] = $upload_info['info'];
		}
		else {
			// delete the old img
			$cat_info = $this->d_category_model->getCategoryById($return_cat_id);
			if(!is_null($cat_info['img_address'])) {
				unlink($cat_info['img_address']);
			}
			$this->d_category_model->update_category_img($return_cat_id, $upload_info['info']);
		}
		$data['page_title'] = 'Categories management';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css');
								
		$js_data['jses'] = array('js/jquery-1.8.0.min.js',
								 'bootstrap/js/bootstrap.js');
		
		$content_data['cat_info'] = $this->d_category_model->getCategoryById($return_cat_id);
		$content_data['cat_levels'] = $this->d_category_model->getAllLevels();
		
		$content_data['lv_categories'] = $this->d_category_model->getCategoryByLevel($content_data['cat_info']['cat_level'] - 1);
		
		$slide_data['active_option'] = 'categories_edit';
		
		$this->load->view('templates/header', $data);
		$this->load->view('admin/container');
		$this->load->view('admin/slide_view', $slide_data);
		$this->load->view('admin/categories_edit_view', $content_data);
		$this->load->view('admin/close');
		$this->load->view('templates/load_javascripts', $js_data);
		$this->load->view('admin/categories_edit_custom_js');
		$this->load->view('templates/close');
	}
	
	function carousels() {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'UI management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');					 				 
									 
			$content_data['fields'] = $this->f_carousel_model->getFields();
			$content_data['carousels_info'] = $this->f_carousel_model->getAllCarousels();
			
			$slide_data['active_option'] = '';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/container');
			$this->load->view('admin/slide_view', $slide_data);
			$this->load->view('admin/carousels_view', $content_data);
			$this->load->view('admin/close');
			$this->load->view('templates/load_javascripts', $js_data);
			$this->load->view('admin/carousels_custom_js');
			$this->load->view('templates/close');
		} else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'admin/login');
	    }
	}
	
	function delete_carousel() {
		$id = $this->input->post('id_delete', true);
		$carousel_info = $this->f_carousel_model->getCarouselById($id);
		// delete image
		unlink($carousel_info['img_address']);
		// delete in DB
		$this->f_carousel_model->deleteCarousel($id);
		redirect(base_url().'admin/carousels');
	}
	
	function add_carousel() {
		if($this->session->userdata('admin')) {
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_error_delimiters('', '');
			
		$this->form_validation->set_rules('carousel_name', 'Carousel Name', 'trim|required|is_unique[f_carousel.name]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$upload_info = $this->uploadImg('carousel/');
		if ($this->form_validation->run() === FALSE || $upload_info['result'] == 'false') {
				$data['page_title'] = 'Categories management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
						
				$slide_data['active_option'] = '';
				$content_data['error'] = $upload_info['info'];
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/carousels_add_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('templates/close');
			} else {
				$this->resizeImg($upload_info['info'], 800, 480);
				$this->f_carousel_model->addCarousel($upload_info['info']);
				redirect(base_url().'admin/carousels');
			}
						
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	function edit_carousel_info($casel_id) {
		if($this->session->userdata('admin')) {
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('carousel_name', 'Carousel Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			
			
			$content_data['carousel_info'] = $this->f_carousel_model->getCarouselById($casel_id);
			
			if ($this->form_validation->run() === FALSE) {
				$data['page_title'] = 'Categories management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
						
				$slide_data['active_option'] = '';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/carousels_edit_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('templates/close');
			} else {
				$this->f_carousel_model->updateCarouselInfo($casel_id);
				redirect(base_url().'admin/carousels');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}
	
	function update_carousel_img() {
		if($this->session->userdata('admin')) {
			$casel_id = $this->input->post('return_carousel_id', true);
			$upload_info = $this->uploadImg('carousel/');
			$content_data['carousel_info'] = $this->f_carousel_model->getCarouselById($casel_id);
			if($upload_info['result'] == 'false') {
				$data['page_title'] = 'Categories management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
						
				$slide_data['active_option'] = '';
				$content_data['error'] = $upload_info['info'];
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/carousels_edit_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('templates/close');
			} else {
				// resize
				$this->resizeImg($upload_info['info'], 800, 480);
				// delete image
				if(!is_null($content_data['carousel_info']['img_address'])) {
					unlink($content_data['carousel_info']['img_address']);
				}
				// update in DB
				$this->f_carousel_model->updateCarouselImg($casel_id, $upload_info['info']);
				redirect(base_url().'admin/carousels');
			}
		} else {
			redirect(base_url().'admin/login');
		}
	}

	public function login() {
	
		$data['page_title'] = 'Admin Login';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css');
								
		//This method will have the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		$this->load->helper(array('form', 'url'));
		
		if($this->form_validation->run() == FALSE)
		{	
			$this->load->view('templates/header', $data);
			$this->load->view('admin/login_view');
			$this->load->view('templates/close');
		}
		else
		{
			$sess_array = array(
	         'id' => 3333
	        );
	       	$this->session->set_userdata('admin', $sess_array);
		 	//Go to private area
		 	redirect(base_url().'admin');
		}
	}
	
	function check_database() {
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		if ($username == 'admin' && md5($password) == md5('admin')) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_user() {
		$id = $this->input->post('id_delete', true);
		$this->f_users_model->delete_user($id);
		redirect(base_url().'admin');
	}
	
	function update_user() {
		$id = $this->input->post('id_for_personal', true);
		$this->f_users_model->update_users($id);
		redirect(base_url().'admin');
	}
	
	function delete_item() {
		$id = $this->input->post('id_delete', true);
		$this->f_item_model->delete_item($id);
		redirect(base_url().'admin/items');
	}
	
	function delete_img() {
		$id = $this->input->post('id_delete', true);
		$item_id = $this->input->post('return_item_id', true);
		
		$info = $this->f_item_img_model->getRowById($id);
		unlink($info['img_address']);
		unlink($info['thumb_address']);
		
		$this->f_item_img_model->delete_img($id);
		redirect(base_url().'admin/edit_item_images/'.$item_id);
	}
	
	function update_category() {
		$id = $this->input->post('category_id', true);
		$name = $this->input->post('category_name', true);
		$cat_level = $this->input->post('category_level', true);
		$parent_id = $this->input->post('parent_cat', true);
		if($parent_id == '') {
			$parent_id = 0;
		}
		$this->d_category_model->update_category($id, $name, $cat_level, $parent_id);
		redirect(base_url().'admin/categories');
	}
	
	function delete_category() {
		$id = $this->input->post('id_delete', true);
		$cat_info = $this->d_category_model->getCategoryById($id);
		
		if ($cat_info['cat_level'] == 2) {
			$thirdCats = $this->d_category_model->getCategoryByLevelAndParent(3, $id); 
			foreach($thirdCats as $values) { // delete all level 3 categories
				$this->deleteItemForCat($values['id']); // delete items
				$this->deleteCatById($values['id']); // delete category
			}
		} else {
			$secondCats = $this->d_category_model->getCategoryByLevelAndParent(2, $id); // delete all level 2 categories
			foreach($secondCats as $secondCatValues) {
				// delete all level 3 categories
				$thirdCats = $this->d_category_model->getCategoryByLevelAndParent(3, $secondCatValues['id']); 
				foreach($thirdCats as $values) {
					$this->deleteItemForCat($values['id']); // delete items belong to level 3
					$this->deleteCatById($values['id']); // delete level 3 category
				}
				// delete level 2 category
				$this->deleteItemForCat($secondCatValues['id']);
				$this->deleteCatById($secondCatValues['id']);
			}
		}
		
		$this->deleteItemForCat($id);
		$this->deleteCatById($id);
		
		redirect(base_url().'admin/categories');
	}
	
	private function deleteCatById($catId) {
		$cat_info = $this->d_category_model->getCategoryById($catId);
		// delete own category image
		if (!is_null($cat_info['img_address']) && file_exists($cat_info['img_address'])) {
			unlink($cat_info['img_address']);
		}
		$this->d_category_model->delete_category($catId);
	}
	
	private function deleteItemForCat($catId) {
		// delete items image
		$items_info = $this->f_item_model->getItemByCatId($id);
		foreach ($items_info as $item_info) { // every item
			$imgs_info = $this->f_item_img_model->getImgsByItemId($item_info['id']);
			foreach ($imgs_info as $img_info) { // every img
				if(!is_null($img_info['img_address']) && file_exists($img_info['img_address'])) {
					unlink($img_info['img_address']);
				}
				if(!is_null($img_info['thumb_address']) && file_exists($img_info['thumb_address'])) {
					unlink($img_info['thumb_address']);
				}
			}
			$this->f_item_img_model->deleteImgByItemId($item_info['id']);
		}
		$this->f_item_model->deleteItemByCatId($id);
	}
	
	function logout() {
	   $this->session->unset_userdata('admin');
	   session_destroy();
	   redirect(base_url().'main');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */