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
  
 function getsociety()
  {
		id=$('#societyid').val();
		
		url='<?php echo base_url();?>admin/master/getaddressbyid';
		
		$.post(url,{"id":id,"action":"chargehead"},function (data)		{ 
		
		$('#propertyid').html(data); 	});				
		
		
	  }
	  
	  
	   function getchargehead()
  {
		id=$('#societyid').val();
		
		url='<?php echo base_url();?>admin/master/getchargehead';
		
		$.post(url,{"id":id,"action":"getchargehead"},function (data)		{ 
																
																
																
		
		$('#chargehead').html(data); 	});				
		
		
	  }

 
 
 

function validateform()
{



	var societyid=jQuery("#societyid").val(); 
	var propertyid=jQuery("#propertyid").val(); 
	var chargehead=jQuery("#chargehead").val(); 
	var sdate=jQuery("#sdate").val(); 
	var edate=jQuery("#edate").val(); 
	var description=jQuery("#description").val(); 	
	var amount=jQuery("#amount").val(); 		

	
	
	
var error='';
if(societyid=='' || societyid=='Select your Society')
  {
	error+="* Please select Socity Admin";
  	$("#societyid").addClass('select-from-error');
	 }else
	   {
   	$("#societyid").removeClass('select-from-error');
	   }
	   
	   if(propertyid=='' || propertyid=='Select your address')
  {
	error+="* Please select Socity Admin";
  	$("#propertyid").addClass('select-from-error');
	 }else
	   {
   	$("#propertyid").removeClass('select-from-error');
	   }


	   if(chargehead==null)
  {
	error+="* Please select Socity Admin";
  	$("#chargehead").addClass('select-from-error');
	 }else
	   {
   	$("#chargehead").removeClass('select-from-error');
	   }
	   

	 if(sdate=='')
  {
	error+="* Please select Socity Admin";
  	$("#sdate").addClass('inp-form-error');
	 }else
	   {
   	$("#sdate").removeClass('inp-form-error');
	   }
	   
	   	 if(edate=='')
  {
	error+="* Please select Socity Admin";
  	$("#edate").addClass('inp-form-error');
	 }else
	   {
   	$("#edate").removeClass('inp-form-error');
	   }


	 if(description=='')
  {
	error+="* Please select Socity Admin";
  	$("#description").addClass('textarea-error');
	 }else
	   {
   	$("#description").removeClass('textarea-error');
	   }

	   
	  
	  if(amount=='' || isNaN(amount))
  {
	error+="* Please select Socity Admin";
  	$("#amount").addClass('inp-form-error');
	 }else
	   {
   	$("#amount").removeClass('inp-form-error');
	   }



  
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>ADD Bill</h1>
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
		  <form  id="addnewsocity" name="addnewsocity" method="post" onsubmit="return validateform()" action="<?php echo base_url();?>admin/allsociety/billaddprocess" >
            	<table id="id-form" class="table table-bordered">
				<thead>
					
                                    
                <tr>
                  <th><label>Society </label></th>
                  <th>
                  <select id="societyid" name="societyid" onchange="getsociety()" >
                  <option>Select your Society</option>
                  <?php foreach($societydata as $item)
				     {
						 
						 echo '<option value="'.$item['id'].'" >'.$item['society_title'].'</option>'; 
						 
						 }?>
                  
                  </select>  
                    
                    </th>
                </tr>
                <tr>
                  <th><label>Property</label></th>
                  <th>
                  <select id="propertyid" onblur="getchargehead()" name="propertyid"  >
                  <option>Select your address</option>
                  </select>  
                    
                    </th>
                </tr>
                <tr>
                  <th><label>Charge Head</label></th>
                  <th>
                  <select  id="chargehead" name="chargehead"  >
                                  
                  
                  </select>  
                    
                    </th>
                </tr>
                
                <tr>    
				    	<th><label>Start Date </label></th><th><input type="text" id="sdate" name="sdate"/></th>
                    	

                
					</tr>
                    
                                    <tr>    
				    	<th><label>End Date </label></th><th><input type="text" id="edate" name="edate"/></th>
                    	

                
					</tr>
                    
                             <tr>    
				    	<th><label>Description </label></th><th><textarea id="description" name="description" ></textarea></th>
                    	

                
					</tr>
                    
                             <tr>    
				    	<th><label>Amount </label></th><th><input type="text" id="amount" name="amount"/></th>
                    	

                
		            

                   <tr>    
				    	<th>&nbsp;</th>
                        <th>
                         <input type="submit" class="form-submit"  value="Add New User" />&nbsp;<input class="form-reset" type="reset" value="Reset" />
                         <input type="hidden" id="status" name="status" value="1"/>
                         <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
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