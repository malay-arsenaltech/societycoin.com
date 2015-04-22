<?php $this->load->view('admin/header'); ?>

<script>
    $(document).ready(function() {
        $('#addnewflat').validate({// initialize the plugin
            rules: {
                flat_data: {
                    required: true,
                    accept: ".csv"
                }
            },
            messages: {
                flat_data: {
                    required: "Please upload the file.",
                    accept: "Please upload only csv file."

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
            <h1>Add Flats</h1><br>
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
                    <form enctype="multipart/form-data" id="addnewflat" name="addnewflat" method="post" onsubmit="return $('#addnewflat').valid()"  action="<?php echo base_url(); ?>admin/allflatowner/upload" >
                        <table id="id-form" class="table table-bordered">
                            <thead>
                                <tr>    
                                    <th>Flat Owners</th>
                                    <td><input type="file" name="flat_data" id="flat_data" accept=".csv"></td>
                                </tr>
                                <tr>    
                                    <th>&nbsp;</th>
                                    <td>
                                        <input type="submit" class="form-submit"  value="Upload" >&nbsp;
                                        <input class="form-reset" type="reset" value="Reset" >
                                        <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
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