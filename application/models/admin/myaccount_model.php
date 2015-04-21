<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
class myaccount_model extends CI_Model {



	public function __construct()

	{

		$this->load->database();

	}

  

  public function userByid($id)

	 {



	$query = $this->db->get_where('ci_users', array('id' => $id));

   	return $query->row_array();

		 }
public function getBillingDate($sid ='')
 {
	if($this->session->userdata('utype') == 4){
	$this->db->select('billing_cycle_date');
	$this->db->from('ci_society');
	$this->db->where('society_user_id', $sid);
	$query =  $this->db->get();
	return $query->row()->billing_cycle_date;
	}
	return '';

	 }

	  

public function updateuser($id='')
{
 
		
	  	          

		  $opassword = md5($this->input->post('password'));
            $query     = $this->db->get_where('ci_users', array(
                'id' => $id,
                'password' => "$opassword"

            ));
      if( $query->num_rows() > 0){                
       
        
		
		
		$password=$this->input->post('newpassword', TRUE);
		
		 if($password !=''){
			$password = md5($password);
			$data['password'] = $password;
		 }	 
			$data['lname']=$_POST['name'];
		$update_email =  $this->session->userdata('update_email');
			$em =  $_POST['email'];
			
			if($update_email!= $em){
			 $data['email']   = $_POST['email'];
			}
			//$data['email']=$_POST['email'];

			$data['fname']=$_POST['username'];

			$data['mobile']=$_POST['mobile'];

			$data['address']=$_POST['address'];

			$data['city']=$_POST['city'];

			$data['state']=$_POST['state'];

			$data['country']=$_POST['country'];

			$data['ip']=$_POST['ip'];			

			//$id=$_POST['id'];

			 

	$this->db->where('id', $id);

    $this->db->update('ci_users', $data); 
	if($this->session->userdata('utype') == 4){
	 $this->updatebilling_date();
	}
	$eero = $this->db->_error_number();
		if($eero === 1062){ 
		return $eero;
		}
		
		else 
		return true;
	
	
	
	
	}
	
	else {
	
	  return false;
	  
		}
         	
	

 }
 
 
 
 
 

function updatebilling_date(){

if($this->session->userdata('utype') == 4){
		$data=array();	
if($_POST['billing_cycle_date']!='')  {
	$data['billing_cycle_date']=	$_POST['billing_cycle_date'];	
					
	}
		
	$sid = $this->session->userdata('admin_id');

	$this->db->where('society_user_id', $sid );

    $this->db->update('ci_society', $data); 
}


}	


}