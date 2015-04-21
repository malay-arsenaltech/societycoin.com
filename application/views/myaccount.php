<?php $this->load->view('header'); 

//echo '<pre>'; print_r($data); exit();

?>

<script type="text/javascript">

function getcity()

  {

	 var state=jQuery('#state').val();

	var  url='<?php echo base_url(); ?>ajax/getcity';

	    

	  jQuery.post(url,{"state":state,"action":"city"},function (data)		{ 	jQuery('#city').html(data); 	});				



	  	  

  }
$.validator.addMethod('fNamealpha', 
	function (value, element) 
	{
		var name=$('#fname').val();
		var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Enter Characters Only');	
	
	
$.validator.addMethod('lNamealpha', 
	function (value, element) 
	{
		var name=$('#lname').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZÜÖÄöäüéàè-";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Enter Characters Only.');
	
$.validator.addMethod('phoneNumber', 
	function (value, element) 
	{
		var name=$('#mobile').val();
		var NUMBERALL = "0123456789";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (NUMBERALL.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Invalid Mobile Number');
	
 $.validator.addMethod("alphabnumeric", function(value, element) {
        return this.optional(element) || /^[a-z0-9]+$/i.test(value);
    }, "Enter only alpha numeric characters.");
	
	$.validator.addMethod("alphab", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Enter Characters Only.");
	
$(document).ready(function() {


$("#updateprofile").validate({
    rules: {
			
			fname:{
			required:true,
			maxlength:25,
			fNamealpha:true
			},
			lname:{
			required:true,
			maxlength:25,
			lNamealpha:true
			
			},
			address:{required:true,maxlength:250},
			
			city:{			
			required:true,			
			maxlength:25
			},
			state:{			
			required:true,			
			maxlength:25
			},
			
			mobile:{
				required:true,
				phoneNumber:true,
				minlength:10,
				maxlength:10
			}
			
					
			
			
   }
});

$("#updatesetting").validate({
    rules: {
			
			email:{
			required:true,
				email:true,
			},
			opassword:{
			required:true
			
			},
			
			password:{
			required:true,
			minlength: 8,
			maxlength:15
			
			},
			
			confirmpass:{
			required:true,
			equalTo:'#password'
			}
			
					
			
			
   }
});


$("#update_email").validate({
    rules: {
			
			email:{
			required:true,
			email:true,
			 remote: "<?php echo base_url(); ?>user/check_user"},
			},
			opassword:{
			required:true
			
			},
                    messages: {
                        "email": {
                            required: "Please enter your email id",
                            email: "Please enter valid email id",
							remote: "An Account with this email already exists",
                        },  
                        "opassword": {
                            required: "Please enter your password",
                           
                        }
					
			
			
   }
});


  $(".update_profile").click(function(){
        $("#updateprofile_div").slideToggle();
			 $("#updatesetting_div").hide();
		 $("#update_email_id").hide();
    });
	
	 $(".change_password").click(function(){
        $("#updatesetting_div").slideToggle();
		 $("#updateprofile_div").hide();
		 $("#update_email_id").hide();
    });
	
	 $(".change_email").click(function(){
        $("#update_email_id").slideToggle();
			 $("#updatesetting_div").hide();
		 $("#updateprofile_div").hide();
    });
});

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

                  <h6>My Settings</h6>
                 <div id="container">        

	<div id="vertical_container" >
    	<h1 class="accordion_toggle update_profile">Update Profile</h1>

		<div class="accordion_content" id="updateprofile_div">   

        <form id="updateprofile" name="updateprofile"  method="post" action="<?php echo base_url();?>user/update" autocomplete="off" >
                
                        <div class="col1">

                        <table  class="table1" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="0px">

                        <tr>                       

                        <td width="25%" align="left">First Name</td>

                        <td width="30%"><input type="text" maxlength="25"  id="fname" name="fname" value="<?php echo $data['fname']?>" /></td>

                        </tr>

                        <tr>

                        <td align="left">Last Name</td>

                        <td><input type="text" id="lname"  maxlength="25" name="lname" value="<?php echo $data['lname']?>" /></td>

                        </tr>                       

                        <tr>

                        <td align="left">Address</td>

                        <td><textarea id="address" style="width: 150px; height: 74px;resize: none;"  name="address" ><?php echo $data['address']?></textarea></td>

                        </tr>                       

                        <tr>

                        <td align="left">Mobile No</td>

                        <td><input type="text" id="mobile" name="mobile" value="<?php echo $data['mobile']?>" /></td>

                        </tr>                        

                        </table>

                        </div>                       

                        <div class="col2">

                        <table   class="table2" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="0px">
                                   <tr>

                        <td class="tdwidth_formob" align="left">State</td>

                        <td> 
						
						<select name="state" id="state" onchange="getcity();" >
						<option value="">Select Your State</option>
						<?php foreach($state AS $c)   { 
						
						 $sel = ($data['state'] == $c['state']) ? " selected=selected " : "";
						
						?>
						<option <?php  echo $sel;  ?>  value="<?php echo $c['state'] ?>" ><?php echo $c['state'] ?></option>
						<?php  }  ?>
						</select>	
												
				</td>
                        </tr>
						
						<tr>

                        <td class="tdwidth_formob"align="left" width="15%">City</td>

                        <td width="30%">
						<select name="city" id="city" >
						<option value="">Select Your City</option>						
						<option selected  value="<?php echo $data['city']; ?>" ><?php echo $data['city'] ?></option>

						</select>		
						
						</td>

                        </tr>
             
                        
<input type="hidden" id="country" name="country" value="india" />
                        <tr>

                        <td>&nbsp;</td>           

                        </tr>                      

                        <tr>

                        <td align="center" colspan="2">  <input type="submit" value="Confirm"/></td>

                        </tr>                        

                        </table>

                        </div>

                        </form>
    </div>

    

		<h1 class="accordion_toggle change_password">Change Password</h1>

		<div class="accordion_content"  id="updatesetting_div" style="display:none;">

				 <form id="updatesetting" name="updatesetting"  method="post" action="<?php echo base_url();?>user/setting" autocomplete="off"  >

                        <table width="88%" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="4px">

                        <tr>

                        <td width="15%" align="right">Email Address</td>

                        <td width="30%"><input type="text" id="email" disabled   name="email" value="<?php echo $data['email']?>" /></td>

                        </tr>

                        <tr>

                        <td width="20%" align="right">Old Password</td>

                        <td width="25%"><input type="password" id="opassword" value="" name="opassword"/></td>

                        </tr>
                        

                        <tr>

                        <td width="20%" align="right">New Password</td>

                        <td width="25%"><input type="password" id="password" name="password"/></td>

                        </tr>
                   

                        <tr>

                        <td width="20%" align="right">Confirm New Password</td>

                        <td width="25%"><input type="password" id="confirmpass" name="confirmpass" /></td>

                        </tr>
                    
                        <tr>

                        <td align="center" colspan="2"> <input type="submit" value="Confirm"/></td>

                        </tr>                       

                        </table>                       

                        </form>

		</div>
				<h1 class="accordion_toggle change_email">Change Email Address</h1>

		<div id="update_email_id" class="accordion_content" style="display:none;">

				 <form id="update_email" name="update_email"  method="post" action="<?php echo base_url();?>user/update_email" autocomplete="off"  >

                        <table width="88%" align="center" border="0px" bordercolor="#CCCCCC"  bgcolor="#003333" cellpadding="4px">

                        <tr>

                        <td width="15%" align="right">Email Address</td>

                        <td width="30%"><input type="text" id="email"   name="email" value="<?php echo $data['email']?>" /></td>

                        </tr>

                        <tr>

                        <td width="20%" align="right">Password</td>

                        <td width="25%"><input type="password" id="opassword" value="" name="opassword"/></td>

                        </tr>                    
             

                        <td align="center" colspan="2"> <input type="submit" value="Confirm"/></td>

                        </tr>                       

                        </table>                       

                        </form>

		</div>
		
		

		<h1  style="display:none;" class="accordion_toggle">Cards</h1>

		<div class="accordion_content">

            <div style="display:none;" id="horizontal_container" ><div class="user-pannel">
						
              <a href="<?php echo base_url();?>user/editcart?cid=0">Add New Cart</a>

               <table width="90%" cellspacing="0" cellpadding="0" border="0" id="product-table">

				<tbody><tr>

					<th class=""><a id="toggle-all"></a> </th>

					<th class="table-header-repeat line-left minwidth-1"><a href="">Cart Type</a>	</th>

					<th class="table-header-repeat line-left"><a href="">Card Processor </a></th>

					<th class="table-header-repeat line-left"><a href="">Card Issuing Bank</a></th>                    

  				     <th class="table-header-repeat line-left"><a href="">Option</a></th>

								</tr>                               

                                <tr><td>&nbsp;</td><td></td><td></td><td></td></tr>

                                

             <?php foreach($cart as $cart)

			    {?>

                                                                

				<tr class="prow0">

					<td></td>

					<td><?php echo $cart['carttype']; ?></td>

					<td><?php echo $cart['cardprocessor1']; ?></td>

           			<td><?php echo $cart['cardissuingbank']; ?></td>

 					 <td class="options-width">

              		<a title="Edit" href="<?php echo base_url();?>user/editcart?cid=<?php echo $cart['id']; ?>" class="icon-1 info-tooltip"  ></a>

                     <a class="icon-2 info-tooltip" title="Delete" href="<?php echo base_url();?>user/deletecart?cid=<?php echo $cart['id']; ?>"></a>

                         					</td></tr>                                

                                            
                 <?php } ?>                           

							</tbody></table>
                      
					      </div>
            </div>
   	</div>
       					

	</div>

</div>                                                     

 </div>      

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>