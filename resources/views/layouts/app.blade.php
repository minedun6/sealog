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
    <title>SEALOG - Connexion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/login-2.min.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="<?php echo URL::asset('assets/pages/img/sealog 1.png')?>" style="height: 100px;" alt=""/> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ url('/login') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-title">
            <span class="form-title">Bienvenue.</span>
            <span class="form-subtitle">Connectez-vous.</span>
        </div>
        <div class="alert alert-danger display-show">
            <button class="close" data-close="alert"></button>
            <span> Veuillez saisir votre psoeudo et mot de passe. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Psoeudo</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="Psoeudo" name="email"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Mot de passe" name="password"/></div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">Connecter</button>
        </div>

        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1"/>Se souvenir de moi</label>
            </div>
            <div class="pull-right forget-password-block">
                <a href="javascript:;" id="forget-password" class="forget-password">Mot de passe oublié?</a>
            </div>
        </div>
        <div class="login-options">
            <h4 class="pull-left">Se connecte avec</h4>
            <ul class="social-icons pull-right">


                <li>
                    <a class="social-icon-color googleplus" data-original-title="Goole Plus"
                       href="{{ url("auth/google") }}"></a>
                </li>

            </ul>
        </div>

    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <div class="form-title">
            <span class="form-title">Mot de passe oublié ?</span>
            <span class="form-subtitle">Veuillez saisir votre email.</span>
        </div>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                   name="email"/></div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Retour</button>
            <button type="submit" class="btn btn-primary uppercase pull-right">Envoyer</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright hide"> 2016 © Sealog by Peaksource.</div>
<!-- END LOGIN -->
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
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/select2/js/select2.full.min.js') }}"
        type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo URL::asset('assets/global/scripts/app.min.js')?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo URL::asset('assets/pages/scripts/login.min.js')?>" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>