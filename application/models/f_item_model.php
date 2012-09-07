<?php
class F_item_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('f_item');
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
	
	public function getItemsForPagination($cat_id, $limit, $offset) {
		
		$this -> db -> where('category_id = ' . $cat_id);
		$query = $this->db->get('f_item', $limit, $offset);
		
		return $query->result_array();
	}
	
	public function getAllItems() {
		
		$query = $this->db->get('f_item');
		
		return $query->result_array();
	}
	
	function delete_item($id) {
		$this->db->delete('f_item', array('id' => $id));
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */