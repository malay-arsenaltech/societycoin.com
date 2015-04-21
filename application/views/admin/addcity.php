<?php $this->load->view('admin/header'); ?>
<script type="text/javascript">
function getstates()
  {
	  id=$('#countryid').val();
	  url='<?php echo base_url();?>admin/master/getstate';
	  
	  $.post(url,{"id":id,"action":"city"},function (data)		{ 	$('#stateid').html(data); 	});
				

	  
	  
	  } 
 $(document).ready(function () {
 
 $.validator.addMethod('fNamealpha', 
	function (value, element) 
	{
		var name=$('#cityname').val();
		var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');	
	
 


    $('#addnewsocity').validate({ // initialize the plugin
        rules: {
        
			stateid: {
                required: true
               
            },
			 cityname: {
                required: true,
				fNamealpha:true               
            }

		
		
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
      <h1>Add City</h1>
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
          <form method="post" id="addnewsocity" name="addnewsocity"   action="<?php echo base_url();?>admin/master/addcity" >
		  <input type="hidden" name="countryid"  value="1" id="countryid"   >
		  
            <table id="id-form" class="table table-bordered">
              <thead>
               
			
       
                <tr>
				
				   <th>State</th>
                  <td>
                  <select id="stateid" name="stateid"  >
                 <option value="">Select State</option>
				                   <?php 
				foreach($states as $state)
				     {
						 ?>
						 <option value="<?php echo $state['id']?>" ><?php echo $state['state']?></option>
                        <?php } ?> 
                 </select>
                    
                    
                    </td>				
                 
                </tr>
                <tr>              	   
				<th>Enter 	City Name</th><td>
                    <input type="text" id="cityname" name="cityname" class="inp-form" value="" ></td>
                </tr>
                <tr>
                 <th></th> <td> <input type="submit" class="form-submit"  value="Add New User" ><input type="reset" value="Reset" class="form-reset" >
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
