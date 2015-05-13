
<?php $this->load->view('admin/header'); ?>
<script>
    var base_url = "<?php echo base_url(); ?>";
    $(document).ready(function() {
        focusInvalid: false,
        $('#addchargehead').validate({// initialize the plugin
            rules: {
                charge_head_name: {
                    remote:
                            {
                                url: base_url + "admin/allchargehead/check_charge_head",
                                type: "post",
                                data: {
                                    charge_head_name: function() {
                                        return $("#charge_head_name").val();
                                    }
                                }
                            }
                }
            },
            messages: {
                charge_head_name: {
                    required: "This field is required",
                    remote: "This charge head is already associated with your society."
                }
            },
            errorPlacement: function(error, element) {
                $(error).insertAfter(element);
            }
        });
    });
</script>

<div class="clear"></div>
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Add Charge Head</h1><br>
            <?php
            $msg_error = $this->session->flashdata('msg_error');

            if ($msg_error != '') {
                ?>             
                <div id="message-green">
                    <table  cellspacing="0" cellpadding="0" border="0">

                        <tbody><tr>

                                <td class="green-left"><?php echo $msg_error; ?></td>

                                <td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>

                            </tr>

                        </tbody></table>
                </div>
            <?php } ?>

            <?php
            $msg_error_red = $this->session->flashdata('msg_error_red');

            if ($msg_error_red != '') {
                ?> 
                <div id="message-red">
                    <table border="0" width="35%" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                                <td class="red-left"><?php echo $msg_error_red; ?> </td>
                                <td class="red-right"><a class="close-red"><img src="<?php echo AdminThemeUrl; ?>images/table/icon_close_red.gif" alt=""></a></td>
                            </tr>
                        </tbody></table>
                </div>

            <?php } ?>
        </div>
        <!-- end page-heading -->
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
                <td style="float:left;" >
                    <!--  start content-table-inner ...................................................................... START -->
                    <form id="addchargehead" name="addchargehead" method="post" onsubmit="return $('#addchargehead').valid()"  action="<?php echo base_url(); ?>admin/allchargehead/process" >
                        <table id="id-form" class="table table-bordered">
                            <thead>
                                <tr>    
                                    <th>Charge Head Name:</th>
                                    <td><input type="text" name="charge_head_name" id="charge_head_name" class="required"></td>
                                </tr>
                                <tr>    
                                    <th>&nbsp;</th>
                                    <td>
                                        <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
                                        <input type="submit" class="form-proceed form-button"  value="Add" >&nbsp;
                                        <input class="form-button-gray" type="reset" value="Reset" >
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </form>
                    <!--  end content-table-inner ............................................END  -->
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