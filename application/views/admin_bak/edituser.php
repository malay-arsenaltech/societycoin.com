<?php $this->load->view('admin/header'); ?>
 <div class="clear"></div>
 <?php if(@$_REQUEST['st']==1)
  {?>
<script type="text/javascript">
jQuery(document).ready(function () 
 { 

jQuery(":input[type='text']").attr('disabled','disabled'); 
jQuery("select").attr('disabled','disabled'); 
jQuery("textarea").attr('disabled','disabled'); 
jQuery(":input[type='submit']").hide(); 

});
</script>
<?php } ?>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Edit User</h1>
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
		  <form method="post" id="addnewsocity" name="addnewsocity"  action="<?php echo base_url();?>admin/allusers/update" >
                        <input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>" />

            	<table id="id-form" class="table table-bordered">
				<thead><tr>
						<th><label style="display:none">Select User Type</label></th>
                        <th>
                        <input type="hidden" id="utype" name="utype" value="<?php echo $data['utype'];  ?>" />
                             </th>
				   </tr>
					<tr>
                    	<th><label>First Name</label><input type="text" class="inp-form" id="username" name="username" value="<?php echo $data['fname']; ?>" /></th>
						<th><label>Last Name</label><input class="inp-form" type="text" id="name" name="name" value="<?php echo $data['lname']; ?>" /></th>
         				
				   </tr>
                    <tr>    
                    <th><label>E-mail</label><input type="text" class="inp-form" id="email" name="email" value="<?php echo $data['email']; ?>" /></th>
                        <th><label>Password</label><input type="text" class="inp-form" id="password" name="password" value="" /></th>
                
					</tr>
                    
                     <tr>    
                        <th><label>Mobile</label><input type="text" class="inp-form" id="mobile" name="mobile" value="<?php echo $data['mobile']; ?>" /></th>
				    	<th><label>Address</label><input type="text" id="address" class="inp-form" name="address" value="<?php echo $data['address']; ?>" /></th>

                
					</tr>
		           <tr>    
				    	<th><label>City</label><input type="text" id="city" name="city" class="inp-form" value="<?php echo $data['city']; ?>" /></th>
                        <th><label>State</label><input type="text" id="state" name="state" class="inp-form" value="<?php echo $data['state']; ?>" /></th>
                
					</tr>
		           <tr>    
				    	<th><label>Country</label><input type="text" id="country" name="country" class="inp-form" value="<?php echo $data['country']; ?>" /></th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add New User" />
                         <input type="hidden" id="status" name="status" value="<?php echo $data['status']; ?>" />
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