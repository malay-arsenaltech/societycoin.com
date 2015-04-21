<?php $this->load->view('admin/header'); ?>
<style>
#id-form td {padding:0 0 32px;}

#content .select_sub {
    float: right !important;
    padding: 0 19px 0 0;
    width: 445px;
}

#content .select_sub ul li {
    float: left;
    list-style-type: none;
    margin: 0 10px;
}
</style>
<script>
function goBack() {
    window.location.href="<?php   echo base_url().'admin?act=act'   ?>";
}
</script>
<div class="clear"></div>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>User Details</h1>
    </div>
    <!-- end page-heading -->
	<div class="select_sub show" style=" margin-bottom: 20px;    width: 479px;">
			<ul class="sub" style="margin:15px 25px 0 0; float:right">
				<li class="sub_show">
				<a href="javascript:void(0);" onclick="goBack();"  class="btnb">Back</a>
				</li>
                                             
          
			</ul>
		</div>
 <table border="0" width="100%"  style="font-size:12px;" cellpadding="0" cellspacing="0" id="content-table">

     <tr>
        <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="<?php echo AdminThemeUrl; ?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
      </tr>
	      <tr>
        <td id="tbl-border-left"></td>
        <td style="float:left;" ><!--  start content-table-inner ...................................................................... START -->
         
 <table id="id-form" class="table table-bordered">
     
  <tr>
    <td><strong> ID &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['id']; ?>      </td>
  </tr>
  	  
  <tr>
    <td><strong> Name &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['fname'] . " " .$data['lname']; ?>
      </td>
  </tr>
  
    <tr>
    <td><strong> Email &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['email'] ; ?>
      </td>
  </tr>
      <tr>
    <td><strong> Mobile &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['mobile'] ; ?>
      </td>
  </tr>
     	 <tr>
    <td><strong> Address &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['address'] ; ?>
      </td>
  </tr>
  
    	 <tr>
    <td><strong> State &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['state'] ; ?>
      </td>
  </tr>
	 <tr>
    <td><strong> City &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['city'] ; ?>
      </td>
  </tr>
  
    <tr>
    <td><strong> Country &nbsp;:</strong></td>
    <td>&nbsp;<?php  echo $data['country'] ; ?>
      </td>
  </tr>
    
  
  </tr>
    
 </table>
     
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