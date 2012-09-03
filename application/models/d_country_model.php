<?php
class D_country_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getAllCountries() {
		$this->db->order_by("name", "asc");
		$query = $this->db->get('d_country');
		return $query->result_array();
	}
}
/* End of file d_country_model.php */
/* Location: ./application/models/d_country_model.php */