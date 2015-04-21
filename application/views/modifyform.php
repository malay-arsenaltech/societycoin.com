<?php 





 $address='';

foreach($property as $itemp)

 {

//	 $address .='"'.$itemp['address'].'",';

   }

   

//echo $this->session->userdata('so_id'); echo '<br>'.$this->session->userdata('so_name');



$this->load->view('header'); ?>



<script src="<?php echo frontThemeUrl; ?>assets/js/jquery-ui.js"></script>





<script type="text/javascript">





 function updatesprofile()

{







	

	var comments=jQuery("#comments").val(); 

	

		

	

var error='';

   if(comments=='')

  {

	error+="* Please select Socity Admin";

  	jQuery("#comments").addClass('inp-form-error');

	 }else

	   {

   	jQuery("#comments").removeClass('inp-form-error');

	   }

	   

	   if(error!='')

	{

		//alert(error);

		return false;

	}

	return true; 

}

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

      

      <?php if(@$_REQUEST['msg']==8)

		      {

				    $societycoin= new societycoin;

             echo '<div class="main-form">';   

          	  echo $societycoin->msg(@$_REQUEST['msg']);

			 

		//	  echo "<a href=".base_url().">Click here for another bill payment</a>";

			  echo '</div>';

             

				  }else

			     {?>

      

      <form id="addpro" name="addpro" method="post" onsubmit="return updatesprofile()" action="<?php echo base_url();?>user/sendmform" >
<?php //echo '<pre>'; print_r($society); print_r($property); exit();  ?>
        <div class="main-form">

          <p>Modification Form </p>

          <label>Your Comments</label>

          <textarea style="margin-left:20px; width:261px; height:100px;" id="comments" name="comments" ></textarea>

          

          <input type="hidden" id="soid" name="soid" value="<?php echo @$_REQUEST['soid']; ?>" />

          <input type="hidden" id="pid" name="pid" value="<?php echo @$_REQUEST['pid']; ?>" />
          
          <input type="hidden" id="societyname" name="societyname" value="<?php echo $society['society_title']?>" />
          
           <input type="hidden" id="propertyname" name="propertyname" value="<?php echo $property[0]['address']?>" />          

          <input name="payment" style="width:274px; margin:6px 22px 22px 22px;" type="submit" value="Send to site admin">

        </div>

        

        </form>

        

        <?php } ?>

      </div>

      <!--form//-->

      <div class="text">

        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>

        <p>Welcome to <a style="color:#B8B8B8; text-decoration:underline;" href="http://societycoin.com/">SocietyCoin.com!&nbsp;</a><br />

We're a fast and easy way to  make payments for your gated communities online. Simply fill in the form to get started!

</p>

      </div>

      <!--text-->

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>