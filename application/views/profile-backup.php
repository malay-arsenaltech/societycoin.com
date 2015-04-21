<?php 
$this->load->view('header'); ?>
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
      
      <!--form//-->
      <div class="user-pannel">

     <?php //	  $this->load->helper('societycoin');		  
     $societycoin= new societycoin;

	  echo $societycoin->msg(@$_REQUEST['msg']);
?>
							<h6>Customer Dashboard</h6>
						   <hr>
							<ul style="float:left;">
							<li><a href="<?php echo base_url()?>user/myaccount" >My Setting</a></li>
							<li><a href="<?php echo base_url()?>property/transactionlog">My Transaction</a></li>
                                                        <li><a href="<?php echo base_url()?>user/report">My Reports</a></li>
                            </ul>
                            <ul style="float:right; margin-right:150px;">
							<li><a href="<?php echo base_url()?>property">My Properties</a></li>
							<li><a href="<?php echo base_url()?>user/IIIrd_party_payment">Request 3rd Party Payment</a></li>

                            
							</ul>
                        </div>
                                                     


                        
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>