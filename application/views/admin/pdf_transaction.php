<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAHRZEUGDETAILS</title>
<style>

body{  background: #fff;
   font-family:Arial, Helvetica, sans-serif;
    font-size: 1em;
    line-height: 1.4;
    margin: 0 auto;
    padding: 0;
	text-transform: capitalize;
	}

</style></head>
<body onLoad="self.print()">
<div id="content-outer">
  <!-- start content -->
  <div id="content">
  <div id="logo"><img src="front/images/society-coin-logo-white.png" alt="society coin logo"></div>
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Payment Details</h1>
    </div>

       
 <table id="id-form" class="table table-bordered" width="100%">
        <tr>    <td><strong>Customer Name</strong></td><td>:</td><td><?php echo (isset($data['firstname'])) ? $data['firstname']  : "";?> <?php echo (isset($data['lastname'])) ? $data['lastname'] : "" ;?></td></tr>
		<tr> <td><strong>Email</strong></td><td>:</td><td><?php echo (isset($data['email'])) ? $data['email']   :  ""   ;?></td>     </tr>
 <tr><td><strong>Phone</strong></td><td>:</td><td><?php echo (isset($data['phone'])) ? $data['phone']   : "" ; ?></td></tr>             

 <tr><td><strong>Society Name</strong></td><td>:</td><td><?php echo (isset($data['societyname'])) ? $data['societyname']  :  "" ;?></td> </tr>
<tr><td><strong>Property Address</strong></td><td>:</td><td><?php echo (isset($data['baddress']))  ? $data['baddress']    :  ""  ;?></td></tr>
<tr><td><strong>Pay Amount</strong></td><td>:</td><td><?php echo (isset($data['amount'])) ?  $data['amount']   :  "" ;?></td>  </tr>  
 <tr>    <td><strong>Status</strong></td><td>:</td><td><?php echo (isset($data['status'])) ? $data['status']    :  ""  ;?></td> </tr>
 <tr>    <td><strong>Tranction Mode</strong></td><td>:</td><td><?php echo (isset($data['mode'])) ? $data['mode']   : "" ;?></td>  </tr>
 <tr>    <td><strong>Tranction Date</strong></td><td>:</td><td><?php echo (isset($data['addedon'])) ? date('l jS \of F Y h:i:s A',strtotime($data['addedon'])): "" ; ?></td></tr> 
 <tr> <td><strong>mihpayid</strong></td><td>:</td><td><?php echo (isset($data['mihpayid'])) ?  $data['mihpayid']  :  "" ;?></td> </tr> 
 <tr> <td><strong>Txnid</strong></td><td>:</td><td><?php echo (isset($data['txnid'])) ? $data['txnid']    :  "" ;?></td>  </tr>

 <tr>   <td><strong>Productinfo</strong></td><td>:</td><td><?php echo (isset($data['productinfo']))  ? $data['productinfo']    :  ""  ;?></td> </tr>
  <tr> <td><strong>PG TYPE</strong></td><td>:</td><td><?php echo (isset($data['PG_TYPE']))  ?  $data['PG_TYPE']   :  "" ;?></td></tr>
  <tr>   <td><strong>Bank Ref Num</strong></td><td>:</td><td><?php echo (isset($data['bank_ref_num'])) ? $data['bank_ref_num']    : "" ;?></td> </tr>
 <tr>     <td><strong>Cardnum</strong></td><td>:</td><td><?php echo (isset($data['cardnum'])) ? $data['cardnum']   :  ""  ;?></td>  </tr>
   <tr>  <td><strong>Payment Description</strong></td><td>:</td><td><?php echo (isset($data['custom_note'])) ?  $data['custom_note']   :   "" ;?></td>          </tr>
 
    
 </table>   
  
   
  </div>
  <!--  end content -->
  
</div>

</body></html>