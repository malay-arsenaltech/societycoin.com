<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Society Coin</title>
<link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?php echo AdminThemeUrl; ?>js/jquery/custom_jquery.js" type="text/javascript"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/jquery.validate.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});



	$(document).ready(function()

	{							 

		$(window).load( function () {

				$("#innermsg").fadeOut(5000);

		}).end();

	});






$().ready(function() {



		$("#loginform").validate({

			rules:

			{ 

				username:

				{

						required:true
						


				},

				password:

				{

						required:true



				}

				

		},



			messages: 

			{

				username:

				{

						required:"Please enter  your login id"
						
				},

				

				password:

				{

						required:"Please enter your password"



				}

				

			},

			 

	});



});


</script>
</head>
<style>
#login-inner {line-height:1px;}
#login-inner label {padding-left: 6px;}
#login-inner label.error {color:#8b0300; }
</style>
<body id="login-bg"> 
 <!-- Start: login-holder -->
<div id="login-holder">
	<!-- start logo -->
	<div style="margin-top:40px;" >
		<!--<a href="<?php echo base_url();?>admin"><img src="<?php echo AdminThemeUrl; ?>images/shared/society-coin-logo-white.png" alt="" /></a>-->
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>


	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
   <h1 style="margin: -33px 0px 27px 57px;">Admin Login</h1>
   
    <p><?php  $msg_error = $this->session->flashdata('msg_error');    if($msg_error !=''){ ?>	<font style="margin-left:194px;margin-bottom:13px;" id="innermsg" color='red'><?php echo $msg_error ; ?></font> 	<?php } ?></p>
	<!--  start login-inner -->
	<div id="login-inner">


    <form id="loginform" name="loginform" action="<?php echo base_url(); ?>admin/login/user" method="post"  autocomplete="off" >

		<table border="0" cellpadding="0" cellspacing="0">
    
		<tr>
			<th>Username</th>
			<td><input type="text" id="username" name="username" value="" class="login-inp"   ></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" id="password" name="password" value="" maxlength="15"    class="login-inp" ></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top">&nbsp;</td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  ></td>
		</tr>
		</table>
        </form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<!--<a href="" class="forgot-pwd">Forgot Password?</a> -->
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
        <form id="forgetpass" name="forgetpass" action="#" method="post">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" ></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  ></td>
		</tr>
		</table>
        </form>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>

</body>
</html>