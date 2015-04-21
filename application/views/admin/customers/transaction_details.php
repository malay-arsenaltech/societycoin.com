<?php 
$this->load->view('admin/header');

$customer = get_user_details($cusid);
$name = $customer->fname . ' '. $customer->lname;

?>
 <div class="clear"></div>
 <style>


  
	   td span.failure{color:red !important; border: 1px solid #ccc;text-transform: capitalize; font-weight: bold; }
	    td span.success{color:green !important; border: 1px solid #ccc;text-transform: capitalize;font-weight: bold; } 
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
    window.history.back();
}
</script>



<div id="content-outer">

<!-- start content -->

<div id="content">



	<!--  start page-heading -->

	<div id="page-heading">
		<h1>Transactions for <?php echo $name ; ?> </h1>
		

	</div>
	<!-- end page-heading --> 	<div class="clear">&nbsp;</div>
	<div style=" margin-bottom: 20px;    width: 479px;" class="select_sub show">
			<ul style="margin:15px 25px 0 0; float:right" class="sub">
				<li class="sub_show">
				<a class="btnb" onclick="goBack();" href="javascript:void(0);">Back</a>
				</li>
                                             
          
			</ul>
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

		<!--  start content-table-inner ...................................................................... START -->

		<div id="content-table-inner">


		   <div id="table-content">

				<form id="mainform" action="">

                 



				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

			<tr>
						<th class="table-header-repeat line-left" style="width:20px;"><span>S.No</span>	</th>
					<th class="table-header-repeat line-left minwidth-1"><span>Society Name</span>	</th>
					<th class="table-header-repeat line-left minwidth-1"><span>Property Address</span></th>	
					<th class="table-header-repeat line-left minwidth-1"><span>Amount</span></th>
                    <th class="table-header-repeat line-left"><span>Payment Date</span></th>
					
					 <th class="table-header-repeat line-left"><span>Payment Status</span></th>

				</tr>
                 <?php $i=0; 
				if(count($records) > 0){

			  foreach($records as $data)
			         {$i++;
					 
					  if($i%2==1)
					    {
							$style='alternate-row';
							}else
							    {	
								 $style='';
								}
					 
						 ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $data['societyname']; ?></td>
 					<td><?php echo $data['propertyname']; ?></td>  
					<td>INR <?php echo $data['amount']; ?></td>
					<td><?php echo date('l jS \of F Y h:i:s A',strtotime($data['addedon'])); ?></td>
					<td><span class="<?php echo  $data['status'] ; ?>"><?php echo $data['status']; ?></span></td>
				</tr>
                <?php } } else { echo "<tr><td colspan='6'> No records found</td></tr>";  } ?>
                
             

				</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

            
<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			
			<?php //echo $links; ?>
			
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