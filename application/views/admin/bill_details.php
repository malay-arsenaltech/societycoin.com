<?php $this->load->view('admin/header'); ?>
<style>
    #id-form td {padding:0 0 32px;}
    
    
    #content .select_sub {
        float: right !important;
        padding: 0 19px 0 0;
        width: 445px;
    }

    #content .select_sub ul li {
        float: left;
        list-style-type: none;
        margin: 0 10px;
    }
    #product-table td {padding: 10px 0 10px 10px !important;}
</style>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<div class="clear"></div>
<div id="content-outer">
    <!-- start content -->
    <div id="content">
        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Bill Details</h1>
        </div>
        <!-- end page-heading -->
        <div class="select_sub show" style=" margin-bottom: 20px;    width: 479px;">
            <ul class="sub" style="margin:15px 25px 0 0; float:right">
                <li class="sub_show">
                    <a href="javascript:void(0);" onclick="goBack();"  class="btnb">Back</a>
                </li>


            </ul>
        </div>
        <table border="0" width="100%"  style="font-size:12px;" cellpadding="0" cellspacing="0" id="content-table">

            <tr>
                <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
            <tr>
                <td id="tbl-border-left"></td>
                <td ><!--  start content-table-inner ...................................................................... START -->

                    <table id="id-form" class="table table-bordered" width="100%">

                        <tr>
                            <td width="15%"><strong> Name &nbsp;:</strong></td>
                            <td width="85%">&nbsp;<?php echo $data['fname'] . " " . $data['lname']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><strong> Email &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo $data['email']; ?>
                            </td>
                        </tr>
                         <?php if ($this->session->userdata('utype') != 4) { ?>
                        <tr>
                            <td><strong> Society Name &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo $data['society_title']; ?>
                            </td>
                        </tr>
                         <?php } ?>
                        <tr>
                            <td><strong> Flat &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo $data['flat']; ?>
                            </td>
                        </tr>
                        <?php if ($this->session->userdata('utype') != 4) { ?>
                        <tr>
                            <td><strong> Society Admin &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo $data['society_admin']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><strong> Bill Generated On &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo DateTime::createFromFormat('d/m/Y', $data['sdate'])->format('l, jS \of F, Y'); ?>
                            </td>
                        </tr>

                        <tr>
                            <td><strong> Bill Due Date &nbsp;:</strong></td>
                            <td>&nbsp;<?php echo DateTime::createFromFormat('d/m/Y', $data['edate'])->format('l, jS \of F, Y'); ?>
                            </td>
                        </tr>
                        <?php
                        $charge_head = explode(",", $data['bill_name']);
                        $amount = explode(",", $data['amount']);
                        if (!empty($charge_head)) {
                            ?>
                            <tr>
                                <td valign="top"><strong> Details &nbsp;:</strong></td>
                                <td>
                                    <div id="table-content">
                                        <table border="0" width="45%" cellpadding="0" cellspacing="0" id="product-table">
                                            <tr>
                                                <td class="table-header-repeat line-left  minwidth-1"><span>Bill Name</span></td>
                                                <td class="table-header-repeat line-left  minwidth-1"><span>Amount</span></td>
                                            </tr>
                                            <?php
                                            $charge_head = explode(",", $data['bill_name']);
                                            $amount = explode(",", $data['amount']);

                                            foreach ($charge_head as $key => $val) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $val; ?></td>
                                                    <td><?php echo "INR " . $amount[$key]; ?></td>
                                                </tr>
                                            <?php }
                                            ?>
                                            <tr><td>Tax</td><td><?php echo "INR " . $data['tax']; ?></td></tr>
                                            <tr><td><b>Total</b></td><td><b><?php echo "INR " . $data['total']; ?></b></td></tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
            </tr>

        </table>

        <!--  end content-table-inner ............................................END  --></td>
        <td id="tbl-border-right"></td>
        </tr>
        <tr>
            <th class="sized bottomleft"></th>
            <td id="tbl-border-bottom">&nbsp;</td>
            <th class="sized bottomright"></th>
        </tr>
        </table>
        <div class="clear">&nbsp;</div>
    </div>
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<div class="clear">&nbsp;</div>
<?php $this->load->view('admin/footer'); ?>