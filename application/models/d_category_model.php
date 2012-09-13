<?php
class D_category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	function getFields() {
		return $this->db->list_fields('d_category');
	}
	
	function getAllLevels() {
		$this->db->distinct();
		$this->db->select('cat_level');
		$query = $this->db->get('d_category');
		return $query->result_array();
	}
	
	function getAllCategories() {
		$query = $this->db->get('d_category');
		return $query->result_array();
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
	
	public function getBreadcrumb($cat_id) {
		if($cat_id == 0) {
			return array(	'0' => array('name' => 'Home', 'url' => base_url()), 
	    					'1' => 'Shop' );
	    } 
	    $cat_query = $this->d_category_model->getCategoryById($cat_id);
	    
	    $category_data = array(	'0' => array('name' => 'Home', 'url' => base_url()), 
	    						'1' => array('name' => 'Shop', 'url' => base_url().'shop') );
	    	    
	    if($cat_query['cat_level'] == 1) {
			$category_data[2] = $cat_query['category_name'];
		} else if ($cat_query['cat_level'] == 2) {
			$lv1_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
			
			$category_data[2] = array(	'name' => $lv1_cat_query['category_name'], 
										'url' => base_url().'shop/category/'.$lv1_cat_query['id']);
										
			$category_data[3] = $cat_query['category_name'];
		} else {
			$lv2_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
			$lv1_cat_query = $this->d_category_model->getCategoryById($lv2_cat_query['parent_id']);
			
			$category_data[2] = array(	'name' => $lv1_cat_query['category_name'], 
										'url' => base_url().'shop/category/'.$lv1_cat_query['id']);
			$category_data[3] = array(	'name' => $lv2_cat_query['category_name'], 
										'url' => base_url().'shop/category/'.$lv2_cat_query['id']);
			$category_data[4] = $cat_query['category_name'];
		}
		
		return $category_data;
	}
	
	public function getBreadcrumbForDetail($cat_id, $item_name) {
		$cat_query = $this->d_category_model->getCategoryById($cat_id);
		$lv2_cat_query = $this->d_category_model->getCategoryById($cat_query['parent_id']);
		$lv1_cat_query = $this->d_category_model->getCategoryById($lv2_cat_query['parent_id']);
	    
	    $category_data = array(	'0' => array('name' => 'Home', 'url' => base_url()), 
	    						'1' => array('name' => 'Shop', 'url' => base_url().'shop'),
	    						'2' => array(	'name' => $lv1_cat_query['category_name'], 
												'url' => base_url().'shop/category/'.$lv1_cat_query['id']),
								'3' => array(	'name' => $lv2_cat_query['category_name'], 
												'url' => base_url().'shop/category/'.$lv2_cat_query['id']),
								'4' => array(	'name' => $cat_query['category_name'], 
												'url' => base_url().'shop/browse/'.$cat_query['id']),
								'5' => $item_name			 );
		return $category_data;
	    			
	}
	
	function update_category($id, $name, $level, $parent_id) {
		$data = array(
			'category_name' => $name,
			'cat_level' => $level,
			'parent_id' => $parent_id
		);
		$this->db->where('id', $id);
		$this->db->update('d_category', $data);
	}
	
	function delete_category($id) {
		$this->db->delete('d_category', array('id' => $id));
	}
}
/* End of file d_category_model.php */
/* Location: ./application/models/d_category_model.php */