<?php $this->load->view('admin/header'); ?>
<script>
    $(".edit_charge_head").live("click", function() {
        $(this).parents("tr:first").find(".charge_head_text").hide();
        $(this).parents("tr:first").find(".charge_head_val").val($(this).parents("tr:first").find(".charge_head_text")).show();
    })
    $(".cancel_charge_head").live("click", function() {
        $(this).parents("tr:first").find(".charge_head_text").show();
        $(this).parents("tr:first").find(".charge_head_val").val($(this).parents("tr:first").find(".charge_head_text")).hide();
    })
    $(".save_chargehead").live("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        var val = $(this).parents("tr:first").find(".charge_head_val input").val();
        if ($.trim(val) != "") {
            var $this = $(this);
            $.post($this.attr("href"), {"charge_head_name": val}, function(result) {
                $this.parents("tr:first").find(".charge_head_text").html(result).show();
                $this.parents("tr:first").find(".charge_head_val").hide();
            })
        }
    })
</script>
<style>
    .charge_head_text {  word-break: break-word;}
</style>
<div class="clear"></div>
<div id="content-outer">
    <!-- start content -->
    <div id="content">
        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Charge heads for your complex</h1><br />
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
            <?php
            $msg_error = $this->session->flashdata('msg_error');
            if ($msg_error != '') {
                ?>             
                <div id="message-green">
                    <table  cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td class="green-left"><?php echo $msg_error; ?></td>
                                <td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>

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

                <td>

                    <!--  start content-table-inner ...................................................................... START -->

                    <div id="content-table-inner">

                        <div id="table-content">
                            <form id="mainform" action="">
                                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

                                    <tr>

                                        <th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
                                        <th class="table-header-repeat line-left minwidth-1"><span>Charge Head</span>	</th>
                                        <th class="table-header-repeat line-left"><span>Options</span></th>
                                    </tr>
                                    <?php
                                    $k = 1;
                                    if (count($charge_head) > 0) {
                                        foreach ($charge_head as $val) {
                                            ?>  
                                            <tr>
                                                <td><?php echo $k; ?></td>
                                                <td>
                                                    <span class="charge_head_text"><?php echo $val->charge_head_name; ?></span>
                                                    <span class='charge_head_val' style='display:none'>
                                                        <input value='<?php echo $val->charge_head_name; ?>' type='text' name='charge_head[<?php echo $val->charge_head_id ?>]' class='fleft mr-r-10'>
                                                        <a href="<?php echo base_url(); ?>admin/allchargehead/editchargehead/<?php echo $val->charge_head_id; ?>" title="Save" class="save_chargehead icon-5 info-tooltip"></a>
                                                        <a href="javascript:void(0);" title="Cancel" class="icon-2 info-tooltip cancel_charge_head"></a>
                                                    </span>
                                                </td>
                                                <td class="options-width">
                                                    <a href="javascript:void(0);" title="Edit Charge head" class="icon-1 info-tooltip edit_charge_head"></a>
                                                    <a href="<?php echo base_url(); ?>admin/allchargehead/deletechargehead/<?php echo $val->charge_head_id; ?>" title="Delete" onclick="return confirm('Are you sure to delete?');"  class="icon-2 info-tooltip"></a>
                                                </td>
                                            </tr>

                                            <?php
                                            $k++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'> <strong>No Charge head found!</strong></td></tr>";
                                    }
                                    ?>
                                </table>
                                <!--  end product-table................................... --> 
                            </form>
                        </div>
                    </div>
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