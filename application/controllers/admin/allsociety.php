<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Allsociety extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		check_in();
        $this->load->library('pagination');
        $this->load->model('admin/master_model');
        $this->load->model('admin/socity_model');
    }
    public function index()
    {
        if ($this->session->userdata('admin_id') == NULL) {
            $this->load->view('admin/login');
        } else {
            $config                   = array();
            $config["base_url"]       = base_url() . "admin/allsociety/index/?";
            $config["total_rows"]     = $this->socity_model->getCount();
            $config["per_page"]       = 25;
            $config["uri_segment"]    = 3;
            $config['full_tag_open']  = '<td>';
            $config['first_link']     = 'First';
            $config['last_link']      = 'Last';
            $config['next_link']      = '&gt;';
            $config['prev_link']      = '&lt;';
            $config['cur_tag_open']   = '<b>';
            $config['cur_tag_close']  = '</b>';
            $config['full_tag_close'] = '</td>';
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            $page          = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
            if ($this->session->userdata('utype') == 2) {
                //$result = $this->socity_model->subadminSociety();
				
				$config1                   = array();
            $config1["base_url"]       = base_url() . "admin/allsociety/index/?";
            $config1["total_rows"]     = $this->socity_model->subadminSocietyCount();
            $config1["per_page"]       = 25;
            $config1["uri_segment"]    = 3;
            $config1['full_tag_open']  = '<td>';
            $config1['first_link']     = 'First';
            $config1['last_link']      = 'Last';
            $config1['next_link']      = '&gt;';
            $config1['prev_link']      = '&lt;';
            $config1['cur_tag_open']   = '<b>';
            $config1['cur_tag_close']  = '</b>';
            $config1['full_tag_close'] = '</td>';
            $this->pagination->initialize($config1);
            $data["links"] = $this->pagination->create_links();
            $page          = (isset($_GET['per_page']) && $_GET['per_page']!='') ? $_GET['per_page'] : 0;
				
                $result = $this->socity_model->subadminSociety($config1["per_page"], $page);
            } else {
                // $result = $this->socity_model->allsocietylist();
                $result = $this->socity_model->allsocietylist($config["per_page"], $page);
            }
            $data['allcity']    = $this->master_model->allcity();
            $data['allarea']    = $this->master_model->allarea();
            $data['allsociety'] = $this->master_model->allsociety();
            $data['data']       = $result;
            $this->load->view('admin/allsociety', $data);
        }
    }
    public function editsociety($id='' )
    {
       
        $result             = $this->socity_model->societyByid($id);
       if(count( $result) > 0){
        $data['data']       = $result;
        $data['allcountry'] = $this->master_model->allcountry($result['countryid']);
        $data['allstate']   = $this->master_model->allstate($result['countryid']);
        $data['allcity']    = $this->master_model->allcity($result['stateid']);
        $data['allarea']    = $this->master_model->allarea($result['cityid']);
        $data['condata']    = $this->socity_model->condata($id);
        //echo '<pre>'; 	   print_r($data['condata']); exit();
       // $data['bills']      = $this->master_model->getchargeheadlist();
	   $data['states']= $this->master_model->allstate();
        $this->load->view('admin/editsociety', $data);
		}
		
		
		else {
		 $msg    = "Society does not exists in our records";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect(base_url() . 'admin/allsociety');
		
		}
    }
    public function addsociety()
    {
        $this->load->model('admin/user_model');
        $data['sodata'] = $this->user_model->soadmin();
        $this->load->model('admin/master_model');
       // $data['allcountry'] = $this->master_model->allcountry();
        //$data['bills']      = $this->master_model->getchargeheadlist();
		$data['states']= $this->master_model->allstate();
        $this->load->view('admin/addsociety', $data);
    }
    public function process()
    {
        
        $result = $this->socity_model->addsocity();
        if ($result != NULL) {
            $msg = "Success";
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        }
    }
    public function new_process()
    {
        
		$areaid = $this->input->post('areaid');
		$society_title = trim($this->input->post('society_title'));
      $res = $this->socity_model->is_unique_society($society_title,$areaid );
		if( $res){
		
		$this->load->library('form_validation');
		 $this->form_validation->set_rules('so_name', 'Name', 'trim|required');   
		$this->form_validation->set_rules('so_email', 'Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('society_title', 'society title', 'trim|required');       
      $this->form_validation->set_rules('so_mobile', 'Mobile', 'trim|required');  
		$this->form_validation->set_rules('address', 'Address', 'trim|required');  
	  
			if ($this->form_validation->run() == FALSE) {
			 $error = validation_errors();
			 $this->session->set_flashdata('msg_error_red', $error);
			 redirect(base_url()."admin/allsociety");
			 }

	  $result = $this->socity_model->NewSocietyADD();
        if ($result != NULL) {
           $error_msg = "Society Added Successfully";
		   
		   $url = base_url()."admin/allsociety";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url); 
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        }
		}
		
		else {
		
		$error_msg = "Society name already exists, try another society name!";
		   
		 $url = base_url()."admin/allsociety/addsociety";	
		$this->session->set_flashdata('msg_error_red', $error_msg);
        redirect($url); 
		
		}
    
	
	}
    public function update()
    {
        
        $result = $this->socity_model->updatesocity();
        if ($result == true) {
           // $msg = "Success";
			
			$error_msg = "Society updated Successfully";
		   
		   $url = base_url()."admin/allsociety";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url); 
		
            //redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        } else {
		
		
		$error_msg = "Society unot updated, try again";		   
		$url = base_url()."admin/allsociety";	
		$this->session->set_flashdata('msg_error_red', $error_msg);
        redirect($url); 		
            
        }
    }
    public function changedStatus($id='')
    {
      
        // Validate the user can login
        $result = $this->socity_model->updatesocityStatus($id);
        if ($result == true) {
           $error_msg = "Society Deactivated Successfully";
		   
		   $url = base_url()."admin/allsociety";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url); 		   
		   
            
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        }
    }
    public function pchangedStatus($id='')
    {
       
        // Validate the user can login
        $result = $this->socity_model->pupdatesocityStatus($id);
        if ($result == true) {
           			
			  $error_msg = "Society Actvated Successfully";
		   
		   $url = base_url()."admin/allsociety";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url); 
           // redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety?msg=' . $msg);
        }
    }
    public function addcity()
    {
        $this->load->view('addcity');
    }
    public function addcharge()
    {
        $this->load->model('admin/user_model');
        $data['allcountry'] = $this->master_model->allcountry();
        if ($this->session->userdata('utype') == 1) {
            $result = $this->user_model->soregister();
        } else {
            $result = $this->user_model->alluserlist3();
        }
        $data['data'] = $result;
        $this->load->model('admin/socity_model');
        $this->load->model('admin/master_model');
        $data['societydata'] = $this->master_model->getsocietyassingsubadmin($this->session->userdata('admin_id'));
        $data['societybill'] = $this->master_model->getchargeheadassignonsociety();
        //		echo '<pre>'; print_r($data['societybill']); exit();
        $this->load->view('admin/addcharge', $data);
        // $this->load->view('admin/addcharge');			  
    }
    public function billaddprocess()
    {
      
        $this->load->model('admin/master_model');
        $result = $this->socity_model->billaddprocess($_POST);
        if ($result > 0) {
            $msg = "Success";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        }
    }
    public function allcharge()
    {
        
        $data['data'] = $this->socity_model->allchargebysubadmin();
        //		echo '<pre>';		  print_r($data['data']);					  exit();
        $this->load->view('admin/allcharge', $data);
    }
    public function billchangedStatus()
    {
       
        // Validate the user can login
        $result = $this->socity_model->billupdatesocityStatus();
        if ($result == true) {
            $msg = "Success";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        }
    }
    public function billpchangedStatus()
    {
        
        // Validate the user can login
        $result = $this->socity_model->billpupdatesocityStatus();
        if ($result == true) {
            $msg = "Success";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        } else {
            $msg = "Error";
            redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
        }
    }
    public function excel()
    {
        $id            = @$_GET['said'];
        $data['graph'] = $this->socity_model->excel($id);
        $this->load->view('admin/excel', $data);
    }
    public function excelpro()
    {
        $id            = @$_GET['said'];
        $data['graph'] = $this->socity_model->excelpro($id);
        $this->load->view('admin/excelpro', $data);
    }
    public function uploadexcel()
    {
        //echo'<pre>';	 print_r($_FILES); exit();
        $msg           = "Success";
        $data['graph'] = $this->socity_model->uploadexcel();
        redirect(base_url() . 'admin/allsociety/allcharge?msg=' . $msg);
    }
    public function uploadexcelpro()
    {
        //echo'<pre>';	 print_r($_FILES); exit();
        $msg           = "Success";
        $data['graph'] = $this->socity_model->uploadexcelpro();
        redirect(base_url() . 'admin/allpropertys?msg=' . $msg);
    }
	
	
	   public function delete($id=0)
	{
		if($this->session->userdata('utype') == 1){
	
		 $this->session->set_flashdata('msg_error', "Society Deleted Successfully!");
		$url = $this->config->item('base_url')."admin/allsociety";
		$this->socity_model->deleteRow($id);
		redirect($url);
		
		}
				
		else {
		
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin/allsociety";		
		redirect($url);
		
		
		
		}

	}
	   
	  public function get_unique_society($subadmin_id='')
    {
	$options = '';
        if($subadmin_id!=''){
        
		$allsociety = $this->socity_model->get_unique_society($subadmin_id);
		if(count($allsociety) > 0 ){
		foreach($allsociety AS $recods){
		
		$options .= "<option value='".$recods->id."'>".$recods->society_title."</option>";
		
		}
		
		
		}
		else {
		
		$options = '<option value="">New society not available</option>';
		
		
		
		}
		
		}
		
		
		else {		
		$options = '<option value="">New society not available</option>';
				
		}
		
		echo $options ;
		exit;
    }
	
	
}