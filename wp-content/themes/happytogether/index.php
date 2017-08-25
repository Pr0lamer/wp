
<?php get_header(); ?>

<div id="content">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="posts__lst">
                
					<?php 
					query_posts('posts_per_page=1');
					    if(have_posts()):
					    	while(have_posts()) : the_post();
					?>

                    <div class="post post--no-image">
                        <h2 class="post__name"><a class="post__link" href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                        <p class="post__short-desc"><?php the_excerpt(); ?></p>
                
                        <?php echo get_the_tag_list('<ul class="tags-lst"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
                
                        <div class="row">
                            <!-- date/author -->
                            <div class="col-sm-6 text-left">
                                <span class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></span>
                                <span class="post__author">By <a class="post__author__name" href="#"><?php the_author();?></a></span>
                            </div>
                
                            <!-- actions -->
                            <div class="col-sm-6 text-right">
                                <div class="post__actions__lst">
                                    <span class="post__action post__action--heart">123 234</span>
                                    <span class="post__action post__action--comments">123 234</span>
                                    <span class="post__action post__action--eye"><?php if(function_exists('the_views')) { the_views(); } ?>﻿</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query();
                else :
                        echo '<p>No content</p>';
                endif; ?>

            
            <?php 
					    if(have_posts()):
					    	while(have_posts()) : the_post();
					?>

                    <div class="post">
                        <h2 class="post__name">
                            <a class="post__link" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        </h2>
            
                        <div class="post__image">
                            <?php the_post_thumbnail(); ?>
                			<?php echo get_the_tag_list('<ul class="tags-lst"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
                            
                                
                                   
                        </div>
                
                        <div class="row">
                            <!-- date/author -->
                            <div class="col-sm-6 text-left">
                                <span class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></span> 
                                <span class="post__author">By <a class="post__author__name" href="#"><?php the_author();?></a></span>
                            </div>
                
                            <!-- actions -->
                            <div class="col-sm-6 text-right">
                                <div class="post__actions__lst">
                                    <span class="post__action post__action--heart">123 234</span>
                                    <span class="post__action post__action--comments">123 234</span>
                                    <span class="post__action post__action--eye"><?php if(function_exists('the_views')) { the_views(); } ?>﻿</span>
                                </div>
                            </div>
                        </div>
                
                        <p class="post__short-desc"><?php the_excerpt(); ?></p>
                    </div>
                
                    
                    
                    <?php endwhile;

            	else :
            			echo '<p>No content</p>';
            	endif; ?>
                </div>

                <section class="pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><span>&rarr;</span></a></li>
                            </ul> -->
                            <?php echo bittersweet_pagination(); ?>
                        </div>
                    </div>
                </section>
            </div>

            <?php get_sidebar(); ?>
            
        </div>
    </div>
    </div>


<?php get_template_part('subscribe-block') ?>

<?php get_footer(); ?>