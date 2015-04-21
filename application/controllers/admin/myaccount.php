<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myaccount extends CI_Controller {



	public function __construct()

	{

		parent::__construct();


		  $this->load->library('pagination');
		$this->load->helper('url');
         check_in();
        $this->load->model('admin/myaccount_model');
	}

	
	function index(){
	
	if($this->session->userdata('admin_id')==NULL)
				{
				$this->load->view('admin/login');
				}
	//$this->load->view('admin/myaccount',$data);
	
	
	
	}
	

	public  function update($id=1){

		$result = $data['data']=$this->myaccount_model->userByid($this->session->userdata('admin_id'));
		$udatemail = (isset( $result['email'])) ?  $result['email'] : "";
		$this->session->set_userdata('update_email',$udatemail);
		$data['billing_cycle_date']=$this->myaccount_model->getBillingDate($this->session->userdata('admin_id'));
		 if ($this->input->post()) {
		 
		 
		   $this->load->library('form_validation');
		//$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');       
      
			if ($this->form_validation->run() == FALSE) {
			 $error = validation_errors();
			 $this->session->set_flashdata('msg_error_red', $error);
			 redirect(base_url()."admin/myaccount/update");
			 }
		 
		 

		$data['msg']="Your Account has been updated successfully.";	 
		 
		 
		 $res = $this->myaccount_model->updateuser($this->session->userdata('admin_id'));
		 
		 if( $res ===  1062){
		 $msg = "This email is already used by another user.";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect( base_url() . "admin/myaccount/update");
		
		}
		 if( $res){	 
		 $this->send_mail();
		 
		 $url = base_url() . "admin/myaccount/update";
		   $msg= "Your Account has been updated successfully.";
            $this->session->set_flashdata('msg', $msg);
			  redirect($url); 
			  
			  }
			  
			  
			  
			  else {
			   $url = base_url() . "admin/myaccount/update";
		   $msg= "Your current password does not match.";
            $this->session->set_flashdata('msg_error_red', $msg);
			  redirect($url); 
			  
			  
			  
			  }
		 
		 }
		 
		
		
		$this->load->view('admin/myaccount',$data);


}	  

	   
public function send_mail(){

		$this->load->library('email');
        $this->load->helper('email');

		$html = "Hi Admin, <br> <br>---------------------------<br><br>Your account information has been updated successfuly <br><br>---------------------------<br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com";
		   $this->email->from("no-reply@societycoin.com","societycoin.com"); 
            $this->email->subject("Account Update");
            $this->email->message($html);
            $this->email->set_mailtype("html");           
			$list = array($this->session->userdata('update_email'));
			$this->email->to($list);
			
			
			$this->email->send();			
			
              




}


}