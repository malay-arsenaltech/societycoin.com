<?php $this->load->view('admin/header'); ?>
    <style type="text/css">
        #id-form th, #id-form td {
            font-size: 12px;
            line-height: 28px;
            min-width: auto;
            padding: 10px;
            text-align: left;
            height: 100%;
            box-sizing: border-box;
            -webkit-sizing: border-box;
            -moz-sizing: border-box;
        }
        #id-form th {line-height: 15px;}

        .table-header-repeat span {
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: bold;
            line-height: 14px;
            margin: 0 0 0 10px;
            padding: 0 10px 0 0;
        }

        #table-content #mainform #product-table tr:hover {
            background: none repeat scroll 0 0 #f1fbe5;
        }

        .green-left, .red-left {
            line-height: 16px !important;
        }
    </style>
    <script>
        function upload_bill() {
            window.location = "<?php echo base_url(); ?>admin/allresidence/uploadbill";
        }
    </script>

    <div class="clear"></div>
    <div id="content-outer">
        <!-- start content -->
        <div id="content">

            <!--  start page-heading -->
            <div id="page-heading">
                <h1>Upload Bill</h1><br>
            </div>
            <!-- end page-heading -->

            <div style=" display:none;" id="error"></div>


            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                <tr>
                    <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt=""/></th>
                    <th class="topleft"></th>
                    <td id="tbl-border-top">&nbsp;</td>
                    <th class="topright"></th>
                    <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt=""/></th>
                </tr>
                <tr>
                    <td id="tbl-border-left"></td>

                    <td id="table-content">
                        <form id="mainform" method='post' action="<?php echo base_url(); ?>admin/allresidence/processbill">
                            <table id="id-form" class="table table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <td colspan="2">
                                        <div id="message-green">
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td class="green-left">Total <b><?php echo count($success_data); ?></b> bill(s) will be Processed successfully out of <b><?php echo count($success_data) + count($failure_data); ?></b> bill(s). <?php echo (count($success_data) > 0) ? "Following is the list of the bill(s) which will be Processed." :""?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if (!empty($success_data)) { ?>
                                            <table border="0" width="100%" cellpadding="0" cellspacing="0" class="reference" id="product-table">
                                                <tr>
                                                    <?php foreach ($header as $v) { ?>
                                                        <th class="table-header-repeat line-left"><span><?php echo $v; ?></span></th>
                                                    <?php } ?>
                                                </tr>
                                                <?php foreach ($success_data as $val) { ?>
                                                    <tr>
                                                        <?php foreach ($val as $v) { ?>
                                                            <td><?php echo humanize($v); ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php if (!empty($failure_data)) { ?>
                                    <tr>
                                        <td colspan="2">
                                            <div id="message-red">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td class="red-left">Total <b><?php echo count($failure_data); ?></b> bill(s) will not be Processed out of <b><?php echo count($success_data) + count($failure_data); ?></b> bill(s) as they missing some information. <?php echo (count($failure_data) > 0) ? "Following is the list of the bill(s) which will not be Processed." :""?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <table border="0" width="100%" cellpadding="0" cellspacing="0" class="reference" id="product-table">
                                                <tr>
                                                    <?php foreach ($header as $v) { ?>
                                                        <th class="table-header-repeat line-left"><span><?php echo $v; ?></span></th>
                                                    <?php } ?>
                                                </tr>
                                                <?php foreach ($failure_data as $val) { ?>
                                                    <tr>
                                                        <?php foreach ($val as $v) { ?>
                                                            <td><?php echo humanize($v); ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td colspan="2"><b>
                                            <center>Please check above Information is correct.</center>
                                        </b></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <input type="hidden" name="success_data" value='<?php echo json_encode($success_post_data) ?>'>
                                            <input type="hidden" name="failure_data" value='<?php echo json_encode($failure_data) ?>'>
                                            <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">

                                            <?php if (!empty($success_data)) { ?>
                                                <input type="submit" class="form-proceed form-button" value="Yes">
                                            <?php } ?>
                                            <input class="form-button-gray" type="reset" value="No" onclick="upload_bill()">&nbsp;
                                        </center>

                                    </td>
                                </tr>
                                </thead>
                            </table>
                        </form>


                    </td>
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