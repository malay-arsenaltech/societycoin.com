<?php $this->load->view('header'); ?>
    <?php // echo '<pre>';  print_r($data); exit();?>
<script type="text/javascript">
 function getstates()
  {
	  id=jQuery('#countryid').val();
	  url='<?php echo base_url();?>admin/master/getstate';
	  
	  jQuery.post(url,{"id":id,"action":"states"},function (data)		{ 	jQuery('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	  id=jQuery('#stateid').val();
	  url='<?php echo base_url();?>admin/master/getcity';
	  
	  jQuery.post(url,{"id":id,"action":"city"},function (data)		{ 	jQuery('#cityid').html(data); 	});				

	  	  
  } 
  
function  getarea()
  {

	  id=jQuery('#cityid').val();
	  url='<?php echo base_url();?>admin/master/getarea';
	  
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
													 														 jQuery('#areaid').html(data); 	});				

	  	  
  } 
  
 function getsociety()
  {
	  id=jQuery('#areaid').val();
	  url='<?php echo base_url();?>admin/master/getsociety';
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
	   jQuery('#societyid').html(data); 	});				
	  }

 function getaddress()
  {
	  id=jQuery('#societyid').val();
	  url='<?php echo base_url();?>admin/master/getaddress';
	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 
	   jQuery('#addressid').html(data); 	});				
	  }
 
 
 

function updatesprofile()
{



	var countryid=jQuery("#countryid").val(); 
	var stateid=jQuery("#stateid").val(); 
	var cityid=jQuery("#cityid").val(); 
	var areaid=jQuery("#areaid").val(); 
	var societyid=jQuery("#societyid").val(); 
	var addressid=jQuery("#addressid").val(); 	
	
	
var error='';
if(countryid=='' || countryid=='Select Country')
  {
	error+="* Please select Socity Admin";
  	jQuery("#countryid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#countryid").removeClass('inp-form-error');
	   }
	   

	   if(stateid=='' || stateid=='Select State')
  {
	error+="* Please select Socity Admin";
  	jQuery("#stateid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#stateid").removeClass('inp-form-error');
	   }


	   if(cityid=='' || cityid=='Select City')
  {
	error+="* Please select Socity Admin";
  	jQuery("#cityid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#cityid").removeClass('inp-form-error');
	   }
	   

	 if(areaid=='' || areaid=='Select Area / Sector')
  {
	error+="* Please select Socity Admin";
  	jQuery("#areaid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#areaid").removeClass('inp-form-error');
	   }
	   
	   
	   if(addressid=='' || addressid=='Select your address')
  {
	error+="* Please select Socity Admin";
  	jQuery("#addressid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#addressid").removeClass('inp-form-error');
	   }
	   
	   
	   
	   if(societyid=='' || societyid=='Select your Society')
  {
	error+="* Please select Socity Admin";
  	jQuery("#societyid").addClass('inp-form-error');
	 }else
	   {
   	jQuery("#societyid").removeClass('inp-form-error');
	   }

	 
  
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}</script>
<!--mid-portion-->
<div class="row-fluid mid-outer">
  <div class=" container mid-inner">
    <!--left-->
    <?php $this->load->view('left'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->

    <div class="right">
    <?php $this->load->view('menu'); ?>
<form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>property/update" >
<input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>" />
        <div class="main-form">
          <p>Edit Property</p>
          <select id="countryid" name="countryid" onchange="getstates(this.id)"  >
                  <?php foreach($allcountry as $allcountry) { ?>
                           <option <?php if($data['countryid']==$allcountry['id']){ echo 'selected="selected"';} ?>  value="<?php echo $allcountry['id']?>" ><?php echo $allcountry['countryname']?></option>
                  <?php }?>
                 </select>
          <select id="stateid" name="stateid" onblur="getcity()" >
                  <?php foreach($allstate as $allstate) { ?>
                           <option <?php if($data['stateid']==$allstate['id']){ echo 'selected="selected"';} ?> value="<?php echo $allstate['id']?>" ><?php echo $allstate['state']?></option>
                  <?php }?>
                 </select>
          <select id="cityid"  name="cityid" onblur="getarea()" >
                  <?php foreach($allcity as $allcity) { ?>
                           <option <?php if($data['cityid']==$allcity['id']){ echo 'selected="selected"';} ?> value="<?php echo $allcity['id']?>" ><?php echo $allcity['cityname']?></option>
                  <?php }?>
                 </select>
          <select id="areaid" name="areaid" onblur="getsociety()" >
                  <?php foreach($allarea as $allarea) { ?>
                           <option <?php if($data['areaid']==$allarea['id']){ echo 'selected="selected"';} ?> value="<?php echo $allarea['id']?>" ><?php echo $allarea['areaname']?></option>
                  <?php }?>

                 </select>
          <select id="societyid" name="societyid" onblur="getaddress()" >
                  <?php foreach($allsociety as $allsociety) { ?>
                           <option <?php if($data['societyid']==$allsociety['id']){ echo 'selected="selected"';} ?> value="<?php echo $allsociety['id']?>" ><?php echo $allsociety['society_title']?></option>
                  <?php }?>

                 </select>
                 
                 
          <select id="addressid" name="addressid" >
                 <?php foreach($allpropertys as $allcountry)
				     { ?>
                         <option <?php if($data['addressid']==$allcountry['id']){ echo 'selected="selected"';} ?> value="<?php echo $allcountry['id']?>" ><?php echo $allcountry['address']?></option>
                 <?php }?>
                 </select>       
          <input name="add" type="submit"  style="margin-top:15px;" value="Edit">
        </div>
        </form>   
    
	
    
    </div>
     
     
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>