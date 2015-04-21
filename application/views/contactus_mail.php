<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>contact us</title>
</head>

<body>

<table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size: 15px;font-family: Arial;color: #000000;">
  <tr>
    <td><img src="<?php  echo frontThemeUrl ?>email/welcome.jpg" alt="" width="600" height="109" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td></tr>  
  <tr>
    <td>
	
	 <strong>Name:</strong> <?php echo $this->input->post('name'); ?><br></td></tr><tr><td>&nbsp;</td></tr>
      <tr>	
    <td>  	 <strong> E-mail: 	 </strong><?php echo $this->input->post('email'); ?><br></td></tr>
	<tr><td>&nbsp;</td></tr>
       <tr>
    <td>  	 <strong>Mobile Number:	 </strong> <?php echo  $this->input->post('mobile');  ?><br></td></tr>
     	<tr><td>&nbsp;</td></tr>
	 <tr>
    <td> 	 <strong>Message:	 </strong>  <?php echo $this->input->post('message'); ?></td></tr>
    
    <td>
      <p style="color:#F60"> <br />
        <br />
      <strong>Thanks!</strong></p>
      <p style="color:#F60"><strong>The SocietyCoin.com Team</strong></p>
      <p style="color:#F60"><a href="http://www.societycoin.com" target="_blank" style="color:#F60;">www.societycoin.com</a></p>
      <p style="color:#F60"><strong>Email: Support@societycoin.com</strong></p>
    <p style="color:#F60"><strong>( customer service Phone number)</strong></p></td>
  </tr>
  <tr>
  <td><img src="<?php  echo frontThemeUrl ?>email/SocietyCoin-logo.png" align="left" width="150" height="128" alt="" title="www.societycoin.com" /></td></tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>