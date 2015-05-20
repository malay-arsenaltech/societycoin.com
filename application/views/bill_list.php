<?php $this->load->view('header'); ?>


<style>

    table.reference {color: #333!important; margin-left:20px;   font-size: 12px; }
    table.reference, table.tecspec {border-collapse:collapse}
    table.reference th{ background-color: #366487;    border: 1px solid #555555;    color: #ffffff;    padding: 3px;    text-align: center;	height:33px;   }

    table.reference td  {  border: 1px solid #d4d4d4;padding: 10px;white-space: nowrap; }
    table.reference tr:nth-child(2n+1){background-color:#e9eef2}
    table.reference tr td span.success{color:green;}
    table.reference tr td span.failure{color:red;}
    table.reference th span {margin:0 !important; padding:0 !important;}
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

            <?php // echo '<pre>'; print_r($data); exit(); ?>

            <div class="main-form " id="bill_list" style="float:left; height:462px; margin-top:-13px; width:100%; overflow:scroll; background:#fff;">

                <p>My Bills for year <?php echo $year; ?></p>

                <table border="0" width="100%" cellpadding="0" cellspacing="0"  class="reference" id="product-table">
                    <tr>
                        <th class="table-header-repeat line-left minwidth-1"><span>Society</span></th>
                        <th class="table-header-repeat line-left minwidth-1"><span>Address</span></th>
                        <?php foreach ($charge_head as $key => $val) {
                            ?>
                            <th class="table-header-repeat line-left minwidth-1"><span><?php echo humanize($val); ?></span></th>
                        <?php }
                        ?>
                        <th class="table-header-repeat line-left minwidth-1"><span>Tax</span></th>
                        <th class="table-header-repeat line-left minwidth-1"><span>Total</span></th>
                        <th class="table-header-repeat line-left minwidth-1"><span>Generated On</span></th>
                        <th class="table-header-repeat line-left minwidth-1"><span>Due Date</span></th>
                        <th class="table-header-repeat line-left"><span>Option</span></th>
                    </tr>


                    <?php
                    if (!empty($bill)) {
                        foreach ($bill as $val) {
                            $bill_name = explode(",", $val->bill_name);
                            $bill_name = array_map("strtolower", $bill_name);
                            $bill_amount = explode(",", $val->amount);
                            $charge_head_data = array_combine($bill_name, $bill_amount);
                            $k = 1;
                            ?>

                            <tr>
                                <td><?php echo$val->society_title ?></td>
                                <td><?php echo$val->flat_address ?></td>
                                <?php foreach ($charge_head as $key => $head) {
                                    ?>
                                    <td><?php echo isset($charge_head_data[$head]) ? "INR " . $charge_head_data[$head] : " - "; ?></td>
                                <?php }
                                ?>
                                <td><?php echo "INR " . $val->tax; ?></td>
                                <td><?php echo "INR " . $val->total; ?></td>
                                <td><?php echo DateTime::createFromFormat('d/m/Y', $val->sdate)->format('jS \of F, Y'); ?></td>
                                <td><?php echo DateTime::createFromFormat('d/m/Y', $val->edate)->format('jS \of F, Y'); ?></td>                
                                <td class="options-width">
                                    <?php if (!in_array($val->billid, $paid_bill)) { ?>
                                        <a title="View Details" href='<?php echo base_url() . "property/bills/$year/{$val->billid}"; ?>'>Pay</a>
                                    <?php
                                    } else {
                                        echo " - ";
                                    }
                                    ?>
                                </td></tr>

                            <?php
                        }
                    }
                    else
                        echo "<tr><td colspan='6'><b>There is no bill found</b></td></tr>";
                    ?>



                </table>		

            </div>

            <div class="clearfix"></div>

        </div>

    </div>

</div>

<?php $this->load->view('footer'); ?>