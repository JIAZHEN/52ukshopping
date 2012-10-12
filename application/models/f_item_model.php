<?php
class F_item_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	public function getFields() {
		return $this->db->list_fields('f_item');
	}
	
	function getItemById($id) {
		$query = $this->db->get_where('f_item', array('id' => $id));
		return $query->row_array();
	}
	
	function getItemsBySearch($search, $offset, $limit) {
		$this->db->select('	f_item.* ');
		$this->db->from('f_item');
		$this->db->join('d_category', 'f_item.category_id = d_category.id');
		$this->db->like('category_name', $search); 
		$this->db->or_like('item_name', $search); 
		$query = $this->db->get();
		$this->db->limit($offset, $limit);
		return $query->result_array();
	}
	
	function getNumberOfItemsBySearch($search) {
		$this->db->select('count(*) as `total`');
		$this->db->from('f_item');
		$this->db->join('d_category', 'f_item.category_id = d_category.id');
		$this->db->like('category_name', $search); 
		$this->db->or_like('item_name', $search); 
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function getItemByCatId($cat_id) {
		$query = $this->db->get_where('f_item', array('category_id' => $cat_id));
		return $query->result_array();
	}
	
	function getNumOfAllItems() {
		$this->db->select('count(*) as total');
		$query = $this->db->get('f_item');
		return $query->row_array();
	}
	
	public function getNumOfItems($cat_id) {
		$this->db->select('count(*) as total');
		$query = $this->db->get_where('f_item', array('category_id' => $cat_id));
		return $query->row_array();
	}
	
	function getItemsForPagination($cat_id, $limit, $offset) {
		
		$this -> db -> where('category_id = ' . $cat_id);
		$query = $this->db->get('f_item', $limit, $offset);
		
		return $query->result_array();
	}
	
	function getItemsForAdminPagination($limit, $offset) {
		$query = $this->db->get('f_item', $limit, $offset);
		return $query->result_array();
	}
	
	public function getAllItems() {
		
		$query = $this->db->get('f_item');
		
		return $query->result_array();
	}
	
	function delete_item($id) {
		$this->db->delete('f_item', array('id' => $id));
	}
	
	function deleteItemByCatId($cat_id) {
		$this->db->delete('f_item', array('category_id' => $cat_id));
	}
	
	function add_item() {
		$data = array(
			'item_name' => $this->input->post('itemname', true),
			'description' => $this->input->post('descript', true),
			'category_id' => $this->input->post('category', true),
			'price' => $this->input->post('price', true),
			'cost' => $this->input->post('cost', true),
			'stock' => $this->input->post('stock', true),
			'thumbnail' => '',
			'image' => ''
		);
			
		$this->db->insert('f_item', $data);
		return $this->db->insert_id();
	}
	
	function getItemOptions($itemId) {
		
	}
	
	function update_item() {
		$data = array(
			'item_name' => $this->input->post('itemname', true),
			'description' => $this->input->post('descript', true),
			'category_id' => $this->input->post('category', true),
			'price' => $this->input->post('price', true),
			'cost' => $this->input->post('cost', true),
			'stock' => $this->input->post('stock', true)
		);
			
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('f_item', $data);
	}
	
	function getStockById($id) {
		$query = $this->db->get_where('f_item', array('id' => $id));
		return $query->row_array();
	}
}
/* End of file f_item_model.php */
/* Location: ./application/models/f_item_model.php */