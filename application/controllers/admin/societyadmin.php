<?php

class Societyadmin extends CI_Controller 

{



	public function __construct()

	{

		parent::__construct();

//		$this->load->model('news_model');

check_in();

			}

	



	public function index()

	{

		if($this->session->userdata('so_id')==NULL)

		{

		$this->load->view('admin/sologin');

		}

		else

		{

		$this->load->model('admin/souser_model');

		

		$data['data']=$this->souser_model->fgetactivity();

		$data['data1']=$this->souser_model->agetactivity();		

		$data['pay']=$this->souser_model->tranactionlog();		

		$data['property']=$this->souser_model->propertyBysoid(@$this->session->userdata('so_id'));		

		

		

			

		$this->load->view('admin/sohome',$data);

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





$result = $this->login_model->sovalidate();



if(!$result){ 

// If user did not validate, then show them login page again

$msg = '<font color=red>Invalid username and/or password.</font><br />';

redirect(base_url().'admin/sologin?msg=2');



}else{

$msg = '<font color=red>Invalid username and/or password.</font><br />';

$this->index($msg);



} 





}





	

}