<?php
class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
//		$this->load->model('news_model');

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
		
			$config                   = array();
        $config["base_url"]       = base_url() . "admin/login/index/?";
        $config["total_rows"]     = $this->user_model->getCountlog();
        $config["per_page"]       =25;
        $config["uri_segment"]    = 3;
		$config['full_tag_open']  = '<td>';
		$config['page_query_string'] = FALSE;
		$config['use_page_numbers'] = TRUE;
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
		       
		
		$data['data'] = $this->user_model->fgetactivity($config["per_page"], $page);		
		
		$data['data1'] = $this->user_model->agetactivity();		
		
		
		$data['pay']=$this->user_model->tranactionlog();		
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
		redirect(base_url().'admin/login?msg=2');

		}else{
		$msg = '<font color=red>Invalid username and/or password.</font><br />';
		$this->index($msg);
		
		} 
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