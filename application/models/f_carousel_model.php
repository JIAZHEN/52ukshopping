<?php
class F_carousel_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getAllCarousels() {
		$query = $this->db->get('f_carousel');
		return $query->result_array();
	}
	
	function getFields() {
		return $this->db->list_fields('f_carousel');
	}
	
	function deleteCarousel($id) {
		$this->db->delete('f_carousel', array('id' => $id));
	}
	
	function getCarouselById($id) {
		$query = $this->db->get_where('f_carousel', array('id' => $id));
		return $query->row_array();
	}
	
	function addCarousel($img_address) {
		$name = $this->input->post('carousel_name', true);
		$description = $this->input->post('description', true);
	
		$data = array(
			'name' => $name,
			'description' => $description,
			'img_address' => $img_address
		);
		$this->db->insert('f_carousel', $data);
		return $this->db->insert_id();
	}
	
	function editCarousel($id, $img_address) {
		$name = $this->input->post('carousel_name', true);
		$description = $this->input->post('description', true);
	
		$data = array(
			'name' => $name,
			'description' => $description,
			'img_address' => $img_address
		);
		$this->db->where('id', $id);
		$this->db->update('f_carousel', $data);
	}
}
/* End of file d_country_model.php */
/* Location: ./application/models/d_country_model.php */