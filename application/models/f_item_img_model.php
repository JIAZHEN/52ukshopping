<?php
class F_item_img_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getImgsByItemId($item_id) {
		$query = $this->db->get_where('f_item_img', array('item_id' => $item_id));
		return $query->result_array();
	}
	
	function getImgsByItemIdForBrowse($item_id) {
		$query = $this->db->get_where('f_item_img', array('item_id' => $item_id));
		return $query->row_array();
	}
	
	function getRowById($id) {
		$query = $this->db->get_where('f_item_img', array('id' => $id));
		return $query->row_array();
	}
	
	function getDeskShow() {
		$query = $this->db->get_where('f_item_img', array('is_desk_show' => 1));
		return $query->result_array();
	}
	
	function delete_img($id) {
		$this->db->delete('f_item_img', array('id' => $id));
	}
	
	function deleteImgByItemId($item_id) {
		$this->db->delete('f_item_img', array('item_id' => $item_id));
	}
	
	function add_item_img($item_id, $img_address) {
		$data = array(
			'item_id' => $item_id,
			'img_address' => $img_address
		);
			
		$this->db->insert('f_item_img', $data);
		return $this->db->insert_id();
	}
	
	function update_thumbs($id, $thumb_address) {
		$data = array(
			'thumb_address' => $thumb_address
		);
		$this->db->where('id', $id);
		$this->db->update('f_item_img', $data);
	}
	
	function update_tiny($id, $tiny_address) {
		$data = array(
			'tiny_address' => $tiny_address
		);
		$this->db->where('id', $id);
		$this->db->update('f_item_img', $data);
	}
	
	function updateIsDeskShow($id, $value) {
		$data = array(
			'is_desk_show' => $value
		);
		$this->db->where('id', $id);
		$this->db->update('f_item_img', $data);
	}
	
}
/* End of file f_item_img_model.php */
/* Location: ./application/models/f_item_img_model.php */