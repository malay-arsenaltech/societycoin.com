<?php $this->load->view('admin/header');

if($this->session->userdata('utype') == 1)
$backurl =  base_url().'admin?act=tact';
else
$backurl =  base_url().'admin/login/dashboard';

 ?>
<style>
#id-form td {padding:0 0 32px;}

#content .select_sub {
    float: right !important;
    padding: 0 19px 0 0;
    width: 445px;
}

#content .select_sub ul li {
    float: left;
    list-style-type: none;
    margin: 0 10px;
}
</style>
<script>
function goBack() {
    window.location.href="<?php   echo $backurl;   ?>";
}
</script>
<div class="clear"></div>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Payment Details</h1>
    </div>
    <!-- end page-heading -->
	<div class="select_sub show" style=" margin-bottom: 20px; ;  width: 479px;">
			<ul class="sub" style="margin:15px 25px 0 0; float:right">
				<li class="sub_show">
				<a href="javascript:void(0);" onclick="goBack();"  class="btnb">Back</a>
				</li>
                                             
          
			</ul>
		</div>
 <table border="0" width="100%"  style="font-size:12px;" cellpadding="0" cellspacing="0" id="content-table">

     <tr>
        <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
      </tr>
	      <tr>
        <td id="tbl-border-left"></td>
        <td style="float:left;" ><!--  start content-table-inner ...................................................................... START -->
         
 <table id="id-form" class="table table-bordered">
     

        <tr>    <td><strong>Customer Name</strong></td><td>:</td><td><?php echo (isset($data['firstname'])) ? $data['firstname']  : "";?> <?php echo (isset($data['lastname'])) ? $data['lastname'] : "" ;?></td>

      </tr> <tr> <td><strong>Email</strong></td><td>:</td><td><?php echo (isset($data['email'])) ? $data['email']   :  ""   ;?></td>     </tr>
 <tr><td><strong>Phone</strong></td><td>:</td><td><?php echo (isset($data['phone'])) ? $data['phone']   : "" ; ?></td></tr>             

 <tr><td><strong>Society Name</strong></td><td>:</td><td><?php echo (isset($data['societyname'])) ? $data['societyname']  :  "" ;?></td> </tr>
<tr><td><strong>Property Address</strong></td><td>:</td><td><?php echo (isset($data['baddress']))  ? $data['baddress']    :  ""  ;?></td>                  

</tr><tr><td><strong>Pay Amount</strong></td><td>:</td><td><?php echo (isset($data['amount'])) ?  $data['amount']   :  "" ;?></td>                          
 </tr>   <tr>    <td><strong>Status</strong></td><td>:</td><td><?php echo (isset($data['status'])) ? $data['status']    :  ""  ;?></td> </tr>
 <tr>    <td><strong>Tranction Mode</strong></td><td>:</td><td><?php echo (isset($data['mode'])) ? $data['mode']   : "" ;?></td>  </tr>
 <tr>    <td><strong>Tranction Date</strong></td><td>:</td><td><?php echo (isset($data['addedon'])) ? date('l jS \of F Y h:i:s A',strtotime($data['addedon'])): "" ; ?></td>
</tr>  <tr> <td><strong>mihpayid</strong></td><td>:</td><td><?php echo (isset($data['mihpayid'])) ?  $data['mihpayid']  :  "" ;?></td>
                         
 </tr> <tr> <td><strong>Txnid</strong></td><td>:</td><td><?php echo (isset($data['txnid'])) ? $data['txnid']    :  "" ;?></td>  </tr>

 <tr>   <td><strong>Productinfo</strong></td><td>:</td><td><?php echo (isset($data['productinfo']))  ? $data['productinfo']    :  ""  ;?></td>          </tr>
  <tr>         <td><strong>PG TYPE</strong></td><td>:</td><td><?php echo (isset($data['PG_TYPE']))  ?  $data['PG_TYPE']   :  "" ;?></td>
                
 </tr>        <tr>   <td><strong>Bank Ref Num</strong></td><td>:</td><td><?php echo (isset($data['bank_ref_num'])) ? $data['bank_ref_num']    : "" ;?></td>
                      

 </tr> <tr>     <td><strong>Cardnum</strong></td><td>:</td><td><?php echo (isset($data['cardnum'])) ? $data['cardnum']   :  ""  ;?></td>                      
 </tr>
   <tr>  <td><strong>Payment Description</strong></td><td>:</td><td><?php echo (isset($data['custom_note'])) ?  $data['custom_note']   :   "" ;?></td>          </tr>
 

  

    
 </table>
     
          <!--  end content-table-inner ............................................END  --></td>
        <td id="tbl-border-right"></td>
      </tr>
      <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
      </tr>
    </table>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
<?php $this->load->view('admin/footer'); ?>