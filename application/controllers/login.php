<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$data['page_title'] = 'Login';
		$data['csses'] = array( 'bootstrap/css/bootstrap.css', 
								'bootstrap/css/bootstrap-responsive.css',
								'css/nav.css', 
								'css/style.css', 
								'css/highlight.css', 
								'css/scroll.css', 
								'css/footer.css');
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/login_view');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */