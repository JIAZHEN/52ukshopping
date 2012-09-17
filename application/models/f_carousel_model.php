<?php
class F_carousel_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getAllCarousels() {
		$query = $this->db->get('f_carousel');
		return $query->result_array();
	}
	
	function getFields() {
		return $this->db->list_fields('f_carousel');
	}
}
/* End of file d_country_model.php */
/* Location: ./application/models/d_country_model.php */