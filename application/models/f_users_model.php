<?php
class F_users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('f_users');
	}
	
	public function getAllUsers() {
		$query = $this->db->get('f_users');
		return $query->result_array();
	}
	
	function getNumOfUsers() {
		$this->db->select('count(*) as total');
		$query = $this->db->get('f_users');
		return $query->row_array();
	}
	
	function getUsersForPagination($limit, $offset) {
		$query = $this->db->get('f_users', $limit, $offset);
		return $query->result_array();
	}
	
	function get_users($id)
	{
		$query = $this->db->get_where('f_users', array('id' => $id));
		return $query->row_array();
	}
	
	function delete_user($id) {
		$this->db->delete('f_users', array('id' => $id));
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
			'house_name' => $this->input->post('housename', true),
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
			
		$this->db->insert('f_users', $data);
		return $this->db->insert_id();
	}
	
	public function update_users($id) {
		$data = array(
			'title' => $this->input->post('title', true),
			'first_name' => $this->input->post('firstname', true),
			'last_name' => $this->input->post('lastname', true),
			'birthday' => $this->input->post('birthday', true),
			'postcode' => $this->input->post('postcode', true),
			'house_name' => $this->input->post('housename', true),
			'address_one' => $this->input->post('address_one', true),
			'address_two' => $this->input->post('address_two', true),
			'city' => $this->input->post('city', true),
			'country' => $this->input->post('country', true),
			'passport' => $this->input->post('passport', true),
			'identity_cn' => $this->input->post('identity_cn', true),
			'mobile' => $this->input->post('mobile', true),
			'telephone' => $this->input->post('telephone', true)
		);
		
		$this->db->where('id', $id);
		$this->db->update('f_users', $data);
		
	}
	
	function login($username, $password)
	{
	   $this -> db -> select('id, email, password, first_name');
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
	
	function check_password($id, $password) {
		$this -> db -> select('id');
		$this -> db -> from('f_users');
		$this -> db -> where('id = ' . "'" . $id . "'");
		$this -> db -> where('password = ' . "'" . md5($password) . "'");
		$this -> db -> limit(1);
	
		$query = $this -> db -> get();
	
		if($query -> num_rows() == 1)
		{
	     	return true;
	    }
	    else
	    {
	     	return false;
	    }
	}
	
	function set_password($id, $password) {
		$data = array(
               'password' => md5($password)
            );

		$this->db->where('id', $id);
		$this->db->update('f_users', $data);
	}
	
}
/* End of file f_users_model.php */
/* Location: ./application/models/f_users_model.php */