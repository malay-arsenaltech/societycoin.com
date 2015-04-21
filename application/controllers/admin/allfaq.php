<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allfaq extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			check_in();
			 $this->load->model('admin/faq_model');
	}

	public function index()
{
	 

	if($this->session->userdata('admin_id')==NULL)
	 {
	$this->load->view('admin/login');
	 }else
	   {
		
        $result = $this->faq_model->allfaqlist();
		$data['data']=$result;
	//	print_r($result);
	      
		   	$this->load->view('admin/allfaq',$data);
		   }
	
}
      public function editfaq($id='')
       {
	  
		
        $result = $this->faq_model->faqByid($id);
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
		  
		  
		   	$this->load->view('admin/editfaq',$data);
	   }
	   
       public function addfaq()
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
	   	$this->load->view('admin/addfaq',$this->data);

	   }
	   
	  public function process()
       {
		   
		
        $result = $this->faq_model->addfaq();
		if($result!=NULL)
		 {
		 $this->session->set_flashdata('msg_error', "FAQ  Added successfully");
		 
          redirect(base_url().'admin/allfaq');
      	   }else
		      {
				   $this->session->set_flashdata('msg_error', "FAQ not Added, try Again!");
                   redirect(base_url().'admin/allfaq');

				  }
	   }
	   
	   
	  public function update($id='')
       {
		   $id =$this->input->post('id');
		
        $result = $this->faq_model->updatefaq($id);
		if($result==true)
		 {
		 $this->session->set_flashdata('msg_error', "FAQ Updated successfully!");
		 
          redirect(base_url().'admin/allfaq');
      	   }else
		      {
				  $this->session->set_flashdata('msg_error', "FAQ Updation faild, Tray Agin!");
                   redirect(base_url().'admin/allfaq');

				  }
	   }
	   
	   
	   
	     public function changedStatus($id=''){
		   
       
		

        // Validate the user can login
        $result = $this->faq_model->updateuserStatus($id);
		
				if($result==true)
		 {
  		 $this->session->set_flashdata('msg_error', "FAQ Status Changed successfully!");
		 
          redirect(base_url().'admin/allfaq');
      	   }else
		      {
				  $this->session->set_flashdata('msg_error', "FAQ Status Changed successfully!");
                   redirect(base_url().'admin/allfaq');

				  }

		
		 }
		 
		   public function pchangedStatus($id=''){
		   
       
		

        // Validate the user can login
        $result = $this->faq_model->pupdateuserStatus($id);
		
				if($result==true)
		 {
  		 $this->session->set_flashdata('msg_error', "FAQ Status Changed successfully!");
		 
          redirect(base_url().'admin/allfaq');
      	   }else
		      {
				  $this->session->set_flashdata('msg_error', "FAQ Status Changed successfully!");
                   redirect(base_url().'admin/allfaq');

				  }

		
		 }
	   
	   public function delete($id=0)
	{
	
	
	if($this->session->userdata('utype') == 1){
		 $this->session->set_flashdata('msg_error', "FAQ deleted successfully!");
		$url = $this->config->item('base_url')."admin/allfaq";
		$this->faq_model->deleteRow($id);
		redirect($url);
		
		}
		else {
		 $this->session->set_flashdata('msg_error', "You have not permission to perform this action");
		$url = $this->config->item('base_url')."admin/customers";
		
		redirect($url);
		
		}

	}
	   

}