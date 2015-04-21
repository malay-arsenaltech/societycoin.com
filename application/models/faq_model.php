<?php
class Faq_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_faq($id = FALSE)
{
	if ($id === FALSE)
	{
		$query = $this->db->get('ci_faq');
		return $query->result_array();
	}

	$query = $this->db->get_where('ci_faq', array('id' => $id,'status' =>'1'));
	return $query->row_array();
}


}