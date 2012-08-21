<?php
class D_category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getCategoryByLevel($cat_level) {
		$query = $this->db->get_where('d_category', array('cat_level' => $cat_level));
		return $query->result_array();
	}
	
	public function getCategoryById($cat_id) {
		$query = $this->db->get_where('d_category', array('id' => $cat_id));
		return $query->row_array();
	}
	
	public function getCategoryByLevelAndParent($cat_level, $parent_id) {
		$query = $this->db->get_where('d_category', array('cat_level' => $cat_level, 'parent_id' => $parent_id));
		return $query->result_array();
	}
	
	public function conduct_categories() {
		/**
		first_level_id = array (name, a list of second category array (
											second_level_id => array(name, a list of third category array (
																					third_level_id => name )
																	)
										)
								)
		**/
		// please remember PHP memory
		// first level
		$query = $this->db->get_where('d_category', array('cat_level' => 1));
		foreach ($query->result_array() as $query_item) {
			$first_array[$query_item['id']] = array('name' => $query_item['category_name'], 'children' => array());
		}
		// second level
		$second_query = $this->db->get_where('d_category', array('cat_level' => 2));
		foreach ($second_query->result_array() as $query_item) {
			$first_array[$query_item['parent_id']]['children'][$query_item['id']] 
											= array('name' => $query_item['category_name'], 'children' => array());
		}
		// third level
		$third_query = $this->db->get_where('d_category', array('cat_level' => 3));
		foreach ($third_query->result_array() as $query_item) { // every third level category
			for ($i = 1;$i <= count($first_array); $i++) { 
				if (array_key_exists($query_item['parent_id'], $first_array[$i]['children'])) {
					$first_array[$i]['children'][$query_item['parent_id']]['children'][$query_item['id']] 
											= $query_item['category_name'];
					break;
				}
				
			}

		}
		return $first_array;
	}
}
/* End of file d_category_model.php */
/* Location: ./application/models/d_category_model.php */