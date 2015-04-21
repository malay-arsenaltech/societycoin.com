<?php $this->load->view('admin/header'); ?>
 <div class="clear"></div>
 <script type="text/javascript">
function valiate()
{


	var em=jQuery("#email").val();
	//var utype=jQuery("#utype").val(); 
	var name=jQuery("#name").val(); 
	var username=jQuery("#username").val(); 
	
	var password=jQuery("#password").val();
	var address=jQuery("#address").val(); 
	var city=jQuery("#city").val(); 
	
	var state=jQuery("#state").val(); 
	var country=jQuery("#country").val(); 
	
	
	
	var mobile=jQuery("#mobile").val(); 
	var mlan=mobile.length;
	

 	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var error='';
	
	
	if(name=='')
	 {
	error+="&lt;p&gt;* Please enter your last name.&lt;/p&gt;\n";
	 $("#name").addClass('inp-form-error');
	 }
	 else
	   {
   	$("#name").removeClass('inp-form-error');
	   }
	   
	   if(username=='')
	 {
	error+="&lt;p&gt;* Please enter your job title.&lt;/p&gt;\n";
	 $("#username").addClass('inp-form-error');
	 }
	 else
	   {
   	$("#username").removeClass('inp-form-error');
	   }
	   
	   
	    if(password=='')
	 {
	error+="&lt;p&gt;* Please enter your company name.&lt;/p&gt;\n";
	 $("#password").addClass('inp-form-error');
	 }
	 else
	   {
   	$("#password").removeClass('inp-form-error');
	   }
	   
	   


	if(mobile=='')
	 {
	error+="&lt;p&gt;* Please enter your mobile number.&lt;/p&gt;\n";
     $("#mobile").addClass('inp-form-error');
	 }else
	   {
   	$("#mobile").removeClass('inp-form-error');
	   }
	   
	  
	   
	   	 if(!reg.test(em))
	 {
	 	error+="&lt;p&gt;* Please enter a valid email address.&lt;/p&gt;\n"; 
		$("#email").addClass('inp-form-error');
	 }else
	   {
   	$("#email").removeClass('inp-form-error');
	   }
	   
	if(address=='')
	 {
	error+="&lt;p&gt;* Please enter your vacancy details.&lt;/p&gt;\n";
     $("#address").addClass('inp-form-error');
	 }else
	   {
   	$("#address").removeClass('inp-form-error');
	   }
	   
	   if(city=='')
	 {
	error+="&lt;p&gt;* Please enter your vacancy details.&lt;/p&gt;\n";
     $("#city").addClass('inp-form-error');
	 }else
	   {
   	$("#city").removeClass('inp-form-error');
	   }
	   
	   if(state=='')
	 {
	error+="&lt;p&gt;* Please enter your vacancy details.&lt;/p&gt;\n";
     $("#state").addClass('inp-form-error');
	 }else
	   {
   	$("#state").removeClass('inp-form-error');
	   }
	   
	      if(country=='')
	 {
	error+="&lt;p&gt;* Please enter your vacancy details.&lt;/p&gt;\n";
     $("#country").addClass('inp-form-error');
	 }else
	   {
   	$("#country").removeClass('inp-form-error');
	   }
	   
	   
	      if(state=='')
	 {
	error+="&lt;p&gt;* Please enter your vacancy details.&lt;/p&gt;\n";
     $("#state").addClass('inp-form-error');
	 }else
	   {
   	$("#state").removeClass('inp-form-error');
	   }
	

	
if(error!='')
	{
	$("#error").show();
	$("#error").html(error);
	return false;
	}
	return true;	
}
</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>ADD New Society Admin</h1>
	</div>
	<!-- end page-heading -->

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
		  <form  id="addnewsocity" name="addnewsocity" method="post" onsubmit="return valiate()" action="<?php echo base_url();?>admin/allusers/process" >
            	<table id="id-form" class="table table-bordered">
				<thead>
                <tr>
						<th><label style="display:none;">Select User Type</label></th>
                        <th><input type="hidden"   id="utype" name="utype" value="2" >
                             </th>
				   </tr>
                    
					<tr>
   				    	<th><label>First Name</label><input class="inp-form" type="text" id="username" name="username" /></th>
						<th><label>Last Name</label><input class="inp-form" type="text" id="name" name="name" /></th>

				   </tr>
                    <tr>    
                             				<th><label>E-mail</label><input class="inp-form" type="text" id="email" name="email" /></th>
				    	<th><label>Country</label><input type="text" id="country" name="country" class="inp-form" /></th>
                
					</tr>
                    		           <tr>    
                                                               <th><label>State</label><input type="text" id="state" name="state" class="inp-form" /></th>
				    	<th><label>City</label><input type="text" id="city" class="inp-form" name="city" /></th>

                
					</tr>

                    
                     <tr>    
                     				    	<th><label>Address</label><input type="text" class="inp-form" id="address" name="address" /></th>
                        <th><label>Mobile</label><input class="inp-form" type="text" id="mobile" name="mobile" /></th>


                
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