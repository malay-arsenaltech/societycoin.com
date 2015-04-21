<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/master_model');
        $this->load->library('pagination');
        check_in();
    }
    public function index()
    {
       
            $data['states'] = $this->master_model->allstate();
            //$data['allcountry']= $this->master_model->allstates();
            $this->load->view('admin/addcity', $data);
        
    }
    function citylist()
    {
        
		
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
		
            $config                   = array();
            $config["base_url"]       = base_url() . "admin/master/citylist/?$search_str";
            $config["total_rows"]     = $this->master_model->getCityCount('ci_city');
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
            $result        = $this->master_model->allcitylist($config["per_page"], $page);
            $data['data']  = $result;
            $this->load->view('admin/city_list', $data);
        
    }
    function arealist()
    {
        
		if($this->input->get_post('search_text')) {
		$search_str = "&search_text=". $this->input->get_post('search_text');
		}
		else
		$search_str ='';
            $config                   = array();
            $config["base_url"]       = base_url() . "admin/master/citylist/?$search_str";
            $config["total_rows"]     = $this->master_model->getCityCount('ci_area');
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
            $result        = $this->master_model->allarealist($config["per_page"], $page);
            $data['data']  = $result;
            $this->load->view('admin/area_list', $data);
        
    }
    public function getstate()
    {
        $data['state'] = $this->master_model->getstate($_POST);
    }
    public function getcity()
    {
        $data['city'] = $this->master_model->getcity($_POST);
    }
    public function getarea()
    {
        $data['area'] = $this->master_model->getarea($_POST);
    }
    public function getsociety()
    {
        $data['society'] = $this->master_model->getsociety($_POST);
    }
    public function getaddress()
    {
        $data['address'] = $this->master_model->getaddress($_POST);
    }
    public function getaddress1()
    {
        $data['address'] = $this->master_model->getaddress1($_POST);
    }
    public function propertystatus()
    {
        $data['proadd'] = $this->master_model->propertystatus($_POST);
    }
    public function getaddressbyid()
    {
        $data['address'] = $this->master_model->getaddressbyid($_POST);
    }
    public function getchargehead()
    {
        $data['getchargehead'] = $this->master_model->getchargehead($_POST);
    }
    public function getbill()
    {
        $data['getchargehead'] = $this->master_model->getbill($_POST);
    }
    public function getaddressforguest()
    {
        $data['getchargehead'] = $this->master_model->getaddressforguest($_POST);
    }
    public function getbillamountguest()
    {
        $data['getchargehead'] = $this->master_model->getbillamountguest($_POST);
    }
    public function addcity()
    {
	
		$stateid = $this->input->post('stateid');
		$cityname = trim($this->input->post('cityname'));
      $res = $this->master_model->is_unique_city($stateid,$cityname );
		if( $res){	
	
	
        $data['city'] = $this->master_model->addcity();		
		
		$url = base_url()."admin/master/";	
		$this->session->set_flashdata('msg_error', 'City addedd successfully');
        redirect($url); 
		}

		else {

		$error_msg = "City name already exists in same state, try another!";
		   
		$url = base_url()."admin/master/";	
		$this->session->set_flashdata('msg_error_red', $error_msg);
        redirect($url);
		}		
		
    }
	
	
	  public function editcity($city_id='')
    {
	if($this->input->post()){
		$stateid = $this->input->post('stateid');
		$cityname = trim($this->input->post('cityname'));
      	$data['stateid'] = $stateid;
		$data['cityname'] = $cityname;
		$city_id = $this->input->post('city_id');	
        $this->master_model->update_city($data,$city_id);		
		
		$url = base_url()."admin/master/citylist";	
		$this->session->set_flashdata('msg_error', 'City updated successfully');
        redirect($url); 
		
	}		
			$data['states']  = $this->master_model->allstate();
			$data['edit_city']  = $this->master_model->get_city_by_id($city_id);
            $this->load->view('admin/edit_city', $data); 
		
    }
	
	
	
	 public function edit_area($areaid='')
    {
	if($this->input->post()){
		$stateid = $this->input->post('stateid');
		$cityid = trim($this->input->post('cityid'));
		$areaname = trim($this->input->post('areaname'));
		
      	$data['stateid'] = $stateid;
		$data['cityid'] = $cityid;
		$data['areaname'] = $areaname;
		$areaid = $this->input->post('areaid');	
        $this->master_model->update_area($data,$areaid);		
		
		$url = base_url()."admin/master/arealist";	
		$this->session->set_flashdata('msg_error', 'Area/Sector updated successfully');
        redirect($url); 
		
	}		$data['allcity']  = $this->master_model->allcity();
			$data['states']  = $this->master_model->allstate();
			$data['edit_area']  = $this->master_model->get_area_by_id($areaid);
            $this->load->view('admin/edit_area', $data); 
		
    }
	
	
	
	
	
    public function delete_area($id = 0)
    {
        $this->db->where('id', $id);
        $this->db->delete('ci_area');
        	
		$url = base_url()."admin/master/arealist";	
		$this->session->set_flashdata('msg_error', 'Area / sector deleted successfully');
        redirect($url); 
    }
    public function delete_city($id = 0)
    {
        $this->db->where('id', $id);
        $this->db->delete('ci_city');
		
		$url = base_url()."admin/master/citylist";	
		$this->session->set_flashdata('msg_error', 'City deleted successfully');
        redirect($url); 		
       
    }
    public function submitarea()
    {
		$cityid = $this->input->post('cityid');
		$areaname = trim($this->input->post('areaname'));
      $res = $this->master_model->is_unique_area($cityid,$areaname );
		if( $res){	
	
        $data['city'] = $this->master_model->submitarea();
       
		$url = base_url()."admin/master/addarea";	
		$this->session->set_flashdata('msg_error', 'Area added successfully');
        redirect($url); 
		}
		
		
		
		else {
		
		$error_msg = "Area name already exists in same city, try another!";
		   
		$url = base_url()."admin/master/addarea";	
		$this->session->set_flashdata('msg_error_red', $error_msg);
        redirect($url); 
		
		}
    }
    public function addarea()
    {
        $data['allcountry'] = $this->master_model->allcountry();
        $data['states']     = $this->master_model->allstate();
        $this->load->view('admin/addarea', $data);
    }
    public function addbill()
    {
        $this->load->view('admin/addbill');
    }
    public function newbill()
    {
        $result = $this->master_model->newbill();
        if ($result > 0) {
            redirect(base_url() . 'admin/allsociety?msg=Added Charge Head !!');
        } else {
            redirect(base_url() . 'admin/allsociety?msg=2');
        }
    }
    public function allbill()
    {
        $data['data'] = $this->master_model->allbill();
        //			  print_r($this->master_model->allbill()); exit();
        $this->load->view('admin/allbill', $data);
    }
    public function editbill()
    {
        $id           = $_GET['bid'];
        $data['data'] = $this->master_model->allbill($id);
        $this->load->view('admin/editbill', $data);
    }
    public function updatebill()
    {
        $result = $this->master_model->updatebill();
        if ($result > 0) {
            redirect(base_url() . 'admin/master/allbill?msg=1');
        } else {
            redirect(base_url() . 'admin/master/allbill?msg=2');
        }
    }
    public function publishedbill()
    {
        $result = $this->master_model->publishedbill();
        if ($result > 0) {
            redirect(base_url() . 'admin/master/allbill?msg=1');
        } else {
            redirect(base_url() . 'admin/master/allbill?msg=2');
        }
    }
    public function unpublishedbill()
    {
        $result = $this->master_model->unpublishedbill();
        if ($result > 0) {
            redirect(base_url() . 'admin/master/allbill?msg=1');
        } else {
            redirect(base_url() . 'admin/master/allbill?msg=2');
        }
    }
    public function autocompleteaddress()
    {
        $result = $this->master_model->autocompleteaddress($_POST);
    }
}