<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php bloginfo('name'); ?></title>

    <!-- Styles -->
    <!-- <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/component.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<!-- header -->
<header class="header" id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- logo -->
                <a href="/" class="logo pull-left">
                    <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" class="logo__img">
                </a>

                <div class="search-wrapper pull-right">
                    <a class="visible-xs mobile-menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <!-- menu -->
                    <!--
                    <nav class="main-menu">
                        <ul>
                            <li class="active"><a href="#">How to</a></li>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Tips&Tricks</a></li>
                            <li><a href="#">App</a></li>
                            <li><a href="#">Reviews</a></li>
                        </ul>
                    </nav>
                    -->
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'primary', 
                            'container_class' => 'main-menu' ) ); 
                    ?>

                    <!-- search form -->
                    <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</header>
