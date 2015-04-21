<?php 

//echo '<pre>'; 		print_r($this->session->all_userdata()); echo '</pre>'; 
$this->load->view('header'); ?>
 


 
<script type="text/javascript">
jQuery(document).ready(function () {
								 
    jQuery('#ccpay').click(function () 
     { 
   var cid=jQuery('#cid').val();
   var amount=jQuery('#samount').val();
   	var type=jQuery('#ccpay').val();
	
	url='<?php echo base_url(); ?>property/Convenience';
	
   jQuery.post(url,{"cid":cid,"action": type,"amount":amount},function (data) {
																		
    var json = data,    obj = JSON.parse(json);
	
    
	   	document.getElementById('Convenience').value=obj.con;
		document.getElementById('totalamount').value=obj.totalamt;
    	document.getElementById('amount').value=obj.totalamt;
    	document.getElementById('enforce_paymethod').value=obj.carttypepay;
		
		
		
		
		
		jQuery('.tab_wrap').load();
	//	window.location.reload(true);
		
		
		
	
    }); 							  
								  
    });
	
	
	 jQuery('#dcpay').click(function () 
     { 
   var cid=jQuery('#cid').val();
   var amount=jQuery('#samount').val();
   	var type=jQuery('#dcpay').val();
	
	url='<?php echo base_url(); ?>property/Convenience';
	
   jQuery.post(url,{"cid":cid,"action": type,"amount":amount},function (data) {
																		
    var json = data,    obj = JSON.parse(json);
	
       
	   	document.getElementById('Convenience').value=obj.con;
		document.getElementById('totalamount').value=obj.totalamt;
		    	document.getElementById('amount').value=obj.totalamt;
				document.getElementById('enforce_paymethod').value=obj.carttypepay;
		
	
    }); 							  
								  
    });
	
	 jQuery('#netbankpay').click(function () 
     { 
   var cid=jQuery('#cid').val();
   var amount=jQuery('#samount').val();
   	var type=jQuery('#netbankpay').val();
	
	url='<?php echo base_url(); ?>property/Convenience';
	
   jQuery.post(url,{"cid":cid,"action": type,"amount":amount},function (data) {
																		
    var json = data,    obj = JSON.parse(json);
	
       
	   	document.getElementById('Convenience').value=obj.con;
		document.getElementById('totalamount').value=obj.totalamt;
		    	document.getElementById('amount').value=obj.totalamt;
				document.getElementById('enforce_paymethod').value=obj.carttypepay;
		
	
    }); 							  
								  
    });
	 
	 
		 
	 	 jQuery('#addproperty').click(function () 
     { 
   var proid=jQuery('#udf1').val();
   
   if(this.checked==true)
    {
    
	var r=confirm("Pressed ok button for confirm save this property");
if (r==true)
  {
	 // return true;
  }
else
  {
 return false;
  } 
	

 url='<?php echo base_url(); ?>property/addpropertypayment';
	
   jQuery.post(url,{"addpro":"addpro","proid":proid},function (data) {
																		
//    var json = data,    obj = JSON.parse(json);
//alert(data);
       jQuery('#addpropertyonpayment').html(data);
		
	
    }); 							  
   
	}
								  
    });
		 
	 
	
	


});


</script>

<!--mid-portion-->
<div class="row-fluid mid-outer">
  <div class=" container mid-inner">
    <!--left-->
    <?php $this->load->view('left'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->
    <div class="right" style="background:#fff !important;">
        <?php $this->load->view('menu'); ?>
      <!--form-->
      <div class="tab_wrap">
    	<ul>
        	<li><img src="<?php echo frontThemeUrl; ?>images/email-normal.jpg" /></li>
        	<li><img src="<?php echo frontThemeUrl; ?>images/order-summery.jpg" /></li>
        	<li><img src="<?php echo frontThemeUrl; ?>images/payment-option-normal.jpg" /></li>
        	
        
        </ul>
        
         <div class="payment" style="margin-top:0px !important; margin-left:33px;">
      <?php
	  
			  
			  
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
//echo '<pre>';     print_r($_POST); exit();	
  foreach($_POST as $key => $value) {
     
    $posted[$key] = htmlentities($value, ENT_QUOTES);
  }
}


$formError = 0;

if(empty($posted['txnid'])) {

  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}

$hash = '';

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount'])    || empty($posted['firstname'])
          || empty($posted['email'])       || empty($posted['phone'])       || empty($posted['productinfo'])         || empty($posted['surl'])          || empty($posted['furl'])  ) 
  {
    $formError = 1;
  } else
    {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach($hashVarsSeq as $hash_var) 
	{
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }}
   elseif(!empty($posted['hash'])) 
   {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
   }
?>


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
      <?php if($formError) { ?>
      <span><h4 style="color:#000">Order Summary</h4></span>
          <?php } ?>
    <form action="<?php   echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="curl" id="curl" value="<?php echo (empty($posted['curl'])) ? '' : $posted['curl']; ?>" />
      <table style="width:900px;" >
        <tr>
        </tr>
        <?php if(@$this->session->userdata('userid')==NULL)
		   {
			   
//			 print_r($email);
			   
			   ?>
        <tr><td>Society Name</td><td>Property Address</td></tr>
        
        <tr>
          <td>
          <input disabled="disabled" name="sudf5" value="<?php echo $this->session->userdata('so_name'); ?>" />
          <input  type="hidden" name="udf5" value="<?php echo $this->session->userdata('so_name'); ?>" />
          
          
          </td>
          <td>
          <input disabled="disabled" name="sudf6" value="<?php echo $this->session->userdata('addressid'); ?>" /></td>
          <input  type="hidden" name="udf6" value="<?php echo $this->session->userdata('addressid'); ?>" />
          </tr>
          <tr><td>Amount</td><td>Email</td></tr>
          <tr><td>
           <input disabled="disabled" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />
           <input  type="hidden" id="amount" name="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />
           
           </td>
           
          <td>
          <input disabled="disabled" name="semail" id="semail" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
          <input type="hidden"  name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
          
          </td></tr>
        

        
         <?php } else
		   {
			   ?>
        <tr><td>Society Name</td><td>Property Address</td></tr>
        
        <tr>
          <td>
          <input disabled="disabled" name="sudf5" value="<?php echo $this->session->userdata('so_name'); ?>" />
          <input  type="hidden" name="udf5" value="<?php echo $this->session->userdata('so_name'); ?>" />
          
          
          </td>
          <td>
          <input disabled="disabled" name="sudf6" value="<?php echo $this->session->userdata('addressid'); ?>" /></td>
          <input  type="hidden" name="udf6" value="<?php echo $this->session->userdata('addressid'); ?>" />
          </tr>
          <tr><td>Amount</td><td>Email</td></tr>
          <tr><td>
           <input disabled="disabled" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />
           <input  type="hidden" name="amount" id="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />
           
           </td>
           
          <td>
          <input disabled="disabled" name="semail" id="semail" value="<?php echo $this->session->userdata('email'); ?>" />
          <input type="hidden"  name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" />
          
          </td></tr> 
			  <?php 
			   }?>
               
     <tr><td colspan="2">
     <div >
      <p>
       <input checked="checked" type="radio" style="margin:8px;" name="select" value="debitcard" id="dcpay">Debit Cart
      <input   style="margin:8px;" type="radio" value="creditcard" name="select" id="ccpay">Credit Cart
      <input  style="margin:8px;" type="radio" name="select"  value="netbanking" id="netbankpay">Net Banking 
      
      <br />
      </p>
          </div></td></tr>
          
      <tr>
      <td>
            <h5>Convenience Charge </h5></td><td><h5>Total Amount</h5></td></tr>
      <tr><td>      
            <input disabled="disabled"  type="text" id="Convenience" name="Convenience" value="<?php echo $this->session->userdata('fpcon_amt'); ?>" /></td><td><input disabled="disabled"  type="text" id="totalamount" name="totalamount" value="<?php echo $this->session->userdata('fpamount'); ?>" />
            </td></tr>

      
      </td>
      
      <td></td>
      
      </tr>    
        
        
	<tr>
          <td> </td>
          <td><input  type="hidden" name="phone" value="x1234567890" style="padding: 0px ! important;" />
                  <input type="hidden" name="surl" value="<?php echo $this->session->userdata('surl') ?>" size="64" />
        <input type="hidden" name="furl" value="<?php echo $this->session->userdata('furl') ?>" size="64" />
       <input type="hidden" name="cid" value="<?php echo $this->session->userdata('cid') ?>" id="cid" />

       <input type="hidden" name="lastname" id="lastname" value="lastname" />
       <input type="hidden" name="firstname" id="firstname" value="firstname" />   
     <input type="hidden" name="productinfo" value="Bill Pay" size="64" />
     <input type="hidden" id="udf1" name="udf1" value="<?php echo $this->session->userdata('udf1') ?>" />
     <input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />     <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />      <input type="hidden" name="codurl" value="<?php echo (empty($posted['codurl'])) ? '' : $posted['codurl']; ?>" /><input type="hidden" name="touturl" value="<?php echo (empty($posted['touturl'])) ? '' : $posted['touturl']; ?>" /><input type="hidden" name="drop_category" value="<?php echo (empty($posted['drop_category'])) ? '' : $posted['drop_category']; ?>" /><input type="hidden" name="custom_note" value="<?php echo (empty($posted['custom_note'])) ? '' : $posted['custom_note']; ?>" /><input type="hidden" name="note_category" value="<?php echo (empty($posted['note_category'])) ? '' : $posted['note_category']; ?>" />
     <input type="hidden" name="enforce_paymethod" id="enforce_paymethod" value="<?php echo $this->session->userdata('carttypepay');  ?>" />
     </td>
        </tr>
<?php if($this->session->userdata('userid')!=NULL)
     {?>
        <tr><td><div id="addpropertyonpayment" ><input onclick="addproperty(<?php echo $this->session->userdata('udf1'); ?>)" type="checkbox" id="addproperty" name="addproperty" />&nbsp;&nbsp;Add this property</div></td></tr>
        
        <?php } ?>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Confirm" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
               <?php  


			  
	  
	  ?>
      </div>
    </div>
      
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>