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
			
			society_name:{
			required:true,			
			maxlength:100
			},
			
						
			message:{
			required:true,		
			maxlength:250
			}
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

        <div class="main-form recoment-form" style="float:left;width:371px; height:auto; margin-top:-8px;">
		<div id="form-center">

                  <p></p>

                  

           <?php if(@$_REQUEST['msg']==8)

		      {

				    $societycoin= new societycoin;



          	  echo $societycoin->msg(@$_REQUEST['msg']);

				  }else

			     {?>

          <form id="contact" name="contact"  method="post" action="<?php echo base_url();?>home/recommendsend" >
			<label>Housing Society Name</label>
          <input id="society_name" name="society_name" type="text" size="100">
          <label>Contact Person IN RWA</label>
          <input id="name" name="name" type="text">

          <label>RWA Office Phone Number</label>

          <input id="mobile" name="mobile" type="text" />

           <label>RWA official email</label>

          <input id="email" name="email" type="text" />		  
		 	

          <input id="address" name="address" type="hidden">		  
		  
          <label>Your Name and Address within the Housing Society</label>

          <textarea id="message" name="message" style="margin-left: 22px; width:260px; height: 80px;"></textarea>
			 
			 <label> <?php echo $math_captcha_question;?> </label>
			<?php echo form_input('math_captcha');?>

          <input name="payment" class="msgsend" type="Send a payment Request"  style="margin-top:0px;" value="Submit">

          </form>                 

                 <?php } ?>
				 </div>

        </div>

        

        <div class="text recomend">

        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>

        <?php ?>

        <p>Your recommendation goes a long way in helping us at SocietyCoin. Join our online gateway for easy access to your bills. Your first step is to fill out this form and we will do our best to get your society on board

</p>

      </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>