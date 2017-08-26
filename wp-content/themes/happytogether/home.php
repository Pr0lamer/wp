
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10">
            <div id="content">
                <h1 class="text-center page__title"><span>УСЛУГИ</span></h1>
                <div class="page__cnt">
                
                    <h2 class="page__desc">То что мы умеем делать на отлично</h2>

<div class="row">
    <div class="col-sm-12">
<?php 
					    if(have_posts()):
					    	while(have_posts()) : the_post();
					?>
<div class="services__item">
    <div class="row">
        <div class="col-md-2">
            <div class="item__thumb">
                <img src="<?php bloginfo('template_url'); ?>/img/services.png" alt="">
            </div>
        </div>

        <div class="col-md-5">
            <p class="item__title"><?php the_title(); ?></p>

            <p class="item__desc">
                <?php the_excerpt(); ?>
            </p>
        </div>

        <div class="col-md-5">
            <p class="item__price">Стоимость:
                <span>от 6000грн.</span>
            </p>
            <a class="btn more-info" href="<?php the_permalink(); ?>" role="button">Подробнее</a>
            <button class="btn to-order" type="submit">Заказать</button>
        </div>
    </div>
</div>
 <?php endwhile;

            	else :
            			echo '<p>No content</p>';
            	endif; ?>
</div>
</div>
</div>
</div>
</div>
</div></div>
<?php get_template_part('form-block') ?>
<?php get_footer(); ?>