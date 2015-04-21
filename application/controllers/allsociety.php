<?php

class Allsociety extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		  $this->load->library('pagination');

		  $this->load->model('admin/master_model');

  		$this->load->model('admin/socity_model');



	}



public function index()

{


	if($this->session->userdata('admin_id')==NULL)

	 {

	$this->load->view('admin/login');

	 }else

	   {
				$config                   = array();
        $config["base_url"]       = base_url() . "admin/allsociety/index/?";
        $config["total_rows"]     = $this->socity_model->getCount();
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
		$page          = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
		       

		if($this->session->userdata('utype')==2)   

		 {
		 

	        // $result = $this->socity_model->subadminSociety();

			 $result  = $this->socity_model->subadminSociety($config["per_page"], $page);

		 }else

		    {

		   

		// $result = $this->socity_model->allsocietylist();
			 $result  = $this->socity_model->allsocietylist($config["per_page"], $page);
			}

		
			$data['data']=$result;			      

		   	$this->load->view('admin/allsociety',$data);

		   }

	

}

      public function editsociety()

       {

	   $id=@$_GET['said'];





        $result = $this->socity_model->societyByid($id);

		

//echo '<pre>';		print_r($result); exit(0);

		$data['data']=$result;		     

       $data['allcountry']= $this->master_model->allcountry($result['countryid']);

       $data['allstate']  = $this->master_model->allstate($result['countryid']);

	   

       $data['allcity']= $this->master_model->allcity($result['stateid']);

       $data['allarea']  = $this->master_model->allarea($result['cityid']);

	   

	   $data['condata']  = $this->socity_model->condata($id);

//echo '<pre>'; 	   print_r($data['condata']); exit();

	   

	   		   $data['bills']=$this->master_model->getchargeheadlist();



	   



		

	      

		   	$this->load->view('admin/editsociety',$data);

	   }

	   

       public function addsociety()

       {

		   $this->load->model('admin/user_model');

		   $data['sodata']=$this->user_model->soadmin();

		   

   		   $this->load->model('admin/master_model');

		   $data['allcountry']= $this->master_model->allcountry();

		   

		   

		   $data['bills']=$this->master_model->getchargeheadlist();

		   

		   	   

		   

		   	$this->load->view('admin/addsociety',$data);



	   }

	   

	  public function process()

       {

		   

		$this->load->model('admin/socity_model');

        $result = $this->socity_model->addsocity();

		if($result!=NULL)

		 {

		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety?msg='.$msg);



				  }

	   }

	   

	   

	     public function new_process()

       {

		   

//echo '<pre>'; 		   print_r($_POST); exit();

		   

		$this->load->model('admin/socity_model');

        $result = $this->socity_model->NewSocietyADD();

		if($result!=NULL)

		 {

		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety?msg='.$msg);



				  }

	   }

	   

	   

	  public function update()

       {

		   

		$this->load->model('admin/socity_model');

        $result = $this->socity_model->updatesocity();

		if($result==true)

		 {

		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety?msg='.$msg);



				  }

	   }

	   

	   

	   

	     public function changedStatus(){

		   

        $this->load->model('admin/socity_model');

		



        // Validate the user can login

        $result = $this->socity_model->updatesocityStatus();

		

				if($result==true)

		 {

  		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety?msg='.$msg);



				  }



		

		 }

		 

		 public function pchangedStatus(){

		   

        $this->load->model('admin/socity_model');

		



        // Validate the user can login

        $result = $this->socity_model->pupdatesocityStatus();

		

				if($result==true)

		 {

  		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety?msg='.$msg);



				  }



		

		 }

		 

		 

		 

		 

		 

		 public function addcity()

		 {

			 $this->load->view('addcity');

			 

			 }

			 

		public function addcharge()

		  {

			  

			  

			  

	

      	$this->load->model('admin/user_model');

		

		

	    $data['allcountry']= $this->master_model->allcountry();

		

		if($this->session->userdata('utype')==1)

		 {

        $result = $this->user_model->soregister();

		 }else

		   {

          $result = $this->user_model->alluserlist3();

		   }

		$data['data']=$result;



        $this->load->model('admin/socity_model');

        $this->load->model('admin/master_model');



		$data['societydata']= $this->master_model->getsocietyassingsubadmin($this->session->userdata('userid'));

		

	    $data['societybill']= $this->master_model->getchargeheadassignonsociety();

		

		

//		echo '<pre>'; print_r($data['societybill']); exit();



	   	$this->load->view('admin/addcharge',$data);

	   

			// $this->load->view('admin/addcharge');			  

			  

			  }

			  

			  

			  public function billaddprocess()

			    {

					

					$this->load->model('admin/socity_model');

					$this->load->model('admin/master_model');

					$result=$this->socity_model->billaddprocess($_POST);

					

					

					if($result>0)

					{

      					$msg="Success";

		      			

				    	redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);

					}else

					{

					    $msg="Error";

					     redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);

					

					}



					

					

					}

					

				public function allcharge()

				  {

					  

					  

                      $this->load->model('admin/socity_model');

					  

					  $data['data']=$this->socity_model->allchargebysubadmin();

					  

		//		echo '<pre>';		  print_r($data['data']);					  exit();

					  

						   	$this->load->view('admin/allcharge',$data);  

					  

					  }

					  

					  

		 public function billchangedStatus(){

		   

        $this->load->model('admin/socity_model');

		



        // Validate the user can login

        $result = $this->socity_model->billupdatesocityStatus();

		

				if($result==true)

		 {

  		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);



				  }



		

		 }

		 

		 public function billpchangedStatus(){

		   

        $this->load->model('admin/socity_model');

		



        // Validate the user can login

        $result = $this->socity_model->billpupdatesocityStatus();

		

				if($result==true)

		 {

  		 $msg="Success";

		 

          redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);

      	   }else

		      {

				  $msg="Error";

                   redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);



				  }



		

		 }

		 

		 public function excel()

		  {

			  $id=@$_GET['said'];

			  $data['graph'] = $this->socity_model->excel($id);

			  $this->load->view('admin/excel',$data);

			  

			  }
			  
			  
		 public function excelpro()

		  {

			  $id=@$_GET['said'];

			  $data['graph'] = $this->socity_model->excelpro($id);

			  $this->load->view('admin/excelpro',$data);

			  

			  }	  
			  

		  

		 public function uploadexcel()

		  {

//echo'<pre>';	 print_r($_FILES); exit();

         $msg="Success";

			  $data['graph'] = $this->socity_model->uploadexcel();

	    redirect(base_url().'admin/allsociety/allcharge?msg='.$msg);





			  }
			  
			  
	   public function uploadexcelpro()

		  {

//echo'<pre>';	 print_r($_FILES); exit();

         $msg="Success";

			  $data['graph'] = $this->socity_model->uploadexcelpro();

	    redirect(base_url().'admin/allpropertys?msg='.$msg);





			  }

	   

	   

	   



}