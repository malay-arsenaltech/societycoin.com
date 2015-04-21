<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Recieved</title>
</head>

<body>
<table width="600" align="center" border="0" cellspacing="5" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td></tr>  
  <tr>
    <td><h2 style="font-family:Arial, Helvetica, sans-serif; color:#060; font-weight:normal;">Hello Admin !</h2>
      <p style="color:#060;"> <br />
        SocietyCoin.com has received a payment of <?php echo $this->session->userdata('fpamount'); ?>  <?php  $this->session->userdata('addressid') ?> &gt; on &lt;  <?php echo $this->input->post('addedon');?></p>
      <p> </p>
      <p style="color:#060;">The same payment had been posted to your account . Please notify us of any discrepancy on your end at our helpline number or email us.</p>
      <p style="color:#060;"> <br />
        Thanks!</p>
      <p style="color:#060;">SocietyCoin.com Team</p>
    <p style="color:#060;font-size:12px; font-style:italic">Copyright © 2015 societycoin, All rights reserved. </p>      <p style="color:#F60">&nbsp;</p></td>
  </tr>
  <tr>
  <td><img src="' . frontThemeUrl . 'email/SocietyCoin-logo.png" align="left" width="150" height="128" alt="" title="www.societycoin.com" /></td></tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>