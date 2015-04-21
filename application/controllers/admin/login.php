<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
//		$this->load->model('news_model');
  $this->load->library('pagination');
			}
	

	public function index()
	{
		if($this->session->userdata('admin_id')==NULL || $this->session->userdata('utype')==3)
		{
		$this->load->view('admin/login');
		}
		else
		{
		
		
		$this->load->model('admin/user_model');
		if(isset($_GET['utype']) && $_GET['utype']!='') {
		$search_str = "&utype=". $_GET['utype'];
		}
		else
		$search_str ='';
		$config                   = array();
        $config["base_url"]       = base_url() . "admin/login/index/?$search_str";
        $config["total_rows"]     = $this->user_model->getCountlog();
        $config["per_page"]       =25;
        $config["uri_segment"]    = 3;
		$config['full_tag_open']  = '<td>';	
        $config['first_link']     = 'First';
        $config['last_link']      = 'Last';
        $config['next_link']      = '&gt;';
        $config['prev_link']      = '&lt;';
        $config['cur_tag_open']   = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['full_tag_close'] = '</td>';
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$page  = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
		       
		
		$data['data'] = $this->user_model->fgetactivity($page ,$config["per_page"] );		
		
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
		
		
		$config1                   = array();
        $config1["base_url"]       = base_url() . "admin/login/index/?&pay=details&$search_str";
        $config1["total_rows"]     = $this->user_model->tranactionlogcount();
        $config1["per_page"]       =25;
        $config1["uri_segment"]    = 3;
		$config1['full_tag_open']  = '<td>';	
        $config1['first_link']     = 'First';
        $config1['last_link']      = 'Last';
        $config1['next_link']      = '&gt;';
        $config1['prev_link']      = '&lt;';
        $config1['cur_tag_open']   = '<b>';
		$config1['cur_tag_close'] = '</b>';
		$config1['full_tag_close'] = '</td>';
		$this->pagination->initialize($config1);
		$data["links2"] = $this->pagination->create_links();
		$page  = (isset($_GET['per_page']) && isset($_GET['pay'])) ? $_GET['per_page'] : 0;
		   
		
		//$data['data1'] = $this->user_model->agetactivity($page ,$config["per_page"]);		
		
		
		$data['pay']=$this->user_model->tranactionlog($page ,$config1["per_page"]);		
		$this->load->view('admin/home',$data);
		
		}
	
	}

	public function user()
	{
		$this->load->model('admin/login_model');
		$result = $this->login_model->validate();
				$act='login';
				$this->load->model('admin/user_model');
				$this->user_model->activity($act);		
		
		if(!$result){ 
		// If user did not validate, then show them login page again
		$msg = '<font color=red>Invalid username and/or password.</font><br />';
		$this->session->set_flashdata('msg_error', 'Invalid username and/or password');
        
		redirect(base_url().'admin/login');

		}else{
		
		if($this->session->userdata('utype') == 1){
		
		$msg = '<font color=red>Invalid username and/or password.</font><br />';
		$this->index($msg);
		}
		
		else if($this->session->userdata('utype') == 2){
		
		redirect(base_url().'admin/login/dashboard');
		
		}
		
		else  {	
		$chk  = $this->login_model->check_first_login();
		if($chk)
		redirect(base_url().'admin/myaccount/update');
		else
		redirect(base_url().'admin/login/dashboard');
		

		}
		
		}
		
		
		
	}
			
			
		public function dashboard(){

			$this->load->model('admin/user_model');
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
		$config1                   = array();
        $config1["base_url"]       = base_url() . "admin/login/dashboard/?$search_str";
        $config1["total_rows"]     = $this->user_model->subadmin_customer_transaction_count();
        $config1["per_page"]       =25;
        $config1["uri_segment"]    = 3;
		$config1['full_tag_open']  = '<td>';	
        $config1['first_link']     = 'First';
        $config1['last_link']      = 'Last';
        $config1['next_link']      = '&gt;';
        $config1['prev_link']      = '&lt;';
        $config1['cur_tag_open']   = '<b>';
		$config1['cur_tag_close'] = '</b>';
		$config1['full_tag_close'] = '</td>';
		$this->pagination->initialize($config1);
		$data["links2"] = $this->pagination->create_links();
		$page  = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
		   
		
		//$data['data1'] = $this->user_model->agetactivity($page ,$config["per_page"]);		
		
		
		$data['pay']=$this->user_model->subadmin_customer_transaction($config1["per_page"],$page);		
		$this->load->view('admin/subadmin_dashboard',$data);





}		
			
			
			
			
			
			public function logout()
			{
				$act='logout';
				$this->load->model('admin/user_model');
				$this->user_model->activity($act);		

        		$this->load->model('admin/user_model');
				$this->user_model->logout();
				
        		
			
				$msg = '<font color=red>Admin Logout</font><br />';
				$this->index($msg);
			
			
            }
	//**************Society Login Details**************//////////		
			public function sologin()
			 {

				 $this->load->view('admin/sologin');
				 
				 }
				 
			public function souser()
{

$this->load->model('admin/login_model');


$result = $this->login_model->validate();
$act='login';
$this->load->model('admin/user_model');
$this->user_model->activity($act);		

if(!$result){ 
// If user did not validate, then show them login page again
$msg = '<font color=red>Invalid username and/or password.</font><br />';
redirect(base_url().'admin/login?msg=2');

}else{
$msg = '<font color=red>Invalid username and/or password.</font><br />';
$this->index($msg);

} 


}


	
}