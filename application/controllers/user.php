<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('property_model');
        $this->load->library('email');
        $this->load->helper('email');
    }
    public function index()
    {
		logged_in();
        $this->load->view('profile');
    }
    public function myaccount()
    {
        logged_in();
       
		$data['state']= $this->user_model->getstate();

		$data['city']= $this->user_model->getcity();

	   $data['data'] = $this->user_model->get_user();
        $data['cart'] = $this->user_model->get_cart();
        $this->load->view('myaccount', $data);
    }
    public function update()
    {
        logged_in();
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('fname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required');		
		 $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile number', 'trim|required');
       
	     if ($this->form_validation->run() == FALSE) {
            
            $error_msg = validation_errors();
            $this->session->set_flashdata('msg_error', $error_msg);
           redirect(base_url() . 'user/myaccount');
        } 
		
        $this->load->model('home_model');
        $this->home_model->activity('Update Profile');
        $data = $this->user_model->update();
        if ($data == true) {
            $data = "Successfuly Updated";
        } else {
            $data = "Error";
        }
        $this->session->set_flashdata('msg', "Your account has been updated successfully.");
        redirect(base_url() . 'user/myaccount');
    }
	
	public function update_email()
    {
        logged_in();
        $this->load->model('home_model');
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('opassword', 'Password', 'trim|required|min_length[8]|max_length[32]');
       
	     if ($this->form_validation->run() == FALSE) {
            
            $error_msg = validation_errors();
            $this->session->set_flashdata('msg_error', $error_msg);
           redirect(base_url() . 'user/myaccount');
        } 
		else {
        $this->home_model->activity('Update Email');
        $res = $this->user_model->update_email();
        if ( $res) {
            $msg = "Your email address has been updated successfuly";
			
			
			 $email = $this->input->get_post('email');
        if (valid_email($email)) {
           
            $this->email->from('noreply@societycoin.com', 'Societycoin');
            $this->email->to($this->session->userdata('email'));
            $this->email->subject('Account Update');
			
           // $recods['activationLink'] = base_url() . "user/activate/" . $data[0]['activation_key'];
            $this->email->set_mailtype("html");
			$name = $this->session->userdata('fname');
          
		$msg1 ='Hello '. $name.',   <br><br>Your email address has been updated successfully!<br><br>Best regards,
		<br>The SocietyCoin.com team.
		<br>www.societycoin.com
		<br>support@societycoin.com';

		



		   $this->email->message($msg1);
            $this->email->send();
			
        }
			
			
			
			
			$this->session->set_flashdata('msg',  $msg);
        redirect(base_url() . 'user/myaccount');
        } else {
            $msg = "Your password do not match";
			$this->session->set_flashdata('msg_error',  $msg);
        redirect(base_url() . 'user/myaccount');
        }
        
		
		}
    }
	
	
    public function add()
    {
	
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[ci_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $url       = base_url() . "home";
            $error_msg = validation_errors();
            $this->session->set_flashdata('msg_error', $error_msg);
            redirect($url);
        } else {
            $id = $this->user_model->add();
            $this->_sendMail($id);
            $url = base_url() . "home";
            $msg = "Thank You for registering on SocietyCoin.com";
            $this->session->set_flashdata('msg', $msg);
            redirect($url);
        }
    }
    function _sendMail($userId)
    {
        $this->email->clear();
        $email = $this->input->get_post('email');
        if (valid_email($email)) {
            $this->db->select('*');
            $this->db->from('ci_users');
            $this->db->where("id", $userId);
            $result = $this->db->get();
            $data   = $result->row();
            $this->email->from('noreply@societycoin.com', 'Societycoin');
            $this->email->to($email);
            $this->email->subject('Please verify your email address');
			 $recods['data'] =   $data;
           // $recods['activationLink'] = base_url() . "user/activate/" . $data[0]['activation_key'];
            $this->email->set_mailtype("html");
            $msg1 =  $this->load->view('email_activate', $recods,true);
            $this->email->message($msg1);
            $this->email->send();
			
        }
        return;
    }
    public function activate($acrivation_key = '')
    {
        if (!empty($acrivation_key)) {
            $status = 1;
            $data   = array(
                'status' => $status
            );
            $this->db->where('activation_key', $acrivation_key);
            $this->db->update('ci_users', $data);
            $data['page_title'] = 'Login';
            if ($this->db->affected_rows() > 0) {
                $upd = array(
                    'activation_key' => ''
                );
                $this->db->where('activation_key', $acrivation_key);
                $this->db->update('ci_users', $upd);
                $this->session->set_flashdata('msg', "Your Account has been successfully activated. You can now log in using the username and password you chose during the registration.");
                $url = base_url() . "home";
                redirect($url);
            } else {
                $msg = "The account has already been activated.";
                $this->session->set_flashdata('msg', $msg);
                $url = base_url() . "home";
                redirect($url);
            }
        }
    }
    public function setting()
    {
        logged_in();
        $this->load->model('home_model');			 
   
		 $this->load->library('form_validation');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirmpass]');
		  $this->form_validation->set_rules('confirmpass', 'Confirm password', 'trim|required|min_length[8]');

        $this->form_validation->set_rules('opassword', 'Old password', 'trim|required|min_length[8]|max_length[32]');
       
		 if ($this->form_validation->run() == FALSE) {
            
            $error_msg = validation_errors();
            $this->session->set_flashdata('msg_error', $error_msg);
            redirect(base_url() . 'user/myaccount');

        }
		
        $this->home_model->activity('Update Setting');
        $data = $this->user_model->setting();
        if ($data == 1) {
		
			$msg = "Your Password has been updated successfully";
			 $this->session->set_flashdata('msg', $msg);                
            redirect(base_url() . 'user/myaccount');
           
        } elseif ($data == 14) {
		
			$msg = "Please Enter Valid Old Password";
			 $this->session->set_flashdata('msg', $msg);                
            redirect(base_url() . 'user/myaccount');
			
			
        } else {
            redirect(base_url() . 'user?msg=2');
        }
    }
    public function IIIrd_party_payment()
    {
       $this->load->library('mathcaptcha');
	   	$this->load->helper('form');
	   	$config['operation']='addition';
	 $config['question_format']="numeric";
	 $config['answer_format']="numeric";  
	  $this->mathcaptcha->init($config);
        $this->load->model('property_model');
		
			 $data['math_captcha_question'] = $this->mathcaptcha->get_question();
		
        $data['society'] = $this->property_model->get_society();
       
        //$data['address'] = $this->property_model->allpropertylist();
        //	echo print_r($data['data']);
        //	 exit();
        $this->load->view('3r_party_payment', $data);
    }
    public function send()
    {
        $this->load->model('home_model');
		$this->load->library('mathcaptcha');
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
            redirect(base_url() . 'user/IIIrd_party_payment');
        }
		if( $this->input->post('addressid')!='' &&  $this->input->post('societyid') !='' &&  $this->input->post('amount')!=''){
        $this->home_model->activity('3rd party payment');
		$addressid =  $this->input->post('addressid');
		$societyid =  $this->input->post('societyid');
		$data['property_name'] = getproperty_name_id($addressid);
		$data['socity_name'] = getsociety_name_id($societyid);
      
		$data['requestid'] = $this->user_model->add_payment_request();
		
	  // $data['id'] = $this->property_model->add_payment_request();
        $to = $this->input->post('email');  
	          
	   $this->email->from('noreply@societycoin.com', 'Societycoin');			
			
			$subject = "Payment Request";
			$message =  $this->load->view('thirdparty_mail',$data,true);
			
			//$this->email->to($to);
			
			$list = array('rishabh@infotyke.com', $to);
			$this->email->to($list);
           
		   $this->email->set_mailtype("html");
			 $this->email->subject(  $subject);	
            $this->email->message($message);
            $this->email->send();
      
			$msg = "Your payment request has been sent to ". $this->input->post('email');
                $this->session->set_flashdata('msg', $msg);
                $url = base_url() . "home";
                redirect($url);
				
				
				}
				
				
		else {
				$msg = "All Fields are mandatory!";
                $this->session->set_flashdata('msg', $msg);
                $url = base_url() . "user/IIIrd_party_payment";
                redirect($url);
		
		
		}
        //redirect(base_url() . 'user/IIIrd_party_payment?email=' . $this->input->post('email') . '&msg=5');
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
	
	
	
	
    public function editcart()
    {
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $id           = $_REQUEST['cid'];
        $data['cart'] = $this->user_model->get_cart($id);
        $this->load->view('editcart', $data);
    }
    public function updatecart()
    {
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $data['cart'] = $this->user_model->updatecart();
        redirect(base_url() . 'user/myaccount?msg=6');
    }
    public function deletecart()
    {
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $id           = $_REQUEST['cid'];
        $data['cart'] = $this->user_model->deletecart($id);
        redirect(base_url() . 'user/myaccount?msg=7');
    }
    function graph()
    {
        $addid = @$_REQUEST['addid'];
        $this->load->model('property_model');
        $data['graph']    = $this->user_model->grapthdata();
        $data['data']     = $this->property_model->allpropertylist();
        $data['society']  = $this->property_model->allsocietyforg();
        $data['billdata'] = $this->user_model->billforgrapth($addid);
        //			  print_r($data['graph']); exit();
        $this->load->view('graph', $data);
    }
    function printgraph()
    {
        $addid = @$_REQUEST['addid'];
        $this->load->model('property_model');
        $data['graph']    = $this->user_model->grapthdata();
        $data['data']     = $this->property_model->allpropertylist();
        $data['society']  = $this->property_model->allsocietyforg();
        $data['billdata'] = $this->user_model->billforgrapth($addid);
        $this->load->view('print', $data);
    }
    function excel()
    {
        $addid = @$_REQUEST['addid'];
        $this->load->model('property_model');
        $data['graph']    = $this->user_model->grapthdata();
        $data['data']     = $this->property_model->allpropertylist();
        $data['society']  = $this->property_model->allsocietyforg();
        $data['billdata'] = $this->user_model->billforgrapth($addid);
        $this->load->view('excel', $data);
    }
    function modifyform()
    {
        //		echo '<pre>';  print_r($_REQUEST); exit();
        $pid              = @$_REQUEST['pid'];
        $soid             = @$_REQUEST['soid'];
        $data['society']  = $this->property_model->get_society($soid);
        $data['property'] = $this->property_model->get_propertymodyfy($pid);
        $this->load->view('modifyform', $data);
    }
    function sendmform()
    {
        /****************************************/
        //echo '<pre>'; print_r($_POST); exit();
        /*****************Admin Mail********************/
        $to      = "support@societycoin.com";
        $subject = "Ownership Transfer Request";
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ownership Transfer Request</title>
</head>

<body>
<table width="600" align="center" border="0" cellspacing="5" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td></tr>  
  <tr>
    <td><h1 align="center" style="color:#666;font-weight:bold; font-size:40px; border-bottom:1px solid #6C6">Ownership Transfer Request</h1>
      <p style="color:#F60; font-weight:normal" dir="ltr"><br />
        Societycoin has received an ownership change request for &lt;' . @$_REQUEST['propertyname'] . '&gt; from Society Name &lt;' . @$_REQUEST['societyname'] . '&gt; .please confirm this change if you can verify this change on your end.</span></p>
       
      <p style="color:#F60" dir="ltr">Click on the link below to view the changes and accept/decline the request.</span></p>
      <p style="color:#F60" dir="ltr">If you disagree with the request, please ignore the message or contact the Societycoin.com team for assistance.</span> </p>
      <h2 style="font-family:Arial, Helvetica, sans-serif; color:#060; font-weight:normal;">&nbsp;</h2>
      <p style="color:#f60;"> <br />
        Thanks!</p>
      <p style="color:#F60">The SocietyCoin.com Team</p>
      <p style="color:#F60"><a href="http://www.societycoin.com" target="_blank" style="color:#F60;">www.societycoin.com</a></p>
      <p style="color:#F60">Email: Support@societycoin.com</p>
    <p style="color:#F60">( customer service Phone number)</p></td>
  </tr>
  <tr>
  <td><img src="' . frontThemeUrl . 'email/SocietyCoin-logo.png" align="left" width="150" height="128" alt="" title="www.societycoin.com" /></td></tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: SocietyCoin <Support@societycoin.com>' . "\r\n";
        $headers .= 'Bcc: easydev09@gmail.com' . "\r\n";
        @mail($to, $subject, $message, $headers);
        /******************************************************************/
        redirect(base_url() . 'user/modifyform?msg=8');
    }
    public function Report()
    {
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $this->load->view('report');
    }
    public function pdf2hmtl()
    {
        //		 print_r($_REQUEST); exit();
        $data['data'] = $_REQUEST['file'];
        $this->load->view('pdf2html', $data);
    }
    public function check_user()
    {
        if (isset($_GET['email'])) {
            $email = ($_GET['email']);
            if (!empty($email)) {
                $username_query  = mysql_query("SELECT email FROM ci_users WHERE email='$email'");
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
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */