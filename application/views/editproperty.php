<?php 
// echo '<pre>';  print_r($this->session->userdata); exit();


$this->load->view('header'); ?>

<script type="text/javascript">
 function get_billamount()
  {
	  
	  
	  id=jQuery('#bill_id').val();

      txt=jQuery("#bill_id option:selected").text();



	  document.getElementById('udf3').value=id;
 	  document.getElementById('productinfo').value=txt+' Bill';
   	  document.getElementById('udf4').value=txt;
	  
	  
	  url='<?php echo base_url();?>property/getbillamount';
	  
	  jQuery.post(url,{"id":id,"action":"states"},function (data)		{ 
															
												  jQuery('#amount').replaceWith(data); 	
	
	});				

	  	  
  } 



function updatesprofile()
{


	var amount=jQuery("#amount").val(); 
	
var error='';
   

	   if(amount=='')
  {
	error+="* Please select Socity Admin";
  	jQuery("#amount").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#amount").removeClass('inp-form-error');
	   }

 
  
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}</script>
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
<form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>home/plogin" >

        <div class="form">
        <div class="main-form">
        <p>Make Payment </p>
          <label>Society Name</label><input type="text" value="<?php echo $_REQUEST['proname']; ?>"/>
          <label>Property</label><input type="text" value="<?php echo $_REQUEST['proaddress']?>"/>
          <label>Amount</label>
          <input type="text" id="amount" name="amount" />
          <input type="hidden" id="email" name="email" value="<?php echo $this->session->userdata('email')?>" />
          <input type="hidden" id="firstname" name="firstname" value="<?php echo $this->session->userdata('fname')?>" />
          <input type="hidden" id="lastname" name="lastname" value="<?php echo $this->session->userdata('lname')?>" />          
          <input type="hidden" id="phone" name="phone" value="<?php echo $this->session->userdata('phone')?>" />
          <input type="hidden" id="productinfo" name="productinfo" value="" />
          <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" />
          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" /> 
          <input type="hidden" id="curl" name="curl" value="<?php echo base_url();?>property/cancelpayment" />           
          <input type="hidden" id="udf5" name="udf5" value="<?php echo @$_REQUEST['proname'] ?>" />
          <input type="hidden" id="udf6" name="udf6" value="<?php echo @$_REQUEST['proaddress'] ?>" />
          <input type="hidden" id="udf4" name="udf4" value="" />
          
          
          
          <input type="submit" style="margin:4px 0px 11px 25px;"  value="Make payment" name="payment">
          <input type="hidden" id="udf1" name="udf1" value="<?php echo @$_REQUEST['pid'] ?>" />
          <input type="hidden" id="udf2" name="udf2" value="<?php echo $this->session->userdata('userid'); ?>" />
          <input type="hidden" id="udf3" name="udf3" value="" />
          
        </div>
      </div>
        </form>   
    
	<div class="text">
        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>
        <?php ?>
        <p>Welcome to <a style="color:#B8B8B8; text-decoration:underline;" href="http://societycoin.com/">SocietyCoin.com!&nbsp;</a><br />
We're a fast and easy way to  make payments for your gated communities online. Simply fill in the form to get started!
</p>
      </div>
    
    </div>
     
     
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>