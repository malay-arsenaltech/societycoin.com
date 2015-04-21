<?php $this->load->view('admin/header'); ?>

 <div class="clear"></div>

 


<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">

		<h1>Customer property </h1>
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

		

			<!--  start table-content  -->

			<div id="table-content">

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>

					
					<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
					<th class="table-header-repeat line-left minwidth-1"><span>Customer Name</span></th>
					<th class="table-header-repeat line-left"><span>Property Name</span></th>
					<th class="table-header-repeat line-left"><span>Society Name</span></th>
          			

								</tr>

                  <?php 
				   $k=1;
		if(isset($_GET['per_page']))
		$k =$_GET['per_page'] + 1;
		if(count($property) > 0) {
				  foreach($property as $data)

				    {

						

?>
				<tr>

					<td><?php echo $k; ?></td>

   					<td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['address']; ?></td>
					<td><?php echo $data['society_title']; ?></td>
            	
    
				</tr>

			<?php $k++; } 
			}
			
			else
			
			{
			echo "<tr><td colspan='5'><b>Record not Found</b></td></tr>";
			
			}

					?>

				</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

            
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php //echo $links; ?>
			
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