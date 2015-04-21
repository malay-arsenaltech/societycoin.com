<?php $this->load->view('admin/header'); ?>



 <div class="clear"></div>

 



<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">

		<h1>All Customers</h1><br />

<br />



   <?php 
   
   $msg_error = $this->session->flashdata('msg_error'); 
   
   if($msg_error !=''){ ?>             
   <div id="message-green">

				<table  cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo  $msg_error; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>
</div>
<?php } ?>




	</div>

	<!-- end page-heading -->

  <div style="padding-right:17px; float:right;margin-right:73px;" >

        <form id="search" name="search" action="<?php  echo base_url(); ?>admin/customers" method="get" >

        <table id="id-form" ><tr>

     

         <td>
<input type="text"  value=""  name="search_text"     /> 
				 </td>
				 <td><input type="submit" name="sbt"  style="width:70px;"  value="Search"  /></td>
         </tr></table>
<input name="task"  value="search" type="hidden"  >

          </form>
        </div>

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

   

		   <div id="table-content">

				<form id="mainform" action="">

                 


				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>
				<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
					
					<th class="table-header-repeat line-left minwidth-1"><span>First Name</span>	</th>

					<th class="table-header-repeat line-left minwidth-1"><span>Last Name</span></th>
						<th class="table-header-repeat line-left minwidth-1"><span>Society Name</span></th>				
					
					<th class="table-header-repeat line-left minwidth-1"><span>Mobile No</span></th> 

					<th class="table-header-repeat line-left"><span>Email</span></th>

					<th class="table-header-repeat line-left"><span>City</span></th>

             		<th class="table-header-repeat line-left"><span>Options</span></th>

								</tr>

                  <?php
if(count($data) > 0 ){
 $k=1;
		if(isset($_GET['per_page']))
		$k =$_GET['per_page'] + 1;

				  foreach($data as $data)

				    {?>  

                   
					<tr>			
					<td><?php echo $k; ?></td>
					<td><a href="<?php echo base_url();?>admin/customers/edit/<?php echo $data['id']; ?>" ><?php echo $data['fname']; ?></a></td>

					<td><?php echo $data['lname']; ?></td>
					<td><?php echo $data['societyname']; ?></td>
					
					<td><?php echo $data['mobile']; ?></td>
					<td><?php echo $data['email']; ?></td>

					<td><?php echo $data['city']; ?></td>

                    <td class="options-width">
                

					<a href="<?php echo base_url();?>admin/customers/edit/<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/customers/changedStatus/<?php echo $data['id']; ?>" title="Publish" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/customers/pchangedStatus/<?php echo $data['id']; ?>" title="UnPublish" class="icon-2 info-tooltip"></a>
                     <?php }?>
                     <a href="<?php echo base_url();?>admin/customers/transaction_details/<?php echo $data['id']; ?>" title="View transaction details" class=" info-tooltip"><img src="<?php echo base_url();?>images/dt.png" style="margin-left:10px;" ></a>
			
					<a href="<?php echo base_url();?>admin/customers/property/<?php echo $data['id']; ?>" title="View customer added property" class=" info-tooltip"><img src="<?php echo base_url();?>images/prop.png" style="margin-left:10px;" > </a>
 
		</td></tr>

			<?php $k++; } }    	else {
				echo "<tr><td colspan='8'> No Customer found</td></tr>";
				
				}
				 ?>

				</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

            

         <?php 
		 
		 
		?>
				</table>

				

				</form>

			</div>

            

                   

            

            
            
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php echo $links; ?>
			
			</tr>
			</table>        

            			

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