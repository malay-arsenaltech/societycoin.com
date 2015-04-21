<?php $this->load->view('header'); ?>
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
    <div class="texthome">
        <h1 class="society-text-home"><?php echo $data['title']?></h1>
        <div class="descriptionhome">
        <?php echo $data['description']; ?>
        </div>
       
      </div>
    
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>