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
	  var id=$('#countryid').val();
	var  url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"states"},function (data)		{ 	$('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	 var id=$('#stateid').val();
	 var url='<?php echo base_url();?>admin/master/getcity';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#cityidtd').html(data); 	});				

	  	  
  } 
  
 
 
  $(document).ready(function () {
 
  $( "#cityid" ).live('change',function() {
 var id=$('#cityid').val();
	 var url='<?php echo base_url();?>admin/master/getarea';
	  
	  $.post(url,{"id":id,"action":"area"},function (data)		{ 
		$('#areaidtd').html(data); 	});				

 });	
 
  $( "#areaid" ).live('change',function() {
  
   var id = $('#areaid').val();
	  
	  

	  var url='<?php echo base_url();?>admin/master/getsociety';
	  
	  $.post(url,{"id":id,"action":"area"},function (data)		{ 
	$('#societyidtd').html(data); 	});				

  
   });
   
 $('#addnewsocity').validate({ // initialize the plugin
        rules: {
            countryid: {
                required: true			
               
            },
            stateid: {
                required: true				
               
            },
			 cityid: {
                required: true
               
            },
			 city: {
                required: true				
               
            },

			 areaid: {
                required: true				
               
            },
		 societyid: {
                required: true				
               
            },
			
			 address: {
                required: true,
				maxlength:50
               
            }
			
        }
    });

});

</script><?php if(@$_GET['st']==1)
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
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
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
		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/allpropertys/update" >
            <input type="hidden" name="countryid" value="1" >
            	<table id="id-form" class="table table-bordered">
				<thead>
			
                
                 <tr>
				
				   <th>State</th>
                  <td>
                  <select id="stateid" name="stateid"   onchange="getcity();" >
                 <option value="">Select State</option>
				                   <?php 
				foreach($states as $state)
				     {
						 ?>
						 <option value="<?php echo $state['id']?>" <?php if($data['stateid']==$state['id']){ echo 'selected="selected"';} ?> ><?php echo $state['state']?></option>
                        <?php } ?> 
                 </select>
                    
                    
                    </td>				
                 
                </tr>
                
                <tr>
                  <th>Select City</th>
                  <td id="cityidtd">
                  <select id="cityid"  name="cityid"  >
                  <?php foreach($allcity as $allcity) { ?>
                           <option <?php if($data['cityid']==$allcity['id']){ echo 'selected="selected"';} ?> value="<?php echo $allcity['id']?>" ><?php echo $allcity['cityname']?></option>
                  <?php }?>
                 </select>
                    
                    
                    </td>
                </tr>
                
                
                <tr>
                  <th>Select Area / Sector</th>
                  <td id="areaidtd">
                  <select id="areaid" name="areaid"  >
                  <?php foreach($allarea as $allarea) { ?>
                           <option <?php if($data['areaid']==$allarea['id']){ echo 'selected="selected"';} ?> value="<?php echo $allarea['id']?>" ><?php echo $allarea['areaname']?></option>
                  <?php }?>

                 </select>
                    
                    
                    </td>
                </tr>
                
                <tr>
                  <th>Select your society</th>
                  <td id="societyidtd">
                  <select id="societyid" name="societyid" >
                  <?php foreach($allsociety as $allsociety) { ?>
                           <option <?php if($data['societyid']==$allsociety['id']){ echo 'selected="selected"';} ?> value="<?php echo $allsociety['id']?>" ><?php echo $allsociety['society_title']?></option>
                  <?php }?>

                 </select>
                    
                    
                    </td>
                </tr>
                <tr>    
				    	<th>Address</th><td><textarea name="address" id="address"><?php echo $data['address']; ?></textarea></td>
                    	

                
					</tr>
                   
                   <tr>    
				    	<th>&nbsp;</th>
                        <td>
                         <input type="submit" class="form-submit"  value="Add New User" > 
						 <input type="hidden" id="status" name="status" value="1">
                         <input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>" >
                         </td>
                
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