<?php $this->load->view('admin/header'); ?>
<script type="text/javascript">
function getstates()
  {
	var  id=$('#countryid').val();
	 var url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#stateid').html(data); 	});				

	  	  
  } 
  


function getcity()
  {
	 var id=$('#stateid').val();
	var  url='<?php echo base_url();?>admin/master/getcity';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#cityidtd').html(data); 	});				

	  	  
  } 
  


  
 $(document).ready(function () {

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
		 areaname: {
                required: true
               
            },
			
			
	
        }
    });

});
 


</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
<div class="clear"></div>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Edit Area/Sector</h1>
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
        <td><!--  start content-table-inner ...................................................................... START -->
          <form method="post" id="addnewsocity" name="addnewsocity"   action="<?php echo base_url();?>admin/master/edit_area" >
		    <input type="hidden" name="countryid"  value="1" id="countryid"   >
			<input type="hidden" name="areaid"   value="<?php   echo (isset($edit_area->id)) ? $edit_area->id :  "" ;    ?>"   >
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
					 
					  $sel = (isset($edit_area->stateid) && $edit_area->stateid ==  $state['id']) ? " selected='selected' "   :  "";
						 ?>
						 <option <?php  echo   $sel;  ?> value="<?php echo $state['id']?>" ><?php echo $state['state']?></option>
                        <?php } ?> 
                 </select>
                    
                    
                    </td>				
                 
                </tr>
                
              <tr>
                  <th>City</th>
                  <td id="cityidtd">
                  <select  name="cityid" >
                  <option value=''>Select City</option>
				  <?php   foreach($allcity AS $c) { 
				  $sel = (isset($edit_area->cityid) && $edit_area->cityid ==  $c['id']) ? " selected='selected' "   :  ""; ?>
				  <option <?php echo $sel  ?>  value="<?php  echo $c['id'];  ?>" ><?php  echo $c['cityname'];  ?></option>
				  
				  <?php }  ?>
                 </select>
                    
                    
                    </td>
                </tr>
                <tr> <th>Area/Sector</th>
		<td> <input type="text" id="areaname" name="areaname"  value="<?php   echo (isset($edit_area->areaname)) ? $edit_area->areaname :  "" ;    ?>" class="inp-form" value="" ></td>
                </tr>
                <tr>
                  <th> </th><td><input type="submit" class="form-submit"  value="Add New User" ><input type="reset" value="Reset" class="form-reset" >
                    <input type="hidden" id="status" name="status" value="1" >
                                     </td>
                </tr>
              </thead>
            </table>
          </form>
          <!--  end content-table-inner ............................................END  --></td>
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
