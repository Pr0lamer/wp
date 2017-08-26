
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
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="services__desc">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row services-video">
                        <div class="myvideo">
                           
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