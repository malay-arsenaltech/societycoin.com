<?php $this->load->view('header'); ?>

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


        

         <div class="payment payment_mob" style="margin-top:0px !important; margin-left:33px;">

<?php

$MERCHANT_KEY = "C0Dr8m";

$SALT = "3sf0jURk";

$PAYU_BASE_URL = "https://test.payu.in";
$action = '';

$posted = array();

if(!empty($_POST)) {
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





  <script>

    var hash = '<?php echo $hash ?>';

    function submitPayuForm() {

      if(hash == '') {

        return;

      }

      var payuForm = document.forms.payuForm;

	  payuForm.submit();

    }
//or when DOM is ready
$(document).ready(function(){
    submitPayuForm();
});
  </script>
 

    <form action="<?php   echo $action; ?>" method="post" name="payuForm" id="payuForm">

      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />

      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>

      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

      <input type="hidden" name="curl" id="curl" value="<?php echo (empty($posted['curl'])) ? '' : $posted['curl']; ?>" />

		
<div class="" style="background:none;text-align:center; margin-top: 90px;font-size: 16px;color:#b8b8b8;text-align: center;line-height: 26px">
	<p><img src="<?php echo base_url(); ?>images/ajax-loader.gif"      /></p>
  <p><strong>Please wait SocietyCoin is redirecting you to PayU. Thanks</strong></p> 
      </div>
        <?php 
		
		 $society_title = (isset($sdata['society_title'] ) ) ?    $sdata['society_title']  : "";
		
		 $address = (isset($pdata['address'] ) ) ?   $pdata['address']  : "";
		
		
		if(@$this->session->userdata('userid')==NULL)
		{

	 ?>


          <input type="hidden" name="sudf5" value="<?php echo $society_title; ?>" />

          <input  type="hidden" name="udf5" value="<?php echo $society_title; ?>" />

          <input type="hidden" name="sudf6" value="<?php echo $address ; ?>" /></td>

          <input  type="hidden" name="udf6" value="<?php echo $this->session->userdata('addressid'); ?>" />
		  <input  type="hidden" name="ulogin" value="Guest User" />  

           <input type="hidden" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />

           <input  type="hidden" id="amount" name="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />

           

		 <input  type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"  />

          <input type="hidden" name="semail" id="semail" value="<?php echo $this->session->userdata('email'); ?>" />

          <input type="hidden"  name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" />


         <?php } else
		   {

			   ?>
  <input  type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"  />

            <input type="hidden" name="semail" id="semail" value="<?php echo $this->session->userdata('email'); ?>" />

          <input type="hidden"  name="email" id="email" value="<?php echo $this->session->userdata('email'); ?>" />  
 
		<input type="hidden" name="sudf5" value="<?php echo  $society_title; ?>" />
          <input  type="hidden" name="udf5" value="<?php echo  $society_title; ?>" />
   
          <td> <input type="hidden" name="sudf6" value="<?php echo $address; ?>" />
          <input  type="hidden" name="udf6" value="<?php echo  $address; ?>" />
         <input type="hidden" id="samount" name="samount" value="<?php echo $this->session->userdata('amount'); ?>" />
           <input  type="hidden" name="amount" id="amount" value="<?php echo $this->session->userdata('fpamount'); ?>" />         
        

			  <?php 

			   }?>   


				<input type="hidden" name="select" value="debitcard" id="dcpay"> 

			  <input   type="hidden" value="creditcard" checked="checked" name="select" id="ccpay">

			  <input  type="hidden" name="select"  value="netbanking" id="netbankpay"> 
             
            <input type="hidden"  id="Convenience" name="Convenience" value="<?php echo $this->session->userdata('fpcon_amt'); ?>" />

           <input type="hidden"   id="totalamount" name="totalamount" value="<?php echo $this->session->userdata('fpamount'); ?>" />                   

        <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" /> 

          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" /> 

       <input type="hidden" name="cid" value="<?php echo $this->session->userdata('cid') ?>" id="cid" />

       <input type="hidden" name="lastname" id="lastname" value="<?php echo $this->session->userdata('lname') ?>" />

       <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ?  $this->session->userdata('fname') : $posted['firstname']; ?>" />   

     <input type="hidden" name="productinfo" value="Bill Pay" size="64" /> 

     <input type="hidden" id="udf1" name="udf1" value="<?php echo $this->session->userdata('addressid') ?>" />

     <input type="hidden" name="udf2" value="<?php echo $pdata['address']; ?>" />
     <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /> 
     <input type="hidden" name="codurl" value="<?php echo (empty($posted['codurl'])) ? '' : $posted['codurl']; ?>" />
	 <input type="hidden" name="touturl" value="<?php echo (empty($posted['touturl'])) ? '' : $posted['touturl']; ?>" />
	 <input type="hidden" name="drop_category" value="<?php echo (empty($posted['drop_category'])) ? '' : $posted['drop_category']; ?>" />
	 <input type="hidden" name="custom_note" value="<?php echo (empty($posted['custom_note'])) ? '' : $posted['custom_note']; ?>" />
	 <input type="hidden" name="note_category" value="<?php echo (empty($posted['note_category'])) ? '' : $posted['note_category']; ?>" />

     <input type="hidden" name="enforce_paymethod" id="enforce_paymethod" value="<?php echo $this->session->userdata('carttypepay');  ?>" />

    </form>

          

      </div>

    </div>

      

      <div class="clearfix"></div>

    </div>

  </div>

</div>


    <?php $this->load->view('footer'); ?>