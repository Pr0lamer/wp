<!DOCTYPE html>
<!-- saved from url=(0041)http://www.happy-together.webdevlair.com/ -->
<html lang="ru" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Description">
    <meta name="keywords" content="text, text2, text3"> 
    <meta name="author" content="webdevlair.com">

    <!-- <title>Поздравляем!</title> -->
    <title>ГЛАВНАЯ - Happy Together</title>
    <!--<base href="http://www.happy-together.webdevlair.com/">--><base href=".">


        
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
<!-- This site is optimized with the Sterc seoPro plugin 1.0.4 - http://www.sterc.nl/modx/seopro -->
    <style type="text/css">.fancybox-margin{margin-right:17px;}</style>
</head>
<body <?php get_body_class(); ?> >    

<header class="b-header" id="b-header">
    <div class="container">
    <?php 
  // Fix menu overlap
  if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>'; 
?>
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-default" role="navigation">
                      <!-- Brand and toggle get grouped for better mobile display -->
                
                        <div class="navbar-header hidden-lg">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="http://www.happy-together.webdevlair.com/">
                              <img class="hidden-sm hidden-md hidden-lg" src="<?php bloginfo('template_url'); ?>/img/logo.png" height="38" width="41" alt="logo">
                              </a>
                        </div>
                
                      <!-- Collect the nav links, forms, and other content for toggling -->
                       
                            
                            <?php
                                 wp_nav_menu( array( 
                                'theme_location' => 'htprimary', 
                                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
                                 ) ); 
                             ?>
                            
                       
                
                      <!-- /.navbar-collapse --> 
                </nav>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="head">
                    <a href="http://www.happy-together.webdevlair.com/" class="hidden-xs logo pull-left">
                        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Happy Together">
                    </a>

                    <div class="pull-right">
                        <p class="site__name">
                            <span class="name">Елена</span>
                            <span class="underline"></span>
                            <span class="status">Ведущая</span>
                            <span class="last-name">Попова</span>
                        </p>


                        <p class="phones">
                            <span>+380950130767</span>
                            <span>+380938857865</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="b-fixed-buttons">
    <a class="call-me" href="tel:0938857865"><i class="fa fa-whatsapp" aria-hidden="true"></i>0938857865</a>
    <a class="write-me" href="https://vk.com/lena_popova_tamada">
        <i class="fa fa-vk" aria-hidden="true"></i> напишите мне</a>
</div>

<a href="http://www.happy-together.webdevlair.com/#0" class="cd-top">Top</a>
