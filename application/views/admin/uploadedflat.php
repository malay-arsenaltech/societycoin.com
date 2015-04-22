<?php $this->load->view('admin/header'); ?>
<style type="text/css">
    #id-form th,#id-form td {
        font-size: 12px;
        line-height: 28px;
        min-width: 130px;
        padding: 10px;
        text-align: left;
        height:100%;
    }
    .table-header-repeat span {
        color: #fff;
        font-family: Arial,Helvetica,sans-serif;
        font-size: 13px;
        font-weight: bold;
        line-height: 14px;
        margin: 0 0 0 10px;
        padding: 0 10px 0 0;
    }

    #table-content #mainform #product-table tr:hover {
        background: none repeat scroll 0 0 #f1fbe5;
    }
</style>
<script>
    function add_flat() {
        window.location = "<?php echo base_url(); ?>admin/allflats/addflat";
    }
</script>

<div class="clear"></div>
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Add Flats</h1><br>
        </div>
        <!-- end page-heading -->

        <div style=" display:none;" id="error"></div>                        


        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
            <tr>
                <td id="tbl-border-left"></td>

                <td style="float:left;" id="table-content" >
                    <form id="mainform" method='post' action="<?php echo base_url(); ?>admin/allflats/chargehead">
                        <table id="id-form" class="table table-bordered">
                            <thead>
                                <tr>    
                                    <td colspan="2">
                                        <div id="message-green">
                                            <table  cellspacing="0" cellpadding="0" border="0">
                                                <tbody><tr>
                                                        <td class="green-left">Total <b><?php echo count($success_record); ?></b> flat owner(s) will be added successfully out of <b><?php echo count($success_record) + count($failure_data); ?></b> flat owner(s).</td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </td>
                                </tr>
                                <?php if (!empty($failure_data)) { ?>
                                    <tr>    
                                        <td colspan="2">
                                            <div id="message-red">
                                                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                            <td class="red-left">Total <b><?php echo count($failure_data); ?></b> flat owner(s) will not be added out of <b><?php echo count($success_record) + count($failure_data); ?></b> flat owner(s) as they contains error. Following is the list of the flat owner(s) which will not be added.</td>
                                                        </tr>
                                                    </tbody></table>
                                            </div>
                                            <table border="0" width="96%" cellpadding="0" cellspacing="0" class="reference" id="product-table">
                                                <tr>
                                                    <th class="table-header-repeat line-left minwidth-1"><span>Flat Address</span>	</th>
                                                    <th class="table-header-repeat line-left"><span>Owner's Name</span></th>
                                                    <th class="table-header-repeat line-left"><span>Email</span></th>
                                                </tr>
                                                <?php foreach ($failure_data as $val) { ?>
                                                    <tr>
                                                        <td><?php echo $val['address']; ?></td>
                                                        <td><?php echo $val['name']; ?></td>
                                                        <td><?php echo $val['email_address']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td colspan="2"><b><center>Please check above Information is correct.</center></b></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                            <center>
                                <input type="hidden" name="success_record" value='<?php echo json_encode($success_record) ?>'>
                                <input type="hidden" name="failure_record" value='<?php echo json_encode($failure_data) ?>'>
                                <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >

                                <?php if (!empty($success_record)) { ?>
                                    <input type="submit" class="form-proceed" value="Yes">
                                <?php } ?>
                                <input class="form-back" type="reset" value="No" onclick="add_flat()" >&nbsp;
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