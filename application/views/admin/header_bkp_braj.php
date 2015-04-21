 <?php 		   

	$url=str_replace("/index.php/admin/"," ",$_SERVER['REQUEST_URI']);

		

		$url=explode("?",$url);

		

		 $url=$url[0]; 

		

		

		@$url =split('/',$url) ;

		



		

	//	echo $_SERVER['REQUEST_URI'];

	

//	print_r($url); exit();

		



		

 ?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<title><?php echo "SocietyCoin Admin page"; ?></title>

<link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/screen.css" type="text/css" media="screen" title="default" />

<!--[if IE]>

<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />

<![endif]-->



<!--  jquery core -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>



<!--  checkbox styling script -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/ui.core.js" type="text/javascript"></script>

<script src="<?php echo AdminThemeUrl; ?>js/jquery/ui.checkbox.js" type="text/javascript"></script>

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.bind.js" type="text/javascript"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">

$(function(){

	$('input').checkBox();

	$('#toggle-all').click(function(){

 	$('#toggle-all').toggleClass('toggle-checked');

	$('#mainform input[type=checkbox]').checkBox('toggle');

	return false;

	});

});

</script>  



<![if !IE 7]>



<!--  styled select box script version 1 -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });

});

</script>

 



<![endif]>



<!--  styled select box script version 2 --> 

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });

	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });

});

</script>



<!--  styled select box script version 3 --> 

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });

});

</script>



<!--  styled file upload script --> 

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.filestyle.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">

  $(function() {

      $("input.file_1").filestyle({ 

          image: "images/forms/choose-file.gif",

          imageheight : 21,

          imagewidth : 78,

          width : 310

      });

  });

</script>



<!-- Custom jquery scripts -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/custom_jquery.js" type="text/javascript"></script>

 

<!-- Tooltips -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.tooltip.js" type="text/javascript"></script>

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.dimensions.js" type="text/javascript"></script>

<script type="text/javascript">

$(function() {

	$('a.info-tooltip ').tooltip({

		track: true,

		delay: 0,

		fixPNG: true, 

		showURL: false,

		showBody: " - ",

		top: -35,

		left: 5

	});

});

</script> 





<!--  date picker script -->

<link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/datePicker.css" type="text/css" />

<script src="<?php echo AdminThemeUrl; ?>js/jquery/date.js" type="text/javascript"></script>

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.datePicker.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">

        $(function()

			{

			

			// initialise the "Select date" link

			$('#sdate')

			.datePicker(

			// associate the link with a date picker

			{

			createButton:false,

			startDate:'01/01/2005',

			endDate:'31/12/2020'

			}

			)

			.bind(

			// when the link is clicked display the date picker

			'click',

			function()

			{

			updateSelects($(this).dpGetSelected()[0]);

			$(this).dpDisplay();

			return false;

			}

			)

			.bind(

			// when a date is selected update the SELECTs

			'dateSelected',

			function(e, selectedDate, $td, state)

			{

			updateSelects(selectedDate);

			}

			)

			.bind(

			'dpClosed',

			function(e, selected)

			{

			updateSelects(selected[0]);

			}

			);

			

			$('#edate')

			.datePicker(

			// associate the link with a date picker

			{

			createButton:false,

			startDate:'01/01/2005',

			endDate:'31/12/2020'

			}

			)

			.bind(

			// when the link is clicked display the date picker

			'click',

			function()

			{

			updateSelects($(this).dpGetSelected()[0]);

			$(this).dpDisplay();

			return false;

			}

			)

			.bind(

			// when a date is selected update the SELECTs

			'dateSelected',

			function(e, selectedDate, $td, state)

			{

			updateSelects(selectedDate);

			}

			)

			.bind(

			'dpClosed',

			function(e, selected)

			{

			updateSelects(selected[0]);

			}

			);

			

			

			

			

			var updateSelects = function (selectedDate)

			{

			var selectedDate = new Date(selectedDate);

			$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');

			$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');

			$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');

			}

			// listen for when the selects are changed and update the picker

			$('#d, #m, #y')

			.bind(

			'change',

			function()

			{

			var d = new Date(

			$('#y').val(),

			$('#m').val()-1,

			$('#d').val()

			);

			$('#date-pick').dpSetSelected(d.asString());

			}

			);

			

			// default the position of the selects to today

			var today = new Date();

			updateSelects(today.getTime());

			

			// and update the datePicker to reflect it...

			$('#d').trigger('change');

});

</script>



<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->

<script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){

$(document).pngFix( );

});

</script>

</head>

<body> 

<!-- Start: page-top-outer -->



<div id="page-top-outer">    



<!-- Start: page-top -->

<div id="page-top">



	<!-- start logo -->

	<div id="logo">

	<a href=""><img src="<?php echo AdminThemeUrl; ?>images/shared/society-coin-logo-white.png" width="159" height="134" alt="" /></a>

	</div>

	 	

 	<div class="clear"></div>



</div>





</div>	<div class="clear"></div>



	<div class="nav-outer-repeat"> 

<!--  start nav-outer -->

<div class="nav-outer"> 

        <h2 style="position: absolute; color: rgb(255, 255, 255) ! important; font-size: 16px; right: 89px; top: 125px;">Welcome&nbsp;&nbsp;<a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $this->session->userdata('userid'); ?>" style="color:#fff;" ><?php echo $this->session->userdata('fname'); ?></a></h2>

		<!-- start nav-right -->

		<div id="nav-right">



		

			<div class="nav-divider">&nbsp;</div>

			<div class="showhide-account"><img src="<?php echo AdminThemeUrl; ?>images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>

			<div class="nav-divider">&nbsp;</div>

			<a href="<?php echo base_url();?>admin/login/logout" id="logout"><img src="<?php echo AdminThemeUrl; ?>images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>

			<div class="clear">&nbsp;</div>

		

			<!--  start account-content -->	

			<div class="account-content">

			<div class="account-drop-inner">

				<a href="<?php echo base_url();?>admin/allusers/edituser?uid=<?php echo $this->session->userdata('userid'); ?>" id="acc-settings">Settings</a>

				<div class="clear">&nbsp;</div>

								

			</div>

			</div>

			<!--  end account-content -->

		

		</div>

		<!-- end nav-right -->





		<!--  start nav -->

        <?php if($this->session->userdata('utype')==1)

		      {?>

              <div class="nav">

		<div class="table">

		

		<ul class="select <?php $murl=trim($url[0]); if($murl==''){ echo "current";} ?>"><li class="sub_show" ><a href="<?php echo base_url();?>admin"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		

		<div class="nav-divider">&nbsp;</div>

		                    

		<ul class="select <?php $murl=trim($url[0]); if($murl=='master'){ echo "current";} ?>"><li><a href="#nogo"><b>Master Head</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"  ><a href="<?php echo base_url(); ?>admin/master" >City Master</a></li>

				<li class="<?php $murl=@trim($url[1]); if($murl=='addarea'){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/master/addarea">Area / Sector Master</a></li>				

        	<!--	<li class="<?php $murl=@trim($url[1]); if($murl=='allbill'){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/master/allbill">Society Charge Heads</a></li>				 -->

                

                

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

        

        

        <div class="nav-divider">&nbsp;</div>

		                    

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allsociety'){ echo "current";} ?>"><li><a href="#nogo"><b>Society</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/allsociety" >View all societies</a></li>

				<li class="<?php $murl=@trim($url[1]); if($murl=='addsociety'){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/allsociety/addsociety">Add New Society</a></li>				

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		

		<div class="nav-divider">&nbsp;</div>

       

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allusers' || $murl=='allpropertys'){ echo "current";} ?>"><li><a href="#nogo"><b>Sub Admin</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li><a class="<?php $murl=@trim($url[0]);  $murl_1=@trim($url[1]);  if($murl=='allusers' && $murl_1==''){ echo "sub_show" ;} ?>"   href="<?php echo base_url();  ?>admin/allusers" >View All Sub Admin</a></li>

				<li><a class="<?php $murl=@trim($url[1]); if($murl=='adduser'){ echo "sub_show";} ?>"  href="<?php echo base_url();?>admin/allusers/adduser">Add New Sub Admin</a></li>

                <li><a class="<?php $murl=@trim($url[1]); if($murl=='assignsociety'){ echo "sub_show";} ?>"  href="<?php echo base_url();?>admin/allusers/assignsociety	">Assign Society</a></li>

                 <li><a class="<?php $murl=@trim($url[1]); if($murl=='addproperty'){ echo "sub_show";} ?>"  href="<?php echo base_url();?>admin/allpropertys/addproperty" >Add New properties</a></li>

                 <li><a class="<?php  $murl=@trim($url[0]); $murl_1=@trim($url[1]); if($murl=='allpropertys'  && $murl_1=='' ){ echo "sub_show";} ?>"       href="<?php echo base_url();?>admin/allpropertys" >View all properties </a></li>

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

<!--		

        <div class="nav-divider">&nbsp;</div>

		

		<ul class="select"><li><a href="#nogo"><b>Property</b></a>

		<div class="select_sub">

			<ul class="sub">

                   <li><a href="<?php echo base_url();?>admin/allpropertys/addproperty" >Add New Property</a></li>

				<li><a href="<?php echo base_url();?>admin/allpropertys" >View All Propertys</a></li>

							

			</ul>

		</div>

		</li>

		</ul> -->

		

		<div class="nav-divider">&nbsp;</div>

		

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allcmspages'){ echo "current";} ?>"><li><a href="#nogo"><b>Static Pages</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li><a class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"  href="<?php echo base_url(); ?>admin/allcmspages">View All Static Pages</a></li>

				<li><a class="<?php $murl=@trim($url[1]); if($murl=='addcmspage'){ echo "sub_show";} ?>"  href="<?php echo base_url(); ?>admin/allcmspages/addcmspage">Add New Static Page</a></li>

		 

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		

		<div class="nav-divider">&nbsp;</div>

		

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allfaq'){ echo "current";} ?>"><li><a href="#nogo"><b>Faq</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li><a class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"  href="<?php echo base_url() ; ?>admin/allfaq">View All FAQ</a></li>

				<li><a class="<?php $murl=@trim($url[1]); if($murl=='addfaq'){ echo "sub_show";} ?>"  href="<?php echo base_url();?>admin/allfaq/addfaq" >Add New FAQ</a></li>

			

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		

		<div class="clear"></div>

		</div>

		<div class="clear"></div>

		</div>

             <?php }else if($this->session->userdata('utype')==2)

			    {?>                  

              <div class="nav">

		<div class="table">

		

	<ul class="select <?php $murl=trim($url[0]); if($murl==''){ echo "current";} ?>"><li class="sub_show" ><a href="<?php echo base_url();?>admin"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

			<div class="nav-divider">&nbsp;</div>

		                    

		<ul class="select <?php $murl=trim($url[0]); if($murl=='master'){ echo "current";} ?>"><li><a href="#nogo"><b>Master Head</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"  ><a href="<?php echo base_url(); ?>admin/master" >City Master</a></li>

				<li class="<?php $murl=@trim($url[1]); if($murl=='addarea'){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/master/addarea">Area / Sector Master</a></li>				

        		<!--<li class="<?php $murl=@trim($url[1]); if($murl=='allbill'){ echo "sub_show";} ?>"  ><a href="<?php echo base_url();?>admin/master/allbill">Society Charge Heads</a></li> -->				

                

                

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		<div class="nav-divider">&nbsp;</div>

		                    

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allsociety'){ echo "current";} ?>"><li><a href="#nogo"><b>Society</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

				<li><a class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>" href="<?php echo base_url(); ?>admin/allsociety" >View all societies</a></li>

                      <li><a class="<?php $murl=@trim($url[1]); if($murl=='addcharge'){ echo "sub_show";} ?>" href="<?php echo base_url();?>admin/allsociety/addcharge" >Add Bill</a></li>

				<li><a class="<?php $murl=@trim($url[1]); if($murl=='allcharge'){ echo "sub_show";} ?>" href="<?php echo base_url();?>admin/allsociety/allcharge" >View/mass upload bills</a></li>

                

<li><a class="<?php $murl=@trim($url[0]);  $murl_1=@trim($url[1]);  if($murl=='allusers' && $murl_1==''){ echo "sub_show" ;} ?>"   href="<?php echo base_url();  ?>admin/allusers" >View All Users</a></li>                

				</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

		

				

        <div class="nav-divider">&nbsp;</div>

		

		<ul class="select <?php $murl=trim($url[0]); if($murl=='allpropertys'){ echo "current";} ?>"><li><a href="#nogo"><b>Property</b><!--[if IE 7]><!--></a><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub show">

			<ul class="sub">

                   <li><a class="<?php $murl=@trim($url[1]); if($murl=='addproperty'){ echo "sub_show";} ?>" href="<?php echo base_url(); ?>admin/allpropertys/addproperty" >Add New Property</a></li>

				<li><a class="<?php $murl=@trim($url[1]); if($murl==''){ echo "sub_show";} ?>"   href="<?php echo base_url();?>admin/allpropertys" >View All properties</a></li>

               

							

			</ul>

		</div>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->

		</li>

		</ul>

        

               <div class="nav-divider">&nbsp;</div>

		

						

				<div class="clear"></div>

                

                

		</div>

		<div class="clear"></div>

		</div>

                <?php } ?>

                



</div>



<div class="clear"></div>

<!--  start nav-outer -->

</div>

