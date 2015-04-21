<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allcmspages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		check_in();
		$this->load->model('admin/cms_model');
	}

public function index()
{
	 

		
        $result = $this->cms_model->allcmspageslist();
		$data['data']=$result;
	      
	$this->load->view('admin/allcmspages',$data); 

	
}
      public function editcmspage($id='')
       {
	 
		
        $result = $this->cms_model->cmsByid($id);
		$data['data']=$result;

	      
		 $data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'description',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		
		$data['ckeditor_2'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'meta_description',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		  
		  
		   	$this->load->view('admin/editcms',$data);
	   }
	   
       public function addcmspage()
       {
		   
		$this->data['ckeditor'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'description',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
		
		$this->data['ckeditor_2'] = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	'meta_description',
			'path'	=>	'js/ckeditor',
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
			),
			//Replacing styles from the "Styles tool"
			'styles' => array(
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)
			)
		);
	   	$this->load->view('admin/addcms',$this->data);

	   }
	   
	  public function process()
       {
		   
	
        $result = $this->cms_model->addcms();
		if($result!=NULL){
		 $error_msg = "Page Added Successfully";
		   
		 $url = base_url()."admin/allcmspages";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url);
      	   }else
		      {
				  $msg="Error";
                   redirect(base_url().'admin/allcmspages?msg='.$msg);

				  }
	   }
	   
	   
	  public function update()
       {
		   
		
        $result = $this->cms_model->updatecms();
		if($result==true)
		 {
		 $error_msg = "Page  Updated Successfully";
		   
		 $url = base_url()."admin/allcmspages";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url);
      	   }else
		      {
				  $msg="Error";
                   redirect(base_url().'admin/allcmspages?msg='.$msg);

				  }
	   }
	   
	   
	   
	     public function changedStatus($id=1){
		   
       

        // Validate the user can login
        $result = $this->cms_model->updateuserStatus($id);
		
				if($result==true)
		 {
  		$error_msg = "Page Status Updated Successfully";
		   
		 $url = base_url()."admin/allcmspages";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url);
      	   }else
		      {
				  $msg="Error";
                   redirect(base_url().'admin/allcmspages?msg='.$msg);

				  }

		
		 }
		 
		   public function pchangedStatus($id){
		   
        
		

        // Validate the user can login
        $result = $this->cms_model->pupdateuserStatus($id);
		
				if($result==true)
		 {
  		   $error_msg = "Page Status Updated Successfully";
		   
		 $url = base_url()."admin/allcmspages";	
		$this->session->set_flashdata('msg_error', $error_msg);
        redirect($url);		 
          
      	   }else
		      {
				  $msg="Error";
                   redirect(base_url().'admin/allcmspages?msg='.$msg);

				  }

		
		 }
	   
	    public function delete($id=0)
	{
		if($this->session->userdata('utype') == 1){
	
		 $this->session->set_flashdata('msg_error', "Page Deleted Successfully!");
		$url = $this->config->item('base_url')."admin/allcmspages";
		$this->cms_model->deleteRow($id);
		redirect($url);
		
		}
				
		else {
		
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin/allcmspages";		
		redirect($url);
		
		
		
		}

	}
	   
	   

}