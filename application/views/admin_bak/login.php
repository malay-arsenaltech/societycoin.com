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

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 <!-- Start: login-holder -->
<div id="login-holder">
	<!-- start logo -->
	<div style="margin-top:40px;" >
		<a href="<?php echo base_url();?>admin"><img src="<?php echo AdminThemeUrl; ?>images/shared/society-coin-logo-white.png" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>

	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<!--  start login-inner -->
	<div id="login-inner">

    <form id="loginform" name="loginform" action="<?php echo base_url(); ?>admin/login/user" method="post" >

		<table border="0" cellpadding="0" cellspacing="0">
        <tr><th>&nbsp;</th><td>              <?php if(@$_REQUEST['msg']!=NULL){?> <font color=red>Invalid username and password.</font><br />            <?php } ?></td></tr>
		<tr>
			<th>Email</th>
			<td><input type="text" id="username" name="username"  class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" id="password" name="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top">&nbsp;</td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  /></td>
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
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
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