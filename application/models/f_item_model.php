<?php
class F_item_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getItemById($id) {
		$query = $this->db->get_where('f_item', array('id' => $id));
		return $query->row_array();
	}
	
	public function getItemByCatId($cat_id) {
		$query = $this->db->get_where('f_item', array('category_id' => $cat_id));
		return $query->result_array();
	}
	
	public function getNumOfItems($cat_id) {
		$this->db->select('count(*) as total');
		$query = $this->db->get_where('f_item', array('category_id' => $cat_id));
		return $query->row_array();
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */