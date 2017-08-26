
<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10">
            <div id="content">
            <h1 class="text-center page__title"><span>ФОТО</span></h1>
                <div class="page__cnt">
                    <?php echo do_shortcode( '[foogallery id="303"]' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('form-block') ?>
<?php get_footer(); ?>