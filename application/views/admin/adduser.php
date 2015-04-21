<?php $this->load->view('admin/header'); ?>
 <div class="clear"></div>
 <script type="text/javascript">
 $(document).ready(function () {
 
 $.validator.addMethod('fNamealpha', 
	function (value, element) 
	{
		var name=$('#username').val();
		var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	
	$.validator.addMethod('lNamealpha', 
	function (value, element) 
	{
		var name=$('#name').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	
	
	
	$.validator.addMethod('cityalpha', 
	function (value, element) 
	{
		var name=$('#city').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	
	
	 $.validator.addMethod("alphabnumeric", function(value, element) {
        return this.optional(element) || /^[a-z0-9]+$/i.test(value);
    }, "Enter only Alpha numeric charectors.");

	
	
	

    $('#addnewsocity').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
				 maxlength: 25,
				 fNamealpha:true
               
            },
            name: {
                required: true,
				maxlength: 25,
				lNamealpha:true
               
            },
			 email: {
                required: true,
               email:true
            },
			
			login_id: {
                required: true,
				alphabnumeric:true,
               remote: "<?php echo  base_url();?>admin/allusers/check_loginid"
            },
			
			 city: {
                required: true,
				maxlength: 25,
				cityalpha:true
               
            },

			 address: {
                required: true,
				maxlength: 250
               
            },
				
			
			mobile: {
                required: true,
               number:true,
			     minlength: 10,
			  maxlength: 10
            },
			state: {
                required: true,
				maxlength: 25
               
            },
			password: { 
				required: true,			
               minlength: 8,
			   maxlength: 15
			  
            },
			cpassword: { 
			required: true,
			equalTo:'#password'
            }
        },
		messages: {

		login_id: {
                
               remote: "login id already exists,try another"
            }


} 
    });

});
 
</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}
#content-table #addnewsocity tr th{width:auto !important;}
</style>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add New Sub Admin</h1> 
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
		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/allusers/process" >
		   <input type="hidden"   id="utype" name="utype" value="2" >
		   <input type="hidden"   id="country" name="country" class="inp-form" value="1" >  
            	<table id="id-form" >
				<thead>
                          				
					<tr>
                    	<th>First Name </th>
						<td><input maxlength="25"  type="text" class="inp-form" id="username" name="username" value="" ></td>
						</tr>
						<tr>
						<th>Last Name</th><td><input maxlength="25"  class="inp-form" type="text" id="name" name="name" value="" ></td>
         				
				   </tr>
				   
				     <tr>    
                    <th>Login id</th><td><input   type="text" class="inp-form" id="login_id" name="login_id" value="" ></td>
					 </tr>
				   
                    <tr>    
                    <th>E-mail</th><td><input   type="text" class="inp-form" id="email" name="email" value="" ></td>
					 </tr><tr>
					 <th>Mobile</th><td><input type="text"   class="inp-form" id="mobile" name="mobile" value="" ></td>
					
					</tr>
					
					
                    
                     <tr>                          
												
				    	<th>Address</th><td><textarea   id="address" class="inp-form" name="address" value="" > </textarea></td></tr>
						<tr><th>City</th><td><input type="text"   id="city" name="city" class="inp-form" value="" ></td></tr>
                
					
		           <tr>    
				    	
                        <th>State</th><td><input type="text" id="state"   name="state" class="inp-form" value="" ></td></tr>
					           
						
					   <tr><th>Password</th><td><input maxlength="15"  type="password" class="inp-form" id="password" name="password" value="" ></td></tr>
					   <tr> <th>Confirm Password</th><td><input  maxlength="15"  type="password" class="inp-form" id="cpassword" name="cpassword" value="" ></td>
                
					</tr>
		           <tr>    
				    	<th>&nbsp;</th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add User" >&nbsp;<input class="form-reset" type="reset" value="Reset" >
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