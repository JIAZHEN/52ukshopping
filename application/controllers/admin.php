<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('f_users_model');
		$this->load->model('d_country_model');
		$this->load->model('f_item_model');
		$this->load->model('f_item_img_model');
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
	
	public function user_edit($user_id = false) {
	
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
	
	public function add_user() {
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
	
	public function items() {
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
	
	public function add_item() {
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
										'bootstrap/css/bootstrap-responsive.css',
										'css/validate.css');
										
				$js_data['jses'] = array('js/jquery-1.8.0.min.js',
										 'bootstrap/js/bootstrap.js',
										 'js/jquery.validate.js');
										 
				$session_data = $this->session->userdata('admin');
				$content_data['item_info'] = $this->f_item_model->getItemById($item_id);
				$content_data['item_imgs'] = $this->f_item_img_model->getImgsById($item_id);
				
				$slide_data['active_option'] = 'skus_edit_img';
				
				$this->load->view('templates/header', $data);
				$this->load->view('admin/container');
				$this->load->view('admin/slide_view', $slide_data);
				$this->load->view('admin/items_edit_img_view', $content_data);
				$this->load->view('admin/close');
				$this->load->view('templates/load_javascripts', $js_data);
				$this->load->view('templates/close');
			} else {
				redirect(base_url().'admin/items');
			}
		} else {
		    //Field validation failed.  User redirected to login page
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
	
	public function check_database() {
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		if ($username == 'admin' && md5($password) == md5('admin')) {
			return true;
		} else {
			return false;
		}
	}
	
	public function delete_user() {
		$id = $this->input->post('id_delete', true);
		$this->f_users_model->delete_user($id);
		redirect(base_url().'admin');
	}
	
	public function update_user() {
		$id = $this->input->post('id_for_personal', true);
		$this->f_users_model->update_users($id);
		redirect(base_url().'admin');
	}
	
	public function delete_item() {
		$id = $this->input->post('id_delete', true);
		$this->f_item_model->delete_item($id);
		redirect(base_url().'admin/items');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */