<footer class="b-footer" id="b-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-4 col-md-4">
            
            </div>
            
            <div class="col-sm-6 col-md-6">
                
                <ul class="social-btns">
                    <li class="social-btn ok">
                        <a href="http://www.happy-together.webdevlair.com/#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-btn fb">
                        <a href="http://www.happy-together.webdevlair.com/#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-btn ytube">
                        <a href="http://www.happy-together.webdevlair.com/#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-btn insta">
                        <a href="http://www.happy-together.webdevlair.com/#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
            <?php
                                 wp_nav_menu( array( 
                                'theme_location' => 'htsecondary', 
                                'container_class' => 'footer-menu',
                                'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
                                 ) ); 
                             ?>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <div class="f-copy">
                    <p class="text-center">© 2017</p>

                    <p class="text-center">Created By <a href="http://www.happy-together.webdevlair.com/webdevlair.com">WebDevLair.com</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>