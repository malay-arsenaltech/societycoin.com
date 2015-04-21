<?php  $url=$_SERVER['REQUEST_URI']; 
        $url=str_replace('/socity/index.php/',"",$url);
 $url=@split('/',$url); 
 $url=@explode('?',$url[0]); 
//echo '<pre>'; print_r($url); exit();

?><!DOCTYPE html>
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

<script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/jQuery-v1.8.2.js"></script> 

</head>
<body  onLoad="submitPayuForm();"    >
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