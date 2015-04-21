<?php $this->load->view('admin/header'); ?>
<script type="text/javascript">
function validateform()
{



	var title=jQuery("#title").val(); 
	var description=jQuery("#description").val(); 
	
	
var error='';
if(title=='')
  {
	error+="* Please select Socity Admin";
  	$("#title").addClass('inp-form-error');
	 }else
	   {
   	$("#title").removeClass('inp-form-error');
	   }
	   if(error!='')
	{
	//	alert(error);
		return false;
	}
	return true; 
}
</script>


<div class="clear"></div>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Edit Static Cms Page</h1>
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
        <td><!--  start content-table-inner ...................................................................... START -->
          <form method="post" id="addnewsocity" name="addnewsocity" onsubmit="return validateform()"  action="<?php echo base_url();?>admin/allcmspages/update" >
            <input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>" />
            <table id="id-form" class="table table-bordered">
              <thead>
                <tr> </tr>
                <tr>
                  <th><label>Title</label></th><th>
                    <input type="text" id="title" class="inp-form" name="title" value="<?php echo $data['title']; ?>" /></th>
                </tr>
                <tr>                  <th><label>Meta Keywords</label></th><th>
                    <input type="text" id="meta_keywords" name="meta_keywords" class="inp-form" value="<?php echo $data['meta_keywords']; ?>" /></th>
                </tr>
                <tr>
                  <th><label>Description</label> </th><th>
                    <textarea class="form-textarea" id="description" name="description"><?php echo $data['description']; ?></textarea>
                    	<?php echo display_ckeditor($ckeditor); ?>
                    </th>
                </tr>
                                <tr>
                  <th><label>Meta Description</label> </th><th>
                    <textarea  class="form-textarea" id="meta_description" name="meta_description"><?php echo $data['meta_description']; ?></textarea>
                    	<?php echo display_ckeditor($ckeditor_2); ?>
                    </th>
                </tr>

                <tr>
                  <th> <input type="submit" class="form-submit"  value="Add New User" />
                    <input type="hidden" id="status" name="status" value="<?php echo $data['status']?>" />
                    <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
                  </th>
                </tr>
              </thead>
            </table>
          </form>
          <!--  end content-table-inner ............................................END  --></td>
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
