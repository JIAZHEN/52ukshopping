<?php
class F_item_img_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getImgsById($item_id) {
		$query = $this->db->get_where('f_item_img', array('item_id' => $item_id));
		return $query->result_array();
	}
	
	function delete_img($id) {
		$this->db->delete('f_item_img', array('id' => $id));
	}
	
	function add_item_img($item_id, $img_address) {
		$data = array(
			'item_id' => $item_id,
			'thumb_address' => 'none',
			'img_address' => $img_address
		);
			
		$this->db->insert('f_item_img', $data);
		return $this->db->insert_id();
	}
	
}
/* End of file f_item_img_model.php */
/* Location: ./application/models/f_item_img_model.php */