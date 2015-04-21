<?php  $this->load->view('admin/header'); ?>

 <script type="text/javascript">

function getstates()

  {

	  id=$('#countryid').val();

	  url='<?php echo base_url();?>admin/master/getstate';

	  

	  $.post(url,{"id":id,"action":"states"},function (data)		{ 	$('#stateid').html(data); 	});				
	  	  

  } 

function getcity()

  {

	  id=$('#stateid').val();

	  url='<?php echo base_url();?>admin/master/getcity';	  

	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#cityid').html(data); 	});	
  	  

  } 
  

function  getarea()

  {

	  id=$('#cityid').val();

	  url='<?php echo base_url();?>admin/master/getarea';	  

	  $.post(url,{"id":id,"action":"area"},function (data)		{ 
	$('#areaid').html(data); 	});		

  } 
  
 function getsociety()
  {

	  id=$('#areaid').val();

	  url='<?php echo base_url();?>admin/master/getsociety';	  

	  $.post(url,{"id":id,"action":"area"},function (data)		{ 

		 $('#societyid').html(data); 	});		
  

	  }

</script>

<div id="content-outer">
<div id="content">

	<div id="page-heading">

		<h1>All Properties</h1><br />

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

$( document ).ready(function() {

$(".filter").change(function() {
  $("#search").submit();
     });  
	
});


</script>



         <div class="dropdonw" style="padding-right:17px;" >

        <form id="search" name="search" action="<?php  echo base_url(); ?>admin/allpropertys" method="post" >

        <table id="id-form" ><tr>

        <th style="text-align:right;">Filter:</th>

        

         <td>
		 <select id="cityid"  name="cityid"  class="filter">
		 <option value="">Select City</option>
<?php    foreach($allcity as $c) { 
$sel = (isset($_POST['cityid']) && $c['id']  == $_POST['cityid']) ? " selected='selected' "  :"";
echo "<option  $sel value='".$c['id']."' >". $c['cityname']. "</option>";
      }            
 ?>
                 </select>
				 
				 </td>

      <td> <select id="areaid" name="areaid" class="filter">

                  <option value="">Select Area / Sector</option>

<?php   


 foreach($allarea as $c) { 
$sel = (isset($_POST['areaid']) && $c['id']  == $_POST['areaid']) ? " selected='selected' "  :"";

echo "<option $sel value='".$c['id']."' >". $c['areaname']. "</option>";
    }              
 ?>
                 </select>

                    </td>

                 

       <td> <select id="societyid" name="societyid" class="filter">

                  <option value=''>Select your Society</option>
<?php   


 foreach($allsociety as $c) { 
$sel = (isset($_POST['societyid']) && $c['id']  == $_POST['societyid']) ? " selected='selected' "  :"";
echo "<option $sel value='".$c['id']."' >". $c['society_title']. "</option>";
    }              
 ?>
     
                 </select></td>          

                 
         

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



		<div id="content-table-inner">

		

			<div id="table-content">

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>

				<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>

					<th class="table-header-repeat line-left minwidth-1"><span>Property Address</span>	</th>

					<th class="table-header-repeat line-left"><span>Society Name</span></th>

   				    <th class="table-header-repeat line-left"><span>Options</span></th>

								</tr>

                  <?php 
				  
				   $k=1;
		if(isset($_GET['per_page']))
		$k =$_GET['per_page'] + 1;
				 
if(count($data) > 0 ){

				 foreach($data as $data)

				    {

//						echo $this->session->userdata('userid');

	//					echo '<pre>';print_r($data); echo '</pre>';

						

						if($this->session->userdata('utype')==2)

						  {

							  ?>

                              

                              <tr>

					<td><?php echo $k; ?></td>

  					<td><a href="<?php echo base_url();?>admin/allpropertys/edit_subadmin_property/<?php echo $data['id']; ?>"><?php echo $data['address']; ?></a></td>

					<td><?php echo $data['society_title'];  ?></td>

 				                    <td class="options-width">

                    

					<a href="<?php echo base_url();?>admin/allpropertys/edit_subadmin_property/<?php echo $data['id']; ?>" title="Edit Property" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/allpropertys/changedStatus/<?php echo $data['id']; ?>" title="Publish" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/allpropertys/pchangedStatus/<?php echo $data['id']; ?>" title="UnPublish" class="icon-2 info-tooltip"></a>

                     <?php }?>

					</td></tr>

                              <?php 

							  

							  }else

						      {

								  ?>

                                  <tr>

				
					<td><?php echo $k; ?></td>
  					<td><a href="<?php echo base_url();?>admin/allpropertys/editproperty/<?php echo $data['id']; ?>"><?php echo $data['address']; ?></a></td>

					<td><?php echo $data['society_title'];  ?></td>

 				                    <td class="options-width">

                    

					<a href="<?php echo base_url();?>admin/allpropertys/editproperty/<?php echo $data['id']; ?>" title="Edit" class="icon-1 info-tooltip"></a>

                    <?php 

					    if($data['status']==1){

						 ?>

                 	     <a href="<?php echo base_url();?>admin/allpropertys/changedStatus/<?php echo $data['id']; ?>" title="Publish" class="icon-5 info-tooltip"></a>

                         <?php }else if($data['status']==0)

						   {?>

					<a href="<?php echo base_url();?>admin/allpropertys/pchangedStatus/<?php echo $data['id']; ?>" title="UnPublish" class="icon-2 info-tooltip"></a>

                     <?php }?>

					</td></tr>

                                  <?php 

								  

								  }

					

						?>              

				

			<?php  $k++ ; }   }    else echo   "<tr><td colspan='7'><strong>Record not found</strong></td></tr>"; ?>

				</table>

				</form>

			</div>

           <?php  if($this->session->userdata('utype')==1 || $this->session->userdata('utype')==2)    {  ?>
            
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php echo $links; ?>
			
			</tr>
			</table>
			<div class="clear"></div>
            			
<?php  }  ?>
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