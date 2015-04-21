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
    
    <div id="vertical_container" >
                <h1 style="padding:10px;" class="accordion_toggle">New</h1>
           <div class="accordion_content" style="height: auto; display: block;">   
                <div id="horizontal_container" style="height:240px;" >
                <form id="send" name="send" action="<?php echo base_url();?>message/send" method="post" >
                <input type="hidden" id="status" name="status" value="1" />
                <table><tr><td>
                <select id="to" name="to">
                <option>Society Admin</option>
                 <?php foreach($society as $society)
				    {
						?>
                    <option value="<?php echo $society->userid ; ?>"><?php echo $society->society_title; ?></option>
                    <?php } ?>
                </select></td><td><input type="text" value="Subject" onblur="if (this.value=='') this.value='Subject';" onfocus="if(this.value=='Subject') this.value='';" style="padding-left:8px !important;" name="subject" id="subject"></td></tr>
                <tr><td colspan="2" ><textarea style="width: 333px; height: 110px;" id="message" name="message" onblur="if (this.value=='') this.value='Message';" onfocus="if(this.value=='Message') this.value='';" >Message</textarea></td></tr>
                <tr><td colspan="2" ><input type="submit" value="Send"  /></td></tr>
                </table>
                </form>
                </div>           

                          
            </div>
    
            <h1 style="padding:10px;" class="accordion_toggle">Inbox</h1>
            <div class="accordion_content">
            <div id="horizontal_container" style="height:240px;" >
              <table width="90%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr style="height:35px;">
					<th class=""><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Subject</a></th>
                     	<th class="table-header-repeat line-left"><a href="">Date</a></th>
                                             <th class="table-header-repeat line-left"><a href="">Option</a></th>
					</tr>
                    <?php
					   if(count($inbox)>0)
					     {
					   foreach($inbox as $data)
					    {
                           ?>
                    
                                <tr><td></td>
                                <td><a href="<?php echo base_url()?>message/inboxview?mid=<?php echo $data->id ?> "><?php echo $data->fname.'&nbsp;'.$data->lname; ?></a></td>
                                <td><?php echo $data->subject; ?></td>
                                    <td><?php // Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('jS \of F Y h:i:s A',strtotime($data->timestamp));     // echo standard_date($data->timestamp);?></td>
                                <td class="options-width">
                                   <a class="icon-2 info-tooltip" title="Delete" href="<?php echo base_url()?>message/delete?mid=<?php echo $data->id ?>" ></a>
                         		</td>
                            </tr>
                                
                        <?php }
						 }else
						   {
							   ?>
							   <tr><td colspan="5">Your Messages Are not Available Now</td></tr>
							   
							   <?php 							 
							   }
						?>        
               </tbody></table>                 

            </div>
            
            </div>
            
            <h1 style="padding:10px;" class="accordion_toggle">Send</h1>
            <div class="accordion_content">
            <div id="horizontal_container" style="height:240px;" >
            <table width="90%" cellspacing="0" cellpadding="0" border="0" id="product-table">
				<tbody><tr style="height:35px;">
					<th class=""><a id="toggle-all"></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
					<th class="table-header-repeat line-left"><a href="">Subject</a></th>
                     	<th class="table-header-repeat line-left"><a href="">Date</a></th>
                                             <th class="table-header-repeat line-left"><a href="">Option</a></th>
					</tr>
                    <?php
					
					  if(count($outbox)>0)
					     {foreach($outbox as $data)
					    {
                           ?>
                    
                                <tr><td></td>
                                <td><a href="<?php echo base_url()?>message/view?mid=<?php echo $data->id ?> "><?php echo $data->fname.'&nbsp;'.$data->lname; ?></a></td>
                                <td><?php echo $data->subject; ?></td>
                                    <td><?php // Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('jS \of F Y h:i:s A',strtotime($data->timestamp));     // echo standard_date($data->timestamp);?></td>
                                <td class="options-width">
                                   <a class="icon-2 info-tooltip" title="Delete" href="<?php echo base_url()?>message/delete?mid=<?php echo $data->id ?>" ></a>
                         		</td>
                            </tr>
                                
                        <?php }
						 }else
						   {
							   
							   echo ' <tr><td colspan="5">Your Messages Are not Available Now</td></tr>';
							   }?>        
               </tbody></table>                 

            </div>
            
            </div>
            

    
    </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
    <?php $this->load->view('footer'); ?>