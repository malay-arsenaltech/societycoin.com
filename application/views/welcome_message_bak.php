<?php 

//echo '<pre>'; 		print_r($society);		exit();
$this->load->view('header'); ?>
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


 <script>
jQuery(function() {
var availableTags = [
"ActionScript",
"AppleScript",
"Asp",
"BASIC",
"C",
"C++",
"Clojure",
"COBOL",
"ColdFusion",
"Erlang",
"Fortran",
"Groovy",
"Haskell",
"Java",
"JavaScript",
"Lisp",
"Perl",
"PHP",
"Python",
"Ruby",
"Scala",
"Scheme"
];
jQuery( "#addressid" ).autocomplete({
source: availableTags
});
});
</script>


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
      
      <?php if(@$_REQUEST['msg']==7)
		      {
				    $societycoin= new societycoin;
             echo '<div class="main-form">';   
          	  echo $societycoin->msg(@$_REQUEST['msg']);
			 
			  echo "<a href=".base_url().">Click here for another bill payment</a>";
			  echo '</div>';
             
				  }else
			     {?>
      
      <form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>property/payment" >
        <div class="main-form">
          <p>Make Payment </p>
          <label>Residential Complex</label>
          <select name="societyid" id="societyid"  >
          <option value="">Select Society</option>
          <?php foreach($society as $society)
		      {
				 echo '<option value='.$society['id'].'>'.$society['society_title'].'</a>';
				  
				  }?>
          
          </select>
          <label>Address</label>
          <input type="text" id="addressid"  name="addressid" />
          
          <label>Pay for bill</label>
          <select id="billid"  name="billid" onchange="getbillamountguest()" ><option value="">Select Bill</option></select>
          
          <label>Amount</label>
          <input id="amount" name="amount" type="text">
           <input type="hidden" id="surl" name="surl" value="<?php echo base_url();?>property/successfulpayment" />
          <input type="hidden" id="furl" name="furl" value="<?php echo base_url();?>property/faildpayment" /> 
          <input type="hidden" id="curl" name="curl" value="<?php echo base_url();?>property/cancelpayment" />           
          
          <input type="hidden" id="udf5" name="udf5" value="" />
          <input type="hidden" id="udf6" name="udf6" value="" />
          <input type="hidden" id="udf4" name="udf4" value="" />
           <input type="hidden" id="udf1" name="udf1" value="" />
          <input type="hidden" id="udf2" name="udf2" value="<?php echo $this->session->userdata('userid'); ?>" />
          <input type="hidden" id="udf3" name="udf3" value="" />
          <input name="payment" style="width:274px; margin:6px 22px 22px 22px;" type="submit" value="Make payment">
        </div>
        
        </form>
        
        <?php } ?>
      </div>
      <!--form//-->
      <div class="text">
        <p class="society-text"> <img src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet dictum nibh, at molestie erat. Etiam molestie sollicitudin                          aliquam. Praesent egestas nisi nibh, in volutpat sapien iaculis non. Pellentesque tincidunt congue neque, nec fringilla enim congue quis. </p>
      </div>
      <!--text-->
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>