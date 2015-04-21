<?php // $this->load->view('header'); 





 $address='';

foreach($property as $itemp)

 {

	 $address .='"'.$itemp['address'].'",';

   }

   



   

?>

<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/jQuery-v1.8.2.js"></script> 

<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/jquery.validate.js"></script> 
<style type="text/css">

@media screen and (max-width: 480px) {
#autoaddpro_mob{ width:100%;}	
#addpro .form_my_pr-o{ margin:0px auto; width:260px;}
#addpro .form_my_pr-o select{ width:216px;}		
#addpro .form_my_pr-o input[type="text"]{ width:216px;}
#addpro .form_my_pr-o input[type="submit"]{}
	
}

@media screen and (max-width: 360px) {
#autoaddpro_mob{ width:100%;}	
#addpro .form_my_pr-o{ margin:0px auto; width:260px;}
#addpro .form_my_pr-o select{ width:216px;}		
#addpro .form_my_pr-o input[type="text"]{ width:216px;}
#addpro .form_my_pr-o input[type="submit"]{ width:216px!important;}
	
}
@media screen and (max-width: 320px) {
#autoaddpro_mob{ width:100%;}	
#addpro .form_my_pr-o{ margin:0px auto; width:255px!important;}
#addpro .form_my_pr-o select{ width:216px!important;}		
#addpro .form_my_pr-o input[type="text"]{ width:216px!important;}
#addpro .form_my_pr-o input[type="submit"]{ width:216px!important;}
	
}

#addpro .form_my_pr-o select {

    border: 1px solid #81A132;

    height: 36px;

    margin:-3px 0 19px 20px;

    width: 276px;

	padding:7px;

}





#addpro .form_my_pr-o {

    background: none repeat scroll 0 0 #97C03C;

    border: 1px solid #97C03C;

    height: auto;

    margin: 0 auto;

    width: 324px;

}



#addpro .form_my_pr-o p {

    color: #000000;

    font-family: "Helvetica Neue";

    font-size: 18px;

	margin-left:25px;



}



#addpro .form_my_pr-o h5 {

    color: #000000;

    font-family: "Helvetica Neue";

    font-size: 22px;

	margin-left:25px;



}

#addpro .form_my_pr-o input[type="text"] {

    border: 1px solid #81A132;

    height: 36px !important;

    margin-left: 22px;

    padding: 0 !important;

    width: 274px;

}

#addpro .form_my_pr-o label {

    color: #000000;

    font-family: "Helvetica Neue";

    font-size: 14px;

    padding-left: 28px;

}

#addpro .form_my_pr-o input[type="submit"] {

    background: #60AC0D;

    border: 0 solid #81A132;

    color: #FFFFFF;

    font-size: 19px;

    height: 40px !important;

    margin-left: 23px;

    margin-top: 7px;

    padding: 0 !important;

    text-shadow: 0 1px 0 #EEEEEE;

    width: 274px ;

}



.ui-menu-item {

    border-bottom: 1px solid;

    color: #000000;

    padding: 5px;

	background:#fff;

	list-style:none;

	width:250px;

}

.ui-autocomplete{left:0px !important; margin-left:0px !important; width:0px !important; padding-left:150px !important;}

.inp-form-error {
    border: 2px solid #990000 !important;
} 

</style>



<script src="<?php echo frontThemeUrl; ?>assets/js/jquery-ui.js"></script>

<script type="text/javascript">



 function getaddress()

  {

  stateid=jQuery('#stateid').val();	 

   

   cityid=jQuery('#cityid').val();



   areaid=jQuery('#areaid').val();

	 	  

   id=jQuery('#societyid').val();

 

 //  window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?cid="+id;														  

	 window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?cityid="+cityid+"&areaid="+areaid+"&cid="+id+"&stateid="+stateid;

	 



      var availableTags = [<?php echo $address; ?>];



	   jQuery( "#addressid" ).autocomplete({ source: availableTags });												  

	  }

	  function getcity()

	 {

     stateid=jQuery('#stateid').val();

	 

	 window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?stateid="+stateid;

	 

	 }

	  

	function getarea()

	 {

     stateid=jQuery('#stateid').val();	 

     cityid=jQuery('#cityid').val();

	 

	 window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?cityid="+cityid+"&stateid="+stateid;

	 

	 }

	 

	 function getsociety()

	 {

     stateid=jQuery('#stateid').val();	 

     cityid=jQuery('#cityid').val();



     areaid=jQuery('#areaid').val();

	 

	 

	 

 window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?cityid="+cityid+"&areaid="+areaid+"&stateid="+stateid;

	 

	 }

	  

	  

	  

	</script>



<script type="text/javascript">

jQuery(function() {



var availableTags = [<?php echo $address; ?>];





jQuery( "#addressid" ).autocomplete({ source: availableTags });



jQuery('.ui-corner-all').click(function () {

										 

   	 id=jQuery('#addressid').val();

   	 cid=jQuery('#societyid').val();

		

     url='<?php echo base_url();?>admin/master/autocompleteaddress';

	 jQuery.post(url,{"id":id,"cid":cid,"action":"payment"},function (data)		{ 



	   jQuery('#payrep').replaceWith(data); 

	   });	

		

		 });});


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
</script>





            

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





          

          <select id="cityid" name="cityid" onchange="getarea()" >

                 <option value="">Select City</option>

          <?php foreach($allcity as $soci)

		      {?>

                  <option <?php if(@$_REQUEST['cityid']==$soci['id']){ echo 'selected="selected"'; }else{} ?> value="<?php echo $soci['id']?>"><?php echo $soci['cityname']; ?></option>

                  

               <?php } ?>  

                 </select>

                 

          <select id="areaid" name="areaid" onchange="getsociety()" >

                 <option value="">Select Area</option>

          <?php foreach($allarea as $soci)

		      {?>

                  <option <?php if(@$_REQUEST['areaid']==$soci['id']){ echo 'selected="selected"'; }else{} ?> value="<?php echo $soci['id']?>"><?php echo $soci['areaname']; ?></option>

                  

               <?php } ?>  

                 </select>

                 

          <select id="societyid" name="societyid" onchange="getaddress()" >

                 <option value="">Select Society</option>

          <?php foreach($societylist as $soci)

		      {?>

                  <option <?php if(@$_REQUEST['cid']==$soci['id']){ echo 'selected="selected"'; }else{} ?> value="<?php echo $soci['id']?>"><?php echo $soci['society_title']; ?></option>

                  

               <?php } ?>  

                 </select>       

                 

                 <label>Enter Property </label>

          <input type="text" id="addressid"  name="addressid" />

          

          <div id="payrep">

          <input type="hidden"   name="sadminid"  value=""  />

          <input id="addprobtn" name="add" type="submit"  style="margin-bottom:10px; cursor:pointer;" value="Add">

          </div>

        </div>

        </form><br />

<br />

<?php if(@$_REQUEST['msg']==1)

   {

	   

	   echo '<h1>Successful added property </h1>';

	   }?>

  
			
