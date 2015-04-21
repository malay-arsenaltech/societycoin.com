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

      <div class="form" style="margin-top:0px !important;">

        <h1 style="color: rgb(255, 255, 255); padding: 57px;">Coming Soon! </h1>

      
      </div>

      <!--form//-->

      <div class="text">

        <p class="society-text"> <img style="margin:0px;" src="<?php echo frontThemeUrl; ?>images/society-text.png" alt=""/></p>

        <?php ?>

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