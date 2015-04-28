<?php $this->load->view('admin/header'); ?>
<link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/datePicker.css" type="text/css" />
<script src="<?php echo AdminThemeUrl; ?>js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.datePicker.js" type="text/javascript"></script>
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
    .hidden{display: none;}
    .charge_head{
        color: grey;
        text-decoration: underline;
    }
    .charge_head_form td { text-align: center!important;}
    .charge_head_form input{ width: 125px!important;}
</style>
<script>
    function display_charge_head_form() {
        $(".charge_head_form").toggleClass("hidden").find("input").val("");
    }
    $(".add_charge_head").live("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        if ($(".charge_head_form").find("[name='custom_charge_head']").val() == "") {
            return false;
        } else {
            $.post("<?php echo base_url(); ?>admin/allchargehead/addchargehead", {"is_ajax": "1", charge_head_name: $(".charge_head_form").find("[name='custom_charge_head']").val()}, function(result) {
                result = $.parseJSON(result);
                if (result != "0") {
                    var html = '<tr><td></td><td><input type="checkbox" name="charge_head[]" id="' + result.name + '" value="' + result.name + '"><b><label class="checkbox_label" for="' + result.name + '">' + result.name + '</label></b></td></tr>'
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
    $(function()
    {
        // initialise the "Select date" link
        var dates = $('#sdate,#edate').datePicker(
                {
                    createButton: false,
                    startDate: '01/01/2005',
                    endDate: '31/12/2020'

                });
            $('#downloadbill').validate({// initialize the plugin
                rules: {
                    bill_generates_on: {
                        required: true
                    },
                     bill_due_on: {
                        required: true
                    }
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
            <h1>Bill Download</h1><br>
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
                    <form id="downloadbill" method='post' action="<?php echo base_url(); ?>admin/allresidence/downloadbill">
                        <input type="hidden" name="society_name" value="<?php echo $society_name ?>">
                        <table id="id-form" class="table table-bordered" width="120%">
                            <thead>
                                <tr>
                                    <td>Bill Generated On</td>
                                    <td><input type="text" name="bill_generates_on" class="required from-date" id="sdate" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>Bill Due Date</td>
                                    <td><input type="text" name="bill_due_on" class="required to-date" id="edate" autocomplete="off"></td>
                                </tr>
                                <?php
                                foreach ($charge_head as $key => $val) {
                                    ?>
                                    <tr class="checkbox">    
                                        <td><?php echo ($key == 0) ? "Charge Heads" : ""; ?></td>
                                        <td>
                                            <b><input type="checkbox" class="no-checkbox" name="charge_head[]" id="<?php echo $val->charge_head_name; ?>" value="<?php echo $val->charge_head_name; ?>" checked='checked'><label class="checkbox_label" for="<?php echo $val->charge_head_name; ?>"><?php echo $val->charge_head_name; ?></label></b>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr class="chargehead_or" style="<?php echo empty($charge_head) ? 'display:none;' : '' ?>">
                                    <td></td><td><h2><center>OR</center></h2></td>
                                </tr>
                                <tr>
                                    <td></td><td><h2><center><a class="charge_head" href="javascript:void(0);"  onclick="display_charge_head_form()">ADD YOUR CHARGE HEADS</a></center></h2></td>
                                </tr>
                                <tr class="charge_head_form hidden">    
                                    <td></td>
                                    <td>
                                        <input type="text" name="custom_charge_head"  value="">
                                        <button class="add_charge_head form-button">Add</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                            <center>
                                <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
                                <input type="submit" class="form-proceed form-button btnb" onclick="$(form).submit()" value="Download Bill">
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