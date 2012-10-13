<?php
class F_item_comment_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getCommentById($id) {
		$query = $this->db->get_where('f_item_comment', array('id' => $id));
		return $query->row_array();
	}
	
	function getCommentsByItemId($itemId) {
		$this->db->select('f_item_comment.*, first_name');
		$this->db->from('f_item_comment');
		$this->db->join('f_users', 'f_item_comment.user_id = f_users.id');
		$this->db->where('f_item_comment.item_id', $itemId);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function addComment($itemId, $userId, $content) {
		$data = array(
			'item_id' => $itemId,
			'user_id' => $userId,
			'content' => $content
		);
		$this->db->insert('f_item_comment', $data);
		return $this->db->insert_id();
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */