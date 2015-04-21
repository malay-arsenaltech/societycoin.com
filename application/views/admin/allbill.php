<?php $this->load->view('admin/header'); ?>

 <div class="clear"></div>

 



<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">

		<h1>Bills Head</h1><br />

<br />



   <?php if(@$_REQUEST['msg']!=NULL){?>             <div id="message-green">

				<table width="20%" cellspacing="0" cellpadding="0" border="0">

				<tbody><tr>

					<td class="green-left"><?php echo @$_REQUEST['msg']; ?></td>

					<td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

				</tr>

				</tbody></table>

				</div><?php } ?>



<a  href="<?php echo base_url()?>admin/master/addbill"><h1 style="width:180px;" >Add New Bill</h1></a>

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



			

			<div id="table-content">

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>

					<th class="table-header-check"><a id="toggle-all" ></a> </th>

					<th class="table-header-repeat line-left minwidth-1"><a href="">Bill Name</a>	</th>

             		<th class="table-header-repeat line-left"><a href="">Option</a></th>

			</tr>

            

             <?php foreach($data as $data)

				    {?>              

				<tr>

					<td><input id="checkid<?php echo $data['id']; ?>" name="checkid[]" value="<?php echo $data['id']; ?>"  type="checkbox"/></td>

					<td><?php echo $data['bill_name']; ?></td>

                    <td class="options-width">

                    

					<a href="<?php echo base_url();?>admin/master/editbill?bid=<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/master/publishedbill?bid=<?php echo $data['id']; ?>" title="Publish" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/master/unpublishedbill?bid=<?php echo $data['id']; ?>" title="UnPublish" class="icon-2 info-tooltip"></a>

                     <?php }?>

					</td

				></tr>

			<?php } ?>

				</table>

				</table>

				

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