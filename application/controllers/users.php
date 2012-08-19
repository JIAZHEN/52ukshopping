<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('f_users_model');
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
			$data['csses'] = array('bootstrap/css/bootstrap.css', 'bootstrap/css/bootstrap-responsive.css', 'bootstrap/css/datepicker.css','css/users/register.css');
		
			$register_data['jses'] = array('js/jquery-1.8.0.min.js', 'bootstrap/js/bootstrap.js', 'bootstrap/js/bootstrap-datepicker.js', 'js/users/register.js');
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
}
/* End of file users.php */
/* Location: ./application/controllers/users.php */