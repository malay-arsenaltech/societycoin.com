<?php $this->load->view('header'); ?>

<!--mid-portion--><style>

.clr{ clear:both;}



.faq {

   

    border-radius: 4px;

    height: 458px;

}

.box-faq {

    border: 2px solid #fff;

    border-radius: 8px;

    float: left;

    height: 343px;

    margin-top: 15px !important;

    width: 230px;
	cursor:pointer;
	background:#fff;

}

.box-faq:hover{ box-shadow:0px 7px 5px #fff;}

.box-faq h5{ font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#090; padding:0px; margin:0px; text-align:center;}

.box-faq h5 a{ font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#090; padding:0px; margin:0px; text-align:center; text-decoration:none;}

.box-faq h5 a:hover {color:#09F}

.box-faq p{ font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; text-align:center; line-height:22px;}

.center-text{ width:225px; height:auto; margin:60px auto;}

#no-1{margin-left:10px;}

#no-2{margin:0px 13px;}

.faq_img_1 > img{ margin:30px 0 0 18px;}

.faq_img_2 > img{ margin:30px 0 0 18px;}

.faq_img_3 > img{ margin:30px 0 0 18px;}







</style>

<style type="text/css">

 

article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }

audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }

audio:not([controls]) { display: none; }

[hidden] { display: none; }





/*Define Accordion box*/

.accordion { width:1171px; overflow:hidden; margin:10px auto; color:#474747; background:#4C617C; padding:10px; }



/*General Accordion****************************************************************************/

/*Set style of open slide*/

.accordion section:target { background:#FFF; padding:10px;}

.accordion section:target:hover { background:#FFF; }

.accordion section:target h2 {width:100%;}

.accordion section:target h2 a{ color:#333; padding:0;}

.accordion section:target p {display:block;}

.accordion section h2 a{padding:3px 7px;display:block; font-size:26px; font-weight:normal;color:#eee; text-decoration:none; }



/*set style of closed slide*/

.accordion section{ float:left;	overflow:hidden; color:#333; cursor:pointer; background: #333; margin:3px; }

.accordion section:hover {background:#444;}

.accordion section p { display:none; }

.accordion section:after{position:relative;font-size:24px;color:#000;font-weight:bold;}

.accordion section:nth-child(1):after{content:'';}

.accordion section:nth-child(2):after{content:'';}

.accordion section:nth-child(3):after{content:'';}

.accordion section:nth-child(4):after{content:'';}

.accordion section:nth-child(5):after{content:'';}

/*End General Accordion****************************************************************************/



/*Horizontal Accordion *********************************************************************/

.horizontal section{ width:5%; height:250px; 

	-moz-transition:width 0.2s ease-out; 

	-webkit-transition:width 0.2s ease-out;

  	-o-transition:width 0.2s ease-out;

	-ms-transition:width 0.2s ease-out;

  	transition:width 0.2s ease-out;

}



/*Position the number of the slide*/

.horizontal section:after{top:140px;left:15px;}



/*Header of closed slide*/

.horizontal section h2 { 

	-webkit-transform:rotate(90deg);

	-moz-transform:rotate(90deg);

	-o-transform: rotate(90deg);

	-ms-transform: rotate(90deg);

	transform: rotate(90deg);

	width:240px; position:relative; left:-100px; top:85px;

} 



/*On mouse over open slide*/

.horizontal :target{ width:73%;height:230px; }

.horizontal :target h2{ top:0px;left:0;

	-webkit-transform:rotate(0deg);

	-moz-transform:rotate(0deg);

	-o-transform: rotate(0deg);

	-ms-transform: rotate(0deg);

	transform: rotate(0deg); 

}

/*End Horizontal Accordion *********************************************************************/



/*Vertical Accordion *************************************************************************/

.vertical section{ width:100%; height:40px;

	-webkit-transition:height 0.2s ease-out;

	-moz-transition:height 0.2s ease-out;

  	-o-transition:height 0.2s ease-out;

	-ms-transition:height 0.2s ease-out;

  	transition:height 0.2s ease-out;

}

/*Set height of the slide*/

.vertical :target{ height:250px; width:97%; }



.vertical section h2 { position:relative; left:0; top:-7px; }



/*Set position of the number on the slide*/

.vertical section:after{ top:-60px;left:810px;}

.vertical section:target:after{ left:-9999px;}







/*******************************************/

</style>





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

    <div class="faq">

<div class="box-faq" id="no-1">

<div class="center-text">

<h5><a href="<?php echo base_url();?>home/new_to_societycoin">New to Societycoin.com ?</a></h5>

<a class="faq_img_1" href="<?php echo base_url();?>home/new_to_societycoin"><img src="<?php echo frontThemeUrl; ?>images/search-img1.png"  /></a>
</div>





</div>

<div class="box-faq" id="no-2">

<div class="center-text">

<h5><a href="<?php echo base_url();?>home/problem_with_payment">Problem with Payments?</a></h5>

<a class="faq_img_2" href="<?php echo base_url();?>home/problem_with_payment"><img src="<?php echo frontThemeUrl; ?>images/search-img2.png"  /></a>

</div>

</div>

<div  class="box-faq" id="no-3">

<div  class="center-text">

<h5><a href="<?php echo base_url(); ?>home/contact">Contact Us</a></h5>


<a class="faq_img_3" href="<?php echo base_url();?>home/contact"><img src="<?php echo frontThemeUrl; ?>images/search-img3.png"  /></a>

</div>



</div>

<div class="clr"></div>



</div>

    

    </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>