<?php $this->load->view('admin/header'); ?>

 <div class="clear"></div>

 


<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">

		<h1>All Area / Sector </h1><br />
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

   <?php 
   
   $msg_error_red = $this->session->flashdata('msg_error_red'); 
   
   if($msg_error_red !=''){ ?> 
<div id="message-red">
				<table border="0" width="35%" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td class="red-left"><?php echo $msg_error_red;  ?> </td>
					<td class="red-right"><a class="close-red"><img src="<?php echo AdminThemeUrl; ?>images/table/icon_close_red.gif" alt=""></a></td>
				</tr>
				</tbody></table>
				</div>

<?php } ?>


	<!-- end page-heading -->
  <div style="padding-right:17px; float:right;margin-right:73px;" >

        <form id="search" name="search" action="<?php  echo base_url(); ?>admin/master/arealist" method="get" >

        <table id="id-form" ><tr>

     

         <td>
<input type="text"  value="<?php echo  $this->input->get_post('search_text');  ?>"  name="search_text"     /> 
				 </td>
				 <td><input type="submit" name="sbt"  style="width:70px;"  value="Search"  /></td>
         </tr></table>


          </form>
        </div>

   <?php if(@$_GET['msg']!=NULL){?>             <div id="message-green">

				<table width="50%" cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo @$_GET['msg']; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>

				</div><?php } ?>





	</div>

	<!-- end page-heading -->


        <?php // echo '<pre>'; print_r($data); ?>

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

		

			<!--  start table-content  -->

			<div id="table-content">

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>

					<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>

					<th class="table-header-repeat line-left minwidth-1"><span>City</span></th>

					<th class="table-header-repeat line-left"><span>Area</span></th>
					<th class="table-header-repeat line-left"><span>Country</span></th>
          			
						    	<th class="table-header-repeat line-left"><span>Options</span></th>
             

								</tr>

                  <?php 
				     $k=1;
		if(isset($_GET['per_page']))
		$k =$_GET['per_page'] + 1;
				  
				  
				  foreach($data as $data)

				    {

						

?>
				<tr>

				
<td><?php echo $k; ?></td>
   					<td><?php echo $data['cityname']; ?></td>

                    <td><?php echo $data['areaname']; ?></td>
  <td>India</td>
            	
                 
                    <td class="options-width">
<a href="<?php echo base_url();?>admin/master/edit_area/<?php echo $data['id']; ?>" title="Edit Area/Sector" class="icon-1 info-tooltip"></a>
          <a onclick="javascript:return confirm('Are you sure to delete?');" href="<?php echo base_url();?>admin/master/delete_area/<?php echo $data['id']; ?>" title="Delete Record" class="info-tooltip"><img src="<?php echo base_url();?>images/del.png"    ></a>&nbsp; 

   
   </td>
</tr>

			<?php $k++; }

					?>

				</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

            
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php echo $links; ?>
			
			</tr>
			</table>
			<div class="clear"></div>
            			

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