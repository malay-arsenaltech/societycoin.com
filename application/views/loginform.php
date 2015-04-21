
<?php if($this->session->userdata('userid')==NULL)

    {?>

<style>

    .black_overlay{

        display: none;

        position: absolute;

        top: 0%;

        left: 0%;

        width: 100%;

        height: 100%;

        background-color: black;

        z-index:1001;

        -moz-opacity: 0.8;

        opacity:.80;

        filter: alpha(opacity=80);

    }

    .white_content {

        display: none;

        position: absolute;

        top: 25%;

        left: 35%;

        padding: 16px;

        z-index:1002;

        overflow: auto;

    }
a {cursor:pointer;}
</style>



<script type="text/javascript">

$(document).ready(function() {

 
$("#loginform").validate({

    rules: {
			username:{
				required:true,
				email:true
				},
			
			password1:{
			required:true,
			
			}
	   }
    
});
});





function forgotpass()

 {





	    var usernameemail=document.getElementById("usernameemail").value; 

		

		

		

	var error='';

	

	if(usernameemail=='')

	 {

	error+="&amp;lt;p&amp;gt;* Please enter your last name.&amp;lt;/p&amp;gt;\n";

	 $("#usernameemail").addClass('inp-form-error');

	 }

	 else

	   {

		   

    var r=confirm("Are you sure about reset password !!");

    if (r==true)

     {

     return true;

     }else

	   {    

	     return false;

		   

		   }		   

   	$("#usernameemail").removeClass('inp-form-error');

	   }

	   

	    

		

if(error!='')

	{

	$("#error").show();

	$("#error").html(error);

	return false;

	}

	return true; 

	 

	 }

	 

$(document).ready(function () { 

$('.login').click(function () { 
						

 $(window).scrollTop(0);							

});							

							

	});

</script>



 <div class="container1">

  <button class="login"  href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">LOGIN</button>

 <div id="light" class="white_content">

  <div class="main-form" id="u_login_mob"> 

  <form id="loginform" action="<?php echo base_url();?>home/login"   method="post" name="loginform"   autocomplete="off">

          <p>USER LOGIN</p>

          <label>Email*</label>

          <input type="text" id="username" name="username" required   autocomplete="off">

          <label>Password*</label>

          <input type="password" id="password1" name="password1" required  autocomplete="off" >

          <button  class="login-close" type="submit" id="login-btn_p">Login</button>

           <div class="forget-password"><a style="margin-left: 25px; font-weight: bold; text-transform: capitalize;" onclick="$('#loginform').hide();$('#loginform1').show();" >Forgot your password?</a></div>

         </form> 

           <form style="display:none" id="loginform1" action="<?php echo base_url();?>home/forgotpass" onsubmit="return forgotpass()"  method="post">

          <p> Reset Password </p>

          <label>Email*</label>

          <input type="text" id="usernameemail" name="usernameemail">

          <button  class="login-close" type="submit">Submit</button>

           <a style="margin-left: 25px; font-weight: bold; text-transform: capitalize;" onclick="$('#loginform').show();$('#loginform1').hide();" >Back</a>
		<div><p style="font-size:14px;">Please enter the email address for your account. We will send you new password for your account.</p></div>
         </form> 

         

            <button style="margin:18px;" class="login-close1" href ="javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="https://cdn1.iconfinder.com/data/icons/glaze/64x64/actions/fileclose.png" width="30" height="30" /></button>



 

        </div>

   </div>

  

    <div id="fade" class="black_overlay"></div>

</div>



<?php }else

   {

	   ?>

       <form method="post" action="<?php echo base_url();?>home/logout">

       

       <button type="submit" class="login">LOGOUT</button>

       

       </form>

       <?php 

	   

	   }?>