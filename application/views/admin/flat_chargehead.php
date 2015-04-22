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


    .checkbox_label {
        color: #333;
        display: inherit;
        margin-left: 9px;
        padding-left: 10px;
    }
</style>
<script>
    function add_flat() {
        window.location = "<?php echo base_url(); ?>admin/allflatowner/addflatowner";
    }
    function display_charge_head_form() {
        $(".charge_head_form").slideToggle("slow").find("input").val("");

    }
    $(".add_charge_head").live("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        if ($(".charge_head_form").find("[name='custom_charge_head']").val() == "") {
            return false;
        } else {
            $.post("<?php echo base_url(); ?>admin/allchargehead/addchargehead", {"is_ajax":"1",charge_head_name": $(".charge_head_form").find("[name='custom_charge_head']").val()}, function(result) {
                result = $.parseJSON(result);
                if (result != "0") {
                    var html = '<tr><td colspan="2"><input type="checkbox" name="charge_head[]" id="' + result.id + '" value="' + result.id + '"><b><label class="checkbox_label" for="' + result.id + '">' + result.name + '</label></b></td></tr>'
                    if ($(".checkbox:last").length > 0)
                        $(html).insertAfter($(".checkbox:last"));
                    else
                        $(html).insertAfter($(".chargehead_title"));
                    $(".charge_head_form").find("[name='custom_charge_head']").val("");
                    $(".chargehead_or").show();
                }
            })
        }
    });
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
                    <form id="mainform" method='post' action="<?php echo base_url(); ?>admin/allflatowner/process">
                        <table id="id-form" class="table table-bordered">
                            <thead>
                                <tr class="chargehead_title">    
                                    <td colspan="2"><h2>CHARGE HEADS</h2></td>
                                </tr>
                                <?php
                                foreach ($charge_head as $val) {
                                    ?>
                                    <tr class="checkbox">    
                                        <td colspan="2">
                                            <input type="checkbox" class="no-checkbox" name="charge_head[]" id="<?php echo $val->chargehead_id; ?>" value="<?php echo $val->chargehead_id; ?>" checked='checked'><b><label class="checkbox_label" for="<?php echo $val->chargehead_id; ?>"><?php echo $val->charge_head_name; ?></label></b>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr class="chargehead_or" style="<?php echo empty($charge_head) ? 'display:none;' : ''?>">
                                    <td colspan="2"><h2><center>OR</center></h2></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2><center><a href="javascript:void(0);"  onclick="display_charge_head_form()">ADD YOUR CHARGE HEADS</a></center></h2></td>
                                </tr>
                                <tr class="charge_head_form" style="display:none;">    
                                    <td>
                                        <input type="text" name="custom_charge_head"  value="">
                                        <button class="add_charge_head">Add</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="hidden" name="success_record" value='<?php echo $success_record ?>'>
                                        <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
                                        <input type="submit" class="form-proceed" onclick="$(form).submit()" value="Confirm">
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