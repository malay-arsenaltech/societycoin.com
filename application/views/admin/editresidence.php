<?php $this->load->view('admin/header'); ?>
<div class="clear"></div>
<?php if (@$_REQUEST['st'] == 1) {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function()
        {

            jQuery(":input[type='text']").attr('disabled', 'disabled');
            jQuery("select").attr('disabled', 'disabled');
            jQuery("textarea").attr('disabled', 'disabled');
            jQuery(":input[type='submit']").hide();

        });
    </script>
<?php } ?>
<script type="text/javascript">

    $(document).ready(function() {

        $.validator.addMethod('fNamealpha',
                function(value, element)
                {
                    var name = $('#username').val();
                    var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
                    //alert(name.length);
                    for (var index = name.length - 1; index >= 0; --index)
                    {
                        if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0)
                        {
                            return false;
                        }
                    }
                    return true;
                }, 'Please enter only alphabet');

        $.validator.addMethod('lNamealpha',
                function(value, element)
                {
                    var name = $('#lname').val();
                    var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";

                    for (var index = name.length - 1; index >= 0; --index)
                    {
                        if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0)
                        {
                            return false;
                        }
                    }
                    return true;
                }, 'Please enter only alphabet');


        $.validator.addMethod("alphabnumeric", function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/i.test(value);
        }, "Enter only Alpha numeric charectors.");


        $('#addnewresidence').validate({// initialize the plugin
            rules: {
                username: {
                    required: true,
                    fNamealpha: true
                },
                name: {
                    required: true,
                    lNamealpha: true

                },
                email: {
                    required: true,
                    email: true
                },
            }
        });

    });
function goBack() {
        window.history.back();
    }
</script>
<style>
    #addnewresidence label.error {float:right !important; width:250px;}

</style>
<div id="content-outer">
    <!-- start content -->
    <div id="content">

        <!--  start page-heading -->
        <div id="page-heading">
            <h1>Edit Your Society's Occupant</h1>
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
                <td>
                    <!--  start content-table-inner ...................................................................... START -->
                    <form method="post" id="addnewresidence" name="addnewresidence"    action="<?php echo base_url(); ?>admin/allresidence/update" >
                        <input type="hidden" id="id" name="property_id" value="<?php echo $data['property_id']; ?>" >
                        <input type="hidden"   id="flatowner_id" name="flatowner_id" class="inp-form" value="<?php echo $data['flatowner_id']; ?>" > 
                        <table id="id-form" class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>First Name </th>
                                    <td><input maxlength="25"  type="text" class="inp-form" id="username" name="username" value="<?php echo $data['first_name']; ?>" ></td>
                                </tr>
                                <tr>
                                    <th>Last Name</th><td><input maxlength="25"  class="inp-form" type="text" id="lname" name="name" value="<?php echo $data['last_name']; ?>" ></td>

                                </tr>
                                <tr>    
                                    <th>E-mail</th><td><input   type="text" class="inp-form" id="email" name="email" value="<?php echo $data['email_address']; ?>" ></td>
                                </tr>
<!--                                <tr>    
                                    <th>Login id</th><td><input   type="text" disabled class="inp-form" id="login_id" name="login_id" value="<?php echo $data['username']; ?>" ></td>
                                </tr>

                                <tr>
                                    <th>Mobile</th><td><input type="text"   class="inp-form" id="mobile" name="mobile" value="<?php echo $data['mobile']; ?>" ></td>

                                </tr>-->
                                <tr>                          
                                    <th>Address</th><td><input   type="text" id="address" class="inp-form" name="address" value="<?php echo $data['flat_address']; ?>" ></td></tr><tr>
                                    <th>City</th><td><input type="text" maxlength="25"  id="city" name="city" class="inp-form" disabled value="<?php echo $data['city']; ?>" ></td>
                                </tr>
                                <tr>    
                                    <th>State</th><td><input type="text" id="state" disabled  name="state" class="inp-form" value="<?php echo $data['state']; ?>" ></td></tr>
<!--                                <tr><th>New Password</th><td><input maxlength="15"  type="password" class="inp-form" id="newpassword" name="newpassword" value="" ></td></tr><tr>
                                    <th>Confirm New Password</th><td><input  maxlength="15"  type="password" class="inp-form" id="cpassword" name="cpassword" value="" ></td>
                                </tr>-->
                                <tr>
                                    <th>   </th>
                                    <td><input type="submit" class="form-button form-proceed"  value="Update" >
                                        <input class="form-button-gray" type="reset" value="Reset"  style="margin-right:10px;">
                                        <input class="form-button-gray" type="reset" value="Cancel" onclick="goBack();">
                                        <input type="hidden" id="status" name="status" value="<?php echo $data['status']; ?>" >
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