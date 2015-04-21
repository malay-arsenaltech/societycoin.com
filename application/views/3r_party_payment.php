<?php

//echo '<pre>'; print_r($data); exit();

$this->load->view('header'); 

?>

<script type="text/javascript">

function getaddress1()
  {
	  
	var societyid=jQuery("#societyid").val(); 
	
	  window.location.href="<?php echo base_url();?>user/IIIrd_party_payment?soid="+societyid;
	  
	  }
 function getallvalue()
   {
	  var societyid=jQuery("#societyid").val(); 

      var addressid=jQuery("#addressid").val(); 
	
	    pname=jQuery('#addressid option:selected').text();

        sname=jQuery('#societyid option:selected').text();
		
		document.getElementById('societyname').value=sname;
		document.getElementById('addressname').value=pname;
		
	   
	   }

 function getaddress()

  {

	var  id=jQuery('#societyid').val();

	  var url='<?php echo base_url();?>property/getaddress';

	  jQuery.post(url,{"id":id},function (data)		{ 

	   jQuery('#addressid').html(data); 	});				

	  }
	  
	   $(document).ready(function () {
 
 $.validator.addMethod('fNamealpha', 
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
	
 
jQuery.validator.addMethod("mynumber", function (value, element) {
    return    this.optional(element) || /^[0-9]+$/i.test(value);
}, "Please enter valid amount");
	
    $('#contact').validate({ // initialize the plugin
        rules: {
           
            name: {
                required: true,
				fNamealpha: true,
				maxlength: 25
               
            },
			 email: {
                required: true,
               email:true
            },
			
			 societyid: {
                required: true
               
            },
			 addressid: {
                required: true
               
            },	
						
			 amount: {
               required: true,
			minlength: 3,
			mynumber:true
               
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

        <div class="main-form" id="party_payment_form" style="float:left; height:auto; margin-top:-8px;">

                                 

           <?php if(@$_REQUEST['msg']==5)

		      {

				   // $societycoin= new societycoin;



//          	  echo $societycoin->msg(@$_REQUEST['msg']);

             echo '<p style="line-height: 34px; padding: 0px; margin-left: 10px;">Your Payment Request has been sent to email  ('.@$_REQUEST['email'].'),<br/> The payment request will expire in 72 hours.</p>';

                  

				  }else

			     {?>

                    <p>Request For payment</p>

          <form id="contact" name="contact"  method="post" action="<?php echo base_url();?>user/send" >
         <label>Society</label>

          <select  id="societyid" name="societyid" onchange="getaddress();"> 

          <option value="">Select Society</option>

          <?php foreach($society as $data)

		         {

					 ?>

                     <option    value="<?php echo $data['id']?>"><?php echo $data['society_title']?></option>

                     <?php

					 

					 }

		       ?>

          </select>
          <label>Property</label>
          <select  id="addressid" name="addressid" >
         

        
          </select>

          <label>Name</label>

          <input id="name" name="name"  size="25" type="text">

          <label>Email Address</label>

          <input id="email1" name="email" type="text" />

       
          <label>Amount</label>

          <input id="amount" name="amount" type="text">
         <label> <?php echo $math_captcha_question;?> </label>
			<?php echo form_input('math_captcha');?>

          
          <input name="payment" class="msgsend" type="submit"  style="margin-top:0px;" value="Send a payment Request">

          </form>                 

                 <?php } ?>

        </div>

        

        <div id="part_text" class="text" >

        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>

        <?php ?>

        <p>

Want to send your bill to someone else? This feature allows you to send your bill to anyone willing to pay

</p>

      </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>