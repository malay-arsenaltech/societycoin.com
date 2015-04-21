<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('faq_model');
    }
	
public function index()
  {
	  
	  $data['data']=$this->faq_model->get_faq();
	  
  $this->load->view('faq',$data);

	  }
		
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */