<?php $this->load->view('header'); ?>
<!--mid-portion-->
<div class="row-fluid mid-outer">
  <div class=" container mid-inner">
    <!--left-->
    <?php $this->load->view('left'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->
    <div class="right">
    <?php $this->load->view('menu'); ?>
    <style type="text/css">
#send label {
    font-weight: bold;
    margin: 10px;
}
	</style>
    <div id="vertical_container" >
                <form id="send" name="send" action="<?php echo base_url();?>message" method="post" style="margin:10px; background:#fff; border:1px solid #363;" >
                    <h4 style="margin:10px;"><a  href="#" >Inbox Message</a></h4>
                <table style="margin:10px;">
                <tr><td><label>Send By Society <br/> Admin</label></td><td><input type="text" value="<?php echo $data[0]->fname.'&nbsp;'.$data[0]->lname; ?>"  /></td></tr>
                <tr><td><label>Subject</label></td><td><input type="text" value="<?php echo $data[0]->subject; ?>"  name="subject" id="subject"></td></tr>
                <tr><td colspan="2" ><label>Message</label><textarea style="width: 333px; height: 110px;" id="message" name="message" ><?php echo $data[0]->message ?></textarea></td></tr>
                <tr><td colspan="2" ><input type="submit" value="Back"  /></td></tr>
                </table>
                </form>

    
           
    
    </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>