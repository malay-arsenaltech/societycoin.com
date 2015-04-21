<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myaccount_model extends CI_Controller {



	public function __construct()

	{

		parent::__construct();


		  $this->load->library('pagination');
		$this->load->helper('url');
         if($this->session->userdata('admin_id')==NULL)
				{
				$this->load->view('admin/login');
				}
        $this->load->model('admin/myaccount_model');
	}

	
	function index(){
	
	
	//$this->load->view('admin/myaccount',$data);
	
	
	
	}
	

	public  function update($id=1){

		$data['data']=$this->myaccount_model->userByid($id);
print_r($data);die;
		 if ($this->input->post()) {

		$data['msg']="Your Account has been updated successfully.";	 
		 
		 
		 $this->myaccount_model->updateuser($this->session->userdata('admin_id'));
		 
		 }
		 
		
		
		$this->load->view('admin/myaccount',$data);


}	  

	   



}