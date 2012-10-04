<?php
class H_item_option_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getItemExistingFields($item_id) {
		$this->db->select('	h_option_value.option_id as `Option Id`,
							d_item_option.name_cn as `Option Name Chinese`, 
							d_item_option.name_en as `Option Name English`, 
							GROUP_CONCAT(h_option_value.value_cn) as `Values In Chinese`, 
							GROUP_CONCAT(h_option_value.value_en) as `Values In English`');
		$this->db->from('h_item_option');
		$this->db->join('h_option_value', 'h_item_option.value_id = h_option_value.id');
		$this->db->join('d_item_option', 'h_option_value.option_id = d_item_option.id');
		$this->db->where('h_item_option.item_id', $item_id);
		$this->db->group_by('h_option_value.option_id');
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->list_fields();
	}
	
	function getItemAllOptions($item_id) {
		$this->db->select('	h_option_value.option_id as `Option Id`,
							d_item_option.name_cn as `Option Name Chinese`, 
							d_item_option.name_en as `Option Name English`, 
							GROUP_CONCAT(h_option_value.value_cn) as `Values In Chinese`, 
							GROUP_CONCAT(h_option_value.value_en) as `Values In English`');
		$this->db->from('h_item_option');
		$this->db->join('h_option_value', 'h_item_option.value_id = h_option_value.id');
		$this->db->join('d_item_option', 'h_option_value.option_id = d_item_option.id');
		$this->db->where('h_item_option.item_id', $item_id);
		$this->db->group_by('h_option_value.option_id');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function deleteItemOption($item_id, $option_id) {
		$this->db->query('	delete
								h_item_option
							from
								h_item_option, h_option_value
							where
								h_item_option.value_id = h_option_value.id
								and h_item_option.item_id = '.$item_id.' and option_id = '.$option_id.';');
		
	}
	
	function addItemOption($item_id, $value_id) {
		$this->db->query('	replace into h_item_option values('.$item_id.', '.$value_id.');');
	}
	
	function getItemOptionStockFields($item_id) {
		$this->db->select('value_id, option_id, name_cn, name_en, value_cn, value_en, stock');
		$this->db->from('h_item_option');
		$this->db->join('h_option_value', 'h_item_option.value_id = h_option_value.id');
		$this->db->join('d_item_option', 'd_item_option.id = h_option_value.option_id');
		$this->db->where('h_item_option.item_id', $item_id);
		$query = $this->db->get();
		return $query->list_fields();
	}
	
	function getItemOptionStock($item_id) {
		$this->db->select('value_id, option_id, name_cn, name_en, value_cn, value_en, stock');
		$this->db->from('h_item_option');
		$this->db->join('h_option_value', 'h_item_option.value_id = h_option_value.id');
		$this->db->join('d_item_option', 'd_item_option.id = h_option_value.option_id');
		$this->db->where('h_item_option.item_id', $item_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getStockByItemAndOption($item_id, $option_id, $value_id) {
		$this->db->select('sum(stock) as total');
		$this->db->from('h_item_option');
		$this->db->join('h_option_value', 'h_item_option.value_id = h_option_value.id');
		$this->db->where('h_item_option.item_id', $item_id);
		$this->db->where('h_option_value.option_id', $option_id);
		$this->db->where_not_in('h_item_option.value_id', $value_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function updateStock($item_id, $value_id, $stock) {
		$data = array(
			'stock' => $stock
		);
		$this->db->where('item_id', $item_id);
		$this->db->where('value_id', $value_id);
		$this->db->update('h_item_option', $data);
	}
}
/* End of file D_item_option.php */
/* Location: ./application/models/D_item_option.php */