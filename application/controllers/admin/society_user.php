<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Society_user extends CI_Controller {



	public function __construct()

	{

		parent::__construct();


		  $this->load->library('pagination');
			$this->load->helper('url');
         check_in();
        $this->load->model('admin/society_user_model');
	}

	
	
	 public function index()
    {
		$config                   = array();
       $config["base_url"]       = base_url() . "admin/society_user_model/index/?";
        $config["total_rows"]     = $this->society_user_model->getCount();
        $config["per_page"]       =20;
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
		$recData["links"] = $this->pagination->create_links();
		$page          = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
		$recData['data']=$this->society_user_model->all_society_user($config["per_page"],$page);
		
        $this->load->view("admin/society_users/index", $recData);
        
    }
	
	
	
	
	
	public function add()
	{
		
		
		if($this->input->post())
		{
		  $this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');       
      
			if ($this->form_validation->run() == FALSE) {
			 $error = validation_errors();
			 $this->session->set_flashdata('msg_error', $error);
			 redirect(base_url()."admin/society_user");
			 }
			
					 
		$res = $this->society_user_model->adduser();
		if($res)
		$this->session->set_flashdata('msg_error', "Society User Added successfully!");
		else
		 $this->session->set_flashdata('msg_error', "User not inserted!");
		
		$url = $this->config->item('base_url')."admin/society_user";
			redirect($url);
		}
		else
		$this->load->view("admin/society_users/add");
		//$recData['city']=$this->UserManagement->getCountry();
		
	}
	
	public function delete($id=0)
	{
		 $this->session->set_flashdata('msg_error', "User deleted successfully!");
		$url = $this->config->item('base_url')."admin/society_user";
		$this->society_user_model->deleteRow($id);
		redirect($url);

	}
	public function edit($id=0)
	{
	
		
	if($this->input->post())
		{
				 	
			$this->society_user_model->update();
			$url = $this->config->item('base_url')."admin/society_user";
			$this->session->set_flashdata('msg_error', "Society Admin Updated successfully!");
			redirect($url);
		}	
		else
		{
			$data['data']=$this->society_user_model->userByid($id);
		
			$this->load->view("admin/society_users/edit",$data);
		}

	}

	
	     public function changedStatus($id=0){

		   


        // Validate the user can login

        $result = $this->society_user_model->updateuserStatus($id,0);

		

		if($result==true)

		 {

  		 

		 
			$url = $this->config->item('base_url')."admin/society_user";
			$this->session->set_flashdata('msg_error', "Society Admin Updated successfully!");
			redirect($url);
         

      	   }else

		      {

				 $url = $this->config->item('base_url')."admin/society_user";
			$this->session->set_flashdata('msg_error', "Society Admin  not Updated !");
			redirect($url);



				  }



		

		 }

		 

		   public function pchangedStatus($id=0){

		 
        // Validate the user can login

        $result = $this->society_user_model->updateuserStatus($id,1);

		

		if($result==true)

		 {

  		 
			$url = $this->config->item('base_url')."admin/society_user";
			$this->session->set_flashdata('msg_error', "Society Admin Updated successfully!");
			redirect($url);

      	   }else

		      {

			 $url = $this->config->item('base_url')."admin/society_user";
			$this->session->set_flashdata('msg_error', "Society Admin  not Updated !");
			redirect($url);



				  }



		

		 }

		 
		
	
	 public function check_user()
    {
        if (isset($_GET['email'])) {
            $email = ($_GET['email']);
            
            if (!empty($email)) {
                $username_query  = mysql_query("SELECT email FROM ci_users WHERE email='$email'");
                $username_result = mysql_num_rows($username_query);
                
                if ($username_result == 0) {
                    //echo 'AVAILABLE!';
                    $check = "true";
                    
                } else
                    $check = "false";
                
                
                print $check;
                
            }
        }
        
        
    }


	   

	   



}