
<?php get_header(); ?>
<?php 
            if(have_posts()):
                while(have_posts()) : the_post(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10">
            <div id="content">
                <h1 class="text-center page__title"><span><?php the_title(); ?></span></h1>
                <div class="page__cnt">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <?php 
                                    if(get_the_ID() == 168){
                                        echo do_shortcode( '[foogallery id="230"]' ); 
                                    }
                                    if(get_the_ID() == 301){
                                        echo do_shortcode( '[foogallery id="188"]' ); 
                                    }
                                    if(get_the_ID() == 290){
                                        echo do_shortcode( '[foogallery id="292"]' ); 
                                    }
                                    if(get_the_ID() == 279){
                                        echo do_shortcode( '[foogallery id="281"]' ); 
                                    }
                                    if(get_the_ID() == 268){
                                        echo do_shortcode( '[foogallery id="270"]' ); 
                                    }
                                    /* выпускные if(get_the_ID() == 265){
                                        echo do_shortcode( '[foogallery id="270"]' ); 
                                    } */
                                    if(get_the_ID() == 249){
                                        echo do_shortcode( '[foogallery id="251"]' ); 
                                    }
                                    

                             ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="services__desc">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row services-video">
                        <div class="myvideo">
                           <?php 
                                if(get_the_ID() == 301){
                                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/23-gbkO4hY8" frameborder="0" allowfullscreen></iframe>'; 
                                } 
                                if(get_the_ID() == 249){
                                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/BSEFOEHikfM" frameborder="0" allowfullscreen></iframe>'; 
                                } 
                            ?>
                        </div>
                    </div>
                                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile;
                else :
                        echo '<p>No content</p>';
                endif; ?>


<?php get_template_part('form-block') ?>

<?php get_footer(); ?>