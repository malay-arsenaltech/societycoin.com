<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

public function __construct()
	{
		parent::__construct();

     if($this->session->userdata('userid')==NULL)
		  {
		$this->load->view('welcome_message');
		  }
		
		$this->load->model('message_model');
    }
	
public function index()
  {
	  
	  $data['data']=$this->message_model->get_msg();
	  
	  $data['society']=$this->message_model->getsocietyid();
	  
  	  $data['inbox']=$this->message_model->inbox();
	  
  	  $data['outbox']=$this->message_model->outbox();
	  
  
      $this->load->view('message',$data);

	  }
	  
	  
public function send()
 {
	 $result=$this->message_model->send();
	 
	 if($result>0)
	  {
		  
		  redirect(base_url().'message?msg=1');
		  }else
		    {
			  redirect(base_url().'message?msg=2');
				}
	 
	 
	 }
	 
	 
 public function view()
   {
	   $id=$_REQUEST['mid'];
	   $data['data']=$this->message_model->viewmsg($id);
	   $this->load->view('view',$data);
	   
	   
	   
	   }
	   
  public function inboxview()
   {
	   $id=$_REQUEST['mid'];
	   $data['data']=$this->message_model->inboxview($id);
	   $this->load->view('inboxview',$data);
	   
	   
	   
	   }
	   
  public function delete()
    {
   	 $result=$this->message_model->delete();
	 
	 if($result==true)
	  {
		  
		  redirect(base_url().'message?msg=1');
		  }else
		    {
			  redirect(base_url().'message?msg=2');
				}
	 
		
		
		}
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */