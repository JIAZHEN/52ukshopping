<?php
class F_order_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('f_order');
	}
	
	function getOrderById($id) {
		$query = $this->db->get_where('f_order', array('id' => $id));
		return $query->row_array();
	}
	
	function addOrder($userId, $price, $cogs) {
		$data = array(
			'user_id' => $userId,
			'merchandise' => $price,
			'cogs' => $cogs,
			'order_date' => date("Y-m-d H:i:s")
		);
		$this->db->insert('f_order', $data);
		return $this->db->insert_id();
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */