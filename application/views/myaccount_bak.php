<?php $this->load->view('header'); ?>
<script type="text/javascript">
function updatesprofile()
{



	var lname=jQuery("#lname").val(); 
	var fname=jQuery("#fname").val(); 
	var address=jQuery("#address").val(); 
	var city=jQuery("#city").val(); 
	var state=jQuery("#state").val(); 
	var country=jQuery("#country").val(); 
	var mobile=jQuery("#mobile").val(); 
	var mlan=mobile.length;
	

 	
	var error='';
	
	
	if(lname=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your last name.&amp;lt;/p&amp;gt;\n";
	 $("#lname").addClass('inp-form-error');
	 }
	 else
	   {
   	$("#lname").removeClass('inp-form-error');
	   }
	   
	   if(fname=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your job title.&amp;lt;/p&amp;gt;\n";
	 $("#fname").addClass('inp-form-error');
	 }
	 else
	   {
   	$("#fname").removeClass('inp-form-error');
	   }
	   
	   
   


	if(mobile=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your mobile number.&amp;lt;/p&amp;gt;\n";
     $("#mobile").addClass('inp-form-error');
	 }else
	   {
   	$("#mobile").removeClass('inp-form-error');
	   }
	   
	  
	if(address=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#address").addClass('inp-form-error');
	 }else
	   {
   	$("#address").removeClass('inp-form-error');
	   }
	   
	   if(city=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#city").addClass('inp-form-error');
	 }else
	   {
   	$("#city").removeClass('inp-form-error');
	   }
	   
	   if(state=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#state").addClass('inp-form-error');
	 }else
	   {
   	$("#state").removeClass('inp-form-error');
	   }
	   
	      if(country=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#country").addClass('inp-form-error');
	 }else
	   {
   	$("#country").removeClass('inp-form-error');
	   }
	   
	   
	      if(state=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
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


<script type="text/javascript">
function updatesetting()
{


	var em=jQuery("#email").val();
    var confirmpass=jQuery("#confirmpass").val(); 
	var password=jQuery("#password").val();
	
 	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var error='';
	
	
		   	 if(!reg.test(em))
	 {
	 	error+="&amp;lt;p&amp;gt;* Please enter a valid email address.&amp;lt;/p&amp;gt;\n"; 
		$("#email").addClass('inp-form-error');
	 }else
	   {
   	$("#email").removeClass('inp-form-error');
	   }
	     if(password=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your mobile number.&amp;lt;/p&amp;gt;\n";
     $("#password").addClass('inp-form-error');
	 }else
	   {
   	$("#password").removeClass('inp-form-error');
	   }
	 
   if(password!=confirmpass)
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your mobile number.&amp;lt;/p&amp;gt;\n";
     $("#confirmpass").addClass('inp-form-error');
	 }else
	   {
   	$("#confirmpass	").removeClass('inp-form-error');
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

<!--mid-portion-->
<div class="row-fluid mid-outer">
  <div class=" container mid-inner">
    <!--left-->
    <?php $this->load->view('left'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->
    <div class="right">
    <?php $this->load->view('menu'); ?>
      <!--form-->
      <div class="profile">
                  <h6>USER PROFILE</h6>

                 <div id="container">
		
    
        
	<div id="vertical_container" >

   	<h1 class="accordion_toggle">Update Profile</h1>
		<div class="accordion_content">   
        <form>
                        
                        
                        <div class="col1">
                        <table  class="table1" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="0px">
                        <tr>
                        
                        <td width="25%" align="left">First Name</td>
                        <td width="30%"><input type="name" name="fname" tabindex="1"> </td>
                        </tr>

                        <tr>
                        <td align="left">Last Name</td>
                        <td><input type="name" name="lname" tabindex="2" ></td>
                        </tr>
                        
                        <tr>
                        <td align="left">Address</td>
                        <td><input type="name" name="Address" tabindex="3"></td>
                        </tr>
                        
                        <tr>
                        <td align="left">Phone</td>
                        <td><input type="name" name="Phone" tabindex="4"></td>
                        </tr>
                        
                        </table>
                        </div>
                        
                        <div class="col2">
                        <table   class="table2" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="0px">

                        <tr>
                        <td align="left" width="15%">City</td>
                        <td width="30%"><input type="name" name="fname" tabindex="5" ></td>
                        </tr>

                        <tr>
                        <td align="left">State</td>
                        <td><input type="name" name="State" tabindex="6" ></td>
                        </tr>
                        
                        <tr>
                        <td align="left">Country</td>
                        <td><input type="name" name="Country" tabindex="7" ></td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>           
                        </tr>
                        
                        <tr>
                        <td align="center" colspan="2"> <input type="button" value="Save"></td>
                        </tr>
                        
                        </table>
                        </div>
                        </form>

    </div>
    
		<h1 class="accordion_toggle">Settings</h1>
		<div class="accordion_content">
				<form>
                        <table width="88%" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="4px">

                        <tr>
                        <td width="15%" align="right">Email Address</td>
                        <td width="30%"><input type="name" name="email"> </td>
                        </tr>
                        
                        <tr>
                        <td width="20%" align="right">Password</td>
                        <td width="25%"><input type="password" name="pass"  ></td>
                        </tr>
                        
                        <tr>
                        <td width="20%" align="right">confirm Password</td>
                        <td width="25%"><input type="password" name="pass"  ></td>
                        </tr>
                        
                        
                        <tr>
                        <td align="center" colspan="2"> <input type="button" value="Save"></td>
                        </tr>
                        
                        </table>                       
                        </form>
		</div>
		

		<h1 class="accordion_toggle">Cards</h1>
		<div class="accordion_content">
			
            <H1>Cards</H1>

            <div id="horizontal_container" >
            </div>
    
   	</div>

        					
	</div>

	
	
</div>                   
                                                            
              </div>
      <!--form//-->
         <!--<div class="user-pannel">
							<h6>My Account</h6>
						   <hr>

                           <div class="profile">
                            <table><tr><td>
                           <form id="updateprofile" name="updateprofile" onsubmit="return updatesprofile()" method="post" action="<?php echo base_url();?>user/update" >
                           <h6>Update Profile</<br /></h6>

                           First Name<input type="text" id="fname" name="fname" value="<?php echo $data['fname']?>" /><br />

                           Last Name <input type="text" id="lname" name="lname" value="<?php echo $data['lname']?>" /><br />

                           Address <input type="text" id="address" name="address" value="<?php echo $data['address']?>" /><br />

                           City    <input type="text" id="city" name="city" value="<?php echo $data['city']?>" /><br />

                           State   <input type="text" id="state" name="state" value="<?php echo $data['state']?>" /><br />

                           Country <input type="text" id="country" name="country" value="<?php echo $data['country']?>" /><br />

                           Mobile <input type="text" id="mobile" name="mobile" value="<?php echo $data['mobile']?>" /><br />
                           <input type="submit" value="Edit"/>
                           </form>
                           </td><td>
                          
                          <form id="updateprofile" name="updateprofile" onsubmit="return updatesetting()" method="post" action="<?php echo base_url();?>user/setting" >
                           <h1>Setting</<br /></h1>

                           Email Address<input type="text" id="email" name="email" value="<?php echo $data['email']?>" /><br />
                           Password    <input type="password" id="password" name="password"/>
                           Confirm Password<input type="password" id="confirmpass" name="confirmpass" />

                           <input type="submit" value="Edit"/>
                           </form>
                           </td></tr></table>

                           

                           
                           </div>

					      </div>-->
      <!--text-->
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>