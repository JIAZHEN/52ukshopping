<?php
class F_item_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	function getItemById($id)
	{
		$query = $this->db->get_where('f_item', array('id' => $id));
		return $query->row_array();
	}
	
	function set_users()
	{
		//$this->load->helper('url');
		
		$data = array(
			'title' => $this->input->post('title', true),
			'first_name' => $this->input->post('firstname', true),
			'last_name' => $this->input->post('lastname', true),
			'birthday' => $this->input->post('birthday', true),
			'postcode' => $this->input->post('postcode', true),
			'house_name' => $this->input->post('house_name', true),
			'address_one' => $this->input->post('address_one', true),
			'address_two' => $this->input->post('address_two', true),
			'city' => $this->input->post('city', true),
			'country' => $this->input->post('country', true),
			'email' => $this->input->post('email', true),
			'password' => $this->input->post('password', true),
			'user_type_id' => 1,
			'passport' => $this->input->post('passport', true),
			'identity_cn' => $this->input->post('identity_cn', true),
			'mobile' => $this->input->post('mobile', true),
			'telephone' => $this->input->post('telephone', true)
		);
		
		return $this->db->insert('f_users', $data);
	}
	
	function login($username, $password)
	{
	   $this -> db -> select('id, email, password');
	   $this -> db -> from('f_users');
	   $this -> db -> where('email = ' . "'" . $username . "'");
	   $this -> db -> where('password = ' . "'" . md5($password) . "'");
	   $this -> db -> limit(1);
	
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
	
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */