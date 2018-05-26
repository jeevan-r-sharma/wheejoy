 
<head>
    <meta charset="UTF-8">
    <title>Sunil's Academy | Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <!-- <link href="<?php echo base_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" /> -->
    <!-- jvectormap -->
    <link href="<?php echo base_url(); ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap slider -->
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/fav.ico.png">
    <link rel="apple-touch-icon" href="img/favicon.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon.jpg"> 
</head>
<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="<?php echo base_url(); ?>dashboard" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="<?php echo base_url(); ?>img/logo-light.png"/>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="<?php echo base_url(); ?>signin/signOut">
                        <!-- <a onclick="document.getElementById('popUpSignOut').click()"> -->
                            <i class="glyphicon glyphicon-user"></i>
                            <span> <i></i></span>Sign Out
                        </a>
                        <!-- <a href="<?php echo base_url(); ?>signin/signOut" class="btn btn-default btn-flat">Sign out</a> -->
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <!-- <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?>img/avatar3.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p> </p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div> -->


                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>dashboard/userProfile">
                            <i class="fa fa-edit"></i> <span>Profile</span>
                        </a>
                    </li>

<!--                     <li class="treeview">
                        <a  href="">
                            <i class="fa fa-edit"></i> <span>Profile</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/addVideo" data-toggle="tooltip" data-placement="right" title="Click to activate user."><i class="fa fa-angle-double-right"></i>Add Video</a></li> 
                            <li><a href="<?php echo base_url(); ?>admin/addQuestion" data-toggle="tooltip" data-placement="right" title="Click to activate user."><i class="fa fa-angle-double-right"></i>Add Question Set</a></li> 
                            <li><a href="<?php echo base_url(); ?>admin/addSynopsis" data-toggle="tooltip" data-placement="right" title="Click to activate user."><i class="fa fa-angle-double-right"></i>Add Notes</a></li> 
                        </ul>
                    </li> -->

                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- jQuery 2.0.2 --><!-- 
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
                <script src="<?php echo base_url(); ?>ajax/ajax.jquery.v2.0.js"></script>
                <!-- jQuery UI 1.10.3 -->
                <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
                <!-- Bootstrap -->
                <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
                <!-- Morris.js charts -->
                <!-- <script src="<?php echo base_url(); ?>js/raphael-min.js"></script> -->
                <!-- <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js" type="text/javascript"></script> -->
                
                <!-- <script src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js" type="text/javascript"></script> -->
                <!-- Sparkline -->
                <script src="<?php echo base_url(); ?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
                <!-- jvectormap -->
                <script src="<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
                <!-- jQuery Knob Chart -->
                <script src="<?php echo base_url(); ?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
                <!-- daterangepicker -->
                <script src="<?php echo base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
                <!-- datepicker -->
                <script src="<?php echo base_url(); ?>js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
                <!-- Bootstrap WYSIHTML5 -->
                <script src="<?php echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
                <!-- iCheck -->
                <script src="<?php echo base_url(); ?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

                <!-- AdminLTE App -->
                <script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <!-- <script src="<?php echo base_url(); ?>js/AdminLTE/dashboard.js" type="text/javascript"></script> -->

                <!-- AdminLTE for demo purposes -->
                <script src="<?php echo base_url(); ?>js/AdminLTE/demo.js" type="text/javascript"></script>

                <!-- Ion Slider -->
                <script src="<?php echo base_url(); ?>js/plugins/ionslider/ion.rangeSlider.min.js" type="text/javascript"></script>

                <!-- Bootstrap slider -->
                <script src="<?php echo base_url(); ?>js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>    
                <!--<script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>-->  

        <!-- popup code -->
        <div id="dataTargetSignOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content" ><!-- style="margin-top:14%;" -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                        <h4 class="modal-title" id="myModalLabel">Notes</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pdf-view"><object type="application/pdf"  id="for_view" name="for_view"></object></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary pull-right" data-dismiss="modal">Ok</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="hide" id="popUpSignOut" data-toggle='modal' data-target='#dataTargetSignOut'>View</button>
        <!-- popup code End-->

            </body>




