<?php if($this->session->userdata('userid')==NULL)
    { ?>
  
  <style>
    .black_overlay {
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
        top: 5%;
        left: 35%;
        padding: 16px;
        z-index:1002;
        overflow: auto;
    }
	
.main-form1{
    background: none repeat scroll 0 0 rgb(151, 192, 60);
    border: 1px solid rgb(255, 255, 255);
    margin: 0 auto;
    width: 324px;
}

#updateprofile input[type=checkbox]
    height: 36px !important;
    margin-left: 22px;
    padding: 0 !important;
    width: 274px;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
$("#updateprofile").validate({
 rules: {	
 email:{
 required:true,
 email:true,	
 remote: "<?php echo base_url();?>user/check_user"},
 
 password:{	
 required:true,
 minlength: 8
 },
 confirmpass:{
 required:true,
 equalTo:'#password'
 },
 terms_con:{
 required:true
 
 }
 },

messages: {
 email:{	
 remote: "An Account with this email already exists."
 },
terms_con: "You must agree with the terms and condition to continue."


} 
 });  

 });  
$(document).ready(function () { 
$('.sign-up').click(function () { 						
 $(window).scrollTop(0);							
});							
							
	});
</script>
 <div class="container1 signupform">
  <button class="sign-up"  href="javascript:void(0)" onclick = "document.getElementById('light1').style.display='block';document.getElementById('fade').style.display='block'">SIGN UP</button>

 <div id="light1" class="white_content main-form" style="height:405px !important; top:12%"><div id="form-center">
 <p>Sign up</p>
<form id="updateprofile" name="updateprofile"  method="post" action="<?php echo base_url();?>user/add" autocomplete="off">
<label>Email</label><input type="text" id="email" name="email" required  autocomplete="off"/>
<label>Password</label><input type="password" id="password" name="password" required autocomplete="off" />
<label>Confirm Password</label><input type="Password" required id="confirmpass" name="confirmpass" autocomplete="off" /><label for="terms_con"><a style="color:#000; padding-left:4px;" href="<?php echo base_url();  ?>home/term_of_use"> I agree to the terms and conditions</a><input type="checkbox" id="terms_con" name="terms_con"  style="float:left; margin-top:3px;" /></label><input  type="submit" name="submit"  value="submit"  class="login-close"  id="login-btn"  style="width:100%; " >        

</form>
 <button class="login-close1" href ="javascript:void(0)" onclick = "document.getElementById('light1').style.display='none';document.getElementById('fade').style.display='none'"><img src="https://cdn1.iconfinder.com/data/icons/glaze/64x64/actions/fileclose.png" width="30" height="30" /></button></div>
</div>
<div id="fade" class="black_overlay"></div>
</div>
  <?php   }else
    {
		}?>
  