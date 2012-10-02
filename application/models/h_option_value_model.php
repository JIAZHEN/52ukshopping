<?php
class H_option_value_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	function getValueId($optionId, $nameCn, $nameEn) {
		$nameCn = trim($nameCn);
		$nameEn = trim($nameEn);
		
		$query = $this->db->get_where('h_option_value', array('option_id' => $optionId, 'value_cn' => $nameCn, 'value_en' => $nameEn));
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row['id'];
		} else {
			$data = array(
				'option_id' => $optionId,
				'value_cn' => $nameCn,
				'value_en' => $nameEn
			);
			$this->db->insert('h_option_value', $data);
			return $this->db->insert_id();
		}
	}
}
/* End of file D_item_option.php */
/* Location: ./application/models/D_item_option.php */