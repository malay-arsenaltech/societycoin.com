<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Allusers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_in();
        $this->load->library('pagination');
        $this->load->model('admin/user_model');
        $this->load->model('admin/master_model');
    }
    public function index()
    {
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
			
			
			
            if ($this->session->userdata('utype') == 1) {
                $config                   = array();
                $config["base_url"]       = base_url() . "admin/allusers/index/?$search_str";
                $config["total_rows"]     = $this->user_model->getCount();
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
                $data["links"]      = $this->pagination->create_links();
                $page               = (isset($_GET['per_page']) && $_GET['per_page']!='' ) ? $_GET['per_page'] : 0;
                $data['data']       = $this->user_model->alluserlist1( $page,$config["per_page"]);
                $data['allcountry'] = $this->master_model->allsociety();
            } elseif ($this->session->userdata('utype') == 2) {
                $config                   = array();
                $config["base_url"]       = base_url() . "admin/allusers/index/?$search_str";
                $config["total_rows"]     = $this->user_model->getCountcustomer();
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
                $data["links"]      = $this->pagination->create_links();
                $page               = (isset($_GET['per_page']) && $_GET['per_page']!='' ) ? $_GET['per_page'] : 0;
                $data['data']       = $this->user_model->all_subadmin_customers($config["per_page"], $page);
                $data['allcountry'] = $this->master_model->allsociety();
            } else {
                $config                   = array();
                $config["base_url"]       = base_url() . "admin/allusers/index/?";
                $config["total_rows"]     = $this->user_model->getCountsocietycustomer();
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
                $data["links"]      = $this->pagination->create_links();
                $page               = (isset($_GET['per_page']) && $_GET['per_page']!='' ) ? $_GET['per_page'] : 0;
                $data['data']       = $this->user_model->all_societyadmin_customers($config["per_page"], $page);
                $data['allcountry'] = $this->master_model->allsociety();
            }
            $this->load->view('admin/allusers', $data);
        
    }
    public function edituser($id='')
    {
       
        $result       = $this->user_model->userByid($id);
		
		if( count($result) > 0 ){
        $data['data'] = $result;
		$udatemail = (isset( $result['email'])) ?  $result['email'] : "";
		$this->session->set_userdata('update_email',$udatemail);
        $this->load->view('admin/edituser', $data);
		}
		
		else {				
         			
            $msg    = "Invalid admin id";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect(base_url() . 'admin/allusers');
		
		
		}
    }
    public function adduser()
    {
        $this->load->view('admin/adduser');
    }
    public function process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('username', 'Your First name', 'trim|required');
        $this->form_validation->set_rules('name', 'Your Last name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Your Mobile', 'trim|required');
		 $this->form_validation->set_rules('login_id', 'Login id', 'trim|required|is_unique[ci_users.username]'); 
		
        if ($this->form_validation->run() == FALSE) {
            $url       = base_url() . "admin/allusers";
            $error_msg = validation_errors();
            $this->session->set_flashdata('msg_error_red', $error_msg);
            redirect($url);
        } else {
            $result = $this->user_model->adduser();			
         			
            $msg    = "Sub Admin Added Successfully";          
			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        }
    }
    public function update()
    {
        $result = $this->user_model->updateuser();
		
			if($result ===  1062){
		 $msg = "This email is already used by another user.";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect(base_url() . 'admin/allusers');
		
		}
		
		
        $act    = 'Update Profile';
        $this->user_model->activity($act);
        if ($result == true) {
            $msg = "Sub Admin Updated Successfully";                
			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
			
        } else {
            $msg    = "Sub Admin Not updated successfully";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect(base_url() . 'admin/allusers');
        }
    }
    public function changedStatus($id='')
    {
        // Validate the user can login
         $result = $this->user_model->updateuserStatus($id);
	
        if ($result == true) {
           $msg    = "Sub Admin Status Updated Successfully";          
			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        } else {
            $msg    = "Sub Admin Status Updated Successfully";          
			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        }
    }
    public function pchangedStatus($id)
    {
        // Validate the user can login
        $result = $this->user_model->pupdateuserStatus($id);
        if ($result == true) {
           $msg    = "Sub Admin Status Updated Successfully";        
			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        } else {
           $msg    = "Sub Admin Status Updated Successfully";			
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        }
    }
    public function assignsociety()
    {
        $act = 'Assign Society';
        $this->user_model->activity($act);
        $data['subadminuser'] = $this->user_model->alluserlist2();
        $data['allsociety']   = $this->master_model->allsociety();
        $this->load->view('admin/assignproperty', $data);
    }
    public function assignview($id='')
    {
        
        if ($this->session->userdata('utype') == 1) {
            $data['subadminuser'] = $this->user_model->alluserlist2();
            $data['allsociety']   = $this->master_model->getsocietyassingsubadmin($id);
            // echo '<pre>'; print_r($data['allsociety']); exit();
            $this->load->view('admin/assignview', $data);
        } elseif ($this->session->userdata('utype') == 2) {
            $data['subadminuser'] = $this->user_model->alluserlist2();
            $data['allsociety']   = $this->master_model->getassingproperty($id);
            $this->load->view('admin/assignUserview', $data);
        }
    }
    public function removeassign( $id='',$uid ='')
    {
        $act = 'Remove Assign Society';
        $this->user_model->activity($act);
       
        $data['subadminuser'] = $this->user_model->removeassign($id);
        redirect(base_url() . 'admin/allusers/assignview/' . $uid);
    }
    public function removeassignproperty()
    {
        $act = 'Remove Assign Property';
        $this->user_model->activity($act);
        $id                   = @$_GET['aid'];
        $uid                  = @$_GET['uid'];
        $data['subadminuser'] = $this->user_model->removeassignproperty($id);
        redirect(base_url() . 'admin/allusers/assignview?uid=' . $uid);
    }
    public function assign()
    {
	$soc = $this->input->post('societyid');
	if($this->input->post('userid')!='' && !empty($soc)){
	
        $act = 'Assign Society';
        $this->user_model->activity($act);
        $data['data'] = $this->user_model->assign();
        $msg  = "Society has been Assigned to Sub Admin";				
			$this->session->set_flashdata('msg_error',  $msg);
			 redirect(base_url() . 'admin/allusers');
        }
    }
    public function transactionview( $id ='')
    {
        $data['data'] = $this->user_model->get_transaction($id);
        $this->load->view('admin/transactionview', $data);
    }
    public function transactionview_so()
    {
        $id           = @$_GET['tranid'];
        $data['data'] = $this->user_model->get_transaction($id);
        $this->load->view('admin/transactionview_so', $data);
    }
    function View($id = 1)
    {
        $data['data'] = $this->user_model->getUser($id);
        $this->load->view("admin/users_details", $data);
    }
	
	
	   public function delete($id=0)
	{
		if($this->session->userdata('utype') == 1){
	
		 $this->session->set_flashdata('msg_error', "Sub Admin Deleted Successfully!");
		$url = $this->config->item('base_url')."admin/allusers";
		$this->user_model->deleteRow($id);
		redirect($url);
		
		}
		else {
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin/allusers";
		
		redirect($url);
		
		}

	}
	
	
	function check_loginid(){
	
		
	
	if (isset($_GET['login_id'])) {
            $login_id = ($_GET['login_id']);
            
            if (!empty($login_id)) {
                $username_query  = mysql_query("SELECT username FROM ci_users WHERE username='$login_id'");
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
	
	
	
	
	
	
	
	
	
	
	   public function delete_trans($id=0)
	{
		if($this->session->userdata('utype') == 1){
	
		 $this->session->set_flashdata('msg_error', "Transaction  Details Deleted Successfully!");
		$url = $this->config->item('base_url')."admin";
		$this->user_model->delete_trans($id);
		redirect($url);
		
		}
		else {
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin";
		
		redirect($url);
		
		}

	}
	
	
	public function print_transaction($id=''){
	
		$data['data'] = $this->user_model->get_transaction($id);
     $this->load->view('admin/print_transaction', $data);
	
	
	
	}
	
	public function print_all_transaction($searchtext=''){
		$data['records'] = array();
	
		if($this->session->userdata('utype') == 1)
		$data['records'] = $this->user_model->print_all_transaction($searchtext);
		else if($this->session->userdata('utype') == 2)
		$data['records'] = $this->user_model->subadmin_customer_transaction_printall($searchtext); 
		else if($this->session->userdata('utype') == 4)
				$data['records'] = $this->user_model->subadmin_customer_transaction_printall($searchtext); 
		
		$this->load->view('admin/print_all_transaction', $data);
	
	
	
	}
	
	
	public function pdf($id=''){
	
	 //if you want to write it to disk and/or send it as an attachment    
		$data['data'] = $this->user_model->get_transaction($id);
     $content = $this->load->view('admin/pdf_transaction', $data,true);
	 $this->load->helper(array(
            'dompdf',
            'file'
        ));
        // page info here, db calls, etc.     
        
        //pdf_create($html, 'filename');
        //or
        $data = pdf_create( $content, 'name', false);
		$file_to_save = 'pdf/' . 'payment-'.$id . '.pdf';
        write_file($file_to_save, $data);
       
		$size = filesize($file_to_save);
		$name=  'payment-'.$id . '.pdf';

		header('Content-Description: File Transfer');
		header('Content-type: application/pdf');
		header("Content-Disposition: attachment; filename='$name'");
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . $size);
		readfile($file_to_save);
		
		/* 
		
		
		
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="file.pdf"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($file_to_save));
		header('Accept-Ranges: bytes');
		readfile($file_to_save);
			 */
	
	}
	
	
}