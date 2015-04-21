<?php $this->load->view('admin/header'); ?>

 <div class="clear"></div>
 

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1></h1><br />
<br />

   <?php if(@$_REQUEST['msg']!=NULL){?>             <div id="message-green">
				<table width="20%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td class="green-left"><?php echo @$_REQUEST['msg']; ?></td>
					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>
				</tr>
				</tbody></table>
				</div><?php } ?>


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
		<div id="content-table-inner">
        <?php 
		 if($this->session->userdata('utype')==1)
           {
		
		?>
		   <div id="table-content">
				<form id="mainform" action="">
                 <h1>Sub Admin</h1><br />

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">First Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Last Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Address</a></th>
             		<th class="table-header-repeat line-left"><a href="">Option</a></th>
								</tr>
                  <?php foreach($data2 as $data)
				    {?>  
                    
                   <script type="text/javascript">
				   $(document).ready(function () { 
											  // alert(<?php echo $data['id']; ?>);
					$('#assign_<?php echo $data['id']; ?>').click(function () {

																			
					
					
					});						   
											   
							
											   
	                });
				   </script>
				<tr>
					<td><input id="checkid<?php echo $data['id']; ?>" name="checkid[]" value="<?php echo $data['id']; ?>"  type="checkbox"/></td>
					<td><a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['id']; ?>&st=1" ><?php echo $data['fname']; ?></a></td>
					<td><?php echo $data['lname']; ?></td>
					<td><a href=""><?php echo $data['email']; ?></a></td>
					<td><a href=""><?php echo $data['address'].',&nbsp;'.$data['city'].',&nbsp;'.$data['country']; ?></a></td>
                    <td class="options-width">
                    
					<a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>
                    <?php 
					    if($data['status']==1){
						 ?>
                 	     <a href="<?php echo base_url();?>admin/allusers/changedStatus?uid=<?php echo $data['id']; ?>" title="Published" class="icon-5 info-tooltip"></a>
                         <?php }else if($data['status']==0)
						   {?>
					<a href="<?php echo base_url();?>admin/allusers/pchangedStatus?uid=<?php echo $data['id']; ?>" title="Unpblished" class="icon-2 info-tooltip"></a>
                     <?php }?>
                     
                     
        <a style="margin-left:8px;" title="View All Assign Societys" href ="<?php echo base_url()?>admin/allusers/assignview?uid=<?php echo $data['id']; ?>" class="icon-3 info-tooltip"  ></a>
                  
                     
          				</td></tr>
			<?php } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
            
         <?php }else{
		 
	 
		 ?>   
			
			<div id="table-content">
				<form id="mainform" action="">
                <h1>Registers Users</h1><br />

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">First Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Last Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Email</a></th>
					<th class="table-header-repeat line-left"><a href="">Address</a></th>
             		<th class="table-header-repeat line-left"><a href="">Option</a></th>
								</tr>
                  <?php foreach($data3 as $data)
				    {
						

						?>              
				<tr>
					<td><input id="checkid<?php echo $data['id']; ?>" name="checkid[]" value="<?php echo $data['id']; ?>"  type="checkbox"/></td>
					<td><?php echo $data['fname']; ?></td>
					<td><?php echo $data['lname']; ?></td>
					<td><a href=""><?php echo $data['email']; ?></a></td>
					<td><a href=""><?php echo $data['address'].',&nbsp;'.$data['city'].',&nbsp;'.$data['country']; ?></a></td>
                    <td class="options-width">
                    
					<a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>
                    <a style="margin-left:8px;" title="View All Assign Societys" href ="<?php echo base_url()?>admin/allusers/assignview?uid=<?php echo $data['id']; ?>" class="icon-3 info-tooltip"  ></a>
                    <?php 
					    if($data['status']==1){
						 ?>
                 	     <a href="<?php echo base_url();?>admin/allusers/changedStatus?uid=<?php echo $data['id']; ?>" title="Published" class="icon-5 info-tooltip"></a>
                         <?php }else if($data['status']==0)
						   {?>
					<a href="<?php echo base_url();?>admin/allusers/pchangedStatus?uid=<?php echo $data['id']; ?>" title="Unpblished" class="icon-2 info-tooltip"></a>
                     <?php }?>
					</td
				></tr>
			<?php } ?>
				</table>
				
				</form>
			</div>
            
            <?php } ?>
         
            
                    
            			
		</div>
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