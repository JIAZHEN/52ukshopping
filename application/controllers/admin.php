<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('f_users_model');
		$this->load->model('d_country_model');
		$this->load->model('f_item_model');
		$this->load->model('f_item_img_model');
		$this->load->model('d_category_model');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index() {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'Users management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
			$session_data = $this->session->userdata('admin');
			$content_data['id'] = $session_data['id'];
			$content_data['fields'] = $this->f_users_model->getFields();
			$content_data['users_info'] = $this->f_users_model->getAllUsers();
			$content_data['display_fields'] = array('id', 'email', 'first_name', 'last_name');
			
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
	
	function items() {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'SKUs management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
			$session_data = $this->session->userdata('admin');
			$content_data['id'] = $session_data['id'];
			$content_data['fields'] = $this->f_item_model->getFields();
			$content_data['items_info'] = $this->f_item_model->getAllItems();
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
				
			$this->form_validation->set_rules('itemname', 'Item Name', 'trim|required|is_unique[f_item.item_name]|xss_clean');
			$this->form_validation->set_rules('descript', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('cost', 'Cost', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('stock', 'Stock', 'trim|required|is_natural_no_zero|xss_clean');
		
			if ($this->form_validation->run() === FALSE) {
							
				
				$data['page_title'] = 'SKU management';
			
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css',
										'bootstrap/css/datepicker.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js',
										 'bootstrap/js/bootstrap-filestyle.js');
										 
				$session_data = $this->session->userdata('admin');
				
				$slide_data['active_option'] = 'items_add';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/items_add_view');
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('admin/items_add_custom_js');
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
	
	public function edit_item_images($item_id = false) {
		if($this->session->userdata('admin')) {
			if($item_id) {
				$data['page_title'] = 'SKU management';
				$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
										'bootstrap/css/bootstrap-responsive.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js');
				
				$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
				$content_data['item_imgs'] = $this->f_item_img_model->getImgsById($item_id);
				
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
	
	function do_upload()
	{
		$item_id = $this->input->post('return_item_id', true);
		$config['upload_path'] = './images/product/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '4000';
		$config['max_height']  = '3000';

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			$content_data['error'] = array('error' => $this->upload->display_errors('', ''));
		}
		else
		{
			$file_info = $this->upload->data();
			// str operations to get real width and height
			$ary = preg_split('/\s+/' , $file_info['image_size_str']);
			
			$width_str = str_replace('"',"",$ary[0]);
			$pos = strpos($width_str, '=');
			$width_str = substr($width_str, $pos+1, strlen($width_str));
			
			$height_str = str_replace('"',"",$ary[1]);
			$pos = strpos($height_str, '=');
			$height_str = substr($height_str, $pos+1, strlen($height_str));
			
			// remove ./
			$img_address = substr($config['upload_path'], 2, strlen($config['upload_path'])).$file_info['file_name'];
			$content_data['img_id'] = $this->f_item_img_model->add_item_img($item_id, $img_address);
			$content_data['img_address'] = $img_address;
			$content_data['image_real_width'] = $width_str;
			$content_data['image_real_height'] = $height_str;
		}
		$data['page_title'] = 'SKU management';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'imgareaselect/css/imgareaselect-default.css');
								
		$js_data['jses'] = array('js/jquery-1.8.0.min.js',
								 'bootstrap/js/bootstrap.js',
								 'imgareaselect/scripts/jquery.imgareaselect.pack.js');
		
		$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
		$content_data['item_imgs'] = $this->f_item_img_model->getImgsById($item_id);
		
		
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
	
	function create_thumbs() {
		$img_id = $this->input->post('img_id', true);
		$return_item_id = $this->input->post('return_item_id', true);
		$x_axis = $this->input->post('x1', true);
		$y_axis = $this->input->post('y1', true);
		$real_width = $this->input->post('real-width', true);
		$real_height = $this->input->post('real-height', true);
		$img_width = $this->input->post('img-width', true);
		$img_height = $this->input->post('img-height', true);
		$selection_width = $this->input->post('selection-width', true);
		$selection_height = $this->input->post('selection-height', true);
		$img_path = $this->input->post('img_path', true);
		
		$scale = ($img_width / $img_height) * ($real_height / $real_width);
		$real_width = $real_width * $scale;
		$real_height = $real_height * $scale;
		
		$pos = strpos($img_path, '.');
		$extend = substr($img_path, $pos, strlen($img_path));
		$new_img_path = substr($img_path, 0, $pos).'_thumb'.$extend;
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $img_path;
		$config['new_image'] = $new_img_path;
		$config['width'] = $selection_width / $img_width * $real_width;
		$config['height'] = $selection_height / $img_height * $real_height;
		$config['x_axis'] = $x_axis / $img_width * $real_width;
		$config['y_axis'] = $y_axis / $img_height * $real_height;
		
		$this->image_lib->initialize($config); 
		
		if ( ! $this->image_lib->crop())
		{
		    echo $this->image_lib->display_errors();
		} else {
			$this->f_item_img_model->update_thumbs($img_id, $new_img_path);
			redirect(base_url().'admin/edit_item_images/'.$return_item_id);
		}
	}
	
	public function categories() {
		if($this->session->userdata('admin')) {
			$data['page_title'] = 'Categories management';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css');
			$js_data['jses'] = array('js/jquery-1.8.0.min.js',
									 'bootstrap/js/bootstrap.js');
									 
			$session_data = $this->session->userdata('admin');
			$content_data['id'] = $session_data['id'];
			$content_data['fields'] = $this->d_category_model->getFields();
			$content_data['categories_info'] = $this->d_category_model->getAllCategories();
			
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
	
	public function edit_categories($cat_id = false) {
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
	
	public function edit_categories_change_level() {
		$cat_level = $this->input->post('cat_level', true);
		$cat_query = $this->d_category_model->getCategoryByLevel($cat_level);
		echo json_encode($cat_query);
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
		$this->d_category_model->delete_category($id);
		redirect(base_url().'admin/categories');
	}
	
	function logout() {
	   $this->session->unset_userdata('admin');
	   session_destroy();
	   redirect(base_url().'main');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */