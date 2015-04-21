<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
class ajax_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

	
function getPropertiesBySocietyId($id){

	$id = trim($id);

	$sql = "select distinct(ci_propertys.id),ci_propertys.address from ci_propertys where ci_propertys.societyid=$id and ci_propertys.status=1";
		
		
		$result = $this->db->query($sql); 
		
		return $result->result_array();



}
		   
function getSociety($key=''){

$q = $this->input->get_post('query');

			$this->db->select('*'); $this->db->distinct('id');
			$this->db->from('ci_society');
			$this->db->where('status',1);
		$this->db->LIKE('society_title',$q );
	
		 $query = $this->db->get();       
     if($query->num_rows() > 0)
		return $query->result_array();

else return array();

}



function getcity($s=''){


			$this->db->select('*'); $this->db->distinct('id');
			$this->db->from('ci_city');
			
			$this->db->join('ci_states',"ci_states.id=ci_city.stateid" );
			
			$this->db->where('ci_states.state',"$s");
			$this->db->where('ci_city.status',1);
		 $query = $this->db->get();       
     if($query->num_rows() > 0)
		return $query->result_array();

else return array();





}






}