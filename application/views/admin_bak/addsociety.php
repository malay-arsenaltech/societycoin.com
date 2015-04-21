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
	  id=$('#countryid').val();
	  url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"states"},function (data)		{ 	$('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	  id=$('#stateid').val();
	  url='<?php echo base_url();?>admin/master/getcity';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#cityid').html(data); 	});				

	  	  
  } 
  
function  getarea()
  {

	  id=$('#cityid').val();
	  url='<?php echo base_url();?>admin/master/getarea';
	  
	  $.post(url,{"id":id,"action":"area"},function (data)		{ 
													 														 $('#areaid').html(data); 	});				

	  	  
  } 

 
 
 

function validateform()
{



	var countryid=jQuery("#countryid").val(); 
	var stateid=jQuery("#stateid").val(); 
	var cityid=jQuery("#cityid").val(); 
	var areaid=jQuery("#areaid").val(); 
	var chargehead=jQuery("#chargehead").val(); 	
	
	
	
	var society_title=jQuery("#society_title").val(); 
	
	
	
	var address=jQuery("#address").val(); 	
	
	var so_name=jQuery("#so_name").val(); 		
	var so_email=jQuery("#so_email").val(); 		
	var so_password=jQuery("#so_password").val(); 		
	var so_mobile=jQuery("#so_mobile").val(); 		
	
	var dccamt=jQuery("#dccamt").val(); 		
	var dccamtp=jQuery("#dccamtp").val(); 	
	
	
	if(dccamt!='' || dccamtp!='')
	 {
 		 if(isNaN(dccamt))
		  {
			  jQuery("#dccamt").css("border","1px solid red");
			  alert('Enter only Numeric Value'); return false;
              
			  }else if(isNaN(dccamtp))
		       {
			    alert('Enter only Numeric Value'); 
				 jQuery("#dccamtp").css("border","1px solid red"); return false;
			     }else
				    {
    				 jQuery("#dccamtp").css("border","1px solid #BFCEDC");
	                 jQuery("#dccamt").css("border","1px solid #BFCEDC");

						}
         
		 }else {
			 jQuery("#dccamtp").css("border","1px solid #BFCEDC");
		    jQuery("#dccamt").css("border","1px solid #BFCEDC");
			 
			 }
	
	var cccamt=jQuery("#cccamt").val(); 		
	var cccamtp=jQuery("#cccamtp").val(); 
	
	if(cccamt!='' || cccamtp!='')
	 {
 		 if(isNaN(cccamt))
		  {
			  jQuery("#cccamt").css("border","1px solid red");
			  alert('Enter only Numeric Value'); return false;
              
			  }else if(isNaN(cccamtp))
		       {
			    alert('Enter only Numeric Value'); 
				 jQuery("#dccamtp").css("border","1px solid red"); return false;
			     }else {
			 jQuery("#cccamt").css("border","1px solid #BFCEDC");
		    jQuery("#cccamtp").css("border","1px solid #BFCEDC");
			 
			 }
         
		 }else {
			 jQuery("#cccamt").css("border","1px solid #BFCEDC");
		    jQuery("#cccamtp").css("border","1px solid #BFCEDC");
			 
			 }
	
	
	var nbcamt=jQuery("#nbcamt").val(); 		
	var nbamtp=jQuery("#nbamtp").val(); 	
	
	if(nbcamt!='' || nbamtp!='')
	 {
 		 if(isNaN(nbcamt))
		  {
			  jQuery("#nbcamt").css("border","1px solid red");
			  alert('Enter only Numeric Value'); return false;
              
			  }else if(isNaN(nbamtp))
		       {
			    alert('Enter only Numeric Value'); 
				 jQuery("#nbamtp").css("border","1px solid red"); return false;
			     }else {
			 jQuery("#nbcamt").css("border","1px solid #BFCEDC");
		    jQuery("#nbamtp").css("border","1px solid #BFCEDC");
			 
			 }
        
		 }else {
			 jQuery("#nbcamt").css("border","1px solid #BFCEDC");
		    jQuery("#nbamtp").css("border","1px solid #BFCEDC");
			 
			 }
	
	
	
	
	var emicamt=jQuery("#emicamt").val(); 		
	var emicamtp=jQuery("#emicamtp").val(); 
	
	if(emicamt!='' || emicamtp!='')
	 {
 		 if(isNaN(emicamt))
		  {
			  jQuery("#emicamt").css("border","1px solid red");
			  alert('Enter only Numeric Value'); return false;
              
			  }else if(isNaN(emicamtp))
		       {
			    alert('Enter only Numeric Value'); 
				 jQuery("#emicamtp").css("border","1px solid red"); return false;
			     }else {
			 jQuery("#emicamt").css("border","1px solid #BFCEDC");
		    jQuery("#emicamtp").css("border","1px solid #BFCEDC");
			 
			 }
         
		 }else {
			 jQuery("#emicamt").css("border","1px solid #BFCEDC");
		    jQuery("#emicamtp").css("border","1px solid #BFCEDC");
			 
			 }
	
	
	var caccamt=jQuery("#caccamt").val(); 		
	var caccamtp=jQuery("#caccamtp").val(); 	
	
    if(caccamt!='' || caccamtp!='')
	 {
 		 if(isNaN(caccamt))
		  {
			  jQuery("#caccamt").css("border","1px solid red");
			  alert('Enter only Numeric Value'); return false;
              
			  }else if(isNaN(caccamtp))
		       {
			    alert('Enter only Numeric Value'); 
				 jQuery("#caccamtp").css("border","1px solid red"); return false;
			     }else {
			 jQuery("#caccamt").css("border","1px solid #BFCEDC");
		    jQuery("#caccamtp").css("border","1px solid #BFCEDC");
			 
			 }
        
		 }else {
			 jQuery("#caccamt").css("border","1px solid #BFCEDC");
		    jQuery("#caccamtp").css("border","1px solid #BFCEDC");
			 
			 }

	
		 
	
	
		
	
	
var error='';
if(countryid=='' || countryid=='Select Country')
  {
	error+="* Please select Socity Admin";
  	$("#countryid").addClass('inp-form-error');
	 }else
	   {
   	$("#countryid").removeClass('inp-form-error');
	   }
	   if(stateid=='' || stateid=='Select State')
  {
	error+="* Please select Socity Admin";
  	$("#stateid").addClass('inp-form-error');
	 }else
	   {
   	$("#stateid").removeClass('inp-form-error');
	   }


	   if(cityid=='' || cityid=='Select City')
  {
	error+="* Please select Socity Admin";
  	$("#cityid").addClass('inp-form-error');
	 }else
	   {
   	$("#cityid").removeClass('inp-form-error');
	   }
	   

	 if(areaid=='' || areaid=='Select Area / Sector')
  {
	error+="* Please select Socity Admin";
  	$("#areaid").addClass('inp-form-error');
	 }else
	   {
   	$("#areaid").removeClass('inp-form-error');
	   }
	   
	    if(chargehead==null)
  {
	error+="* Please select Socity Admin";
  	$("#chargehead").addClass('select-from-error');
	 }else
	   {
   	$("#chargehead").removeClass('select-from-error');
	   }
	   
	   
	   if(address=='')
  {
	error+="* Please select Socity Admin";
  	$("#address").addClass('textarea-error');
	 }else
	   {
   	$("#address").removeClass('textarea-error');
	   }
	   
	   
	   
	   if(so_name=='')
  {
	error+="* Please select Socity Admin";
  	$("#so_name").addClass('inp-form-error');
	 }else
	   {
   	$("#so_name").removeClass('inp-form-error');
	   }



	   if(so_email=='')
  {
	error+="* Please select Socity Admin";
  	$("#so_email").addClass('inp-form-error');
	 }else
	   {
   	$("#so_email").removeClass('inp-form-error');
	   }


   /*if(so_password=='')
  {
	error+="* Please select Socity Admin";
  	$("#so_password").addClass('inp-form-error');
	 }else
	   {
   	$("#so_password").removeClass('inp-form-error');
	   }
	   
	   */


   if(so_mobile=='')
  {
	error+="* Please select Socity Admin";
  	$("#so_mobile").addClass('inp-form-error');
	 }else
	   {
   	$("#so_mobile").removeClass('inp-form-error');
	   }

 if(society_title=='')
  {
	error+="* Please select Socity Admin";
  	$("#society_title").addClass('inp-form-error');
	 }else
	   {
   	$("#society_title").removeClass('inp-form-error');
	   }


	   

	   
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>ADD New Society</h1>
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
		  <form  id="addnewsocity" name="addnewsocity" method="post" onsubmit="return validateform()" action="<?php echo base_url();?>admin/allsociety/new_process" >
            	<table id="id-form" class="table table-bordered">
				<thead>
					
                     <tr>
                  <th><label>Country</label></th>
                  <th>
                  <select id="countryid" name="countryid" onchange="getstates(this.id)"  >
                  <option>Select Country</option>
                  <?php foreach($allcountry as $allcountry)
				     {
						 ?>
                         
                         
                         <option value="<?php echo $allcountry['id']?>" ><?php echo $allcountry['countryname']?></option>
                         
						 
						<?php }?>
                 </select>
                    
                    
                    </th> <th rowspan="4" ><hr /><label>Convenience Charge </label><br/>
                 
                 <table style="text-align:center; border-bottom:1px groove; border-top:1px solid;" >
                 <tr><th width="20%" ><label>Card Name </label></th><th width="20%" ><label>Fixed Amount</label></th><th width="5%"></th><th width="25%" ><label>Amount in %</label></th></tr>
                 
                 <tr><td><label>Debit Card  </label></td><td><input id="dccamt" name="dccamt" style="width:124px;"  value="<?php echo @$condata['debit_fa']; ?>" type="text" /></td><td><label>+</label> </td><td><input id="dccamtp" name="dccamtp" style="width:50px;"  value="<?php echo @$condata['debit_pa']; ?>" type="text" /><label>%</label></td></tr>
                 
                 <tr><td><label>Credit Card  </label></td><td><input id="cccamt" name="cccamt" style="width:124px;"  value="<?php echo @$condata['credit_fa']; ?>" type="text" /></td><td><label>+</label> </td><td><input id="cccamtp" name="cccamtp" style="width:50px;"  value="<?php echo @$condata['credit_pa']; ?>" type="text" /><label>%</label></td></tr>
                 
                                  
                 <tr><td><label>Net Banking  </label></td><td><input id="nbcamt" name="nbcamt" style="width:124px;"  value="<?php echo @$condata['netbanking_fa']; ?>" type="text" /></td><td><label>+</label> </td><td><input id="nbamtp" name="nbamtp" style="width:50px;"  value="<?php echo @$condata['netbanking_pa']; ?>" type="text" /><label>%</label></td></tr>
                 

                 <tr><td><label>emi </label></td><td><input id="emicamt" name="emicamt" style="width:124px;"  value="<?php echo @$condata['emi_fa']; ?>" type="text" /></td><td><label>+</label> </td><td><input id="emicamtp" name="emicamtp" style="width:50px;"  value="<?php echo @$condata['emi_pa']; ?>" type="text" /><label>%</label></td></tr>
                 
                 <tr><td><label>Cash Card </label></td><td><input id="caccamt" name="caccamt" style="width:124px;"  value="<?php echo @$condata['cashcard_fa']; ?>" type="text" /></td><td><label>+</label> </td><td><input id="caccamtp" name="caccamtp" style="width:50px;"  value="<?php echo @$condata['cashcard_pa']; ?>" type="text" /><label>%</label></td></tr>
                 <tr><td colspan="4"></td></tr>
                 
                 
                 </table>

                                    
                 </th>
                </tr>
                <tr>
                  <th><label>State</label></th>
                  <th>
                  <select id="stateid" name="stateid" onblur="getcity()" >
                  <option>Select State</option>
                 </select>
                    
                    
                    </th>
                    
                  
                </tr>
                
                <tr>
                  <th><label>City</label></th>
                  <th>
                  <select id="cityid"  name="cityid" onblur="getarea()" >
                  <option>Select City</option>
                 </select>
                    
                    
                    </th>
                </tr>
                
                
                <tr>
                  <th><label>Area / Sector</label></th>
                  <th>
                  <select id="areaid" name="areaid" >
                  <option>Select Area/Sector</option>
                 </select>
                    
                    
                    </th>
                </tr>
                <tr>    
				    	<th><label>Address</label></th><th><textarea name="address" maxlength="50" id="address" style="width: 254px; height: 96px;"></textarea></th>
                    	

                <th rowspan="4"><label>Select Char Head</label><br />

                    <select style="height:180px;" multiple="multiple" id="chargehead" name="chargehead[]">
                     <?php foreach($bills as $bill)
					   {
						   ?>
						   <option value="<?php echo $bill['id'] ?>"><?php echo $bill['bill_name']; ?></option>
						   <?php }?>
                     
                     
                     
                     </select> </th>
					</tr>
                   
                    <tr>    
				    	<th ><label>Enter Society Name</label></th><th><input class="inp-form" maxlength="30" type="text" id="society_title" name="society_title" /></th>
                                        
					</tr>
                    <tr><th colspan="2"><label>Contact Person Details</label></th></tr>
                     <tr>    
				    	<th ><label>Name</label></th><th><input class="inp-form" maxlength="30" type="text" id="so_name" name="so_name" /></th>
                                        
					</tr>
                     <tr>    
				    	<th ><label>Email</label></th><th><input class="inp-form" type="email" maxlength="30" id="so_email" name="so_email" /></th>
                                        
					</tr>
                     <tr>    
				    	<th ><label>Mobile Number</label></th><th><input class="inp-form" maxlength="15" type="text" id="so_mobile" name="so_mobile" /></th>
                                        
					</tr>
                    
                    
                    
                    
                    
                     
		           
		           <tr>    
				    	<th>&nbsp;</th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add New User" />&nbsp;<input class="form-reset" type="reset" value="Reset" />
                         <input type="hidden" id="status" name="status" value="1"/>
                         <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
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