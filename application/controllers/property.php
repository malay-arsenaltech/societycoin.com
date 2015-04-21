<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Property extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		
		 $this->load->library('email');
			$this->load->helper('email');
        $this->load->model('property_model');
        $this->load->model('admin/master_model');
    }
    public function index()
    {
        logged_in();
        $data['societylist'] = $this->property_model->get_society();
        $data['data']        = $this->property_model->allpropertylist();
        $data['allcountry']  = $this->master_model->allcountry();
        $stateid             = @$_REQUEST['stateid'];
        $cityid              = @$_REQUEST['cityid'];
        $areaid              = @$_REQUEST['areaid'];
        $cid                 = @$_REQUEST['cid'];
        $data['societylist'] = $this->property_model->get_society_for_add($areaid);
        $data['data']        = $this->property_model->allpropertylist();
        $data['allcountry']  = $this->master_model->allcountry();
        $data['allstate']    = $this->property_model->get_state_for_add();
        $data['allcity']     = $this->property_model->get_city($stateid);
        $data['allarea']     = $this->property_model->get_area($cityid);
        $data['property']    = $this->property_model->get_propertyid($cid);
        $this->load->view('addproperty', $data);
    }
    public function add()
    {
        logged_in();
        $this->load->model('home_model');
        $this->home_model->activity('Add New Property');
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $data['data'] = $this->property_model->add();
        $msg          = "The Property has been added to your account";
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url() . 'property');
    }
    public function delete($id = 0)
    {
        logged_in();
        if ($id != '') {
            $this->db->where('md5(id)', $id);
            $this->db->where('userid', $this->session->userdata('userid'));
            $this->db->delete('ci_userpropertys');
            $msg = "Property has been deleted Succssfully!";
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url() . 'property');
        } else {
            $msg = "Invalid Record ID";
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url() . 'property');
        }
    }
    public function getcity()
    {
        $id   = $this->input->post('id');
        $city = $this->property_model->getcity($id);
        echo $city;
        exit;
    }
    public function getarea()
    {
        $id   = $this->input->post('id');
        $id   = $this->input->post('id');
        $area = $this->property_model->getarea($id);
        echo $area;
        exit;
    }
    public function getsociety()
    {
        $id      = $this->input->post('id');
        $society = $this->property_model->getsociety($id);
        echo $society;
        exit;
    }
    public function getaddress()
    {
        $id      = $this->input->post('id');
        $address = $this->property_model->getaddress($id);
        echo $address;
        exit;
    }
    public function addpropertypayment()
    {
        $data['data'] = $this->property_model->addpropertypayment($_POST);
        //	redirect(base_url().'property/autoaddproperty?msg=1');
    }
    public function editproperty()
    {
        $this->load->model('home_model');
        $this->home_model->activity('Edit Property');
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $id           = @$_REQUEST['pid'];
        /*         $result=$this->property_model->getuserproperty($id);
        echo '<pre>'; 		        print_r($result); exit();		 
        
        
        $data['allcountry']= $this->master_model->allcountry($result['countryid']);
        $data['allstate']  = $this->master_model->allstate($result['countryid']);
        $data['allcity']= $this->master_model->allcity($result['stateid']);
        $data['allarea']  = $this->master_model->allarea($result['cityid']);
        $data['allsociety']  = $this->master_model->allsociety($result['areaid']);
        $data['allpropertys']  = $this->master_model->allpropertys($result['societyid']);
        */
        $result       = $this->property_model->getuserpropertybill($id);
        //  echo '<pre>'; 		        print_r($result); exit();		 
        $data['data'] = $result;
        $this->load->view('editproperty', $data);
    }
    public function update()
    {
        $this->load->model('home_model');
        $this->home_model->activity('Update Property');
        if ($this->session->userdata('userid') == NULL) {
            redirect(base_url() . 'home');
        }
        $data['data'] = $this->property_model->update();
        redirect(base_url() . 'property?msg=1');
    }
    public function pchangedStatus()
    {
        $this->load->model('home_model');
        $this->home_model->activity('Remove Property');
        $result = $this->property_model->pupdateuserStatus();
        if ($result == true) {
            $msg = "Success";
            redirect(base_url() . 'property?msg=6');
        } else {
            redirect(base_url() . 'property?msg=2');
        }
    }
    public function getbillamount()
    {
        $result = $this->property_model->getbillamount($_POST);
    }
    public function payment()
    {
	
		$amount = $this->session->userdata('amount');
        $cid    = $this->session->userdata('cid');
		if($amount!='' && $cid!=''){
        
        if ($this->session->userdata('carttype') == NULL) {
            $carttypepay = array(
                'carttypepay' => 'debitcard'
            );
            $this->session->set_userdata($carttypepay);
            $data['autoconpayment'] = $this->property_model->autocon();
        }
       
		
        if (isset($_POST['ulogin'])  &&  $_POST['ulogin'] == 'Guest User') {
            $email = array(
                'email' => $_POST['email']
            );
            $this->session->set_userdata($email);
            $pid           = $this->session->userdata('addressid');
            $data['sdata'] = $this->property_model->get_society($this->session->userdata('societyid'));
            $data['pdata'] = $this->property_model->get_property($pid);
            $this->load->view('payment', $data);
			
			
			
        } else {
				logged_in();
            $pid           = $this->session->userdata('addressid');
			if($this->session->userdata('addressid')){
            $data['sdata'] = $this->property_model->get_society($this->session->userdata('societyid'));
            $data['pdata'] = $this->property_model->get_property($pid);
            $this->load->view('payment', $data);
			}
			
			else {
			
			 redirect(base_url() . 'home');
			
				}
			}
		}
		else {
		
		 redirect(base_url() . 'home');
		}
    }
	
	function payment_confirm(){
	  $pid           = $this->session->userdata('addressid');
	  
	  if ($this->session->userdata('carttype') == NULL) {
            $carttypepay = array(
                'carttypepay' => 'debitcard'
            );
            $this->session->set_userdata($carttypepay);
            $data['autoconpayment'] = $this->property_model->autocon();
        } 
			$this->session->set_userdata('payment_desc',$this->input->post('custom_note'));
            $data['sdata'] = $this->property_model->get_society($this->session->userdata('societyid'));
            $data['pdata'] = $this->property_model->get_property($pid);
	
	 $this->load->view('payment_confirm', $data);
	
	
	
	}
	
	
	
	
    public function successfulpayment()
    {
        //logged_in();
        $this->load->model('home_model');
        $this->home_model->activity('Payment Confirm');
        $result = $this->property_model->successfulpayment();
        
		if( $result!='') 
		{
		 
			$data['payment_id'] = md5($result);
		 $this->email->from('noreply@societycoin.com', 'Societycoin');
           
			  $to      = $this->input->post('email');
            $admin=false;
           		 
			
			if($this->input->post('status') == 'success'){
			$subject = "Transaction Successful";
            $msg =  $this->load->view('payment_email',$data,true);
			$admin=true;
			}
			else {
			$subject = "Transaction failed";
            $msg =  $this->load->view('payment_fail_email',$data,true);
			
			}
			
			
			
			$this->email->to( $to);
            $this->email->set_mailtype("html");
			 $this->email->subject(  $subject);	
            $this->email->message($msg);
            $this->email->send();
			
			if($admin){
			$this->email->clear();
			 $this->email->from('noreply@societycoin.com', 'Societycoin');
			$subject = "Transaction Successful";
			$msg =  $this->load->view('payment_email_admin','',true);
			$this->email->to('info@societycoin.com');
            $this->email->set_mailtype("html");
			 $this->email->subject(  $subject);	
            $this->email->message($msg);
            $this->email->send();
			}
		
		
		redirect(base_url() . 'home/successful?msg=7&txnid=' . $result);
		
		}
		else {
		redirect(base_url() . 'home/');
		
		}
    }
    public function faildpayment()
    {
        //logged_in();
		
        $this->load->model('home_model');
        $this->home_model->activity('Payment failed');
        $result = $this->property_model->successfulpayment();
		$data['payment_id'] = md5($result);
		 $this->email->from('noreply@societycoin.com', 'Societycoin');
           
			  $to      = $this->input->post('email');
			$subject = "Transaction failed";
            $msg =  $this->load->view('payment_fail_email',$data,true);
					
			
			$this->email->to( $to);
            $this->email->set_mailtype("html");
			 $this->email->subject(  $subject);	
            $this->email->message($msg);
            $this->email->send();
		       
        redirect(base_url() . 'home/successful?msg=2&txnid=' . $result);
    }
    public function cancelpayment()
    {
        echo '<pre>';
        print_r($_REQUEST);
        exit();
    }
    public function transactionlog()
    {
        logged_in();
        $data['data'] = $this->property_model->get_transaction();
        $this->load->view('transactionlog', $data);
    }
    public function transactionview($id = '')
    {
        logged_in();
        $this->load->model('home_model');
        $this->home_model->activity('View Transaction');
        $data['data'] = $this->property_model->get_transaction($id);
        $this->load->view('transactionview', $data);
    }
    public function Convenience()
    {
        $this->load->model('property_model');
        $data['data'] = $this->property_model->Convenience($_POST);
    }
    public function autocon()
    {
        $this->load->model('property_model');
        $data['data'] = $this->property_model->autocon();
    }
    public function autoaddproperty()
    {
        $stateid             = @$_REQUEST['stateid'];
        $cityid              = @$_REQUEST['cityid'];
        $areaid              = @$_REQUEST['areaid'];
        $cid                 = @$_REQUEST['cid'];
        $data['societylist'] = $this->property_model->get_society_for_add($areaid);
        $data['data']        = $this->property_model->allpropertylist();
        $data['allcountry']  = $this->master_model->allcountry();
        $data['allstate']    = $this->property_model->get_state_for_add();
        $data['allcity']     = $this->property_model->get_city($stateid);
        $data['allarea']     = $this->property_model->get_area($cityid);
        $data['property']    = $this->property_model->get_propertyid($cid);
        $this->load->view('autoaddproperty', $data);
    }
    public function paymentform($id = '')
    {
        $data['property'] = $this->property_model->getuserproperty($id);
        $this->load->view('paymentform', $data);
    }
	
	
	public function payment_request($request_id=''){
	
	if(!empty($request_id)){
	
	$row = $this->property_model->getrequest_details($request_id);
	
	if(count($row) > 0){
	
	$req['societyid'] = $row->society_id;
	$req['addressid'] =$row->property_id;
	$req['userid_request'] =$row->customer_id;
	$req['amount'] =$row->amount;
	$req['cid'] =  $row->society_id;
	
	$users = get_user_details($row->customer_id);
		
	$req['email'] =	(isset($users->email))  ? $users->email : '' ;
	$req['fname'] =		(isset($users->fname)) ? $users->fname : "";	
	
	 $this->session->set_userdata($req);
	  if ($this->session->userdata('carttype') == NULL) {
            $carttypepay = array(
                'carttypepay' => 'debitcard'
            );
            $this->session->set_userdata($carttypepay);
            $data['autoconpayment'] = $this->property_model->autocon();
        }
	 $data['sdata'] = $this->property_model->get_society($row->society_id);
     $data['pdata'] = $this->property_model->get_property($row->property_id);
     $this->load->view('payment', $data);
	}
	
	
	
	else {
	
			$msg = "you are not authorise to make this payment";
                $this->session->set_flashdata('msg_error', $msg);
                $url = base_url() . "home";
                redirect($url);	
	
	}
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
