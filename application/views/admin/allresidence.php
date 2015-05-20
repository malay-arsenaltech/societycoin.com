<?php $this->load->view('admin/header'); ?>
<script>
function newPopup(url) {
        popupWindow = window.open(
                url, 'popUpWindow', 'height=700,width=700,left=100,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
</script>
<div class="clear"></div>
<div id="content-outer">
    <!-- start content -->
    <div id="content">
        <!--  start page-heading -->
        <div id="page-heading"><h1>Your Society Residence Directory</h1><br />
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
                        <tbody><tr>
                                <td class="green-left"><?php echo $msg_error; ?></td>
                                <td class="green-right"><a class="close-green"><img alt="" src="<?php echo AdminThemeUrl; ?>images/table/icon_close_green.gif"></a></td>
                            </tr>
                        </tbody></table>
                </div>
            <?php } ?>
        </div>
        <div style="padding-right:17px; float:right;margin-right:73px;" >
            <form id="search" name="search" action="<?php echo base_url(); ?>admin/allresidence" method="get" >
                <table id="id-form" ><tr>
                        <td>
                            <input type="text"   name="search_text"  value="<?php echo $this->input->get_post('search_text'); ?>"   /> 
                        </td>
                        <td><input type="submit" name="sbt"  style="width:70px;"  value="Search"  /></td>
                    </tr></table>
                <input name="task"  value="search" type="hidden"  >

            </form>
            <a  style=" float: right; margin-bottom:3px;" class="btnb" href="javascript:newPopup('<?php echo base_url(); ?>admin/allresidence/print_all_residence/<?php echo $this->input->get_post('search_text'); ?>');"  >Print All</a>
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
                    <div id="content-table-inner">
                        <div id="table-content">
                            <form id="mainform" action="">
                                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                                    <tr>
                                        <th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
                                        <th class="table-header-repeat line-left minwidth-1"><span>Name</span>	</th>
                                        <th class="table-header-repeat line-left minwidth-1"><span>Email Address</span></th>
                                        <th class="table-header-repeat line-left minwidth-1"><span>Address</span></th>
                                        <th class="table-header-repeat line-left"><span>City</span></th>
                                        <th class="table-header-repeat line-left"><span>State</span></th>
                                        <th class="table-header-repeat line-left"><span>Options</span></th>
                                    </tr>

                                    <?php
                                    if (count($data) > 0) {
                                        $k = 1;
                                        if (isset($_GET['per_page']))
                                            $k = $_GET['per_page'] + 1;
                                        foreach ($data as $data) {
                                            ?>              
                                            <tr>
                                                <td><?php echo $k; ?></td>
                                                <td><?php echo $data['fname'] . " " . $data['lname']; ?></td>
                                                <td><?php echo $data['email']; ?></td>
                                                <td><?php echo $data['flat_address']; ?></td>
                                                <td><?php echo $data['city']; ?></td>
                                                <td><?php echo $data['state']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>admin/allresidence/editresidence/<?php echo $data['id']."/".$data['property_id']; ?>" title="Edit Residence" class="icon-1 info-tooltip"></a>
                                                    <a href="<?php echo base_url(); ?>admin/allresidence/delete/<?php echo $data['id']."/".$data['property_id']; ?>" title="Delete Residence" onclick="return confirm('Are you sure to delete?');"  class=" info-tooltip icon-2"></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $k++;
                                        }
                                    }
                                    else
                                        echo "<tr><td colspan='7'><strong>Record not found</strong></td></tr>";
                                    ?>
                                </table>
                            </form>
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
                            <tr>
                                <?php echo $links; ?>
                            </tr>
                        </table>        
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