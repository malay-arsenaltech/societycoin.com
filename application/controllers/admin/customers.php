<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends CI_Controller {



	public function __construct()

	{

		parent::__construct();


		  $this->load->library('pagination');
			$this->load->helper('url');
         check_in();
        $this->load->model('admin/customers_model');
		 $this->load->model('admin/master_model');
	}

	
	
	 public function index()
    {
		$config                   = array();
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
		
		$config["base_url"]       = base_url() . "admin/customers/index/?$search_str";
        $config["total_rows"]     = $this->customers_model->getCount();
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
		$recData['data']=$this->customers_model->all_customers($config["per_page"],$page);
		
        $this->load->view("admin/customers/index", $recData);
        
    }
	
	
	public function transaction_details($id=''){
	
	if($id!=''){
	
		$data['records'] = $this->customers_model->transaction_details($id);
		$data['cusid'] =$id;
		$this->load->view("admin/customers/transaction_details",$data);   
	
	
	
	
	}
	
	
	else {
	
			$error = 'Customer id not found';
			 $this->session->set_flashdata('msg_error', $error);
			 redirect(base_url()."admin/customers");
	
	
	
	}
	
	
	
	
	
	
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
			 $this->session->set_flashdata('msg_error_red', $error);
			 redirect(base_url()."admin/customers");
			 }
			
					 
		$res = $this->customers_model->adduser();
		if($res)
		$this->session->set_flashdata('msg_error', "Customer Added successfully!");
		else
		 $this->session->set_flashdata('msg_error_red', "Customer not inserted!");
		
		$url = $this->config->item('base_url')."admin/customers";
			redirect($url);
		}
		else
		$this->load->view("admin/customers/add");
		//$recData['city']=$this->UserManagement->getCountry();
		
	}
	
	public function delete($id=0)
	{
	
		if($this->session->userdata('utype') == 1){
		 $this->session->set_flashdata('msg_error', "Customer deleted successfully!");
		$url = $this->config->item('base_url')."admin/customers";
		$this->customers_model->deleteRow($id);
		redirect($url);
			
		}
		else {
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin/customers";
		
		redirect($url);
		
		}

	}
	public function edit($id=0)
	{
	
		
	if($this->input->post())
		{
				 	
			$this->customers_model->update();
			$url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error', "Customer Updated successfully!");
			redirect($url);
		}	
		else
		{
			$data['data']=$this->customers_model->userByid($id);
		
			$this->load->view("admin/customers/edit",$data);
		}

	}

	
	     public function changedStatus($id=0){

		   


        // Validate the user can login

        $result = $this->customers_model->updateuserStatus($id,0);

		

		if($result==true)

		 {

  		 

		 
			$url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error', "Customer Updated successfully!");
			redirect($url);
         

      	   }else

		      {

				 $url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error_red', "Customer  not Updated !");
			redirect($url);



				  }



		

		 }

		 

		   public function pchangedStatus($id=0){

		 
        // Validate the user can login

        $result = $this->customers_model->updateuserStatus($id,1);

		

		if($result==true)

		 {

  		 
			$url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error', "Customer Updated successfully!");
			redirect($url);

      	   }else

		      {

			 $url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error_red', "Customer  not Updated !");
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


	   function property($cust_id=''){
	   
	   if($cust_id!=''){

      $data['property']= $this->customers_model->get_user_property($cust_id);

		
			$this->load->view("admin/customers/property",$data);
		}
		
		
		else {
		
		
			 $url = $this->config->item('base_url')."admin/customers";
			$this->session->set_flashdata('msg_error_red', "Customer  not Updated !");
			redirect($url);
		
		}
	   
	   
	   
	   
	   }

	   



}