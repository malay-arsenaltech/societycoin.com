<?php
class cms_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	 public function allcmspageslist()
	  { 
	  
 
 	$query = $this->db->get('ci_cms');
         return  $query->result_array();
		 
    }
	
	
	public function cmsByid($id)
	 {

	$query = $this->db->get_where('ci_cms', array('id' => $id));
   	return $query->row_array();
		 }
	
	
	function addcms()
	 {
		 
        $data['title']=$_POST['title'];
        $data['meta_keywords']=$_POST['meta_keywords'];
        $data['meta_description']=$_POST['meta_description'];

	    $data['description']=$_POST['description'];
		$data['status']=$_POST['status'];
		
		
        $this->db->insert('ci_cms', $data);
		
        return  $this->db->insert_id();


		 }
		 
		 	 function updatecms()
	 {
		 
 
	    $data['title']=$_POST['title'];
        $data['meta_keywords']=$_POST['meta_keywords'];
        $data['meta_description']=$_POST['meta_description'];

	    $data['description']=$_POST['description'];
		$data['status']=$_POST['status'];
		$id=$_POST['id'];
    	$this->db->where('id', $id);
        $this->db->update('ci_cms', $data); 


return true;
		 }
		 
		 
	 function updateuserStatus($id)
	 {
		 
		 
 		$data['status']=0;       

	    $this->db->where('id', $id);
        $this->db->update('ci_cms', $data); 

    return true;
	 }

	 function pupdateuserStatus($id)
	 {
 		$data['status']=1;
		
	    $this->db->where('id', $id);
        $this->db->update('ci_cms', $data); 

    return true;
	 }
		 
	public function deleteRow($id)

	{


			$this->db->where_in('id', $id);

            $this->db->delete('ci_cms');

        

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

	}	 

	
}