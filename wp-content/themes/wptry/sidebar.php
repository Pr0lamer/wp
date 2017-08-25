<div class="col-md-4">
<aside class="sidebar">

        <section class="widget most-popular">
            <h4>The most popular</h4>
        
            <!-- <div class="post">
                <div class="post__img">
                    <img src="img/photo-2.png" alt="">
                </div>
                <p class="post__name">
                    <a class="post__link" href="#">Pellentesque habitant morbi senectus et netus et malesuada</a>
                </p>
                <p class="post__date">January 7, 2017</p>
            </div>
            <div class="post">
                <div class="post__img">
                    <img src="img/photo-2.png" alt="">
                </div>
                <p class="post__name">
                    <a class="post__link" href="#">Pellentesque habitant morbi senectus et netus et malesuada</a>
                </p>
                <p class="post__date">January 7, 2017</p>
            </div> -->
            <?php $popular = new WP_Query(array('posts_per_page'=>2, 'meta_key'=>'post_views_count', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
                while ($popular->have_posts()) : $popular->the_post(); ?>
                <div class="post">
                    <div class="post__img">
                        <?php echo get_the_post_thumbnail( $id, array(72, 72)); ?>
                    </div>
                    <p class="post__name">
                        <a class="post__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </p>
                    <p class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></p>
                </div>
                
            <?php endwhile; wp_reset_postdata(); ?>
        </section>
                    

        <!-- Resent posts -->
        <section class="widget resent-posts">
            <h4>Resent posts</h4>
        
            <div class="tab-wrapp">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#today" aria-controls="today" role="tab" data-toggle="tab">Today</a></li>
                    <li role="presentation"><a href="#week" aria-controls="week" role="tab" data-toggle="tab">Week</a>
                    </li>
                    <li role="presentation"><a href="#month" aria-controls="month" role="tab" data-toggle="tab">Month</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="today">
                    <?php today_posts(); ?>
                    </div>

                

                    <div role="tabpanel" class="tab-pane" id="week">

                       <?php wpb_last_week_posts(); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="month">
                        <?php last_month_posts(); ?>
                    </div>
                </div>
            </div>
        </section>

    </aside>
</div>