<?php $society_id =  (isset($property['societyid'] ))  ? $property['societyid']   : "" ; 

$address_id =   (isset( $property['addressid'] ))  ? $property['addressid'] : "" ;
 ?>
<div>

<form action="<?php echo base_url();?>home/plogin"  name="amountpo" id="amountpo"  method="post">
    <div class="main-form welcome-form-for-mob">
       
		  
          <label>Amount (INR)</label>

          <div id="payrep">

          <input type="text" name="amount" autocomplete="off"  class="required" id="amount">

          

          </div>
      <div class="clearfix" style="clear:both;"></div>

<input id="surl" type="hidden" value="<?php echo base_url();?>property/successfulpayment" name="surl">
<input id="furl" type="hidden" value="<?php echo base_url();?>property/faildpayment" name="furl">
<input id="curl" type="hidden" value="<?php echo base_url();?>property/cancelpayment" name="curl">
<input type="hidden" name="societyid" value="<?php echo $society_id; ?>"   />
 <input type="hidden" id="udf2" name="udf2" value="<?php echo $this->session->userdata('userid'); ?>" />
<input type="hidden" name="addressid" value="<?php echo $address_id; ?>"   />


    <input type="hidden" value="" name="udf5" id="udf5">

          <input type="hidden" value="" name="udf6" id="udf6">

          <input type="hidden" value="" name="udf4" id="udf4">      

          <input type="hidden" value="" name="udf3" id="udf3">

          <input type="hidden" value="" name="cid" id="cid">

          <input type="submit" value="Make a payment" style="width:274px; margin:6px 22px 22px 22px;" name="payment">

        </div>

        </form>       

        
      </div>


<script type="text/javascript">

jQuery(function() {

$('#amountpo').validate({ 
        rules: {
        			
			amount:{
			required: true,
			minlength: 3,
			number:true

			}
			
        }
		,
   messages: {
			
			amount:{			
			required:"Please Enter Amount",
			minlength:"Please Enter Minimum Amount INR 100",
			number:"Please Enter Valid Amount"
			}
}
		
    });




});






</script>
