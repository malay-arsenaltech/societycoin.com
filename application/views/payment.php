<?php $this->load->view('header'); 
 $society_title = (isset($sdata['society_title'] ) ) ?    $sdata['society_title']  : "";		
$address = (isset($pdata['address'] ) ) ?   $pdata['address']  : "";
		

?>

<script>
var sname="<?php   echo  $society_title; ?>";
var propertyname="<?php  echo $address ;  ?>";
</script>

<script src="<?php echo base_url();  ?>js/jquery.easy-confirm-dialog.js"></script>
<script type="text/javascript">

jQuery(document).ready(function () {

								 

    jQuery('#ccpay').click(function () 

     { 

   var cid=jQuery('#cid').val();

   var amount=jQuery('#samount').val();

   	var type=jQuery('#ccpay').val();

	

	var url='<?php echo base_url(); ?>property/Convenience';

	

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

	var url='<?php echo base_url(); ?>property/Convenience';	

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

	var url='<?php echo base_url(); ?>property/Convenience';	

   jQuery.post(url,{"cid":cid,"action": type,"amount":amount},function (data) {																		

    var json = data,    obj = JSON.parse(json);       

	   	document.getElementById('Convenience').value=obj.con;

		document.getElementById('totalamount').value=obj.totalamt;

		    	document.getElementById('amount').value=obj.totalamt;

				document.getElementById('enforce_paymethod').value=obj.carttypepay;

    }); 								  

    });

});

$(document).ready(function() {


$.validator.addMethod('phoneNumber', 

	function (value, element) 

	{

		var name=$('#phone').val();

		var NUMBERALL = "0123456789";

		//alert(name.length);

		for (var index = name.length - 1; index >= 0; --index) 

		{

        	if (NUMBERALL.indexOf(name.substring(index, index + 1)) < 0) 

			{

            return false;

        	}

    	}

    	return true;

	},'Please enter valid mobile number');


$("#payuForm").validate({

    rules: {

			phone:{
				required:true,
				phoneNumber:true,
				minlength: 10,
				maxlength: 10

			}

   },
 

   messages: {
				phone:{
				required:"Please enter phone number",
				phoneNumber:"Please enter valid mobile number"
			}
   },
   submitHandler: function(form) {
         jConfirm('Please Confirm Below Society Details', 'Confirm Payment', function(r)

				{

					if(r == true){				

					form.submit();
				

					}


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

    <div class="right">

        <?php $this->load->view('menu'); ?>

      <!--form-->

      <div class="tab_wrap">

    	<ul>

        	<li><a href="<?php echo base_url();?>home/plogin"><img style="width:731px;" src="<?php echo frontThemeUrl; ?>images/order-summery.png" /></a></li>

        </ul>

        

         <div class="payment payment_mob" style="margin-top:0px !important; margin-left:33px;">

 <?php

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

  if(empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount'])  || empty($posted['firstname'])
 || empty($posted['email'])  || empty($posted['phone']) || empty($posted['productinfo'])   || empty($posted['surl'])          || empty($posted['furl'])  ) 

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

    <form action="<?php  echo base_url(); ?>property/payment_confirm" method="post" name="payuForm" id="payuForm">

      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />

      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>

      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

      <input type="hidden" name="curl" id="curl" value="<?php echo (empty($posted['curl'])) ? '' : $posted['curl']; ?>" />

      <table class="payordertable" id="paymenttable" width="100%" >

        <tr>

        </tr>

        <?php 
		
		
		
		if(@$this->session->userdata('userid')==NULL)

		   {

	 ?>
		<tr>         <td>Email</td>  

          <td>

          <input disabled="disabled" name="semail" id="semail" value="<?php echo $this->session->userdata('email'); ?>" />

          <input type="hidden"  name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" />

          

          </td></tr>
		     
			 
			 <tr><td>Mobile Number(mandatory)</td><td>
			 
			 
		  <input  type="text" name="phone" id="phone" value=""  class="required" style="padding: 0px ! important;" />
		  </td>

    </tr>
		  
		  
        <tr><td>Residential Complex</td>      <td>

          <input disabled="disabled" name="sudf5" value="<?php echo $society_title; ?>" />

          <input  type="hidden" name="udf5" value="<?php echo $society_title; ?>" />
                   

          </td>

    </tr><tr>      

          <td>Flat No.</td>

          <td>

          <input disabled="disabled" name="sudf6" value="<?php echo $address ; ?>" /></td>

          <input  type="hidden" name="udf6" value="<?php echo $this->session->userdata('addressid'); ?>" />
		  <input  type="hidden" name="ulogin" value="Guest User" />

          </tr>

          <tr><td>Amount</td>

         <td>

           <input disabled="disabled" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />

           <input  type="hidden" id="amount" name="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />

           

           </td>

         </tr>


         <?php } else

		   {
			   ?>
      <tr>  <td>Email</td>

          <td><input disabled="disabled" name="semail" id="semail" value="<?php echo $this->session->userdata('email'); ?>" />

          <input type="hidden"  name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" />  </td></tr> 
		  
		  
		   <tr><td>Mobile Number(mandatory)</td><td>
			 
			 
		  <input  type="text" name="phone" id="phone" value="<?php echo $this->session->userdata('phone') ?>"  class="required" style="padding: 0px ! important;" />
		  </td>

    </tr>
		  
		  
        <tr><td>Residential Complex</td>
          <td><input disabled="disabled" name="sudf5" value="<?php echo  $society_title; ?>" />
          <input  type="hidden" name="udf5" value="<?php echo  $society_title; ?>" />
          </td>

          </tr>
          <tr><td>Flat No.</td>
          <td> <input disabled="disabled" name="sudf6" value="<?php echo $address; ?>" />
          <input  type="hidden" name="udf6" value="<?php echo  $address; ?>" />

          </td>

          </tr>

          <tr><td>Amount</td>

           <td> <input disabled="disabled" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />

           <input  type="hidden" name="amount" id="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />          

           </td></tr>    
			
			  <?php 

			   }?>   

      <tr>
	  
	  <tr>
	  <td>Payment Method:</td>

  <td>

        	

            <ul>

                <li class="debit-card"><input class="css-checkbox" checked="checked" type="radio" name="select" value="debitcard" id="dcpay"> 

        <label for="dcpay" class="css-label">Debit Card</label>

                </li>

                <li class="credit-card"><input class="css-checkbox"   type="radio" value="creditcard" name="select" id="ccpay">

        <label for="ccpay" class="css-label">Credit Card</label>

                </li>

                <li class="net-bank"><input class="css-checkbox"  type="radio" name="select"  value="netbanking" id="netbankpay"> <label for="netbankpay" class="css-label">Net Banking</label>

                </li>

                </ul>

            </td>
	  
	  </tr>
	  

      <td>

            Convenience Charge</td>

            <td>      

            <input disabled="disabled"  type="text" id="Convenience" name="Convenience" value="<?php echo $this->session->userdata('fpcon_amt'); ?>" /></td>

            </tr>

<tr>            <td>Total Amount</td>

            <td><input disabled="disabled"  type="text" id="totalamount" name="totalamount" value="<?php echo $this->session->userdata('fpamount'); ?>" />

            </td></tr>

            

            



      <td></td>

      

      </tr> 



<tr><td colspan="2">

   <!--  <div class="process" >

     <h6>Select a Payment Method:</h6>

      <p>

       <input checked="checked" type="radio" style="margin:8px;" name="select" value="debitcard" id="dcpay">Debit Cart

      <input   style="margin:8px;" type="radio" value="creditcard" name="select" id="ccpay">Credit Cart

      <input  style="margin:8px;" type="radio" name="select"  value="netbanking" id="netbankpay">Net Banking 

      

      <br />

      </p>

          </div> -->

          

          <div class="process">

                  

        

        <div class="clr"></div>

        </div>

          

          </td>

          

          

          </tr>       

          <tr>

           <?php if(!$hash) { ?>

            <td colspan="4"><input class="paymentbutton" style="font-size: 0; height: 72px !important;  margin-left: 276px;   position: relative;  width: 253px;" type="submit" value="Confirm" /></td>

          <?php } ?>

          </tr> 

        

	<tr>

          <td> </td>

          <td>

		   <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" />

          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" />         
		

       <input type="hidden" name="cid" value="<?php echo $this->session->userdata('cid') ?>" id="cid" />
	   

       <input type="hidden" name="lastname" id="lastname" value="<?php echo $this->session->userdata('lname') ?>" />
<?php
 $fname='';
if($this->session->userdata('userid') != NULL || $this->session->userdata('fname')!=''){
 $fname1 = trim($this->session->userdata('fname'));
$email_address = $this->session->userdata('email');
	$fname = ($fname1 !='') ? $fname1 :   strtolower(substr($email_address, 0, strripos($email_address, "@")))  ;
}
 
else {
$email_address = @$posted['email'];
$fname = strtolower(substr($email_address, 0, strripos($email_address, "@")));

}
?>
       <input type="hidden" name="firstname" id="firstname" value="<?php echo $fname; ?>" />   

     <input type="hidden" name="productinfo" value="Bill Pay" size="64" />

     <input type="hidden" id="udf1" name="udf1" value="<?php echo $this->session->userdata('addressid') ?>" />

     <input type="hidden" name="udf2" value="<?php echo $pdata['address']; ?>" />
     <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
	 <input type="hidden" name="codurl" value="<?php echo (empty($posted['codurl'])) ? '' : $posted['codurl']; ?>" />
	 <input type="hidden" name="touturl" value="<?php echo (empty($posted['touturl'])) ? '' : $posted['touturl']; ?>" />
	 <input type="hidden" name="drop_category" value="<?php echo (empty($posted['drop_category'])) ? '' : $posted['drop_category']; ?>" />
	 <input type="hidden" name="custom_note" id="payment_description" value="" />
	 <input type="hidden" name="note_category" value="<?php echo (empty($posted['note_category'])) ? '' : $posted['note_category']; ?>" />

     <input type="hidden" name="enforce_paymethod" id="enforce_paymethod" value="<?php echo $this->session->userdata('carttypepay');  ?>" />

     </td>

        </tr>

<?php /* if($this->session->userdata('userid')!=NULL)

     { ?>

        <tr><td><div id="addpropertyonpayment" ><input onclick="addproperty(<?php echo $this->session->userdata('udf1'); ?>)" type="checkbox" id="addproperty" name="addproperty" />&nbsp;&nbsp;Add this property</div></td></tr>

        

        <?php } */  ?>

       

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



<script>
  $(document).ready(function() {
/*  $(".paymentbutton").on('click',function(e){ 
  e.preventDefault();
  jConfirm('Please Confirm Below Society Details', 'Confirm Payment', function(r)

				{

					if(r == true){
				

					$("#payuForm").submit();
				

					}


				});

   }); 
   */
 
 }); 

  




</script>
<style>
#popup_container {max-width:550px !important}

</style>

    <?php $this->load->view('footer'); ?>