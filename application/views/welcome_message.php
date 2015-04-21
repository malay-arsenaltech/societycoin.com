 <?php 
 $address='';
foreach($property as $itemp){	 $address .='"'.$itemp['address'].'",';   }

$this->load->view('header'); ?>


<script src="<?php echo base_url(); ?>js/chosen.jquery.js"></script>
<script type="text/javascript" >
   
function getaddress()
  {
	 var id=jQuery('#societyid').val();
    var  udf5=jQuery("#societyid option:selected").text(); 
	  document.getElementById('udf5').value=udf5;
      window.location.href="<?php echo  $_SERVER['PHP_SELF']; ?>?cid="+id+"&so_name="+udf5;
	  }
	
function getbillamountguest()
  {  

   	var id=jQuery('#addressid').val();

	var  url='<?php echo base_url();?>admin/master/getbillamountguest';

	  jQuery.post(url,{"id":id,"action":"payment"},function (data)		{ 

	   jQuery('#payrep').replaceWith(data); 

	   });				

	  }

</script>
<script type="text/javascript">

jQuery(function() {
 var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'}
     
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }


});

var amount=jQuery("#amount").val(); 

jQuery( document ).ready(function() {

jQuery("#societyid").on('change',function() { 
  //jQuery('#propertybox').html('<img src="<?php echo base_url()?>images/loading.gif">');
    var data = "";
    jQuery.ajax({
        type: 'post',
		data : "",
        url: "<?php echo base_url()?>ajax/getPropertiesBySocietyId/"+jQuery(this).val() ,
        success:function(data){
        jQuery('#addressid').html(data);
        },
      error:function(){
      jQuery('#addressid').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
        }
     });  
	
});

jQuery.validator.addMethod("mynumber", function (value, element) {
    return    this.optional(element) || /^[0-9]+$/i.test(value);
}, "Please enter only numeric value");

 $('#addpro').validate({ 
        rules: {
        			
		 societyidauto: {
                required: true				
               
            },
			
			societyid: {
                required: true				
               
            },
			
			 addressid: {
                required: true				
               
            },
			amount:{
			required: true,
			minlength: 3,
			mynumber:true

			}
			
        }
		,
   messages: {
			societyidauto: "Please select your society",
			societyid: "Society not found",
			addressid:{	
			required:"Please select your address"				
			},
			amount:{			
			required:"Please enter an amount",
			minlength:"Please enter minimum amount INR 100",
			number:"Please enter valid amount"
			}
}
		
    });
});

</script>
<link href="<?php echo frontThemeUrl; ?>stylesheet/chosen.css" rel="stylesheet" type="text/css"/>
<!--mid-portion-->

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

      <!--form-->

      <div class="form" style="margin-top:0px !important;">

      

      <?php if(@$_GET['msg']==10 || @$_GET['msg']==11 || @$_GET['msg']==12 || @$_GET['msg']==13   )

		      {

				    $societycoin= new societycoin;

             echo '<div class="main-form ">';					   

          	  echo $societycoin->msg(@$_GET['msg']);

			 echo '</div>';

             

				  }else

			     {?>

      

      <form id="addpro" name="addpro"   method="post"  action="<?php echo base_url();?>home/plogin" >

        <div class="main-form welcome-form-for-mob">
		<div id="form-center">
		
         
          <label style="padding-top: 15px;">Complex</label>
				
		
       <select  name="societyid" id="societyid" class="chosen-select" >

          <option value="">Select Housing Society</option>

          <?php foreach($society as $society)
		      {
			 ?>

				 <option <?php if($this->session->userdata('so_id')==$society['id']){ echo 'selected="selected"'; }else{}?>   value=<?php echo $society['id'] ?> ><?php echo $society['society_title']?> (<?php echo $society['areaname']?>)</option>
 
				 <?php } ?>
          
          </select>
		
          <label>Address</label><select class="" id="addressid" name="addressid"><option value="">Select  Address</option>
			</select>
		 
		  
          <label>Amount (INR)</label>

          <div id="payrep">

          <input id="amount" autocomplete="off" name="amount" type="text">

          

          </div>

           <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" />

          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" /> 

          <input type="hidden" id="curl" name="curl" value="<?php echo base_url();?>property/cancelpayment" />           

          

          <input type="hidden" id="udf5" name="udf5" value="" />

          <input type="hidden" id="udf6" name="udf6" value="" />

          <input type="hidden" id="udf4" name="udf4" value="" />

           

          <input type="hidden" id="udf2" name="udf2" value="<?php echo $this->session->userdata('userid'); ?>" />

          <input type="hidden" id="udf3" name="udf3" value="" />

          <input type="hidden" id="cid" name="cid" value="<?php echo @$_GET['cid']; ?>" />
         

          <input name="payment" style="width:274px; margin:6px 22px 22px 22px;" type="submit" value="Make a payment">
		  </div>

        </div>

        

        </form>

        

        <?php } ?>

      </div>

      <!--form//-->

      <div class="text" id="site-home">

        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>

        <?php if(@$_GET['vmsg']==10)
		    {?>
            <p style="color: #000; text-transform: uppercase; background: #F08324; font-weight:bold;">please enter valid username and password</p>
            <?php }else{ ?>

        <p>Welcome to <a style="color:#B8B8B8; text-decoration:underline;" href="http://societycoin.com/">SocietyCoin.com!&nbsp;</a><br />
        

We're a fast and easy way to  make payments for your gated communities online. Simply fill in the form to get started!

</p>
<?php } ?>
      </div>

      <!--text-->

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>