<?php  $this->load->view('admin/header'); ?>

 



<div id="content-outer">



<div id="content">





	<div id="page-heading">

		<h1>All Bill</h1><br />

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
<script type="text/javascript">

function validateform()

{
	var r=confirm("Pressed Ok for edit society detail");
			if (r==true)
			{
			x="You pressed OK!";
			return true;
			}
			else
			{
				
			x="You pressed Cancel!";
			
			return false;
			} 
			
}

</script>




<form id="mainform" onsubmit="return validateform()" action="<?php echo base_url(); ?>admin/allsociety/uploadexcel" method="post" enctype="multipart/form-data">        

      

<table>        <tr><td colspan="3" align="right"><span style="font-size:15px; margin:30px;">Upload Your Bills Here<input type="file" id="file" name="file" /><input type="submit" value="Click here to mass Upload bills" /></span></td></tr>

</table>        

</form>



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



		<div id="content-table-inner">

		

			<div id="table-content">

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>

					<th class="table-header-check"><a id="toggle-all" ></a> </th>

					<th class="table-header-repeat line-left minwidth-1"><a href="">Property Address</a>	</th>

					<th class="table-header-repeat line-left"><a href="">Bill Name</a></th>

   					<th class="table-header-repeat line-left"><a href="">Total Amount</a></th>

             		<th class="table-header-repeat line-left"><a href="">Option</a></th>

								</tr>

                  <?php foreach($data as $data)

				    {

//						echo $this->session->userdata('userid');

	//					echo '<pre>';print_r($data); echo '</pre>';

						

						if($this->session->userdata('utype')==2)

						  {

							  ?>

                              

                              <tr>

					<td><input id="checkid<?php echo $data['id']; ?>" name="checkid[]" value="<?php echo $data['id']; ?>"  type="checkbox"/></td>

  					<td><a href=""><?php echo $data['address']; ?></a></td>

					<td><?php echo $data['bill_name'];  ?></td>

 					<td><?php echo $data['totalamount']; ?></td>



                    <td class="options-width">

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/allsociety/billchangedStatus?pid=<?php echo $data['id']; ?>" title="Published" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/allsociety/billpchangedStatus?pid=<?php echo $data['id']; ?>" title="Unpblished" class="icon-2 info-tooltip"></a>

                     <?php }?>

					</td></tr>

                              <?php 

							  

							  }else

						      {

								  ?>

                                  <tr>

					<td><input id="checkid<?php echo $data['id']; ?>" name="checkid[]" value="<?php echo $data['id']; ?>"  type="checkbox"/></td>

  					<td><a href=""><?php echo $data['address']; ?></a></td>

					<td><?php echo $data['society_title'];  ?></td>

 					<td><a href=""><?php echo $data['cityname']; ?></a></td>

                    <td class="options-width">

                    

					<a href="<?php echo base_url();?>admin/allpropertys/editproperty?pid=<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/allpropertys/changedStatus?pid=<?php echo $data['id']; ?>" title="Published" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/allpropertys/pchangedStatus?pid=<?php echo $data['id']; ?>" title="Unpblished" class="icon-2 info-tooltip"></a>

                     <?php }?>

					</td></tr>

                                  <?php 

								  

								  }

					

						?>              

				

			<?php } ?>

				</table>

				</form>

			</div>

            

            			

		</div>



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



<div class="clear">&nbsp;</div>

</div>







    

<?php  $this->load->view('admin/footer'); ?>