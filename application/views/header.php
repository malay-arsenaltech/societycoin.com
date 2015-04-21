<?php 
       $url=$_SERVER['REQUEST_URI']; 
       $url=str_replace('/index.php/',"",$url);
	   $url=@split('/',$url); 
	   $url=@explode('?',$url[0]); 

?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>Welcome To Societycoin</title>

<link rel="icon" href="http://societycoin.com/demo/front/images/society-coin-logo-white.png" type="image/jpeg" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="text/html;charset=utf-8" http-equiv="content-type">

<meta name="description" content="">

<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo base_url();  ?>/images/favicon.ico" type="image/x-icon">
<!--normal css-->

<link href="<?php echo frontThemeUrl; ?>stylesheet/style.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo frontThemeUrl; ?>stylesheet/society_mquery.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo frontThemeUrl; ?>stylesheet/inner_page_m_query.css" rel="stylesheet" type="text/css"/>
<!-- bootstrap-->

<!--<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->

<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo frontThemeUrl; ?>stylesheet/accordion_css.css" rel="stylesheet" type="text/css"/>

<!--[if lt IE 9]>
 <script src="<?php echo frontThemeUrl; ?>assets/js/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/jQuery-v1.8.2.js"></script> 
<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/respond.min.js"></script>

<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/css3-mediaqueries.js"></script>

<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/jquery.validate.js"></script> 



<?php if(@$url[0]=='home' || @$url[0]==NULL )   { 

   }else   { ?>
<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/effects.js"></script>
<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/accordion.js"></script>
<script type="text/javascript">	

	Event.observe(window, 'load', loadAccordions, false);	

		function loadAccordions() {

			var topAccordion = new accordion('horizontal_container', {

				classNames : {

					toggle : 'horizontal_accordion_toggle',

					toggleActive : 'horizontal_accordion_toggle_active',

					content : 'horizontal_accordion_content'

				},

				defaultSize : {

					width : 525

				},

				direction : 'horizontal'

			});

			

			var bottomAccordion = new accordion('vertical_container');

			

			var nestedVerticalAccordion = new accordion('vertical_nested_container', {

			  classNames : {

					toggle : 'vertical_accordion_toggle',

					toggleActive : 'vertical_accordion_toggle_active',

					content : 'vertical_accordion_content'

				}

			});

			

		

			bottomAccordion.activate($$('#vertical_container .accordion_toggle')[0]);

			

		

			topAccordion.activate($$('#horizontal_container .horizontal_accordion_toggle')[2]);

		}

		function submitPayuForm() {}

	</script>
<?php }?>
</head>

<body>

<div class="row-fluid head-outer">

  <div class=" container head-inner">

    <div class="logo"><a href="<?php echo base_url();?>"> <img src="<?php echo frontThemeUrl; ?>images/society-coin-logo-white.png" alt=""/></a> </div>

   <?php if($this->session->userdata('userid')==NULL)

		  {

		echo '<div class="side-button">';	  

		echo $this->load->view('registrationform');	  

         echo $this->load->view('loginform');

		 

		 echo '</div>';

		  }else

		     {
echo '<div class="side-button-nav">';	 


 $full_name = trim($this->session->userdata('full_name'));	
if($full_name=='') {
$full_name1 = explode('@',$this->session->userdata('email'));  
$full_name =  $full_name1[0];
}

 ?>

				 <div class="pronav">

        <ul class="ulpronav">

                <li><a href="<?php echo base_url()?>user" >Welcome <span><?php echo $full_name; ?>!</span></a>

                <ul>

                <li><a href="<?php echo base_url()?>user/myaccount" >My Settings</a></li>

                <li><a href="<?php echo base_url()?>property/transactionlog">My Transactions</a></li>

                <li><a href="<?php echo base_url()?>property">My Properties</a></li>

                <li><a href="<?php echo base_url()?>user/IIIrd_party_payment">Send a payment Request</a></li>
               

                <li><a href="<?php echo base_url()?>home/logout">Sign Out</a></li>

                </ul></li>                          

		</ul>

</div>				 

<?php  		 echo '</div>';

				 }

$message = $this->session->flashdata('msg_error');
if(!empty($message )){ ?>

<div id="container_msg" style="color:red"><p><?php  echo $message ;?></p></div>
<?php
}

$message_s = $this->session->flashdata('msg');
if(!empty($message_s )){ ?>

<div id="container_msg" style="color:green"><p><?php  echo $message_s ;?></p></div>
<?php
}
?>
</div>
    <div class="clearfix"></div>

  </div>

</div>