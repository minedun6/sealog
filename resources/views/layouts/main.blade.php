<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>SEALOG @yield('second-title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/uniform/css/uniform.default.css')?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo URL::asset('assets/global/plugins/datatables/datatables.min.css')?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')?>"
          rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>"
          rel="stylesheet"
          type="text/css"/>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo URL::asset('assets/global/css/components-rounded.min.css')?>" rel="stylesheet"
          id="style_components"
          type="text/css"/>
    <link href="<?php echo URL::asset('assets/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo URL::asset('assets/layouts/layout/css/layout.min.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URL::asset('assets/layouts/layout/css/themes/blue.min.css')?>" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="<?php echo URL::asset('assets/layouts/layout/css/custom.min.css')?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="<?php echo URL::asset('assets/global/css/responsive_correct.css')?>">

    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}"/>
    <link href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    @yield('header')

</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->

<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="<?php echo URL::asset('assets/layouts/layout/img/sealog_logo_final.png')?>" alt="Sealog"
                     class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <li class="dropdown dropdown-user">
                    <a href="{{ url('/logout') }}">
                        <span class="username username-hide-on-mobile" id="link_navbar" style="color: #C9DFF5"> Déconnexion </span>
                        <i class="fa fa-sign-out" style="color: #C9DFF5"></i>
                    </a>

                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">

            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler"></div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                <li class="nav-item start ">
                    <a href="/" class="nav-link nav-toggle">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Tableau de bord</span>

                    </a></li>
                <li class="nav-item start ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Clients</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start ">
                            <a href="{{ url('/clients/add') }}" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Ajouter un client</span>
                                <!--<span class="badge badge-success">1</span>-->
                            </a>
                        </li>
                        <li class="nav-item start ">

                            <a href="{{ url('/clients') }}" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Liste clients</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item start ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-folder"></i>
                        <span class="title">Dossiers</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start ">
                            <a href="{{ url('/folder/add') }}" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Ajouter un Dossier</span>
                            </a>
                        </li>

                        <li class="nav-item start ">
                            <a href="{{ url('/folder') }}" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Liste Dossiers</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item start ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-calculator"></i>
                        <span class="title">Factures</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">


                        <li class="nav-item start ">
                            <a href="{{ url('/invoices/') }}" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Liste factures</span>
                                <!--<span class="badge badge-success">1</span>-->
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item start ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Fournisseurs</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start ">
                            <a href="/supplier/add" class="nav-link ">
                                <i class="icon-plus"></i>
                                <span class="title">Ajouter un fournisseur</span>
                                <!--<span class="badge badge-success">1</span>-->
                            </a>
                        </li>
                        <li class="nav-item start ">

                            <a href="/supplier" class="nav-link ">
                                <i class="icon-list"></i>
                                <span class="title">Liste fournisseurs</span>
                            </a>
                        </li>


                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm"></div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="/">Accueil</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    @yield('url-way')
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <h3 class="page-title" >
                @yield('title')
            </h3>

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->


            @yield('content')


        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

    <!-- END QUICK SIDEBAR -->
</div>

<!-- END CONTAINER -->
    </div>

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; Sealog by Peaksource.

    </div>
    <div class="scroll-to-top" style="padding-bottom: 20px">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?php echo URL::asset('assets/global/plugins/respond.min.js')?>"></script>
<script src="<?php echo URL::asset('assets/global/plugins/excanvas.min.js' )?>"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo URL::asset('assets/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')?>"
        type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>"
        type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>"
        type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js')?>"
        type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/select2/js/select2.full.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"
        type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--<script src="<?php echo URL::asset('assets/global/scripts/datatable.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/datatables/datatables.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')?>" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo URL::asset('assets/global/scripts/app.min.js')?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo URL::asset('assets/global/plugins/moment.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/global/plugins/fileinput/fileinput.js') ?>"
        type="text/javascript"></script>



<script src="<?php echo URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/scripts/jquery.datatables.js')?> "type="text/javascript"></script>
<script type="text/javascript" src="<?php echo URL::asset('assets/scripts/responsive_correct.js')?> "></script>
<script src="<?php echo URL::asset('assets/scripts/script.init.js')?> "type="text/javascript"></script>

@yield('footer')

        <!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo URL::asset('assets/layouts/layout/scripts/layout.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/layouts/layout/scripts/demo.min.js')?>" type="text/javascript"></script>
<script src="<?php echo URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js')?>"
        type="text/javascript"></script>

<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>