<?php $this->load->view('header'); 

//echo '<pre>';  print_r($cart); exit();

?>
<script type="text/javascript">
function contactus()
{



	var carttype=jQuery("#carttype").val(); 
	var cardprocessor1=jQuery("#cardprocessor1").val(); 
	var cardissuingbank=jQuery("#cardissuingbank").val(); 
	var nameoncard=jQuery("#nameoncard").val(); 
	var validthru=jQuery("#validthru").val(); 
	var cartno=jQuery("#cartno").val(); 
	
	
	
	
	
 	
	var error='';
	

	if(carttype=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#carttype").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#carttype").removeClass('inp-form-error');
	   }
	
	

	if(cardprocessor1=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#cardprocessor1").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#cardprocessor1").removeClass('inp-form-error');
	   }

	   if(cardissuingbank=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#cardissuingbank").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#cardissuingbank").removeClass('inp-form-error');
	   }
	   
	   if(nameoncard=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#nameoncard").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#nameoncard").removeClass('inp-form-error');
	   }
	   
	   
	   
	    if(validthru=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#validthru").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#validthru").removeClass('inp-form-error');
	   }
	   
	   
	    if(isNaN(cartno))
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#cartno").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#cartno").removeClass('inp-form-error');
	   }
	   
if(error!='')
	{
	jQuery("#error").show();
	jQuery("#error").html(error);
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
        <div class="main-form" style="float:left; height:auto; margin-top:-8px;">
                 
           <?php if(@$_REQUEST['cid']==0)
		      {?>
              <h3>Add New Cart</h3>
				            <form id="contact" name="contact" onsubmit="return contactus()" method="post" action="<?php echo base_url();?>user/updatecart" >
          <label>Card Type (Debit/Credit Card)</label>
          <select  id="carttype" name="carttype" >
          <option  value="">Select Cart Type</option>
          <option   value="Debit">Debit</option>
          <option   value="Credit">Credit</option>
          </select>
          <label>Card Processor (Visa/MasterCard)</label>
          <input id="cardprocessor1" name="cardprocessor1" type="text" />
          <label>Card Issuing Bank</label>
          <input id="cardissuingbank" name="cardissuingbank" type="text" />
          <label>Name on Card</label>
          <input id="nameoncard" name="nameoncard" type="text" />
          <label>Valid Thru</label>
          <input id="validthru" name="validthru" type="text" />
          <label>Card No</label>
          <input id="cartno" name="cartno" type="text" />
          <input name="payment" class="msgsend" type="submit"  style="margin-top:0px;" value="Add">
          </form>
				 <?php  
				  }else
			     {?>              <h3>Edit Cart</h3>
          <form id="contact" name="contact" onsubmit="return contactus()" method="post" action="<?php echo base_url();?>user/updatecart" >
          <label>Card Type (Debit/Credit Card)</label>
          <select  id="carttype" name="carttype" >
          <option  value="">Select Cart Type</option>
          <option <?php if($cart['carttype']=='Debit'){ echo 'selected="selected"'; } ?>    value="Debit">Debit</option>
          <option <?php if($cart['carttype']=='Credit'){ echo 'selected="selected"'; } ?>  value="Credit">Credit</option>
          </select>
          <label>Card Processor (Visa/MasterCard)</label>
          <input id="cardprocessor1" name="cardprocessor1" type="text" value="<?php echo $cart['cardprocessor1']?>" />
          <label>Card Issuing Bank</label>
          <input id="cardissuingbank" name="cardissuingbank" type="text" value="<?php echo $cart['cardissuingbank']?>" />
          <label>Name on Card</label>
          <input id="nameoncard" name="nameoncard" type="text" value="<?php echo $cart['nameoncard']?>" />
          <label>Valid Thru</label>
          <input id="validthru" name="validthru" type="text" value="<?php echo $cart['validthru']?>" />
          <label>Card No</label>
          <input id="cartno" name="cartno" type="text" value="<?php echo $cart['cartno']?>" />
          <input type="hidden" id="id" name="id" value="<?php echo $cart['id']?>" />
          <input name="payment" class="msgsend" type="submit"  style="margin-top:0px;" value="Sent">
          </form>                 
                 <?php } ?>
        </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>