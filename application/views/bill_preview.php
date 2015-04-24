<?php
//echo '<pre>'; print_r($data); exit();

$this->load->view('header');
?>
<style>
    #billing_form{width: 440px;}
    #billing_form td{text-align: left}
    #billing_form tr td:first-child{font-weight: bold;}
</style>
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
            <div class="main-form" id="billing_form" style=" height:auto; margin-top:15px;">
                <p>Bill Details</p>
                <form id="contact" name="contact"  method="post" action="<?php echo base_url(); ?>property/pay" >
                    <table align="center">
                        <tr><td></td></tr>
                        <tr>
                            <td width="144">Owner Name:</td>
                            <td width="209"><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td>Bill Generated Date: </td>
                            <td align="left"><?php echo DateTime::createFromFormat('d/m/Y', $sdate)->format('l, jS \of F, Y'); ?></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td align="left"><?php echo $email;?></td>
                        </tr>
                        <tr>
                            <td>Bill: </td>
                            <td align="left"><?php echo "INR ". $amount; ?></td>
                        </tr>
                        <tr>
                            <td>Payment Date: </td>
                            <td align="left"><?php echo DateTime::createFromFormat('d/m/Y H:i:s', $payment_date)->format('l, jS \of F, Y'); ?></td>
                        </tr>
                        <tr>
                            <td>Payment Due: </td>
                            <td align="left"><?php echo DateTime::createFromFormat('d/m/Y', $edate)->format('l, jS \of F, Y'); ?></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" align="center">
                                <input name="pay_now" class="msgsend" type="submit"  style="margin-top:0px;" value="Pay">
                            </td>
                        </tr>
                        
                    </table>
                    

                    <label> <?php //echo $math_captcha_question; ?> </label>
                    <?php // echo form_input('math_captcha'); ?>
                </form>                 



            </div>

            <div class="clearfix"></div>

        </div>

    </div>

</div>

<?php $this->load->view('footer'); ?>