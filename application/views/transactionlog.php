<?php $this->load->view('header'); ?>

                                
<style>

table.reference {color: #333!important; margin-left:20px;   font-size: 12px; }
table.reference, table.tecspec {border-collapse:collapse}
table.reference th{ background-color: #366487;    border: 1px solid #555555;    color: #ffffff;    padding: 3px;    text-align: center;	height:33px;   }
   
table.reference td  { border: 1px solid #d4d4d4;    padding: 7px 5px; }
table.reference tr:nth-child(2n+1){background-color:#e9eef2}
table.reference tr td span.success{color:green;}
table.reference tr td span.failure{color:red;}
table.reference th span {margin:0 !important; padding:0 !important;}
</style>

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

    <?php // echo '<pre>'; print_r($data); exit(); ?>

        <div class="main-form " id="mytransaction_mob" style="float:left; height:462px; margin-top:-13px; width:100%; overflow:scroll; background:#fff;">

                  <p>My Transactions</p>
				  
				  
				  <table border="0" width="90%" cellpadding="0" cellspacing="0"  class="reference" id="product-table">

				<tr>

					

					<th class="table-header-repeat line-left minwidth-1"><span>Date</span>	</th>

					<th class="table-header-repeat line-left"><span>Society</span></th>

   				     <th class="table-header-repeat line-left"><span>Property</span></th>
					 <th class="table-header-repeat line-left"><span>Amount</span></th>

   				     <th class="table-header-repeat line-left"><span>Status</span></th>
					  <th class="table-header-repeat line-left"><span>Option</span></th>
 </tr>
        

                <?php 
				
				if(count($data) > 0){
				 $k=1;
	
				foreach($data as $data)

				   {

					   ?>

               <tr>

                              <td><?php echo $data['addedon']; ?></td>

                <td><?php echo $data['societyname']?></td>

                <td><?php echo $data['address']?></td>

               <td><?php echo $data['amount']?></td>                

               <td><span class="<?php echo $data['status']?>"> <?php echo $data['status']?></span></td>                                



               <td class="options-width">
                <a title="View Details" href="<?php echo base_url();?>property/transactionview/<?php echo md5($data['id']);?>">View</a>

                </td></tr>

                <?php   }  } else  echo "<tr><td colspan='6'><b>There is no transaction found</b></td></tr>";?>

			              

				</table>		

        </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>