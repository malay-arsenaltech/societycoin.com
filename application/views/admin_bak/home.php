<?php $this->load->view('admin/header'); ?>
 <div class="clear"></div>
 <style>
        * { margin: 0; padding: 0; }
        #page-wrap { width: 960px; margin: 100px auto; }
        h1 { font: 36px Georgia, Serif; margin: 20px 0; }
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
        .tabbed-area div div { border:1px solid #CCCCCC; background: white; padding: 20px;  position: absolute; top: -1px; left: 0; width: 90%; }
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
    </style>

    
<script type="text/javascript" >
$(document).ready(function ()
	{
       	$('.box-seven').show();
		$('.box-eight').hide();
		$('.box-nine').hide();
		$('#tab1').addClass('active');	
		<?php if(@$_REQUEST['act']=='act')
		    {?>
		$('#tab1').addClass('active');	
		$('#tab2').removeClass('active');	
		$('#tab3').removeClass('active');			
		
       	$('.box-seven').show();
		$('.box-eight').hide();
		$('.box-nine').hide();


		   <?php }?>
		   
		<?php if(@$_REQUEST['act']=='sact')
		    {?>
		$('#tab1').removeClass('active');	
		$('#tab2').addClass('active');	
		$('#tab3').removeClass('active');			
       	$('.box-seven').hide();
		$('.box-eight').show();
		$('.box-nine').hide();


		   <?php }?>
		   
		<?php if(@$_REQUEST['act']=='tact')
		    {?>
        $('#tab1').removeClass('active');	
		$('#tab2').removeClass('active');	
		$('#tab3').addClass('active');			
		
       	$('.box-seven').hide();
		$('.box-eight').hide();
		$('.box-nine').show();


		   <?php }?>

		$('#tab1').click(function () { 
								   
		$('#tab1').addClass('active');	
		$('#tab2').removeClass('active');	
		$('#tab3').removeClass('active');			
		
       	$('.box-seven').show();
		$('.box-eight').hide();
		$('.box-nine').hide();
			
			
		});
		
		$('#tab2').click(function () { 

		$('#tab1').removeClass('active');	
		$('#tab2').addClass('active');	
		$('#tab3').removeClass('active');			

       	$('.box-seven').hide();
		$('.box-eight').show();
		$('.box-nine').hide();
			
			
		});

		$('#tab3').click(function () { 

        $('#tab1').removeClass('active');	
		$('#tab2').removeClass('active');	
		$('#tab3').addClass('active');			
								   
       	$('.box-seven').hide();
		$('.box-eight').hide();
		$('.box-nine').show();
			
			
		});


							
							
	});
</script>

<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Dashboard</h1>
	</div>
	<!-- end page-heading -->

	<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
               
            <?php  if($this->session->userdata('utype')==1)
			   {?>
                <div class="tabbed-area cur-nav-fix-2"  style="margin-left: 40px;">
                    
                    <ul class="tabs group">
                        <li><a id="tab1" href="javascript:void(0)" >Latest User Activity</a></li>
                        <li><a id="tab2" href="javascript:void(0)" >Sub Admin Activity</a></li>
                        <li><a id="tab3" href="javascript:void(0)" >Payment</a></li>
                    </ul>
                    
                    <div class="box-wrap">
                    
                        <div class="box-seven">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr>
					<th class="table-header-check"><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">User Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Activity</a></th>
					<th class="table-header-repeat line-left"><a href="">Date & Time</a></th>
                    <th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
              <?php $i=0;  foreach($data as $data)
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
					<td><a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['userid']; ?>" ><?php echo $data['username']; ?></a></td>
 					<td><?php echo $data['activity']; ?></td>
					<td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['timestamp'])); ?></td>
                    <td><a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['userid']; ?>" >View user details</a></td>
				</tr>
                <?php } ?>
                
                </tbody></table>
<p class="pagination">    <?php 
					$start=10;
					if(@$_REQUEST['start']!=0)
					{
					$start=$_REQUEST['start'];
					$start=$start+10;
					$Prev=$_REQUEST['start']-10;
					?>
                 <a href="<?php echo base_url();?>admin/?start=<?php echo $Prev ?>&act=act">Prev</a>
<?php
					}
					?>
                    <a href="<?php echo base_url();?>admin/?start=<?php echo $start; ?>&act=act">Next</a></p>
                        </div>
                        
                        <div class="box-eight">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr>
					<th class="table-header-check"><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">User Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Activity</a></th>
					<th class="table-header-repeat line-left"><a href="">Date & Time</a></th>
                    <th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
              <?php $i=0;  foreach($data1 as $data)
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
					<td><a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['userid']; ?>" ><?php echo $data['username']; ?></a></td>
 					<td><?php echo $data['activity']; ?></td>
					<td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['timestamp'])); ?></td>
                    <td><a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $data['userid']; ?>" >View user details</a></td>
				</tr>
                <?php } ?>
                
                </tbody></table>
                <p class="pagination">    <?php 
					$start=10;
					if(@$_REQUEST['start']!=0)
					{
					$start=$_REQUEST['start'];
					$start=$start+10;
					$Prev=$_REQUEST['start']-10;
					?>
                 <a href="<?php echo base_url();?>admin/?start=<?php echo $Prev ?>&act=sact">Prev</a>
<?php
					}
					?>
                    <a href="<?php echo base_url();?>admin/?start=<?php echo $start; ?>&act=sact">Next</a></p>
                        </div>
                        
                        <div class="box-nine">
                            <?php // echo '<pre>'; print_r($pay); exit(); ?>
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr>
					<th class="table-header-check"><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Society Name</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Properyt Address</a></th>
					<th class="table-header-repeat line-left"><a href="">Bill Name</a></th>
                    <th class="table-header-repeat line-left"><a href="">Payment Date</a></th>
                    <th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
              <?php $i=0;  foreach($pay as $data)
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
					<td><a href="<?php echo base_url();?>admin/allusers/transactionview?tranid=<?php echo $data['id']; ?>" ><?php echo $data['societyname']; ?></a></td>
 					<td><?php echo $data['proaddress']; ?></td>
                	<td><?php echo $data['billname']; ?></td>
					<td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['addedon'])); ?></td>
                    <td><a href="<?php echo base_url();?>admin/allusers/transactionview?tranid=<?php echo $data['id']; ?>" >View user details</a></td>
				</tr>
                <?php } ?>
                
                </tbody></table>
                <p class="pagination">    <?php 
					$start=10;
					if(@$_REQUEST['start']!=0)
					{
					$start=$_REQUEST['start'];
					$start=$start+10;
					$Prev=$_REQUEST['start']-10;
					?>
                 <a href="<?php echo base_url();?>admin/?start=<?php echo $Prev ?>&act=tact">Prev</a>
<?php
					}
					?>
                    <a href="<?php echo base_url();?>admin/?start=<?php echo $start; ?>&act=tact">Next</a></p>
                        </div>
                        
                    </div>
                    
                </div>
                <?php } ?>
                
				
			</div>
            
            
            			

			
		</div>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>


<div class="clear">&nbsp;</div>
    
<?php $this->load->view('admin/footer'); ?>