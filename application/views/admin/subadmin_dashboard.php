<?php $this->load->view('admin/header'); ?>
 <div class="clear"></div>
 <style>
        * { margin: 0; padding: 0; }
        #page-wrap { width: 960px; margin: 100px auto; }
        h1 { font: 25px Georgia, Serif; margin: 20px 0; }
        .group:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
       
p.pagination {
    float: right;
}
.pagination > a {
    color: #000000;
    font-weight: bold;
    margin: 9px;
}
		.group li a{   border-left: 1px solid #CCCCCC;   border-right: 1px solid #CCCCCC;    border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; }
		
        
        .tabs { list-style: none; }
        .tabs li { display: inline; }
        .tabs li a { color: black; float: left; display: block; padding: 7px 25px; margin-left: -1px; position: relative; left: 1px; background: white; text-decoration: none; }
        .tabs li a:hover { background: #ccc; }
        
        
        /* Generic styles & example one */
        
        .tabbed-area { margin: 0 0 120px 0; }
        .box-wrap { position: relative; min-height: 250px; }
        .tabbed-area div div { border:1px solid #CCCCCC; background: white; padding: 20px;  top: -1px; left: 0; width: 90%; }
        .tabbed-area div div, .tabs li a {  }
        #box-one:target, #box-two:target, #box-three:target { z-index: 1; }
        
        
        
        /* Stuff for example two */
        
        .cur-nav-fix { margin-top: 60px; }
        .cur-nav-fix .tabs { position: absolute; bottom: 100%; left: -1px; }
        .cur-nav-fix .tabs li a { background: -moz-linear-gradient(top, white, #eee); }
        #box-four { z-index: 1; }
        #box-four:target .tabs,
        #box-five:target .tabs,
        #box-six:target .tabs { z-index: 3; }
        #box-four:target, #box-five:target, #box-six:target { z-index: 2; }
        .cur-nav-fix .tabs li.cur a { border-bottom: 1px solid white; background: white; }
        
        
        /* Stuff for example three */
        
        .cur-nav-fix-2 .tabs li a { background: -moz-linear-gradient(top, white, #eee); }
        .cur-nav-fix-2 .tabs { z-index: 2; position: relative; }
        #box-seven:target .box-seven,
        #box-eight:target .box-eight,
        #box-nine:target .box-nine { z-index: 1; }
        #box-seven:target a[href="#box-seven"],
        #box-eight:target a[href="#box-eight"],
        #box-nine:target a[href="#box-nine"] { border-bottom: 1px solid white; background: white; }
        
        
        /* Stuff for example four */
        
        .active-test { padding-top: 40px; }
        .active-test .single-tab em { background: white; width: 50px; font-style: normal; position: absolute; bottom: 100%; text-decoration: none; color: black; border: 1px solid #ccc; padding: 5px 10px; }
        .active-test .single-tab span { position: absolute; top: -1px; left: 0; width: 100%; display: block; padding: 20px; border: 1px solid #ccc; min-height: 250px; background: white; }
        .active-test .single-tab:active em { background: #ccc; }
        .active-test .single-tab:active span, .active-test .single-tab:focus span { z-index: 1; }
        .tab-ten em { left: 0; }
        .tab-eleven em { left: 70px; }
        .tab-twelve em { left: 140px; }
        
        
        /* Stuff for example five */
        
        .adjacent { position: relative; margin-top: 50px; min-height: 300px; }
        .adjacent div { border: 1px solid #ccc; background: white; padding: 20px; min-height: 250px; position: absolute; top: -1px; left: 0; width: 100%; }
        .adjacent .tabs { position: absolute; bottom: 100%; left: 0; z-index: 2; }
        .adjacent .tabs li a { background: -moz-linear-gradient(top, white, #eee); }
        #box-thirteen:target,
        #box-fourteen:target,
        #box-fifteen:target { z-index: 1; }
        #box-thirteen:target ~ .tabs a[href='#box-thirteen'],
        #box-fourteen:target ~ .tabs a[href='#box-fourteen'],
        #box-fifteen:target ~ .tabs a[href='#box-fifteen'] { background: white; border-bottom: 1px solid white; }


        /* Stuff for example six */

        .w3c { min-height: 250px; position: relative; width: 100%; }
        .w3c > div { display: inline; }
        .w3c > div > a { margin-left: -1px; position: relative; left: 1px; text-decoration: none; color: black; background: white; display: block; float: left; padding: 5px 10px; border: 1px solid #ccc; border-bottom: 1px solid white; }
        .w3c > div:not(:target) > a { border-bottom: 0; background: -moz-linear-gradient(top, white, #eee); }	
        .w3c > div:target > a { background: white; }	
        .w3c > div > div { background: white; z-index: -2; left: 0; top: 30px; bottom: 0; right: 0; padding: 20px; border: 1px solid #ccc; }	
        .w3c > div:not(:target) > div { position: absolute }
        .w3c > div:target > div { position: absolute; z-index: -1; }
        
        
        /* Stuff for example seven - including conditionals below */
        
        #ie-test { position: relative; width: 100%; }
        #boxLinks { list-style: none; overflow: hidden; }
        #boxLinks li {  display: inline; }
        #boxLinks li a { padding: 5px 10px; color: black; text-decoration: none; border: 1px solid #ccc; float: left; display: block; margin-left: -1px; position: relative; left: 1px; }
        #boxLinks li a:hover { color: #fff; background: #000; }
        #box { height: 250px; border: 1px solid #ccc; overflow: hidden; padding: 0px 30px 0px 30px; position: relative; top: -1px; }
        .box { display: none; height: 250px; overflow: auto; display: block; position: relative; overflow-x: hidden; }
        #box1:target, #box2:target, #box3:target { display: block; }
       .active {   border-bottom: 2px solid #F2F2F2 !important;    font-weight: bold; }
	    td a.failure{color:red !important; border: 1px solid #ccc;text-transform: capitalize; font-weight: bold; }
	    td a.success{color:green !important; border: 1px solid #ccc;text-transform: capitalize;font-weight: bold; }
    </style>

    
<script type="text/javascript" >
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=600,left=100,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

<div id="content-outer">
<!--bread-crum-outer-end-->


<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
	<?php 
	if($this->session->userdata('utype') == 2)
		echo "<h1>Dashboard</h1>";
		
		else { 
		
		$title = getsociety_name_user_id($this->session->userdata('admin_id'));
		echo "<h1>Dashboard for $title </h1>";
		
		}
		?>
	</div>
	<!-- end page-heading --> 
	<div class="clear">&nbsp;</div>
	   <div style="padding-right:17px; float:right;margin-right:73px;" >
	       <form id="psearch" name="psearch" action="<?php  echo base_url(); ?>admin/login/dashboard" method="get" >
 
        <table id="id-form" ><tr>
         <td><input type="text"  value="<?php echo  $this->input->get_post('search_text');  ?>"  name="search_text"     /> 			 </td>
		 <td><input type="submit" name="sbt"  style="width:70px;margin-left:5px;"  value="Search"  /></td>
         </tr></table>
          </form></div>
		  <div class="clear">&nbsp;</div>
	<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
             <div class="tabbed-area cur-nav-fix-2"  style="margin-left: 40px;">
                    
                    <ul class="tabs group">
                                             
                        <li><a  href="javascript:void(0)" >Transaction Details</a></li>
                    </ul>
                    
                    <div class="box-wrap">
                                           
         
                                 <div class="box-nine">
								  <a  style=" float: right; margin-bottom:3px;" class="btnb" href="javascript:newPopup('<?php echo base_url();  ?>admin/allusers/print_all_transaction/<?php echo  $this->input->get_post('search_text');  ?>');"  >Print All</a>
                            <?php // echo '<pre>'; print_r($pay); exit(); ?>
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr>
					<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
					<th class="table-header-repeat line-left minwidth-1"><span>Society Name</span>	</th>
					<th class="table-header-repeat line-left minwidth-1"><span>Property Address</span></th>	
					<th class="table-header-repeat line-left minwidth-1"><span>Amount</span></th>	
					
                    <th class="table-header-repeat line-left"><span>Payment Date</span></th>
					 <th class="table-header-repeat line-left"><span>Payment Status</span></th>
                    <th class="table-header-repeat line-left"><span>Options</span></th>
				</tr>
              <?php $i=0; 

if(count($pay) > 0){

			  foreach($pay as $data)
			         {$i++;
					 
					  if($i%2==1)
					    {
							$style='alternate-row';
							}else
							    {	
								 $style='';
								}
					 
						 ?>
				<tr class="<?php echo $style; ?>">
					<td><?php echo $i; ?></td>
					<td><a href="<?php echo base_url();?>admin/allusers/transactionview/<?php echo $data['id']; ?>" ><?php echo $data['societyname']; ?></a></td>
 					<td><?php echo $data['propertyname']; ?></td>
                <td>INR <?php echo $data['amount']; ?></td>
					<td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['addedon'])); ?></td>
					<td><a href="<?php echo base_url();?>admin/allusers/transactionview/<?php echo $data['id']; ?>" class="<?php echo  $data['status'] ; ?>" ><?php echo  $data['status'] ; ?></a></td>
                    <td><a href="<?php echo base_url();?>admin/allusers/transactionview/<?php echo $data['id']; ?>" class="icon-3 info-tooltip" title="Transaction Details"></a>
					<a href="<?php echo base_url();?>admin/allusers/pdf/<?php echo $data['id']; ?>" class="info-tooltip"   title="Pdf Transaction Details"><img src="<?php echo base_url();?>images/pdf.png"  style="margin-left:10px;width:22px;"  ></a>
					<a href="JavaScript:newPopup('<?php echo base_url();?>admin/allusers/print_transaction/<?php echo $data['id']; ?>');" class="info-tooltip"   title="Print Transaction Details"><img src="<?php echo base_url();?>images/print.png"  style="margin-left:10px;width:22px;"  ></a>	</td>
				</tr>
                <?php } }  else {  echo "<tr><td colspan='8'><strong> No Records Found!</strong></td></tr>";  } ?>
                
                </tbody></table>
                </table>
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php echo $links2; ?>
			
			</tr>
			</table>      
                        </div>
             
                    </div>
                    
                </div>

                
				
			</div>
            
            
            			
            

            	
			
		</div>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>


<div class="clear">&nbsp;</div>
    
<?php $this->load->view('admin/footer'); ?>