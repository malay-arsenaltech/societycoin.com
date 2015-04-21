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

      

      <iframe class="img_frame" style="background:#fff; margin-left:10px;" src="<?php echo base_url(); ?>user/graph" width="710" height="400" ></iframe>

                                                     

                  

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>