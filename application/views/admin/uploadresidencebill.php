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
    .hidden{display: none;}
</style>
<script>
    $(document).ready(function() {
        $('#uploadbill').validate({// initialize the plugin
            rules: {
                bill_data: {
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
            <h1>Bill Upload</h1><br>
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
                    <form enctype="multipart/form-data" id="uploadbill" method='post' action="<?php echo base_url(); ?>admin/allresidence/billpreview">
                        <table id="id-form" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Bill</td>
                                    <td><input type="file" name="bill_data" id="flat_data" accept=".csv"></td>
                                </tr>

                                <tr>    
                                    <th>&nbsp;</th>
                                    <td>
                                        <input type="submit" class="form-proceed form-button"  value="Upload" >&nbsp;
                                        <input class="form-button-gray" type="reset" value="Reset" >
                                        <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" >
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