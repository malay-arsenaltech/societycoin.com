<?php $this->load->view('header'); ?>
<!--mid-portion--><script type="text/javascript">
function contactus()
{



	var name=jQuery("#name").val(); 
	var email1=jQuery("#email1").val(); 
	var mobile=jQuery("#mobile").val(); 
	var message=jQuery("#message").val(); 
	
	
 	
	var error='';
	
	
	if(name=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#name").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#name").removeClass('inp-form-error');
	   }
	
	

	if(email1=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#email1").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#email1").removeClass('inp-form-error');
	   }
//alert(mobile);
	   if(isNaN(mobile) || mobile=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#mobile").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#mobile").removeClass('inp-form-error');
	   }
	   
	   if(message=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     jQuery("#message").addClass('textarea-error');
	 }else
	   {
   	jQuery("#message").removeClass('textarea-error');
	   }
	   
if(error!='')
	{
	jQuery("#error").show();
	jQuery("#error").html(error);
	return false;
	}
	return false;	
}
</script>
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
                  <p>Customer Care</p>
                  
           <?php if(@$_REQUEST['msg']==9)
		      {
				    $societycoin= new societycoin;

          	  echo $societycoin->msg(@$_REQUEST['msg']);
				  }else
			     {?>
          <form id="contact" name="contact" onsubmit="return contactus()" method="post" action="<?php echo base_url();?>home/csend" >
          <label>Name</label>
          <input id="name" name="name" type="text">
          <label>Email Address</label>
          <input id="email1" name="email" type="text" />
          <label>Mobile Number</label>
          <input id="mobile" name="mobile" type="text">
          <label>Comment Box</label>
          <textarea id="message" name="message" style="margin-left: 22px; width:260px; height: 80px;"></textarea>
          <input name="payment" class="msgsend" type="submit"  style="margin-top:0px;" value="Send">
          </form>                 
                 <?php } ?>
        </div>
    
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>