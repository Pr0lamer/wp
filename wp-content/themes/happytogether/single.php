
<?php get_header(); ?>
<?php 
            if(have_posts()):
                while(have_posts()) : the_post(); ?>
<div id="content">

    <div class="post__inner">
        
        <div class="post__img">
            <?php the_post_thumbnail(); ?>

            <div class="post__inner__title">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post__inner__actions">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <span class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></span>
                            <span class="post__author">By <a class="post__author__name" href="#"><?php the_author();?></a></span>
                        </div>

                        <div class="col-sm-4 text-center">
                            <?php echo get_the_tag_list('<ul class="tags-lst"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
                        </div>

                        <div class="col-sm-4">
                            <div class="post__actions__lst">
                                <span class="post__action post__action--heart">123 234</span>
                                <span class="post__action post__action--comments">123 234</span>
                                <span class="post__action post__action--eye"><?php if(function_exists('the_views')) { the_views(); } ?>﻿</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post__inner__cnt">
                        <?php the_content(); ?>
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


<?php get_template_part('subscribe-block') ?>

<?php get_footer(); ?>