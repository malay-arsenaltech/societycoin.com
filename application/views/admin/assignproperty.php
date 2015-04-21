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
 
 

  
 $(document).ready(function () {

    $('#addnewsocity').validate({ 
        rules: {
            
            userid: {
                required: true
				
               
            },
			 'societyid[]': {
                required: true
				
               
            }
			
			
	
        },
		
		messages: {
		
		
'userid': {required: "Please Select Sub admin"},


'societyid[]': { required: "Please Select Society"}


}
    });

});
 $(document).ready(function () { 
 						
$('#userid').change(function() {  
    var data = "";
    $.ajax({ 
        type: 'post',
		data : "",
        url: "<?php echo base_url();  ?>admin/allsociety/get_unique_society/"+$(this).val() ,
        success:function(data){
        $('#societyid').html(data);
        },
      error:function(){
      $('#societyid').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
        }
     });  							
});	
});  

</script>
<style>
#addnewsocity label.error {float:right !important; width:250px;}

</style>
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Assign Society to Sub Admin</h1>
	</div>
	<!-- end page-heading -->

    <div style=" display:none;" id="error1"></div>                        
<?php  //echo '<pre>'; print_r($subadminuser); print_r($allsociety); echo '</pre>'; ?>
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
		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/allusers/assign" >
            	<table id="id-form" class="table table-bordered">
				<thead>
					
                     <tr>
                  <th>Select Sub Admin</th>
                  <td>
      
                  <select id="userid" name="userid" style="text-align:left; padding-left:5px;" class="required">
                  <option value="">Select Sub Admin</option>
                  <?php foreach($subadminuser as $subadminuser)
				     {
						 ?>
                         
                         
                         <option value="<?php echo $subadminuser['id']?>" ><?php echo  $subadminuser['fname'].'&nbsp;&nbsp;'.$subadminuser['lname']?>&nbsp;/&nbsp;<?php echo  $subadminuser['email'];?></option>
                         
						 
						<?php }?>
                 </select>
                    
                    
                    </td>
                </tr><tr>
                  <th>Select Society</th>
                  <td>
                  <select style="height: 120px; text-align: left; padding-left: 7px;"  class="required" multiple="multiple" id="societyid" name="societyid[]" >
                    <option value="">Select Society</option>
                 </select>
                    
                    
                    </td>
                </tr>
                   <tr>    
				    	<th>&nbsp;</th>
                        <td>
                         <input type="submit" class="form-submit"  value="Add New User" >&nbsp;<input class="form-reset" type="reset" value="Reset" >
                         <input type="hidden" id="status" name="status" value="1">
                         <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" >
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