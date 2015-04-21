<?php
class faq_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	 public function allfaqlist()
	  { 
	  
 	$query = $this->db->get('ci_faq');
         return  $query->result_array();
		 
    }
	
	
	public function faqByid($id)
	 {

	$query = $this->db->get_where('ci_faq', array('id' => $id));
   	return $query->row_array();
		 }
	
	
	function addfaq()
	 {
		 
        $data['subject']=$_POST['subject'];
        $data['userid']=$this->session->userdata('userid');
	    $data['description']=$this->input->post('description');
		$data['status']=$_POST['status'];
		
		
        $this->db->insert('ci_faq', $data);
		
        return  $this->db->insert_id();


		 }
		 
	 function updatefaq($id='')
	 {
		 
         $data['subject']=$_POST['subject'];
        $data['userid']=$this->session->userdata('userid');
	    $data['description']=$this->input->post('description');
		$data['status']=$_POST['status'];      
    	$this->db->where('id', $id);
        $this->db->update('ci_faq', $data); 


return true;
		 }
		 
		 
	 function updateuserStatus($id='')
	 {
		 
		 
 		$data['status']=0;
       	
	    $this->db->where('id', $id);
        $this->db->update('ci_faq', $data); 

    return true;
	 }

	 function pupdateuserStatus($id='')
	 {
 		$data['status']=1;		
	    $this->db->where('id', $id);
        $this->db->update('ci_faq', $data); 

    return true;
	 }
		 
	public function deleteRow($id)

	{


			$this->db->where_in('id', $id);

            $this->db->delete('ci_faq');

        

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

	}	 


	
}