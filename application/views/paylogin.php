<?php 

$this->load->view('header'); ?>

<script type="text/javascript">

function validateform1()

{



	var username1=document.getElementById("pusername").value; 

	var password2=jQuery("#ppassword1").val(); 



		

		

	var error='';

	

	if(username1=='')

	 {

	error+="&amp;lt;p&amp;gt;* Please enter your last name.&amp;lt;/p&amp;gt;\n";

	 $("#pusername").addClass('inp-form-error');

	 }

	 else

	   {

   	$("#pusername").removeClass('inp-form-error');

	   }

	   

	    if(password2=='')

	 {

	error+="&amp;lt;p&amp;gt;* Please enter your company name.&amp;lt;/p&amp;gt;\n";

	 $("#ppassword1").addClass('inp-form-error');

	 }

	 else

	   {

   	$("#ppassword1").removeClass('inp-form-error');

	   }

		

if(error!='')

	{

	$("#error").show();

	$("#error").html(error);

	return false;

	}

	return true; 

}



function validateemail()

 {

var x=document.forms["gloginform"]["email"].value;

var atpos=x.indexOf("@");

var dotpos=x.lastIndexOf(".");

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)

  {

  alert("You have entered an invalid email address.");

  return false;

  }

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

<div class="tab_wrap">

    	<ul>

        	<li><a href="#"><img style="width:731px;" src="<?php echo frontThemeUrl; ?>images/email-login.png" /></a></li>

        </ul>

         <div class="containerpay  containerpay_mob" style="height:280px; width:600px;">

    <?php if(@$this->session->userdata('userid')!=NULL)

	    {?><p>Continue for payment</p>

          <form id="loginform" action="<?php echo base_url();?>property/payment" method="post">  

    <input type="submit" id="ulogin" name="ulogin" value="Continue" /> 

    </form>



        <?php }else

		  {?>

        <!--  <script type="text/javascript" >

		  $(document).ready(function () {

		      $('#payguest').click(function () {

																	  

				$('#guest').show();										  

				$('#payloginu').hide();										  

																	  

		    	}); 

			$('#Payaslog').click(function () {

			

			$('#guest').hide();										  

			$('#payloginu').show();										  

			

			}); 



			  

			  

											

		});



		  </script>

          <div class="condiradio"><h4><input checked="checked" style="margin:10px;" type="radio" name="select" id="payguest">GUEST USER

<input type="radio" style="margin:10px;" name="select" id="Payaslog">LOGIN USER</h4>

          </div> -->



    <div class="payloginpage_mob" style="display: block; width: 250px; float: left;" id="payloginu">

   

    <h4>Login User</h4> 

  <form  id="loginform" action="<?php echo base_url();?>home/login" onsubmit="return validateform1()"  method="post">

          <label>Email</label>

          <input type="text" id="pusername" name="pusername">

          <label>Password</label>

          <input type="password" id="ppassword1" name="ppassword1">

          <input type="hidden" id="task" name="task" value="payment" /><br />



          <button style="margin-left:0px; width:218px;"  class="login-close" type="submit">Login</button>

         </form>

         </div>
		 
		         <div  id="guest" class="guestlogin_mob" style="display: block; width: 250px; float: right;">

    <h4>Guest User </h4>

  <form id="gloginform" name="gloginform" onsubmit="return validateemail()" action="<?php echo base_url();?>property/payment" method="post">  

            <label>Email*</label>

          <input type="text" id="email" name="email"><br />



        <input class="login-close" style="width:218px; margin-left:0px;" type="submit" id="ulogin" name="ulogin" value="Guest User" /> 

    </form>

    </div>
         <div class="clearfix"></div>

         <?php } ?>

           </div>

    </div>

   

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>























 



