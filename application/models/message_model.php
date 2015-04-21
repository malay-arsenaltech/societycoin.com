<?php
class Message_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_msg($id = FALSE)
{
	if ($id === FALSE)
	{
		$query = $this->db->get('ci_message');
		return $query->result_array();
	}

	$query = $this->db->get_where('ci_message', array('id' => $id,'status' =>'1'));
	return $query->row_array();
}

public function inbox()
 {
	 $this->db->select('b.fname,b.lname,b.email,a.message,a.subject,a.status,a.timestamp,a.id as id');
	$this->db->from('ci_message as a');
	$this->db->join('ci_users as b','a.send_by_id=b.id');
	$this->db->where('a.send_to_id',$this->session->userdata('userid'));
	   $this->db->where('a.status','1');
	$this->db->order_by("a.id", "ASC"); 
    $query=$this->db->get();
	return $query->result();
	 
	 }

public function outbox()
 {
    $this->db->select('b.fname,b.lname,b.email,a.message,a.subject,a.status,a.timestamp,a.id as id');
	$this->db->from('ci_message as a');
	$this->db->join('ci_users as b','a.send_to_id=b.id');
	$this->db->where('a.send_by_id',$this->session->userdata('userid'));
   $this->db->where('a.status','1');
	$this->db->order_by("a.id", "ASC"); 
    $query=$this->db->get();
	return $query->result();
	 
	 }

	 

public function getsocietyid()
 {
	 $this->db->select('c.userid,c.society_title');
	 $this->db->from('ci_users as a');
	 $this->db->join('ci_property as b','a.id=b.userid');
	 $this->db->join('ci_socity as c','b.societyid=c.id');
	 $this->db->where('a.id',$this->session->userdata('userid'));
	 $this->db->group_by('c.id');
	 
	 $query=$this->db->get();
	 
        return $query->result();
	 }
	 
public function send()
  {
	  $data=array(
				  
				  'send_to_id'=>$this->input->post('to'),
				  'send_by_id'=>$this->session->userdata('userid'),
				  'subject'  =>$this->input->post('subject'),
				  'message'=>$this->input->post('message'),
				  'status' =>$this->input->post('status')
				   );
	  
	  $query=$this->db->insert('ci_message',$data);
	  return $this->db->insert_id();	
	  
	  
	  
	  }
	  
public function delete()
  {
	  $data=array('status'=>0);
	  
	  $id=$_REQUEST['mid'];
	  $this->db->where('id',$id);
	  $this->db->update('ci_message',$data);
	  return true;
	  
	  }
	  
	  
	  public function viewmsg($id)
	    {
     $this->db->select('a.fname,a.lname,b.subject,b.message');
	 $this->db->from('ci_users as a');
	 $this->db->join('ci_message as b','a.id=b.send_to_id');
	 $this->db->where('b.id',$id);
	 
	 $query=$this->db->get();
	 
        return $query->result();

			
			
			}
			
	  public function inboxview($id)
	    {
     $this->db->select('a.fname,a.lname,b.subject,b.message');
	 $this->db->from('ci_users as a');
	 $this->db->join('ci_message as b','a.id=b.send_by_id');
	 $this->db->where('b.id',$id);
	 
	 $query=$this->db->get();
	 
        return $query->result();

			
			
			}		
			
			


}