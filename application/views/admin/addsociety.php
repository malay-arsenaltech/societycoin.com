<?php $this->load->view('admin/header'); ?>

<style type="text/css">
#id-form th {
    line-height: 28px;
    min-width: 130px;
    padding: 10px;
    text-align: left;
    width: 284px;
}
</style>
 <div class="clear"></div>
 <script type="text/javascript">
 function getstates()
  {
	var  id=$('#countryid').val();
	  var url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"states"},function (data)		{ 	$('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	 var id=$('#stateid').val();
	 var url='<?php echo base_url();?>admin/master/getcity';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)	{
	  $('#cityidtd').html(data); 	});				

	  	  
  } 
  


 
 $(document).ready(function () {
 
 $( "#cityid" ).live('change',function() {
  var id=$('#cityid').val();
	 var url='<?php echo base_url();?>admin/master/getarea';
	  
	  $.post(url,{"id":id,"action":"area"},function (data){ 
		 $('#areaidtd').html(data); 	});	
 
});
    $('#addnewsocity').validate({ // initialize the plugin
        rules: {
            so_email: {
                required: true,
                email: true
            },
			 stateid: {
                required: true
               
            },
			 cityid: {
                required: true
               
            },
			 areaid: {
                required: true
               
            },
			 address: {
                required: true
               
            },
			 society_title: {
                required: true
               
            },
			so_name: {
                required: true
               
            },
			so_mobile: {
                required: true,
               number:true,
			  minlength: 10,
			  maxlength: 10
            },
			so_name: {
                required: true
               
            }
			
        }
    });

});
 




</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add New Society</h1>
		<br />
		<?php 
   
   $msg_error = $this->session->flashdata('msg_error'); 
   
   if($msg_error !=''){ ?>             
   <div id="message-green">

				<table  cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo  $msg_error; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>
</div>
<?php } ?>
   <?php 
   
   $msg_error_red = $this->session->flashdata('msg_error_red'); 
   
   if($msg_error_red !=''){ ?> 
<div id="message-red">
				<table border="0" width="35%" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td class="red-left"><?php echo $msg_error_red;  ?> </td>
					<td class="red-right"><a class="close-red"><img src="<?php echo AdminThemeUrl; ?>images/table/icon_close_red.gif" alt=""></a></td>
				</tr>
				</tbody></table>
				</div>

<?php } ?>
		
		
	</div>
	<!-- end page-heading -->

    <div style=" display:none;" id="error1"></div>                        

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/allsociety/new_process" >
		   <input type="hidden"   id="countryid" name="countryid" value="1"  > 	<input type="hidden"  name="chargehead[]"   value=""  >
         <table id="id-form" class="table table-bordered">
		<thead>					
         <tr>
		
		 
		 
                  <th>State</th>
                  <td>
                  <select id="stateid" name="stateid" onchange="getcity();" >
                 <option value="">Select State</option>
				                   <?php 
				foreach($states as $state)
				     {
						 ?>
						 <option value="<?php echo $state['id']?>" ><?php echo $state['state']?></option>
                        <?php } ?> 
                 </select>
                    
                    
                    </td>
                    
                  
                
                <th rowspan="4" ><hr /><label>Convenience Charge </label><br/>
                 
                 <table style="text-align:center; border-bottom:1px groove; border-top:1px solid;" >
                 <tr><th width="20%" ><label>Card Name </label></th><th width="20%" ><label>Fixed Amount</label></th><th width="5%"></th><th width="25%" ><label>Amount in %</label></th></tr>
                 
                 <tr><td><label>Debit Card  </label></td>
				 <td><input id="dccamt" name="dccamt" style="width:124px;"  value="<?php echo @$condata['debit_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="dccamtp" name="dccamtp" style="width:50px;"  value="<?php echo @$condata['debit_pa']; ?>" type="text" ><label>%</label></td></tr>
                 
                 <tr><td><label>Credit Card  </label></td>
				 <td><input id="cccamt" name="cccamt" style="width:124px;"  value="<?php echo @$condata['credit_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="cccamtp" name="cccamtp" style="width:50px;"  value="<?php echo @$condata['credit_pa']; ?>" type="text" ><label>%</label></td></tr>
                 
                                  
                 <tr><td><label>Net Banking  </label></td>
				 <td><input id="nbcamt" name="nbcamt" style="width:124px;"  value="<?php echo @$condata['netbanking_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="nbamtp" name="nbamtp" style="width:50px;"  value="<?php echo @$condata['netbanking_pa']; ?>" type="text" ><label>%</label></td></tr>
                 

                 <tr><td><label>emi </label></td><td><input id="emicamt" name="emicamt" style="width:124px;"  value="<?php echo @$condata['emi_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="emicamtp" name="emicamtp" style="width:50px;"  value="<?php echo @$condata['emi_pa']; ?>" type="text" ><label>%</label></td></tr>
                 
                 <tr><td><label>Cash Card </label></td>
				 <td><input id="caccamt" name="caccamt" style="width:124px;"  value="<?php echo @$condata['cashcard_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="caccamtp" name="caccamtp" style="width:50px;"  value="<?php echo @$condata['cashcard_pa']; ?>" type="text" ><label>%</label></td></tr>
                 <tr><td colspan="4"></td></tr>
                 
                 
                 </table>

                                    
                 </th>
                </tr>
               
                
                <tr>
                  <th>City</th>
                  <td id="cityidtd">
                  <select id="cityid"  name="cityid"  >
                 <option value="">Select City</option>
                 </select>
                    
                    
                    </td>
                </tr>
                
                
                <tr>
                  <th>Area / Sector</th>
                  <td id="areaidtd">
                  <select id="areaid" name="areaid" >
                  <option>Select Area/Sector</option>
                 </select>
                    
                    
                    </td>
                </tr>
              

                    <tr>    
				    	<th >Enter Society Name</th><td><input class="inp-form" maxlength="30" type="text" id="society_title" name="society_title" ></td>
                                        
					</tr>				
			  <tr>   <th>Address</th><td><textarea name="address" maxlength="50" id="address" value="" style="width: 254px; height: 96px;"></textarea></td></tr>
		
			
			        <tr>   <th>Billing cycle date</th><td>
					<select id="billing_cycle_date" name="billing_cycle_date" ><option value="">Select Date</option>
					<?php for ($i = 1; $i <= 31; $i++) { 
            
            echo '<option value="'. $i .'">'. $i .'</option>';
        }
		?>
					</select></td>
			</tr>
		
                   
                    <tr><th colspan="2"><label><u>Contact Person Details</u></label></th></tr>
                     <tr>    
				    	<th>Name</th><td><input class="inp-form" maxlength="30" type="text" id="so_name" name="so_name" ></td>
                                        
					</tr>
                     <tr>    
				    	<th >Email</th><td><input class="inp-form" type="text" maxlength="30" id="so_email" name="so_email" ></td>
                                        
					</tr>
										  			

                     <tr>    
				    	<th >Mobile Number</th><td><input class="inp-form" maxlength="15" type="text" id="so_mobile" name="so_mobile" ></td>
                                        
					</tr> 
                    
                    
                    
                    
                    
                     
		           
		           <tr>    
				    	<th>&nbsp;</th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add New User" >&nbsp;<input class="form-reset" type="reset" value="Reset" >
                         <input type="hidden" id="status" name="status" value="1">
                         <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" >
                         </th>
                
					</tr>
		          
				</thead>
			
				
			</table>
            
            </form>
		<!--  end content-table-inner ............................................END  -->
		</td>
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