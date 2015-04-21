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

	 var url='<?php echo base_url();?>admin/master/getstate';	  

	  $.post(url,{"id":id,"action":"states"},function (data){ 
	  $('#stateid').html(data); 	});	  

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
	  
	  $.post(url,{"id":id,"action":"area"},function (data){ 
		 $('#areaidtd').html(data); 	});	
 
});
 
 
 

    $('#addnewsocity').validate({ // initialize the plugin
        rules: {
            so_email: {
                required: true,
                email: true
            },
            
			 stateid: {
                required: true
               
            },
			 cityid: {
                required: true
               
            },
			 areaid: {
                required: true
               
            },
			 address: {
                required: true
               
            },
			 society_title: {
                required: true
               
            },
			so_name: {
                required: true
               
            },
			so_mobile: {
                required: true,
               number:true,
			     minlength: 10,
			  maxlength: 10
            },
			so_name: {
                required: true
               
            }
        }
    });

});
 

</script>

<?php if(@$_GET['st']==1)

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

		<h1>Edit Society</h1>

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

		  <form  id="addnewsocity" name="addnewsocity" method="post"  action="<?php echo base_url();?>admin/allsociety/update" >

          <input type="hidden"  name="chargehead[]"   value=""   >
		   <input type="hidden"   id="countryid" name="countryid" value="1" >

            	<table id="id-form" class="table table-bordered">

				<thead>

					

                     <tr>				 

                  <th>State</th>

                 <td>
                  <select id="stateid" name="stateid" onchange="getcity();" >
                 <option value="">Select State</option>
				                   <?php 
				foreach($states as $state)
				     {
						 ?>
						 <option value="<?php echo $state['id']?>" <?php if($data['stateid']==$state['id']){ echo 'selected="selected"';} ?>><?php echo $state['state']?></option>
                        <?php } ?> 
                 </select>
                    
                    
                    </td>                        

				
                       <?php if($this->session->userdata('utype')==1) {?>

                    <th rowspan="4" ><hr /><label>Convenience Charge </label><br/>

                 

                 <table style="text-align:center; border-bottom:1px groove; border-top:1px solid;" >

                 <tr><th width="20%" ><label>Card Name </label></th><th width="20%" ><label>Fixed Amount</label></th><th width="5%"></th><th width="25%" ><label>Amount in %</label></th></tr>

                 

        <tr><td><label>Debit Card  </label></td><td><input id="dccamt" name="dccamt" style="width:124px;"  value="<?php echo @$condata['debit_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="dccamtp" name="dccamtp" style="width:50px;"  value="<?php echo @$condata['debit_pa']; ?>" type="text" ><label>%</label></td></tr>

                 

       <tr><td><label>Credit Card  </label></td><td><input id="cccamt" name="cccamt" style="width:124px;"  value="<?php echo @$condata['credit_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="cccamtp" name="cccamtp" style="width:50px;"  value="<?php echo @$condata['credit_pa']; ?>" type="text" ><label>%</label></td></tr>
                           

    <tr><td><label>Net Banking  </label></td><td><input id="nbcamt" name="nbcamt" style="width:124px;"  value="<?php echo @$condata['netbanking_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="nbamtp" name="nbamtp" style="width:50px;"  value="<?php echo @$condata['netbanking_pa']; ?>" type="text" ><label>%</label></td></tr>

                 



                 <tr><td><label>emi </label></td><td><input id="emicamt" name="emicamt" style="width:124px;"  value="<?php echo @$condata['emi_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="emicamtp" name="emicamtp" style="width:50px;"  value="<?php echo @$condata['emi_pa']; ?>" type="text" ><label>%</label></td></tr>

                 

      <tr><td><label>Cash Card </label></td><td><input id="caccamt" name="caccamt" style="width:124px;"  value="<?php echo @$condata['cashcard_fa']; ?>" type="text" ></td><td><label>+</label> </td><td><input id="caccamtp" name="caccamtp" style="width:50px;"  value="<?php echo @$condata['cashcard_pa']; ?>" type="text" ><label>%</label></td></tr>

                 

                 

                 

                 </table>



                                    

                 </th>

                   <?php } ?>

                </tr>

               
                

                <tr>

                  <th>City</th>

                  <td id="cityidtd">

                  <select id="cityid"  name="cityid" >

                  <?php foreach($allcity as $allcity) { ?>

                           <option <?php if($data['cityid']==$allcity['id']){ echo 'selected="selected"';} ?> value="<?php echo $allcity['id']?>" ><?php echo $allcity['cityname']?></option>

                  <?php }?>

                 </select>

                    

                    

                    </td>

                </tr>

                

                

                <tr>

                  <th>Area / Sector</th>

                  <td id="areaidtd">

                  <select id="areaid" name="areaid" >

                  <?php foreach($allarea as $allarea) { ?>

                           <option <?php if($data['areaid']==$allarea['id']){ echo 'selected="selected"';} ?> value="<?php echo $allarea['id']?>" ><?php echo $allarea['areaname']?></option>

                  <?php }?>



                 </select>

                    

                    

                    </td>

                </tr>
				  <tr>    

				    	<th >Society Name</th><td><input class="inp-form" type="text" id="society_title" name="society_title" value="<?php echo $data['society_title']; ?>" /></td>

                                        

					</tr>

             <tr>    

				    	<th>Address</th><td><textarea name="address" id="address" style="width: 254px; height: 96px;"><?php echo $data['address']; ?></textarea></td></tr>

                   
	        <tr>   <th>Billing cycle date</th><td>
					<select id="billing_cycle_date" name="billing_cycle_date" ><option value="">Select Date</option>
					<?php for ($i = 1; $i <= 31; $i++) { 
					
					$selc = (isset($data['billing_cycle_date']) && $i == $data['billing_cycle_date'] ) ? " selected='selected' "  : "";
            
            echo '<option'  .$selc.' value="'. $i .'">'. $i .'</option>';
        }
		?>
					</select></td>
			</tr>
                  

                    <tr><th colspan="2"><label><u>Contact Person Details</u></label></th></tr>

                     <tr>    

				    	<th >Name</th><td><input class="inp-form" type="text" id="so_name" name="so_name" value="<?php echo $data['so_name']; ?>" ></td>

                                        

					</tr>

                     <tr>    

				    	<th >Email</th><td><input class="inp-form" type="text" id="so_email" name="so_email" value="<?php echo $data['so_email']; ?>" ></td>

                                        

					</tr>

                     <tr>    

				    	<th >Mobile Number</th><td><input class="inp-form" type="text" id="so_mobile" name="so_mobile" value="<?php echo $data['so_mobile']; ?>" ></td>

                                        

					</tr>
                              

		           

		           <tr>    

				    	<th>&nbsp;</th>

                        <th>

                         <input id="editsociety" type="submit" class="form-submit"  value="Add New User" >&nbsp;

                         <input type="hidden" id="status" name="status" value="1">

                         <input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>" >

                         </th>

                

					</tr>

		          

				</thead>

			

				

			</table>

            </form>

	

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