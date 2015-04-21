<?php 

//echo '<pre>'; 		print_r($society);		exit();
$this->load->view('header'); ?>
<script type="text/javascript">
function getaddress()
  {
	  id=jQuery('#societyid').val();
	  
	  alert(id);
	  
	  udf5=jQuery("#societyid option:selected").text();
	  
	  document.getElementById('udf5').value=udf5;


	  url='<?php echo base_url();?>admin/master/getaddressforguest';
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
	   jQuery('#addressid').html(data); 	});				
	  }
/*	  
function getbill()
  {
	  id=jQuery('#addressid').val();
	  
 	  udf6=jQuery("#addressid option:selected").text();
	  
	  document.getElementById('udf6').value=udf6;
	  

	  
	  document.getElementById('udf1').value=id;


	  
	  url='<?php echo base_url();?>admin/master/getbill';
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
														  

	   jQuery('#billid').html(data); 
	   });				
	  }*/
	  
	  
	  
function getbillamountguest()
  {
	  
   	 id=jQuery('#addressid').val();
	  
 	 udf6=jQuery("#addressid option:selected").text();
	  
	  document.getElementById('udf6').value=udf6;
	  

	  
	  document.getElementById('udf1').value=id;

      document.getElementById('udf3').value=id;
   
   
   
   
   

	  
	  url='<?php echo base_url();?>admin/master/getbillamountguest';
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
														  
//alert(data);
	   jQuery('#amount').replaceWith(data); 
	   });				
	  }
	  
	  


	 function updatesprofile()
{



	
	var societyid=jQuery("#societyid").val(); 
	var addressid=jQuery("#addressid").val(); 	
//	var billid=jQuery("#billid").val(); 
	var amount=jQuery("#amount").val(); 
		
	
var error='';
	   if(addressid=='')
  {
	error+="* Please select Socity Admin";
  	jQuery("#addressid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#addressid").removeClass('inp-form-error');
	   }
	   
	   
	   
	   if(societyid=='')
  {
	error+="* Please select Socity Admin";
  	jQuery("#societyid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#societyid").removeClass('inp-form-error');
	   }


	 /*  if(billid=='')
  {
	error+="* Please select Socity Admin";
  	jQuery("#billid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#billid").removeClass('inp-form-error');
	   }
	   
	   */
	   
	   if(isNaN(amount))
  {
	error+="* Please select Socity Admin";
  	jQuery("#amount").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#amount").removeClass('inp-form-error');
	   }


	 
  
	   if(error!='')
	{
		//alert(error);
		return false;
	}
	return true; 
}
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
      <div class="form" style="margin-top:0px !important;">
      
      <?php if(@$_REQUEST['msg']==7)
		      {
				    $societycoin= new societycoin;
             echo '<div class="main-form">';   
          	  echo $societycoin->msg(@$_REQUEST['msg']);
			 
			  echo "<a href=".base_url().">Click here for another bill payment</a>";
			  echo '</div>';
             
				  }else
			     {?>
      
      <form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>home/plogin" >
        <div class="main-form">
          <p>Make Payment </p>
          <label>Residential Complex</label>
          <select name="societyid" id="societyid" onchange="getaddress()" >
          <option value="">Select Society</option>
          <?php foreach($society as $society)
		      {
				 echo '<option value='.$society['id'].'>'.$society['society_title'].'</a>';
				  
				  }?>
          
          </select>
          <label>Address</label>
          <select id="addressid"  name="addressid" onchange="getbillamountguest()" ><option value="">Select Address</option></select>
          
        <!--  <label>Pay for bill</label>
          <select id="billid"  name="billid" onchange="getbillamountguest()" ><option value="">Select Bill</option></select> -->
          
          <label>Amount</label>
          <input id="amount" name="amount" type="text">
           <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" />
          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" /> 
          <input type="hidden" id="curl" name="curl" value="<?php echo base_url();?>property/cancelpayment" />           
          
          <input type="hidden" id="udf5" name="udf5" value="" />
          <input type="hidden" id="udf6" name="udf6" value="" />
          <input type="hidden" id="udf4" name="udf4" value="" />
           <input type="hidden" id="udf1" name="udf1" value="" />
          <input type="hidden" id="udf2" name="udf2" value="<?php echo $this->session->userdata('userid'); ?>" />
          <input type="hidden" id="udf3" name="udf3" value="" />
          <input name="payment" style="width:274px; margin:6px 22px 22px 22px;" type="submit" value="Make payment">
        </div>
        
        </form>
        
        <?php } ?>
      </div>
      <!--form//-->
      <div class="text">
        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>
        <p>Welcome to <a style="color:#B8B8B8; text-decoration:underline;" href="http://societycoin.com/">SocietyCoin.com!&nbsp;</a><br />
We're a fast and easy way to  make payments for your gated communities online. Simply fill in the form to get started!
</p>
      </div>
      <!--text-->
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>