<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Society_Property extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        check_in();
        $this->load->model('admin/society_property_model');
    }
    public function index()
    {
	
	if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
	
        $config                   = array();
        $config["base_url"]       = base_url() . "admin/society_property/index/?$search_str";
        $config["total_rows"]     = $this->society_property_model->getCount();
        $config["per_page"]       = 20;
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
        $recData["links"] = $this->pagination->create_links();
        $page             = (isset($_GET['per_page'])) ? $_GET['per_page'] : 0;
        $recData['data']  = $this->society_property_model->allpropertylist($config["per_page"], $page);
        $this->load->view("admin/society_property/index", $recData);
    }
    public function add()
    {
	
			$data['sodata']= $this->society_property_model->getsociety();
        if ($this->input->post()) {
		$sid = $this->input->post('societyid');
		$address = trim($this->input->post('address'));
		 $res = $this->society_property_model->is_unique_property($sid,$address);
		 if( $res){
		
            $this->load->library('form_validation');
            $this->form_validation->set_rules('societyid', 'Society Name', 'trim|required');
			 $this->form_validation->set_rules('address', 'Propert Address', 'trim|required');
           
            if ($this->form_validation->run() == FALSE) {
                $error = validation_errors();
                $this->session->set_flashdata('msg_error', $error);
                redirect(base_url() . "admin/society_property/add");
            }
            $res = $this->society_property_model->addproperty();
            if ($res)
                $this->session->set_flashdata('msg_error', "Property Added successfully!");
            else
                $this->session->set_flashdata('msg_error', "Property Not Added!");
            $url = $this->config->item('base_url') . "admin/society_property/add";
            redirect($url);
			}
			else {
			
			$msg = "Property Allready Exists,try another property name";
                $this->session->set_flashdata('msg_error', $msg);
				 $url = $this->config->item('base_url') . "admin/society_property/add";
				redirect($url);
			
			
			}
			
        } else
            $this->load->view("admin/society_property/add",$data);
    }
    public function delete($id = 0)
    {
        $this->session->set_flashdata('msg_error', "User deleted successfully!");
        $url = $this->config->item('base_url') . "admin/society_user";
        $this->society_property_model->deleteRow($id);
        redirect($url);
    }
    public function edit($id = 0)
    {
		$data['sodata']= $this->society_property_model->getsociety();
        if ($this->input->post()) {
            $this->society_property_model->updateproperty();
            $url = $this->config->item('base_url') . "admin/society_property";
            $this->session->set_flashdata('msg_error', "Property Updated Successfully!");
            redirect($url);
        } else {
            $data['property'] = $this->society_property_model->propertyByid($id);
            $this->load->view("admin/society_property/edit", $data);
        }
    }
    public function changedStatus($id = 0)
    {
        // Validate the user can login
        $result = $this->society_property_model->updateuserStatus($id);
        if ($result == true) {
            $url = $this->config->item('base_url') . "admin/society_property";
            $this->session->set_flashdata('msg_error', "Property Status Updated Successfully!");
            redirect($url);
        } else {
            $url = $this->config->item('base_url') . "admin/society_property";
            $this->session->set_flashdata('msg_error', "Property Status  not Updated !");
            redirect($url);
        }
    }
    public function pchangedStatus($id = 0)
    {
        // Validate the user can login
        $result = $this->society_property_model->pupdateuserStatus($id);
        if ($result == true) {
            $url = $this->config->item('base_url') . "admin/society_property";
            $this->session->set_flashdata('msg_error', "Property Status Updated Successfully!");
            redirect($url);
        } else {
            $url = $this->config->item('base_url') . "admin/society_property";
            $this->session->set_flashdata('msg_error', "Property Status  not Updated  !");
            redirect($url);
        }
    }
   
}