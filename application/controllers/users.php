<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->model('f_users_model');
		$this->load->model('d_category_model');
	}

	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['page_title'] = 'Register';
		
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
		
		
		if ($this->form_validation->run() === FALSE)
		{
			$data['csses'] = array('bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css', 
									'bootstrap/css/datepicker.css',
									'css/users/register.css');
		
			$register_data['jses'] = array('js/jquery-1.8.0.min.js', 
											'bootstrap/js/bootstrap.js', 
											'bootstrap/js/bootstrap-datepicker.js', 
											'js/users/register.js');
											
			$this->load->view('templates/header', $data);
			$this->load->view('users/register', $register_data);
		}
		else
		{
			$sess_array = array( 'email' => $this->input->post('email', true) );
			$this->f_users_model->set_users();
			$this->session->set_userdata('logged_in', $sess_array);
			$this->load->view('users/success');
		}
	}
	
	function index($active_tab = 'tab1') {
		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$nav_data['session_name'] = $session_data['first_name'];
			
			$admin_data['user_id'] = $session_data['id'];
			$admin_data['active_tab'] = $active_tab;
			
			$admin_data['user_info'] = $this->f_users_model->get_users($session_data['id']);
			
			$nav_data['category'] = $this->d_category_model->conduct_categories();
			$data['page_title'] = 'Admin';
			$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
									'bootstrap/css/bootstrap-responsive.css',
									'bootstrap/css/datepicker.css',
									'css/nav.css',
									'css/footer.css',
									'css/users/admin');
			
			$js_data['jses'] = array(
										 'js/jquery-1.8.0.min.js',
										 'js/jquery.validate.js',
										 'bootstrap/js/bootstrap.js',
										 'bootstrap/js/bootstrap-datepicker.js',
										 'js/navigation.js');
										 
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $nav_data);
			$this->load->view('users/admin_view.php', $admin_data);
			$this->load->view('templates/footer');
			$this->load->view('templates/load_javascripts', $js_data);
			$this->load->view('users/admin_custom_js');
			$this->load->view('templates/close');
	    } else {
		    //Field validation failed.  User redirected to login page
		 	redirect(base_url().'login');
	    }
		
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(base_url().'main', 'refresh');
	}
	
	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Login';
		$this->form_validation->set_error_delimiters('', '');
		
		
		//This method will have the credentials validation
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		
		if($this->form_validation->run() == FALSE)
		{
		 	//Field validation failed.  User redirected to login page
		 	redirect(base_url().'login');
		}
		else
		{
		 	//Go to private area
		 	redirect(base_url().'main');
		}
	}
	
	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email', true);
		
		//query the database
		$result = $this->f_users_model->login($email, $password);
		
		if($result)
		{
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
		     'id' => $row->id,
		     'email' => $row->email
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return TRUE;
		}
		else
		{
		 $this->form_validation->set_message('check_database', 'Invalid username or password');
		 return false;
		}
	}
	
	public function check_password() {
		$user_id = $this->input->post('user_id', true);
		$old_psw = $this->input->post('old_psw', true);
	 	if($this->f_users_model->check_password($user_id, $old_psw)) {
		 	echo 'true';
	 	} else {
		 	echo 'false';
	 	}
	}
	
	public function update_password() {
		$user_id = $this->input->post('my_id', true);
		$new_psw = $this->input->post('inputnewpassword', true);
		$this->f_users_model->set_password($user_id, $new_psw);
		redirect(base_url().'users');
	}
}
/* End of file users.php */
/* Location: ./application/controllers/users.php */