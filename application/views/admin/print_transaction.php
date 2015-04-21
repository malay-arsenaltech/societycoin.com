<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SocietyCoin.com</title>
<style>
@media print {
#id-form td {padding:0 0 16px; }
body{  background: #fff;
   font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;
    line-height: 1.4;
    margin: 0 auto;
    padding: 0;
	text-transform: capitalize;
	}
	
}
@media screen {

#id-form td {padding:0 0 16px; }
body{  background: #fff;
   font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;
    line-height: 1.4;
    margin: 0 auto;
    padding: 0;
	text-transform: capitalize;
	}
	



}

</style></head>
<body onLoad="self.print()">
<div class="clear"></div>
<div id="content-outer">
  <!-- start content -->
  <div id="content" style="margin-left:20px;">
  <div id="logo"  style="margin-left:8px;"><img src="<?php echo base_url(); ?>front/images/society-coin-logo-white.png" alt="society coin logo"></div>


    <div id="page-heading">
      <h1>Payment Details</h1>
    </div>

 <table border="0" width="100%"   cellpadding="0" cellspacing="0" id="content-table">


	      <tr>
      
        <td style="float:left;" ><!--  start content-table-inner ...................................................................... START -->
         
 <table id="id-form" class="table table-bordered">
        <tr>    <td><strong>Customer Name</strong></td><td>:</td><td><?php echo $data['firstname']?> <?php echo $data['lastname']?></td>

      </tr> <tr> <td><strong>Email</strong></td><td>:</td><td><?php echo $data['email']?></td>     </tr>
 <tr><td><strong>Phone</strong></td><td>:</td><td><?php echo $data['phone']?></td></tr>             

 <tr><td><strong>Society Name</strong></td><td>:</td><td><?php echo $data['societyname']?></td> </tr>
<tr><td><strong>Property Address</strong></td><td>:</td><td><?php echo $data['baddress']?></td>                  

</tr><tr><td><strong>Pay Amount</strong></td><td>:</td><td><?php echo $data['amount']?></td>                          
 </tr>   <tr>    <td><strong>Status</strong></td><td>:</td><td><?php echo $data['status']?></td> </tr>
 <tr>    <td><strong>Tranction Mode</strong></td><td>:</td><td><?php echo $data['mode']?></td>
 <tr>    <td><strong>Tranction Date</strong></td><td>:</td><td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['addedon'])); ?></td>
</tr>  <tr> <td><strong>mihpayid</strong></td><td>:</td><td><?php echo $data['mihpayid']?></td>
                         
 </tr> <tr> <td><strong>Txnid</strong></td><td>:</td><td><?php echo $data['txnid']?></td>  </tr>

 <tr>   <td><strong>Productinfo</strong></td><td>:</td><td><?php echo $data['productinfo']?></td>          </tr>
  <tr>         <td><strong>PG TYPE</strong></td><td>:</td><td><?php echo $data['PG_TYPE']?></td>
                
 </tr>        <tr>   <td><strong>Bank Ref Num</strong></td><td>:</td><td><?php echo $data['bank_ref_num']?></td>
                      

 </tr> <tr>     <td><strong>Cardnum</strong></td><td>:</td><td><?php echo $data['cardnum']?></td>                      
 </tr>

  
  </tr>
    
 </table>
     
        </td>
      
      </tr>
      <tr>
        <th class="sized bottomleft"></th>
       
        <th class="sized bottomright"></th>
      </tr>
    </table>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
</body></html>