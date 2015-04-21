<?php



//print_r($this->session->all_userdata());  exit();

$this->load->view('header');

?>

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

     <div class="tab_wrap" style="height:438px; margin-top:-17px;">

    	<ul>

        	<li><img style="width:731px;" src="<?php echo frontThemeUrl; ?>images/payment-current.png" /></li>

        </ul>

        <div class="payment">

        <table>

        

         <tr><td>Residential Complex</td>        

          <td>

          <input disabled="disabled" name="sudf5" value="<?php echo $sdata['society_title']; ?>" />

          </td>

          </tr><tr>

          <td>Flat No.</td>          <td>

          <input disabled="disabled" name="sudf6" value="<?php echo $pdata['address']; ?>" /></td>

           </tr>

          <tr><td>Amount</td>

          <td>

          <input disabled="disabled" id="samount" name="samount" value="<?php echo $this->session->userdata('fpamount'); ?>" />

         

           </td>

           </tr><tr><td>Email</td>

           

          <td>

          <input disabled="disabled" name="semail" id="semail" value="<?php echo $this->session->userdata('email');  ?>" />

          

          </td>

          </tr>

          <tr><td>Status</td>

          <td><?php if(@$_GET['msg']==7){ $st="Successful"; }elseif(@$_GET['msg']==2){  $st="Failed";}?><input disabled="disabled" name="semail" id="semail" value="<?php echo $st; ?>" /></td>

          </tr><tr>

          <td>Transaction id</td>

          

          <td><input disabled="disabled" name="semail" id="semail" value="<?php echo @$_GET['txnid']; ?>" /></td></tr>



          <tr><td colspan="2"><a style="color:#000;" href="<?php echo base_url(); ?>home">Click here for Pay another bill!</a></td></tr>

          

        </table>

        

        

        

        </div>

        </div>

      

         <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>