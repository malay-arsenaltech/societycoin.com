<?php $this->load->view('admin/header'); ?>
<style type="text/css">
#id-form th {
    line-height: 28px;
    min-width: 130px;
    padding: 10px;
    text-align: left;
    width: 284px;
}
</style>
 <div class="clear"></div>
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
	  
 

function validateform()
{



	var countryid=jQuery("#countryid").val(); 
	var stateid=jQuery("#stateid").val(); 
	var cityid=jQuery("#cityid").val(); 
	var areaid=jQuery("#areaid").val(); 
	var societyid=jQuery("#societyid").val(); 
	var address=jQuery("#address").val(); 	
	
	
	
var error='';
if(countryid=='' || countryid=='Select Country')
  {
	error+="* Please select Socity Admin";
  	$("#countryid").addClass('inp-form-error');
	 }else
	   {
   	$("#countryid").removeClass('inp-form-error');
	   }
	   if(stateid=='' || stateid=='Select State')
  {
	error+="* Please select Socity Admin";
  	$("#stateid").addClass('inp-form-error');
	 }else
	   {
   	$("#stateid").removeClass('inp-form-error');
	   }


	   if(cityid=='' || cityid=='Select City')
  {
	error+="* Please select Socity Admin";
  	$("#cityid").addClass('inp-form-error');
	 }else
	   {
   	$("#cityid").removeClass('inp-form-error');
	   }
	   

	 if(areaid=='' || areaid=='Select Area / Sector')
  {
	error+="* Please select Socity Admin";
  	$("#areaid").addClass('inp-form-error');
	 }else
	   {
   	$("#areaid").removeClass('inp-form-error');
	   }
	   
	   
	   if(address=='')
  {
	error+="* Please select Socity Admin";
  	$("#address").addClass('textarea-error');
	 }else
	   {
   	$("#address").removeClass('textarea-error');
	   }
	   
	   
	   
	   if(societyid=='' || societyid=='Select your Society')
  {
	error+="* Please select Socity Admin";
  	$("#societyid").addClass('inp-form-error');
	 }else
	   {
   	$("#societyid").removeClass('inp-form-error');
	   }



	 
  
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}</script><?php if(@$_REQUEST['st']==1)
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
		<h1>Edit Property</h1>
	</div>
	<!-- end page-heading -->

    <div style=" display:none;" id="error1"></div>                        

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
		  <form  id="addnewsocity" name="addnewsocity" method="post" onsubmit="return validateform()" action="<?php echo base_url();?>admin/allpropertys/update" >
          
            	<table id="id-form" class="table table-bordered">
				<thead>
					
                     <tr>
                  <th><label>Select Country</label></th>
                  <th>
                  <select id="countryid" name="countryid" onchange="getstates(this.id)"  >
                  <?php foreach($allcountry as $allcountry) { ?>
                           <option <?php if($data['countryid']==$allcountry['id']){ echo 'selected="selected"';} ?>  value="<?php echo $allcountry['id']?>" ><?php echo $allcountry['countryname']?></option>
                  <?php }?>
                 </select>
                    
                    
                    </th>
                </tr>
                <tr>
                  <th><label>Select State</label></th>
                  <th>
                  <select id="stateid" name="stateid" onblur="getcity()" >
                  <?php foreach($allstate as $allstate) { ?>
                           <option <?php if($data['stateid']==$allstate['id']){ echo 'selected="selected"';} ?> value="<?php echo $allstate['id']?>" ><?php echo $allstate['state']?></option>
                  <?php }?>
                 </select>
                    
                    
                    </th>
                </tr>
                
                <tr>
                  <th><label>Select City</label></th>
                  <th>
                  <select id="cityid"  name="cityid" onblur="getarea()" >
                  <?php foreach($allcity as $allcity) { ?>
                           <option <?php if($data['cityid']==$allcity['id']){ echo 'selected="selected"';} ?> value="<?php echo $allcity['id']?>" ><?php echo $allcity['cityname']?></option>
                  <?php }?>
                 </select>
                    
                    
                    </th>
                </tr>
                
                
                <tr>
                  <th><label>Select Area / Sector</label></th>
                  <th>
                  <select id="areaid" name="areaid" onblur="getsociety()" >
                  <?php foreach($allarea as $allarea) { ?>
                           <option <?php if($data['areaid']==$allarea['id']){ echo 'selected="selected"';} ?> value="<?php echo $allarea['id']?>" ><?php echo $allarea['areaname']?></option>
                  <?php }?>

                 </select>
                    
                    
                    </th>
                </tr>
                
                <tr>
                  <th><label>Select your society</label></th>
                  <th>
                  <select id="societyid" name="societyid" >
                  <?php foreach($allsociety as $allsociety) { ?>
                           <option <?php if($data['societyid']==$allsociety['id']){ echo 'selected="selected"';} ?> value="<?php echo $allsociety['id']?>" ><?php echo $allsociety['society_title']?></option>
                  <?php }?>

                 </select>
                    
                    
                    </th>
                </tr>
                <tr>    
				    	<th><label>Address</label></th><th><textarea name="address" id="address" style="width: 254px; height: 96px;"><?php echo $data['address']; ?></textarea></th>
                    	

                
					</tr>
                   
                   <tr>    
				    	<th>&nbsp;</th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add New User" />                         <input type="hidden" id="status" name="status" value="1"/>
                         <input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>" />
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