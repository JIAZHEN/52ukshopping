<?php
class F_item_desc_tabs_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getAllDescs() {
		$this->db->select('	f_item_desc_tabs.id as tabID,
							f_item.item_name,
							tab_name,
							tab_content');
		$this->db->from('f_item_desc_tabs');
		$this->db->join('f_item', 'f_item_desc_tabs.item_id = f_item.id');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getTabById($id) {
		$query = $this->db->get_where('f_item_desc_tabs', array('id' => $id));
		return $query->row_array();
	}
	
	function getTabByItemId($item_id) {
		$query = $this->db->get_where('f_item_desc_tabs', array('item_id' => $item_id));
		return $query->result_array();
	}
	
	function getFields() {
		$this->db->select('	f_item_desc_tabs.id as tabID,
							f_item.item_name,
							tab_name,
							tab_content');
		$this->db->from('f_item_desc_tabs');
		$this->db->join('f_item', 'f_item_desc_tabs.item_id = f_item.id');
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->list_fields();
	}
	
	function deleteItemDesc($id) {
		$this->db->delete('f_item_desc_tabs', array('id' => $id));
	}
	
	function addTab($item_id) {
		$data = array(
			'item_id' => $item_id,
			'tab_name' => $this->input->post('tabname', true),
			'tab_content' => $this->input->post('descript')
		);
			
		$this->db->insert('f_item_desc_tabs', $data);
		return $this->db->insert_id();
	}
	
	function updateTab($id) {
		$data = array(
			'tab_name' => $this->input->post('tabname', true),
			'tab_content' => $this->input->post('descript')
		);
			
		$this->db->where('id', $id);
		$this->db->update('f_item_desc_tabs', $data);
	}
}
/* End of file d_country_model.php */
/* Location: ./application/models/d_country_model.php */