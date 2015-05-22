<?php
$url = str_replace("/index.php/admin/", " ", $_SERVER['REQUEST_URI']);

$url = explode("?", $url);

$url = $url[0];

@$url = split('/', $url);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <title><?php echo "SocietyCoin Admin page"; ?></title>

        <link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/screen.css" type="text/css" media="screen" title="default"/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/images/favicon.ico" type="image/x-icon">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!--[if IE]>
            
                <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css"/>
            
                <![endif]-->

                <!--  jquery core -->

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

                <!--  checkbox styling script -->

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/ui.core.js" type="text/javascript"></script>

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/ui.checkbox.js" type="text/javascript"></script>

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.bind.js" type="text/javascript"></script>

                <script type="text/javascript" src="https://www.google.com/jsapi"></script>

                <script type="text/javascript">

                    $(function() {

                        $('input:not(".no-checkbox")').checkBox();

                        $('#toggle-all').click(function() {

                            $('#toggle-all').toggleClass('toggle-checked');

                            $('#mainform input[type=checkbox]').checkBox('toggle');

                            return false;

                        });

                    });

                </script>

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>

                <script type="text/javascript">

                    $(document).ready(function() {

                        //$('.styledselect').selectbox({ inputClass: "selectbox_styled" });

                    });

                </script>
                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>

                <script type="text/javascript">

                    $(document).ready(function() {

                        $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});

                        $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});

                    });

                </script>

                <!--  styled select box script version 3 -->

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>

                <script type="text/javascript">

                    $(document).ready(function() {

                        $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});

                    });

                </script>

                <!--  styled file upload script -->

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.filestyle.js" type="text/javascript"></script>

                <script type="text/javascript" charset="utf-8">

                    $(function() {

                        $("input.file_1").filestyle({
                            image: "images/forms/choose-file.gif",
                            imageheight: 21,
                            imagewidth: 78,
                            width: 310

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

                <link rel="stylesheet" href="<?php echo AdminThemeUrl; ?>css/datePicker.css" type="text/css"/>

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/date.js" type="text/javascript"></script>

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.datePicker.js" type="text/javascript"></script>

                <script type="text/javascript" charset="utf-8">

                    $(function() {



                        // initialise the "Select date" link

                        $('#sdate')

                                .datePicker(
                                // associate the link with a date picker

                                        {
                                            createButton: false,
                                            startDate: '01/01/2005',
                                            endDate: '31/12/2020'

                                        }
                                )

                                        .bind(
                                        // when the link is clicked display the date picker

                                        'click',
                                        function() {

                                            updateSelects($(this).dpGetSelected()[0]);

                                            $(this).dpDisplay();

                                            return false;

                                        }
                                )

                                        .bind(
                                        // when a date is selected update the SELECTs

                                        'dateSelected',
                                        function(e, selectedDate, $td, state) {

                                            updateSelects(selectedDate);

                                        }
                                )

                                        .bind(
                                        'dpClosed',
                                        function(e, selected) {

                                            updateSelects(selected[0]);

                                        }
                                );


                                $('#edate')

                                        .datePicker(
                                        // associate the link with a date picker

                                                {
                                                    createButton: false,
                                                    startDate: '01/01/2005',
                                                    endDate: '31/12/2020'

                                                }
                                        )

                                                .bind(
                                                // when the link is clicked display the date picker

                                                'click',
                                                function() {

                                                    updateSelects($(this).dpGetSelected()[0]);

                                                    $(this).dpDisplay();

                                                    return false;

                                                }
                                        )

                                                .bind(
                                                // when a date is selected update the SELECTs

                                                'dateSelected',
                                                function(e, selectedDate, $td, state) {

                                                    updateSelects(selectedDate);

                                                }
                                        )

                                                .bind(
                                                'dpClosed',
                                                function(e, selected) {

                                                    updateSelects(selected[0]);

                                                }
                                        );


                                        var updateSelects = function(selectedDate) {

                                            var selectedDate = new Date(selectedDate);

                                            $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');

                                            $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');

                                            $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');

                                        }

                                        // listen for when the selects are changed and update the picker

                                        $('#d, #m, #y')

                                                .bind(
                                                'change',
                                                function() {

                                                    var d = new Date(
                                                            $('#y').val(),
                                                            $('#m').val() - 1,
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

                <style>

                    .breadcrumb ul li {
                        display: inline;
                        margin: 0 5px;
                        list-style: none;
                    }

                    .breadcrumb li + li:before {
                        content: "» ";
                    }

                    .breadcrumb {
                        float: right;
                    }
                </style>

                <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->

                <script src="<?php echo AdminThemeUrl; ?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>

                <script type="text/javascript">

                            $(document).ready(function() {

                                $(document).pngFix();


                            });

                </script>
                <script type="text/javascript" src="<?php echo frontThemeUrl; ?>assets/js/jquery.validate.js"></script>
                </head>

                <body>
                    <!-- Start: page-top-outer -->

                    <div id="page-top-outer">

                        <!-- Start: page-top -->

                        <div id="page-top">

                            <!-- start logo -->

                            <div id="logo">

            <!--<a href=""><img src="<?php echo AdminThemeUrl; ?>images/shared/society-coin-logo-white.png" width="159" height="134" alt="" /></a>-->

                            </div>


                            <div class="clear"></div>


                        </div>

                    </div>
                    <div class="clear"></div>

                    <div class="nav-outer-repeat">

                        <!--  start nav-outer -->

                        <div class="nav-outer">
                            <h2 style="position: absolute; font-size: 16px; right: 89px; top: 125px;">Welcome <a style="color:#393939;text-transform: capitalize;" href="<?php echo base_url(); ?>admin/allusers/edituser?uid=<?php echo $this->session->userdata('admin_id'); ?>"><?php echo $this->session->userdata('admin_fname'); ?>!</a></h2>

                            <div class="clear"></div>
                            <div class="breadcrumb" style="position: absolute;  font-size: 13px; right:457px; top: 135px;">
                                <?php //echo set_breadcrumb( '', '', array(     'replacer' =>array (        'aluas'   => '','materia'    => '' ) ) );  ?>

                            </div>
                            <!-- start nav-right -->

                            <div id="nav-right">

                                <div class="nav-divider">&nbsp;</div>

                                <div class="showhide-account"><img src="<?php echo AdminThemeUrl; ?>images/shared/nav/nav_myaccount.gif" width="93" height="14" alt=""/></div>

                                <div class="nav-divider">&nbsp;</div>

                                <a href="<?php echo base_url(); ?>admin/login/logout" id="logout"><img src="<?php echo AdminThemeUrl; ?>images/shared/nav/nav_logout.gif" width="64" height="14" alt=""/></a>

                                <div class="clear">&nbsp;</div>

                                <!--  start account-content -->

                                <div class="account-content">

                                    <div class="account-drop-inner">

                                        <a href="<?php echo base_url(); ?>admin/myaccount/update/" id="acc-settings">Settings</a>

                                        <div class="clear">&nbsp;</div>


                                    </div>

                                </div>


                            </div>


                            <?php if ($this->session->userdata('utype') == 1) {
                                ?>

                                <div class="nav">

                                    <div class="table">


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>">
                                            <li class="sub_show"><a href="<?php echo base_url(); ?>admin"><b>Dashboard</b></a>

                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "master")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>  dropdown">
                                            <li><a href="#nogo"><b>Master Head</b></a>


                                                <div class="select_sub show">

                                                    <ul class="sub">


                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == '') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/master">Add City </a></li>
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == '') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/master/citylist">All Cities </a></li>


                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == 'addarea') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/master/addarea">Add Area / Sector Master</a></li>
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == '') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/master/arealist">All Area </a></li>
                                                        <!--	<li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == 'allbill') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"  ><a href="<?php echo base_url(); ?>admin/master/allbill">Society Charge Heads</a></li>				 -->


                                                    </ul>

                                                </div>


                                            </li>

                                        </ul>


                        <!--<ul class="<?php //if($this->uri->segment(2) == "society_user") echo "current" ; else echo "select" ;     ?> dropdown"><li><a href="#nogo"><b>Society Admin</b></a>

                                    <div class="select_sub show">

                                            <ul class="sub">
                    <li class="<?php //$murl=@trim($url[1]); if($murl=='addsociety'){ echo "sub_show";}      ?>"  ><a href="<?php // echo base_url();     ?>admin/society_user/add">Add Society Admin</a></li>	
                                                    <li class="<?php //$murl=@trim($url[1]); if($murl==''){ echo "sub_show";}      ?>"  ><a href="<?php //echo base_url();     ?>admin/society_user" >View all societies Admin</a></li>

                                                                            

                                            </ul>

                                    </div>

                                    

                                    </li>

                                    </ul>-->


                                        <div class="nav-divider">&nbsp;</div>


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "allsociety")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="#nogo"><b>Society</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == 'addsociety') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/allsociety/addsociety">Add New Society</a></li>
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == '') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/allsociety">View all societies</a></li>


                                                    </ul>

                                                </div>


                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "allusers" || $this->uri->segment(2) == 'allpropertys')
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="#nogo"><b>Sub Admin</b></a>


                                                <div class="select_sub show">

                                                    <ul class="sub">


                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == 'adduser') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allusers/adduser">Add New Sub Admin</a></li>
                                                        <li><a class="<?php
                                                            $murl = @trim($url[0]);
                                                            $murl_1 = @trim($url[1]);
                                                            if ($murl == 'allusers' && $murl_1 == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allusers">View All Sub Admins</a></li>
                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == 'assignsociety') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allusers/assignsociety	">Assign Society</a></li>

                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == 'addproperty') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allpropertys/addproperty">Add New properties</a></li>

                                                        <li><a class="<?php
                                                            $murl = @trim($url[0]);
                                                            $murl_1 = @trim($url[1]);
                                                            if ($murl == 'allpropertys' && $murl_1 == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allpropertys">View all properties </a></li>

                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>

                                        <!--
                                                            
                                                                    <div class="nav-divider">&nbsp;</div>
                                                            
                                                                            
                                                            
                                                                            <ul class="select"><li><a href="#nogo"><b>Property</b></a>
                                                            
                                                                            <div class="select_sub">
                                                            
                                                                                    <ul class="sub">
                                                            
                                                                               <li><a href="<?php echo base_url(); ?>admin/allpropertys/addproperty" >Add New Property</a></li>
                                                            
                                                                                            <li><a href="<?php echo base_url(); ?>admin/allpropertys" >View All Propertys</a></li>
                                                            
                                                                                                                    
                                                            
                                                                                    </ul>
                                                            
                                                                            </div>
                                                            
                                                                            </li>
                                                            
                                                                            </ul> -->


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "customers")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="#nogo"><b>Customer</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == 'addsociety') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/customers/add">Add Customer</a></li>
                                                        <li class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == '') {
                                                            echo "sub_show";
                                                        }
                                                        ?>"><a href="<?php echo base_url(); ?>admin/customers">View all Customers</a></li>


                                                    </ul>

                                                </div>


                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>


                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "allcmspages")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="#nogo"><b>Static Pages</b></a>


                                                <div class="select_sub show">

                                                    <ul class="sub">

                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == 'addcmspage') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allcmspages/addcmspage">Add New Static Page</a></li>
                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allcmspages">View All Static Pages</a></li>


                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>

                                        <div class="nav-divider">&nbsp;</div>

                                        <ul class="<?php
                                        if ($this->uri->segment(2) == "allfaq")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>  dropdown">
                                            <li><a href="#nogo"><b>FAQS</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">
                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allfaq/addfaq">Add New FAQ</a></li>
                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allfaq">View All FAQS</a></li>


                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            <?php } else if ($this->session->userdata('utype') == 2) {
                                ?>

                                <div class="nav">

                                    <div class="table">

                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>">
                                            <li class="sub_show"><a href="<?php echo base_url(); ?>admin/login/dashboard"><b>Dashboard</b></a>


                                            </li>

                                        </ul>

                                        <div class="nav-divider">&nbsp;</div>

                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "allsociety")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>  dropdown">
                                            <li><a href="#nogo"><b>Society</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">

                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allsociety">View all societies</a></li>


                                                        <!--<li><a class="<?php
                                                        $murl = @trim($url[1]);
                                                        if ($murl == 'allcharge') {
                                                            echo "sub_show";
                                                        }
                                                        ?>" href="<?php echo base_url(); ?>admin/allsociety/allcharge" >View/mass upload bills</a></li>-->

                                                        <li><a class="<?php
                                                            $murl = @trim($url[0]);
                                                            $murl_1 = @trim($url[1]);
                                                            if ($murl == 'allusers' && $murl_1 == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allusers">View all Customers</a></li>

                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>


                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "allpropertys")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="#nogo"><b>Property</b></a>


                                                <div class="select_sub show">

                                                    <ul class="sub">

                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == 'addproperty') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allpropertys/addproperty">Add New Property</a></li>

                                                        <li><a class="<?php
                                                            $murl = @trim($url[1]);
                                                            if ($murl == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allpropertys">View All properties</a></li>


                                                    </ul>

                                                </div>


                                            </li>

                                        </ul>

                                        <div class="nav-divider">&nbsp;</div>

                                        <div class="clear"></div>

                                    </div>

                                    <div class="clear"></div>

                                </div>

                                <?php
                            } else if ($this->session->userdata('utype') == 4) {
                                ?>

                                <div class="nav">

                                    <div class="table">


                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?>">
                                            <li class="sub_show"><a href="<?php echo base_url(); ?>admin/login/dashboard"><b>Dashboard</b></a>


                                            </li>

                                        </ul>

                                        <div class="nav-divider">&nbsp;</div>


                                        <!--                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "society_property")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown"><li><a href="#nogo"><b>Property</b></a>
                                                            
                                                            
                                                                                                            <div class="select_sub show">
                                                            
                                                                                                                <ul class="sub">
                                                            
                                                                                                                    <li><a class="<?php
                                        $murl = @trim($url[1]);
                                        if ($murl == '') {
                                            echo "sub_show";
                                        }
                                        ?>"   href="<?php echo base_url(); ?>admin/society_property/add" >Add New property</a></li>
                                                            
                                                                                                                    <li><a class="<?php
                                        $murl = @trim($url[1]);
                                        if ($murl == '') {
                                            echo "sub_show";
                                        }
                                        ?>"   href="<?php echo base_url(); ?>admin/society_property" >View All properties</a></li>
                                                            
                                                            
                                                                                                                </ul>
                                                            
                                                                                                            </div>
                                                            
                                                            
                                                                                                        </li>
                                                            
                                                                                                    </ul>-->


                                        <ul class="select  dropdown">
                                            <li><a href="<?php echo base_url(); ?>admin/allresidence"><b>Residence Directory</b></a></li>
                                        </ul>
                                        <div class="nav-divider">&nbsp;</div>
                                        <ul class="select  dropdown">
                                            <li><a href="javascript:void(0);"><b>Charge Heads</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allchargehead/addchargehead">Add Charge Head</a>
                                                        </li>
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allchargehead">View Society's Charge Head</a>
                                                        </li>
                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>

                                        <ul class="select <?php
                                        if ($this->uri->segment(2) == "allsociety")
                                            echo "current";
                                        else
                                            echo "select";
                                        ?> dropdown">
                                            <li><a href="javascript:void(0);"><b>Customers</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">

                                                        <li><a class="<?php
                                                            $murl = @trim($url[0]);
                                                            $murl_1 = @trim($url[1]);
                                                            if ($murl == 'allusers' && $murl_1 == '') {
                                                                echo "sub_show";
                                                            }
                                                            ?>" href="<?php echo base_url(); ?>admin/allusers">View Your Customers</a></li>

                                                    </ul>

                                                </div>


                                            </li>

                                        </ul>


                                        <div class="nav-divider">&nbsp;</div>

                                        <ul class="select  dropdown">
                                            <li><a href="javascript:void(0);"><b>Upload Property Addresses</b></a>

                                                <div class="select_sub show">

                                                    <ul class="sub">
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allflatowner/downloadcsv">Download Occupant CSV</a>
                                                        </li>
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allflatowner/addflatowner">Upload Occupant CSV</a>
                                                        </li>

                                                    </ul>

                                                </div>

                                            </li>

                                        </ul>
                                        <div class="nav-divider">&nbsp;</div>
                                        <ul class="select  dropdown">
                                            <li><a href="javascript:void(0);"><b>Billing</b></a>

                                                <div class="select_sub show">
                                                    <ul class="sub">
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allresidence/generatebill">Download Bill CSV</a>
                                                        </li>
                                                        <li>
                                                            <a class="" href="<?php echo base_url(); ?>admin/allresidence/uploadbill">Upload Bill CSV</a>
                                                        </li>
                                                    </ul>

                                                </div>
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

                    <div class="clear"></div>
                    <!--bread-crum-outer-strat-->

