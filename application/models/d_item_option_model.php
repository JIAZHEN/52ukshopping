<?php
class D_item_option_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('d_item_option');
	}
	
	function getInfoByOrderId($id) {
		$query = $this->db->get_where('d_item_option', array('id' => $id));
		return $query->row_array();
	}
	
	function addOption($nameCn, $nameEn) {
		$data = array(
			'name_cn' => $nameCn,
			'name_en' => $nameEn
		);
		$this->db->insert('d_item_option', $data);
		return $this->db->insert_id();
	}
	
	function editOption($nameCn, $nameEn, $id) {
		$data = array(
			'name_cn' => $nameCn,
			'name_en' => $nameEn
		);
		$this->db->where('id', $id);
		$this->db->update('d_item_option', $data);
	}
	
	function getAllOptions() {
		$query = $this->db->get('d_item_option');
		return $query->result_array();
	}
	
	function deleteOption($id) {
		$this->db->delete('d_item_option', array('id' => $id));
	}
}
/* End of file D_item_option.php */
/* Location: ./application/models/D_item_option.php */