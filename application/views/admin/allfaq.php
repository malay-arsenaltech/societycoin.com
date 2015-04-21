<?php $this->load->view('admin/header'); ?>

 <div class="clear"></div>

 



<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">

		<h1>All FAQ</h1><br />

<br />



   <?php if(@$_GET['msg']!=NULL){?>             <div id="message-green">

				<table width="20%" cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo @$_GET['msg']; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>

				</div><?php } ?>




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
					<th class="table-header-repeat line-left minwidth-1"><span>Question</span></th>

					<th class="table-header-repeat line-left"><span>Answers</span></th>

             		<th class="table-header-repeat line-left"><span>Options</span></th>

								</tr>

                  <?php 
				   $k=1;
		if(isset($_GET['per_page']))
		$k =$_GET['per_page'] + 1;
				  
				  
				  foreach($data as $data)

				    {

//						print_r($data); exit();

						?>              

				<tr>

					<td><?php echo $k; ?></td>

					<td><?php echo $data['subject']; ?></td>

					<td><?php echo substr($data['description'],0,100); ?></td>

                    <td class="options-width">

                    

					<a href="<?php echo base_url();?>admin/allfaq/editfaq/<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/allfaq/changedStatus/<?php echo $data['id']; ?>" title="Publish" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/allfaq/pchangedStatus/<?php echo $data['id']; ?>" title="UnPublish" class="icon-2 info-tooltip"></a>

                     <?php }?>

					
					
					    
				 <a href="<?php echo base_url();?>admin/allfaq/delete/<?php echo $data['id']; ?>" title="Delete" onclick="return confirm('Are you sure to delete?');"  class=" info-tooltip"><img src="<?php echo base_url();?>images/del.png"  style="margin-left:10px;"  ></a>
					</td>
					</tr>

			<?php $k++; } ?>

				</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

            

            			

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