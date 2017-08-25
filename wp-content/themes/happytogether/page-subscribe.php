<?php get_header(); ?>
<div id="content">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 wpforms-container" id="wpforms-130">
                <form class=" wpforms-validate wpforms-form subscribe-form" enctype="multipart/form-data" id="wpforms-form-136" action="/subscribe/#wpforms-136" data-formid="136" method="post" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-10 col-md-8">
                            <h2 class="form-title">MacPaw Newsletter</h2>
                            <p class="form-desc">Once in a while we’ll send you amazing, handpicked deals on apps by MacPaw or other developers that
                                we think rock.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <input type="email" id="wpforms-136-field_1" name="wpforms[fields][1]" class=" wpforms-field-medium wpforms-field-required form-control" placeholder="Enter your email" aria-required="true" required>
                        </div>
                        <div class="col-sm-3 wpforms-submit-container">
                            <input type="hidden" name="wpforms[id]" value="136">
                            <input type="hidden" name="wpforms[author]" value="0">
                            <input type="hidden" name="wpforms[post_id]" value="64">
                            <button type="submit" name="wpforms[submit]" id="wpforms-submit-136" value="wpforms-submit" class="btn btn-orange wpforms-submit " data-alt-text="Sending...">Subscribe</button>
                        </div>
                    </div>
                    <img class="form-img" src="<?php bloginfo('template_url');?>/img/mail-icon.png" alt="">
                </form>
                
            </div>
            <div class="hide"> <?php wpforms_display( 136, false, false ); ?> </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>