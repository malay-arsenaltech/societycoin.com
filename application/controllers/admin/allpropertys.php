<?php
class Allpropertys extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/master_model');
        $this->load->model('admin/property_model');
        $this->load->library('pagination');
        check_in();
    }
    public function index()
    {
        if ($this->session->userdata('admin_id') == NULL) {
            $this->load->view('admin/login');
        } else {
            if ($this->session->userdata('utype') == 2) {
                $config                   = array();
                $config["base_url"]       = base_url() . "admin/allpropertys/index/?";
                $config["total_rows"]     = $this->property_model->getCountsub();
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
                $page          = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
                $result        = $this->property_model->allsubamdinpropertylist($config["per_page"], $page);
            } else {
                $config                   = array();
                $config["base_url"]       = base_url() . "admin/allpropertys/index/?";
                $config["total_rows"]     = $this->property_model->getCount();
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
                $page          = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
                $result        = $this->property_model->allpropertylist($config["per_page"], $page);
            }
            $data['allcity']    = $this->master_model->allcity();
            $data['allarea']    = $this->master_model->allarea();
            $data['allsociety'] = $this->master_model->allsociety();
            $data['data']       = $result;
            $this->load->view('admin/allpropertys', $data);
        }
    }
    public function editproperty($id = 0)
    {
        //$id=@$_GET['pid']; 
        $this->load->model('admin/user_model');
        $data['states'] = $this->master_model->allstate();
		  $result             = $this->property_model->allpropertys($id);
		  if(count( $result) > 0){
        if ($this->session->userdata('utype') == 1) {
            
            //$data['allcountry']= $this->master_model->allcountry($result['countryid']);
            $data['allstate']   = $this->master_model->allstate($result['countryid']);
            $data['allcity']    = $this->master_model->allcity($result['stateid']);
            $data['allarea']    = $this->master_model->allarea($result['cityid']);
            $data['allsociety'] = $this->master_model->allsociety($result['areaid']);
        } else {
          
            // $data['allcountry']= $this->master_model->allcountry($result['countryid']);
            $data['allstate']   = $this->master_model->allstate($result['countryid']);
            $data['allcity']    = $this->master_model->allcity($result['stateid']);
            $data['allarea']    = $this->master_model->allarea($result['cityid']);
            $data['allsociety'] = $this->master_model->allsociety($result['areaid']);
        }
        $data['data'] = $result;
        $this->load->model('admin/socity_model');
        $data['sodata'] = $this->socity_model->getallsociety();
        $this->load->view('admin/editproperty', $data);
		}
		else {				
         			
            $msg    = "Property does not exists in our records";          
			
			$this->session->set_flashdata('msg_error_red',  $msg);
			 redirect(base_url() . 'admin/allpropertys');
			
		}
		
		
    }
    public function addproperty()
    {
        $this->load->model('admin/user_model');
        $data['states'] = $this->master_model->allstate();
        if ($this->session->userdata('utype') == 1) {
            $result = $this->user_model->soregister();
        } else {
            $result = $this->user_model->alluserlist3();
        }
        $data['data'] = $result;
        $this->load->model('admin/socity_model');
        $data['sodata'] = $this->socity_model->getallsociety();
        if ($this->session->userdata('utype') == 2) {
            $data['sub_admin_society'] = $this->property_model->subadminSociety();
            $this->load->view('admin/addproperty_sub', $data);
        } else {
            $this->load->view('admin/addproperty', $data);
        }
    }
    function edit_subadmin_property($pid = 0)
    {
        $this->load->model('admin/property_model');
        $data['sub_admin_society'] = $this->property_model->subadminSociety();
        if ($this->input->post()) {
            $this->property_model->subadmin_property_update();
            $msg = "Your Property Updated Successfully";			
             $this->session->set_flashdata('msg_error', $msg);			
            redirect(base_url() . 'admin/allpropertys');
        } else {
            if ($pid > 0) {
                $data["property"] = $this->property_model->propertyByid($pid);
                $this->load->view("admin/edit_subadmin_property", $data);
            }
        }
    }
    public function adduser()
    {
        $this->load->view('admin/adduser');
    }
    public function process()
    {
        $this->load->model('admin/property_model');
		$sid = $this->input->post('societyid');
		$address = trim($this->input->post('address'));
		 $res = $this->property_model->is_unique_property($sid,$address);
		 if( $res){
        $result = $this->property_model->addproperty();
        if ($result != NULL) {
            if ($this->session->userdata('utype') == 2) {
                $msg = "Property Added Successfully";
                $this->session->set_flashdata('msg_error', $msg);
                $data['sub_admin_society'] = $this->property_model->subadminSociety();
                //$this->load->view('admin/addproperty_sub',$data);
            } else {
                $msg = "Property Added Successfully";
                $this->session->set_flashdata('msg_error', $msg);
                //$this->load->view('admin/addproperty', $data);
            }
        } else {
            $msg = "Error: uanble to add your property";
            $this->session->set_flashdata('msg_error_red', $msg);
            //	$this->load->view('admin/addproperty', $data);
        }
        $url = $this->config->item('base_url') . "admin/allpropertys/addproperty";
        redirect($url);
		}
		
		else {
		
				$msg = "Property Allready Exists,try another property name";
                $this->session->set_flashdata('msg_error_red', $msg);
				 $url = $this->config->item('base_url') . "admin/allpropertys/addproperty";
				redirect($url);
		}
    }
    public function update()
    {
        $this->load->model('admin/property_model');
        $result = $this->property_model->updateproperty();
        if ($result == true) {
            $msg = "your property updated successfully";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        } else {
            $msg = "your property not updated ";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        }
    }
    public function changedStatus($id = 1)
    {
        $this->load->model('admin/property_model');
        // Validate the user can login
        $result = $this->property_model->updateuserStatus($id);
        if ($result == true) {
            $msg = "Property Status Updated Successfully";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        } else {
            $msg = "Property Status not Updated";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        }
    }
    public function pchangedStatus($id = 1)
    {
        $this->load->model('admin/property_model');
        // Validate the user can login
        $result = $this->property_model->pupdateuserStatus($id);
        if ($result == true) {
            $msg = "Property Status Updated Successfully";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        } else {
            $msg = "Property Status not Updated ";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'admin/allpropertys');
        }
    }
    public function assign()
    {
    }
}