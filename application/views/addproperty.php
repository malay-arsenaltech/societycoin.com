<?php $this->load->view('header'); 

 $address='';
if(isset($property)){
foreach($property as $itemp)

 {

	 $address .='"'.$itemp['address'].'",';

   }
}

?>

<script type="text/javascript">

 function getstates()
  {

	 var id=jQuery('#countryid').val();

	 var url='<?php echo base_url();?>admin/master/getstate';

	  jQuery.post(url,{"id":id,"action":"states"},function (data){ 
	  jQuery('#stateid').html(data); 	});	

  } 
  
function getcity()

  {

	 var id=jQuery('#stateid').val();

	var  url='<?php echo base_url();?>property/getcity';

	    

	  jQuery.post(url,{"id":id,"action":"city"},function (data)	{
	  jQuery('#cityid').html(data); 	});				
	  

  }   

function  getarea()
  {

	 var id=jQuery('#cityid').val();

	 var url='<?php echo base_url();?>property/getarea';
	  

	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 

		 jQuery('#areaid').html(data); 	});				  	  

  } 
  

 function getsociety()

  {

	 var id=jQuery('#areaid').val();

	  var url='<?php echo base_url();?>property/getsociety';

	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 

	   jQuery('#societyid').html(data); 	});				

	  }



 function getaddress()

  {

	var  id=jQuery('#societyid').val();

	  var url='<?php echo base_url();?>property/getaddress';

	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 

	   jQuery('#addressid').html(data); 	});				

	  }

	  

	  function propertystatus()
	   {
		   
   	 var id=jQuery('#addressid').val();
 

	var pname=jQuery('#addressid option:selected').text();
 

	var sname=jQuery('#societyid option:selected').text();
 

   	var soid=jQuery('#societyid').val();

	 var url='<?php echo base_url();?>admin/master/propertystatus';

	  jQuery.post(url,{"id":id,"action":"area"},function (data)		{ 

	   var json = data,    obj = JSON.parse(json);	   

	   if(obj.sid==0)

	    {

		jQuery('#addprobtn').replaceWith('<input id="addprobtn" style="margin-bottom:10px;" name="add" type="submit"  style="margin-top:15px;" value="Add">');		  
  

		}else

		   {

		  jQuery('#addprobtn').replaceWith('<p id="addprobtn">This property belong to another user. So Please select another property otherwise <a href="<?php echo base_url();?>user/modifyform?pid='+obj.sid+'&pname='+pname+'&soid='+soid+'&sname='+sname+'">click here</a> request  for property modification.</p>');		  
			   }	   

	   });			   

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

	   

	//   alert(addressid);

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

}
$(document).ready(function() {
 $(".update_profile").click(function(){
        $("#updateprofile_div").slideToggle();
			 $("#updatesetting_div").hide();
		
    });
	
	 $(".change_password").click(function(){
        $("#updatesetting_div").slideToggle();
		 $("#updateprofile_div").hide();
		
    });
    });
</script>

<style>

table.reference {color: #333!important; margin-left:10px;   font-size: 12px; }
table.reference, table.tecspec {border-collapse:collapse}
table.reference th{ background-color: #366487;    border: 1px solid #555555;    color: #ffffff;    padding: 3px;    text-align: center;	height:33px;   }
   
table.reference td  { border: 1px solid #d4d4d4;    padding: 7px 5px; }
table.reference tr:nth-child(2n+1){background-color:#e9eef2}
table.reference tr td span.success{color:green;}
table.reference tr td span.failure{color:red;}
table.reference th span {margin:0 !important; padding:0 !important;}

</style>



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

    <div id="vertical_container" class="vert_my_pro" >

        <h1 class="accordion_toggle update_profile" style="padding:7px 10px;"> My Properties</h1>

		<div class="accordion_content acc_my_pro " id="updateprofile_div">

          <div class="main-form " id="mytransaction_mob" style="float:left; height:200px; margin-top:-13px; width:100%; overflow:scroll; background:#fff;">

                 

           <table border="0" width="96%" cellpadding="0" cellspacing="0" class="reference" id="product-table">

				<tr>

					

					<th class="table-header-repeat line-left minwidth-1"><span>Society Name</span>	</th>

					<th class="table-header-repeat line-left"><span>Address</span></th>

   				     <th class="table-header-repeat line-left"><span>Options</span></th>

								</tr>
                                

                                <?php $i=0;?>

                  <?php 
				  if(count($data ) > 0){
				  
				  foreach($data as $data)

				    {


					$i++;

					 if($i%2==0)

					   {

						   $k=1;

						   }else

						      {

								  $k=0;

								  }

						?>              

                        

				<tr class="prow<?php echo $k;?>">

				
					<td><?php echo $data['society_title']; //$data['name']; ?></td>

					<td><?php echo $data['address']; ?></td>

 					 <td class="options-width">

    

					<a href="<?php echo base_url();?>property/paymentform/<?php echo $data['id']; ?>" title="" class="fancybox.ajax display"  >Pay</a>

                
      <a href="<?php echo base_url();?>property/delete/<?php echo md5($data['id']); ?>" title="Delete"  onclick="return confirm('Are you sure you want to delete the property from your account?');" class="icon-2 info-tooltip "></a>

                   

					</td></tr>

			<?php   }  } else  echo "<tr><td colspan='5'><b>You have not added any property!</b></td></tr>"; ?>

				</table>

             

  

            </div>

    

     	</div>





        <h1 class="accordion_toggle change_password" style="padding:7px 10px;">Add a property</h1>

		<div class="accordion_content" id="updatesetting_div" style="background:#677B4F;display:none;">

            <div id="horizontal_container" style="height:auto !important;  background:#677B4F;" >

                   <form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>property/add" >

        <div class="main-form form_my_pr-o">

        

          <p></p>



          <select id="stateid" name="stateid" onchange="getcity()" >

                 <option value="">Select State</option>

          <?php foreach($allstate as $soci)

		      {?>

                  <option <?php if(@$_REQUEST['stateid']==$soci['id']){ echo 'selected="selected"'; }else{} ?> value="<?php echo $soci['id']?>"><?php echo $soci['state']; ?></option>

                  

               <?php } ?>  

                 </select>





          

          <select id="cityid" name="cityid" onchange="getarea();" >
		<option value="">Select Your City</option>
                
                 </select>

                 

          <select id="areaid" name="areaid" onchange="getsociety();" >
<option value="">Select Your Area</option>
                
                 </select>

                 

          <select id="societyid" name="societyid" onchange="getaddress();" >
			<option value="">Select Your Society</option>
               
                 </select>       

                 
          
          <select id="addressid" name="addressid" >
			<option value="">Select Your Property</option>
                 
                 </select>       


          <div id="payrep">
   <input type="hidden"   name="sadminid"  value=""  />
          

          <input id="addprobtn" name="add" type="submit"  style="margin-bottom:10px; cursor:pointer;" value="Add">

          </div>

        </div>

        </form><br />

            </div>

    

   	</div>

    

    

    </div>

   

    

	

    

    </div>

     

     

      <div class="clearfix"></div>

    </div>

  </div>

</div>
<link rel="stylesheet" href="<?php echo $this->config->item("base_url");?>fancybox/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $this->config->item("base_url");?>fancybox/jquery.fancybox.pack.js?v=2.1.4"></script>
<script>
$(function () {
	$(".display").fancybox({	
			maxWidth	: 380,
		maxHeight	: 200,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		'helpers' : {
overlay : null,
title : {
type : 'inside'
},
buttons	: {}
},
'onComplete': function() {
      $("#fancybox-wrap").css({'top':'20px', 'bottom':'auto'});
   }
	});
	

});

</script>


    <?php $this->load->view('footer'); ?>