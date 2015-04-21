<?php $this->load->view('header'); ?>

<script>
function goBack() {
  window.history.back();
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

        <div class="main-form" style="float:left; height:auto; margin-top:-13px; width:746px; background:#fff;">

                  <p>Transaction on <?php echo $data['addedon']; ?> <input style="float:right;width:13%;"  type="button"   onclick="goBack();"  value="Back"   ></p>

                  <?php // echo '<pre>'; print_r($data); echo '</pre>'	;?>

                  

                  <table style="margin: 19px;">

                     <tr>

                           <td>Society Name</td><td>:</td><td><?php echo $data['societyname']?></td>

                           

                     </tr>

                     <tr>

                           <td>Property Address</td><td>:</td><td><?php echo $data['baddress']?></td>

                           

                     </tr>

                     <tr>

                           <td>Pay for bill</td><td>:</td><td><?php echo $data['billname']?></td>

                           

                     </tr>

                     <tr>

                           <td>Pay Amount</td><td>:</td><td><?php echo $data['amount']?></td>

                           

                     </tr>

                                          <tr>

                           <td>Status</td><td>:</td><td><?php echo $data['status']?></td>

                           

                     </tr>



                     <tr>

                           <td>Tranction Mode</td><td>:</td><td><?php echo $data['mode']?></td>

                           

                     </tr>

                     <tr>

                           <td>mihpayid</td><td>:</td><td><?php echo $data['mihpayid']?></td>

                           

                     </tr>

                     <tr>

                           <td>Txnid</td><td>:</td><td><?php echo $data['txnid']?></td>

                           

                     </tr>

                     <tr>

                           <td>Productinfo</td><td>:</td><td><?php echo $data['productinfo']?></td>

                           

                     </tr>

                     <tr>

                           <td>First Name</td><td>:</td><td><?php echo $data['firstname']?></td>

                           

                     </tr>

                     

                     

                     <tr>

                           <td>Last Name</td><td>:</td><td><?php echo $data['lastname']?></td>

                           

                     </tr>

                     <tr>

                           <td>Address</td><td>:</td><td><?php echo $data['address1']?></td>

                           

                     </tr>

                     <tr>

                           <td>City</td><td>:</td><td><?php echo $data['city']?></td>

                           

                     </tr>

                     <tr>

                           <td>State</td><td>:</td><td><?php echo $data['state']?></td>

                           

                     </tr>

                     <tr>

                           <td>Country</td><td>:</td><td><?php echo $data['country']?></td>

                           

                     </tr>

                     <tr>

                           <td>Zip code</td><td>:</td><td><?php echo $data['zipcode']?></td>

                           

                     </tr>

                     <tr>

                           <td>Email</td><td>:</td><td><?php echo $data['email']?></td>

                           

                     </tr>

                     <tr>

                           <td>Phone</td><td>:</td><td><?php echo $data['phone']?></td>

                           

                           

                           

                     </tr>

                     

                     <tr>

                           <td>PG TYPE</td><td>:</td><td><?php echo $data['PG_TYPE']?></td>

                           

                           

                           

                     </tr>

                     <tr>

                           <td>Bank Ref Num</td><td>:</td><td><?php echo $data['bank_ref_num']?></td>

                           

                           

                           

                     </tr>

                     <tr>

                           <td>Cardnum</td><td>:</td><td><?php echo $data['cardnum']?></td>

                           

                           

                           

                     </tr>

                     

                     

                   

                     

                  </table>

                  

        </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>