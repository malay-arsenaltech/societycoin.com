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

	
	
	
	

    $('#adduser').validate({ // initialize the plugin
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
               minlength: 8,
			   maxlength: 25
			   
            },
			cpassword: { 			
			equalTo:'#password'
            }
        }
    });

});
 
</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1>Edit Customer</h1></div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
		<!-- start id-form -->
<form id="adduser" name="adduser"  enctype="multipart/form-data" method="POST" action="<?php echo $this->config->item("base_url");?>admin/customers/edit/" autocomplete="off">
<input type="hidden" name="id" value="<?php echo $data['id'];?>">
<input type="hidden"   id="country" name="country" class="inp-form" value="1" >
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			
			
		<tr>
			<th>First Name </th>
			<td><input maxlength="25"  type="text" class="inp-form" id="username" name="username" value="<?php echo $data['fname']; ?>" ></td>
			<td></td>
		</tr>
		<tr>
				<th>Last Name</th><td><input maxlength="25"  class="inp-form" type="text" id="name" name="name" value="<?php echo $data['lname']; ?>" ></td>
         				
			<td>
			</td>
		</tr>
		<tr>
			<th>E-mail</th><td><input   type="text" class="inp-form" id="email" name="email" value="<?php echo $data['email']; ?>" ></td>
			<td>
			</td>
		</tr>
		<tr>
			 <th>Mobile</th><td><input type="text"   class="inp-form" id="mobile" name="mobile" value="<?php echo $data['mobile']; ?>" ></td>
			<td>
			</td>
		</tr>
		<tr>
			<th>Address</th><td><textarea   id="address" class="inp-form" name="address" value="" > <?php echo $data['address']; ?> </textarea></td>
			<td>
			</td>
		</tr>
		<tr>
		<th>City</th><td><input type="text"   id="city" name="city" class="inp-form" value="<?php echo $data['city']; ?>" ></td>
		<td></td>
		</tr>
			<tr>
			 <th>State</th><td><input type="text" id="state"   name="state" class="inp-form" value="<?php echo $data['state']; ?>" ></td>
			<td>
			</td>
			
		
	
	
		<tr>
			<th valign="top">New Password:</th>
			<td><input type="password"  maxlength="15" id="password" name="password" value=""  ></td>
			<td>
			</td>
		</tr>
	<tr>
			<th valign="top">Re-enter New Password:</th>
			<td><input type="password" maxlength="15" name="cpassword" value=""  ></td>
			<td>
			</td>
		</tr>
		
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="Submit" name="Submit" class="form-submit" >
			<input type="reset" value="Reset" name="clear" class="form-reset"  >
		</td>
		<td></td>
	</tr>
	</table>
	</form>
	<!-- end id-form  -->

	</td>
	<td>

</td>
</tr>

</table>
<div class="clear"></div>
</div>
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
<div class="clear">&nbsp;</div>
</div>
<?php $this->load->view('admin/footer'); ?>