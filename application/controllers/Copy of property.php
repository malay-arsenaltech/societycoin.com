<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('property_model');
		$this->load->model('admin/master_model');		
		
		
		
		
	}

	public function index()
	{
		if($this->session->userdata('userid')==NULL)
		  {
					   redirect(base_url().'home');
		  }
		
                $data['societylist']=$this->property_model->get_society();

                $data['data']= $this->property_model->allpropertylist();
				
			    $data['allcountry']= $this->master_model->allcountry();

                $this->load->view('addproperty',$data);
	}
	
	public function add()
	{
		  $this->load->model('home_model');
		  $this->home_model->activity('Add New Property');

		if($this->session->userdata('userid')==NULL)
		  {
					   redirect(base_url().'home');
		  }
            $data['data']=$this->property_model->add();
     	    redirect(base_url().'property?msg=1');

	}
	
		  
		  
		   public function editproperty()
       {
		   
   		  $this->load->model('home_model');
		  $this->home_model->activity('Edit Property');

		 if($this->session->userdata('userid')==NULL)
		  {
					   redirect(base_url().'home');
		  }  
	     $id=@$_REQUEST['pid'];
/*         $result=$this->property_model->getuserproperty($id);
         echo '<pre>'; 		        print_r($result); exit();		 

		 
	   $data['allcountry']= $this->master_model->allcountry($result['countryid']);
       $data['allstate']  = $this->master_model->allstate($result['countryid']);
	   $data['allcity']= $this->master_model->allcity($result['stateid']);
       $data['allarea']  = $this->master_model->allarea($result['cityid']);
	   $data['allsociety']  = $this->master_model->allsociety($result['areaid']);
	   $data['allpropertys']  = $this->master_model->allpropertys($result['societyid']);
	   */
	   
        $result=$this->property_model->getuserpropertybill($id);
		
		
       //  echo '<pre>'; 		        print_r($result); exit();		 
	   
	   



        $data['data']=$result;
		 


		 
		   	$this->load->view('editproperty',$data);
	   }
	   
	   public function update()
	     {
   		  $this->load->model('home_model');
		  $this->home_model->activity('Update Property');
 
			 if($this->session->userdata('userid')==NULL)
		  {
					   redirect(base_url().'home');
		  }
			$data['data']=$this->property_model->update();
     	    redirect(base_url().'property?msg=1');
			 
			 }
			 
		public function pchangedStatus(){
			
   		  $this->load->model('home_model');
		  $this->home_model->activity('Remove Property');
  
        $result = $this->property_model->pupdateuserStatus();
		
				if($result==true)
		 {
  		 $msg="Success";
		 
          redirect(base_url().'property?msg=6');
      	   }else
		      {          redirect(base_url().'property?msg=2');
				  }

		
		 }
		 
		 public function getbillamount()
		  {
			  
        $result = $this->property_model->getbillamount($_POST);
			  
			  }
			  
		 public function payment()
		  {
			  
			  
//	echo '<pre>';	print_r($_POST); exit();

// Merchant key here as provided by Payu
$MERCHANT_KEY = "C0Dr8m";

// Merchant Salt as provided by Payu
$SALT = "3sf0jURk";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {
     
    $posted[$key] = htmlentities($value, ENT_QUOTES);
  }
}else
   {
	   
	 header('Location: '.base_url());  
	   }
/* foreach ($posted as $key => $value) {
    echo "posted[".$key."]=".$value."<br>";
}*/
//echo $posted;
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}

$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
  ) {
    $formError = 1;
  } else {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<html>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
     payuForm.submit();
    }
  </script>
  <body onLoad="submitPayuForm();" >
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        
        <tr>
          <td>Society Name:</td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5'] ?>" /></td>
          <td>Address: </td>
          <td><input name="udf6" value="<?php echo (empty($posted['udf6'])) ? '' : $posted['udf6'] ?>" /></td>
        </tr>

        
        <tr>
          <td>Bill Name:</td>
          <td><input type="text" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
        </tr>

        
        <tr>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><input name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td></td>
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td></td>
          <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="hidden" name="curl" id="curl" value="<?php echo (empty($posted['curl'])) ? '' : $posted['curl']; ?>" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td> </td>
          <td><input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td> </td>
          <td><input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td> </td>
          <td><input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
        </tr>
	<tr>
          <td> </td>
          <td><input type="hidden" name="codurl" value="<?php echo (empty($posted['codurl'])) ? '' : $posted['codurl']; ?>" /></td>
          <td></td>
          <td><input type="hidden" name="touturl" value="<?php echo (empty($posted['touturl'])) ? '' : $posted['touturl']; ?>" /></td>
        </tr>
	<tr>
          <td></td>
          <td><input type="hidden" name="drop_category" value="<?php echo (empty($posted['drop_category'])) ? '' : $posted['drop_category']; ?>" /></td>
          <td> </td>
          <td><input type="hidden" name="custom_note" value="<?php echo (empty($posted['custom_note'])) ? '' : $posted['custom_note']; ?>" /></td>
        </tr>
	<tr>
          <td> </td>
          <td><input type="hidden" name="note_category" value="<?php echo (empty($posted['note_category'])) ? '' : $posted['note_category']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
    
    </body></html>
              <?php 


			  }
			  
			  
	   
public function successfulpayment()
{
   		  $this->load->model('home_model');
		  $this->home_model->activity('Payment Confirm');

       $result = $this->property_model->successfulpayment();
	
    	if($result==true)
		 {
 		if($this->session->userdata('userid')==NULL)	 
		   {

          redirect(base_url().'home?msg=7');
		  
		   }else
		     {
				 redirect(base_url().'property/transactionlog?msg=7');
				 }
      	   }
	  
	  }
	
public function faildpayment()
  {
   		  $this->load->model('home_model');
		  $this->home_model->activity('Payment Faild');

	  
   $result = $this->property_model->successfulpayment();
	
    	if($result==true)
		 {
          redirect(base_url().'property?msg=2');
      	   }
	  
	  }
	
    public function cancelpayment()
  {
	  
    echo '<pre>'; 	  print_r($_REQUEST);	  exit();
	  
	  }
	  
	public function transactionlog()
  {

	  $data['data']=$this->property_model->get_transaction();
	  $this->load->view('transactionlog',$data);
	  
	  }
	  
	public function transactionview()
  {
   		  $this->load->model('home_model');
		  $this->home_model->activity('View Transaction');

	  $id=@$_REQUEST['tranid'];
	  $data['data']=$this->property_model->get_transaction($id);
	  $this->load->view('transactionview',$data);
	  
	  }
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
