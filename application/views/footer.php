
<!--  bottom nav-->

<div class="row-fluid bottom-nav-outer">

  <div class=" container bottom-nav-inner">

    <?php echo $this->load->view('footer_menu'); 	?>

    <div class="clearfix"></div>

  </div>

</div>

<!--fotters-->

<div class="row-fluid fotter-outer">

  <div class=" container fotter-inner">

    <div class="copy-right">

      <p>Copyright © SocietyCoin <?php  echo date('Y',time());  ?>. All rights reserved.</p>

     

    </div>

    <div class="copy-tight-side-nav">

      <ul> 
      <li><a href="<?php echo base_url();?>home/about_us"> ABOUT US </a></li>

        <li>|</li>

        <li><a href="<?php echo base_url();?>home/privacy_policy"> PRIVACY POLICY </a></li>

        <li>|</li>

        <li><a href="<?php echo base_url();?>home/term_of_use"> TERMS OF USE</a></li>

        

      </ul>

    </div>

    <div class="clearfix"></div>

  </div>

</div>

</body>

</html>

