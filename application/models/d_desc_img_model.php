<?php
class D_desc_img_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	function getAllDescImgs() {
		$query = $this->db->get('d_desc_img');
		return $query->result_array();
	}
	
	function getNumOfDescImgs() {
		$this->db->select('count(*) as total');
		$query = $this->db->get('d_desc_img');
		return $query->row_array();
	}
	
	function getDescImgsForPagination($limit, $offset) {
		$query = $this->db->get('d_desc_img', $limit, $offset);
		return $query->result_array();
	}
	
	function getDescImgById($id) {
		$query = $this->db->get_where('d_desc_img', array('id' => $id));
		return $query->row_array();
	}
		
	function addDescImg($img_address) {
		
		$data = array(
			'img_address' => $img_address
		);
		$this->db->insert('d_desc_img', $data);
		return $this->db->insert_id();
	}
	
	function deleteDescImg($id) {
		$this->db->delete('d_desc_img', array('id' => $id));
	}
}
/* End of file d_category_model.php */
/* Location: ./application/models/d_category_model.php */