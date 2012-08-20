<?php
class D_category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_first_level_categories()
	{
		$query = $this->db->get_where('d_category', array('parent_id' => 0));
		return $query->result_array();
	}
	
	public function conduct_categories() {
		$query = $this->db->get_where('d_category', array('parent_id' => 0));
		foreach ($query->result_array() as $query_item) {
			$first_array[$query_item['id']] = array('name' => $query_item['category_name'], 'children' => array());
		}
		
		$second_query = $this->db->get_where('d_category', array('parent_id !=' => 0));
		foreach ($second_query->result_array() as $query_item) {
			$first_array[$query_item['parent_id']]['children'][$query_item['id']] = array('name' => $query_item['category_name']);
		}
		return $first_array;
	}	
}
/* End of file d_category_model.php */
/* Location: ./application/models/d_category_model.php */