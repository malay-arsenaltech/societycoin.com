<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to Society-coin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--normal css-->
<link href="<?php echo frontThemeUrl; ?>stylesheet/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo frontThemeUrl; ?>stylesheet/society_mquery.css" rel="stylesheet" type="text/css"/>
<!-- bootstrap-->
<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo frontThemeUrl; ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo frontThemeUrl; ?>stylesheet/accordion_css.css" rel="stylesheet" type="text/css"/>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
       <script src="<?php echo frontThemeUrl; ?>assets/js/html5shiv.js"></script>
    <![endif]-->
<!-- IE hacking script -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -
<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/respond.min.js"></script>
<script type="text/javascript"  src="<?php echo frontThemeUrl; ?>assets/js/css3-mediaqueries.js"></script>

<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/prototype.js"></script>
<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/effects.js"></script>
<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/accordion.js"></script>
<script type="text/javascript">
			
		//
		//  In my case I want to load them onload, this is how you do it!
		// 
	Event.observe(window, 'load', loadAccordions, false);
	
		//
		//	Set up all accordions
		//
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
			
			// Open first one
			bottomAccordion.activate($$('#vertical_container .accordion_toggle')[0]);
			
			// Open second one
			topAccordion.activate($$('#horizontal_container .horizontal_accordion_toggle')[2]);
		}
		
	</script>

<!-- IE hacking script // -->
</head>
<body>
<!--upper-portion-->
<div class="row-fluid head-outer">
  <div class=" container head-inner">
    <div class="logo"><a href="<?php echo base_url();?>home"> <img src="<?php echo frontThemeUrl; ?>images/society-coin-logo-white.png" alt=""/></a> </div>
   <div class="side-button">
   <?php  echo $this->load->view('registrationform');?>
   <?php  echo $this->load->view('loginform');?>

                    </div>
    <div class="clearfix"></div>
  </div>
</div>