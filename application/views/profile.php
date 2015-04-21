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

							<h6>Dashboard</h6>

						   <hr>

							<ul class="dashboard_mob-1" style="float:left;">

							<li><a href="<?php echo base_url()?>user/myaccount" >My Settings</a></li>

							<li><a href="<?php echo base_url()?>property/transactionlog">My Transactions</a></li>
						<li class="m_rpt" style="margin-left:162px; width:100%"><a href="<?php echo base_url();?>">Make A Payment</a></li>
                                                     

                            </ul>

                            <ul class="dashboard_mob-2" style="float:right; ">

							<li><a href="<?php echo base_url()?>property">My Properties</a></li>

							<li><a href="<?php echo base_url()?>user/IIIrd_party_payment">Send a payment Request</a></li>

						

                            

							</ul>

                        </div>

                                

                                 

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>