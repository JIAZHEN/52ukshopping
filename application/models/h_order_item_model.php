<?php
class H_order_item_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('h_order_item');
	}
	
	function getInfoByOrderId($id) {
		$query = $this->db->get_where('h_order_item', array('order_id' => $id));
		return $query->result_array();
	}
	
	function addLineItems($order_id, $item_id, $price, $cost, $quantity, $options) {
		$data = array(
			'order_id' => $order_id,
			'item_id' => $item_id,
			'price' => $price,
			'cost' => $cost,
			'quantity' => $quantity,
			'options' => $options
		);
		$this->db->insert('h_order_item', $data);
	}
	
	function deleteByOrderIdItemId($orderId, $itemId) {
		$this->db->delete('h_order_item', array('order_id' => $orderId, 'item_id' => $itemId));
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */