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
 
 

function validateform()
{



	var userid=jQuery("#userid").val(); 
	var societyid=jQuery("#societyid").val(); 

	
	
	
var error='';
if(userid=='' || userid=='Select Sub Admin')
  {
	error+="* Please select Socity Admin";
  	$("#userid").addClass('inp-form-error');
	 }else
	   {
   	$("#userid").removeClass('inp-form-error');
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
}</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Show All Society</h1>
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
		  <form  id="addnewsocity" name="addnewsocity" method="post" onsubmit="return validateform()" action="<?php echo base_url();?>admin/allusers/assign" >
           <table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody>
                <tr>
					<th class="table-header-check"><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Society Name</a>	</th>
             		<th class="table-header-repeat line-left"><a href="">Option</a></th>
				</tr>
                <?php foreach($allsociety as $item)
				   {?>
                <tr>
                <td></td>
                     <td><label><?php echo $item['society_title']; ?></label></td>
                   <td><a href="<?php echo base_url();?>admin/allusers/removeassign?aid=<?php echo $item['assid']; ?>&uid=<?php echo $item['userid']; ?>" title="Unpblished" class="icon-2 info-tooltip"></a></td>
                 </tr>
                <?php } ?>
                
                
                </tbody></table>
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