<?php $this->load->view('header'); ?>

<script type="text/javascript">

$(document).ready(function() {

$.validator.addMethod('lNamealpha', 
	function (value, element) 
	{
		var name=$('#name').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	

$.validator.addMethod('subjectf', 
	function (value, element) 
	{
		var name=$('#subject').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	



$("#contact").validate({

    rules: {
			name:{
				required:true,
				maxlength:25,
				lNamealpha:true
				
				},
			
			email:{
			required:true,
			email:true
			
			},
			mobile:{
			required:true,
			maxlength:10,	
			minlength:10,
			number:true
			},
						
			message:{
			required:true,		
			maxlength:250
			},
		math_captcha:{required:true}
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

        <div class="main-form" id="contact_form_mob"style="float:left; height:auto; margin-top:-8px;">
		<div id="form-center">

                  <p>Contact Us</p>

                  

           <?php if(@$_REQUEST['msg']==4)

		      {

				    echo '<p style="line-height: 34px; padding: 0px; margin-left: 10px;">Thank you for your feedback, We will get back to you if you require any assistance.</p>';

				  }else

			     {?>

          <form id="contact"  style="width:324px;" name="contact"  method="post" action="<?php echo base_url();?>home/send" >

          <label>Name</label>

          <input id="name" name="name" type="text" maxlength="25">

         
			<label>Mobile No</label>

           <input id="mobile" name="mobile" type="text" maxlength="11">


		 <label>Email Address</label>

          <input id="email1" name="email" type="text" />

          

          <label>Message</label>

          <textarea id="message" name="message" style="margin-left: 22px; width:260px; height: 80px;"></textarea>
		   <label> <?php echo $math_captcha_question;?> </label>
			<?php echo form_input('math_captcha');?>


          <input name="payment" class="msgsend" type="submit"  style="margin-top:0px;" value="Submit">
           <div class="contactus_text"> 
</div>
          </form> </div>                

                 <?php } ?>
				 

        </div>

        

        <div id="contactustex_mob"  style="background:none;" class="text">
       
<p>
 You can also reach out to us at
<label><strong>
<a href="mailto:care@societycoin.com"  style="color:#b8b8b8;" >care@societycoin.com</a></strong></label>
<label>
Or</label><label><strong> +91-9953585801, 91-9953585802</strong>
</label>
<label>
<strong>
TeraVentures Pvt. Ltd.</strong>
<strong>
2nd Floor, K-426 Opposite Metro Pillar No. 133, M G Road, Ghitorni, New Delhi-110030
</strong>
</label>
</p>

      </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>