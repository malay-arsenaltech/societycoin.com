<?php $this->load->view('header'); ?>
<script type="text/javascript">
function updatesprofile()
{



	var societyid=jQuery("#societyid").val(); 
	var address=jQuery("#address").val(); 
	var city=jQuery("#city").val(); 
	var state=jQuery("#state").val(); 
	var country=jQuery("#country").val(); 
	
 	
	var error='';
	
	
	if(societyid=='')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#societyid").addClass('inp-form-error');
	 }else
	   {
   	$("#societyid").removeClass('inp-form-error');
	   }
	
	
	  
	if(address=='' || address=='Address')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#address").addClass('inp-form-error');
	 }else
	   {
   	$("#address").removeClass('inp-form-error');
	   }

	   
	   if(city=='' || city=='City')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#city").addClass('inp-form-error');
	 }else
	   {
   	$("#city").removeClass('inp-form-error');
	   }
	   
	   if(state=='' || state=='State')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#state").addClass('inp-form-error');
	 }else
	   {
   	$("#state").removeClass('inp-form-error');
	   }
	   
	      if(country=='' || country=='Country')
	 {
	error+="&amp;lt;p&amp;gt;* Please enter your vacancy details.&amp;lt;/p&amp;gt;\n";
     $("#country").addClass('inp-form-error');
	 }else
	   {
   	$("#country").removeClass('inp-form-error');
	   }
	   
	
if(error!='')
	{
	$("#error").show();
	$("#error").html(error);
	return false;
	}
	return true;	
}
</script>
<!--mid-portion-->
<div class="row-fluid mid-outer" >
  <div class=" container mid-inner" >
    <!--left-->
    <?php $this->load->view('left'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->
    <div class="right">
    <?php $this->load->view('menu'); ?>
      <!--form-->
      <div class="form" >
      <form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>property/add" >
        <div class="main-form">
          <p>View All Property</p>
        
        
        </div></form>
      </div>
      <!--form//-->
      
      <!--text-->
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>