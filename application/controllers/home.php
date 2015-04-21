<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('property_model');
		$this->load->library('mathcaptcha');
    }
    public function comingsoon()
    {
        $this->load->view('comming_soon');
    }
    public function index()
    {
        $cid = @$_REQUEST['cid'];
        if (@$_REQUEST['cid'] != NULL) {
            $sdata = array(
                'so_id' => $_REQUEST['cid'],
                'so_name' => $_REQUEST['so_name']
            );
            $this->session->set_userdata($sdata);
        } else {
            $sdata = array(
                'so_id' => '',
                'so_name' => ''
            );
            $this->session->set_userdata($sdata);
        }
        $data['society']  = $this->property_model->get_society();
        $data['property'] = $this->property_model->get_propertyid($cid);
        //echo '<pre>'; 		print_r($data['property']);		exit();
        if ($this->session->userdata('userid') == NULL) {
            $this->load->view('welcome_message', $data);
        } else {
            $this->load->view('welcome_message', $data);
        }
    }
    public function new_to_societycoin()
    {
        $this->load->view('newtosocietycoin');
    }
    public function problem_with_payment()
    {
        $this->load->view('problemwithpayment');
    }
    public function about_us()
    {
        $data['data'] = $this->home_model->get_cms(10);
        $this->load->view('about', $data);
    }
    public function work()
    {
        $data['data'] = $this->home_model->get_cms(7);
        $this->load->view('how-it-work', $data);
    }
    public function customer()
    {
        $data['data'] = $this->home_model->get_cms(9);
        $this->load->view('customer-care', $data);
    }
    public function faq()
    {
        $data['data'] = $this->home_model->get_cms(8);
        $this->load->view('customer-care', $data);
    }
    public function contact()
    {
	$this->load->helper('form');
		$config['operation']='addition';
		 $config['question_format']="numeric";
		$config['answer_format']="numeric";  
        $this->mathcaptcha->init($config);
		 $data['math_captcha_question'] = $this->mathcaptcha->get_question();

        $data['data'] = $this->home_model->get_cms(8);
        $this->load->view('contactus', $data);
    }
    public function send()
    {
	$config['operation']='addition';
	 $config['question_format']="numeric";
	 $config['answer_format']="numeric";  
	  $this->mathcaptcha->init($config);
        $this->load->library('email');
        $this->load->helper('email');
        $html  = '';
        $email = $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('math_captcha', 'CAPTCHA', 'required|callback__check_math_captcha');

        if ($this->form_validation->run() == FALSE)
        {
            $msg = "You have entered wrong answer";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/contact');
        }
       
		
		
        if (valid_email($email)) {
            //$this->email->from($email, 'Contact Us');
			  $this->email->from("no-reply@societycoin.com","societycoin.com"); 
            //$this->email->to('rishabh@infotyke.com');
           
		  
		    $html = $this->load->view('contactus_mail', '',true);
		   
            $this->email->subject("Society Coin Contact Us");
            $this->email->message($html);
            $this->email->set_mailtype("html");           
			$list = array('rishabh@infotyke.com', $email);
			$this->email->to($list);
			
			
            if ($this->email->send()) {			
			
                $msg = "Your message has been sent. Thanks for contacting us.";
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url() . 'home/contact');
            } else {
                $msg = "Message Sending Faild!";
                $this->session->set_flashdata('msg_error', $msg);
                redirect(base_url() . 'home/contact');
            }
        } else {
            $msg = "Please Enter Valid E-mail Address!";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/contact');
        }
    }
	
	
	function _check_math_captcha($str)
{
    if ($this->mathcaptcha->check_answer($str))
    {
        return TRUE;
    }
    else
    {
        $this->form_validation->set_message('_check_math_captcha', 'Enter a valid  captcha response.');
        return FALSE;
    }
}
	
	
	
    public function csend()
    {
        $this->load->library('email');
        $this->email->from($this->input->post('email'), 'Customere Care');
         $this->email->to('rishabh@infotyke.com');
        $html = $this->input->post('message');
        $this->email->subject('User Issues');
        $this->email->message($html);
        $this->email->set_mailtype("html");
        $this->email->send();
        redirect(base_url() . 'home/customer?msg=9');
        //echo $this->email->print_debugger();
    }
    public function disclamer()
    {
        $data['data'] = $this->home_model->get_cms(11);
        $this->load->view('disclamer', $data);
    }
    public function privacy_policy()
    {
        $data['data'] = $this->home_model->get_cms(12);
        $this->load->view('privacy-police', $data);
    }
    public function refund_policy()
    {
        $data['data'] = $this->home_model->get_cms(13);
        $this->load->view('refund-police', $data);
    }
    public function term_of_use()
    {
        $data['data'] = $this->home_model->get_cms(14);
        $this->load->view('term-of-use', $data);
    }
    public function successful()
    {
        $this->load->model('property_model');
        $pid           = $this->session->userdata('addressid');
        $data['sdata'] = $this->property_model->get_society($this->session->userdata('societyid'));
        $data['pdata'] = $this->property_model->get_property($pid);
        $this->load->view('successful', $data);
    }
    public function login()
    {
	$this->load->model('home_model');
        if ($this->input->post('task') == 'payment') {
            $data = $this->home_model->pvalidate();
            
            $this->home_model->activity('login');
			if ($data == 1) {
               redirect(base_url() . 'property/payment');
            } elseif ($data == 0) {
                //redirect(base_url().'home?vmsg=10');
                $url = base_url() . "home";
                $this->session->set_flashdata('msg_error', "Username or Password is incorrect");
                redirect($url);
            }
			
			
            
        } else {
            $data = $this->home_model->validate();
          
            $this->home_model->activity('login');
            if ($data == 1) {
                $url = base_url() . "user";
                redirect($url);
            } elseif ($data == 0) {
                //redirect(base_url().'home?vmsg=10');
                $url = base_url() . "home";
                $this->session->set_flashdata('msg_error', "Username or Password is incorrect");
                redirect($url);
            }
        }
    }
    public function logout()
    {
        $this->load->model('home_model');
        $this->home_model->activity('logout');
        $this->session->sess_destroy();
        redirect(base_url() . 'home');
    }
    public function recommend()
    {
	
		$this->load->helper('form');
		$config['operation']='addition';
		 $config['question_format']="numeric";
		$config['answer_format']="numeric";  
        $this->mathcaptcha->init($config);
		 $data['math_captcha_question'] = $this->mathcaptcha->get_question();

	
        $this->load->view('recommend',$data);
    }
    public function recommendsend()
    {
        $this->load->library('email');
        $this->load->helper('email');
		$config['operation']='addition';
		$config['question_format']="numeric";
		$config['answer_format']="numeric";  
		$this->mathcaptcha->init($config);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('math_captcha', 'CAPTCHA', 'required|callback__check_math_captcha');

        if ($this->form_validation->run() == FALSE)
        {
            $msg = "You have entered wrong answer";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/recommend');
        }
       
		
        $email        = $this->input->post('email');
        $name         = $this->input->post('name');
        $html 		  = $this->load->view('recomend_society_mail', '',true);
        $this->email->from($email, $name);
		$list = array('rishabh@infotyke.com', $email);
			$this->email->to($list);
        $this->email->subject('Society Recommend');
        $this->email->set_mailtype("html");
        $this->email->message( $html);
        if (valid_email($email)) {
            $this->email->send();
            $msg = "You Message has been Sent. Thank You for Recommend Society";
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url() . 'home/recommend');
        } else {
            $msg = "Please Enter Valid E-mail Address!";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/recommend');
        }
        //echo $this->email->print_debugger();
    }
    public function plogin()
    {
        
        $newdata = $_POST;
		
		$soid = $this->input->post('societyid');
		$addressid = $this->input->post('addressid');
		$amount = $this->input->post('amount');
		
		
		
		if(empty($soid) || empty($addressid) || empty($amount) ){
		
			$msg = "All fields are mandatory!";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/');
		
		
		}
		if ($amount != '' && preg_match('/^[1-9][0-9]*$/', $amount)) {
		
			
		
        $this->session->set_userdata($newdata);
		$this->session->set_userdata('cid',$soid);
        if ($this->session->userdata('userid') != NULL) {
            redirect(base_url() . 'property/payment');
        } else {
            $this->load->view('paylogin');
        }
		
		}
		
		
		else  {
		
			$msg = "Please Enter valid Amount";
            $this->session->set_flashdata('msg_error', $msg);
            redirect(base_url() . 'home/');
		
		
		}
    }
    public function forgotpass()
    {
        $data = $this->home_model->validemail($_POST['usernameemail']);
        if ($data == 0) {
            $url = base_url() . "home";
            $this->session->set_flashdata('msg_error', "Error: Faild to reset your password");
            redirect($url);
        }
        $this->home_model->forgotpass();
        $url = base_url() . "home";
        $this->session->set_flashdata('msg', "Your password has been changed, Please check your email inbox.");
        redirect($url);
    }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */