
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10">
            <div id="content">
            <h1 class="text-center page__title"><span>ОТЗЫВЫ</span></h1>
                <div class="page__cnt">
                    <div class="slick-autoplay row">
                        <div>
                            <div class="myvideo">
                                <div class="youtube" id="v8Ya2h-d6K8">
                                    <div class="play"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div>
                            <div class="myvideo">
                                <div class="youtube" id="gjIqQ_tLGTc">
                                    <div class="play"></div>
                                </div>
                                
                            </div>
                        </div>
                            <div>
                            <div class="myvideo">
                                <div class="youtube" id="49mJRSzeCIE">
                                    <div class="play"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="comments"><?php comments_template(); ?></div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('form-block') ?>
<?php get_footer(); ?>