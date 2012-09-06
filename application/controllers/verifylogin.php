<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('f_users_model');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_error_delimiters('', '');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     	//Field validation failed.&nbsp; User redirected to login page
     	$data['page_title'] = 'Login';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css');
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/login_view');
   }
   else
   {
     //Go to private area
     redirect(base_url(), 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $email = $this->input->post('email');

   //query the database
   $result = $this->f_users_model->login($email, $password);

   if($result) {
     $sess_array = array();
     foreach($result as $row) {
       $sess_array = array(
         'id' => $row->id,
         'email' => $row->email,
         'first_name' => $row->first_name
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
/* End of file verifylogin.php */
/* Location: ./application/controllers/verifylogin.php */