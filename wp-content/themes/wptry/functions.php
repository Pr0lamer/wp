<?php 
	/*
	==========================================
	 Include scripts
	==========================================
	*/
	add_action('wp_enqueue_scripts', 'wptry_scripts');
	function wptry_scripts(){
		wp_enqueue_style('style-css', get_stylesheet_uri());
		
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('wpp', get_template_directory_uri() . '/css/wpp.css');
		wp_deregister_script( 'jquery' );   
    	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    	wp_enqueue_script('jquery');

	}

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	/*
	==========================================
	 Theme support functions
	==========================================
	*/
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('post-formats', array('aside', 'image', 'video'));
 	
	/*
	==========================================
	 Activate menus
	==========================================
	*/
	function register_my_menu() {
		add_theme_support('menus');
	  register_nav_menu( 'primary', 'primary menu' );
	}
	add_action( 'init', 'register_my_menu' );

	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	    return $html;
	}


	/*
		==========================================
		 Sidebar/widget functions
		==========================================
	*/
	function awesome_widget_setup() {
		register_sidebar(
			array(	
				'name'	=> 'Sidebar',
				'id'	=> 'sidebar-1',
				'class'	=> 'sidebar',
				'description' => 'Standard Sidebar',
				'before_sidebar' => '<h1>',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
		
	}
	add_action('widgets_init','awesome_widget_setup');

	/*
		==========================================
		 Recent posts functions
		==========================================
	*/

	function wpb_last_week_posts() { 
	
		$thisweek = date('W');
		if ($thisweek != 1) :
		$lastweek = $thisweek - 1;   
		else : 
		$lastweek = 52;
		endif; 
		$year = date('Y');
		if ($lastweek != 52) :
		$year = date('Y');
		else: 
		$year = date('Y') -1; 
		endif;
		$args = array(
		    'post_type'      => 'post',
			'year' => $year,
			'w' => $lastweek,
		    'posts_per_page' => '2'
		);
		$the_query = new WP_Query($args);
		if ( $the_query->have_posts() ) : 
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="post">
                <p class="post__name">
                    <a class="post__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <p class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></p>
            </div>
		  <?php endwhile; ?>
		  <?php wp_reset_postdata(); ?>
		<?php else:  ?>
		  <p><?php _e( 'No posts found :(' ); ?></p>
		<?php endif;

	}

	function today_posts(){
		$today = getdate();
		$args = array(
		    'post_type'      => 'post',
			'year' => $today["year"],
			'monthnum' => $today["mon"],
			'day' => $today["mday"],
		    'posts_per_page' => '2'
		);
		$the_query = new WP_Query( $args);
		if ( $the_query->have_posts() ) : 
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="post">
                <p class="post__name">
                    <a class="post__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <p class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></p>
            </div>
		  <?php endwhile; ?>
		  <?php wp_reset_postdata(); ?>
		<?php else:  ?>
		  <p><?php _e( 'No posts for today :(' ); ?></p>
		<?php endif;

	}

	function last_month_posts(){
		$today = getdate();
		$args = array(
		    'post_type'      => 'post',
			'year'=>$today["year"],
	        'monthnum'=>$today["mon"]-1,
	        
	        'posts_per_page' => 2
		);
		$the_query = new WP_Query( $args);
		if ( $the_query->have_posts() ) : 
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="post">
                <p class="post__name">
                    <a class="post__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <p class="post__date"><?php echo get_the_date('F '.'j'.', '.'Y'); ?></p>
            </div>
		  <?php endwhile; ?>
		  <?php wp_reset_postdata(); ?>
		<?php else:  ?>
		  <p><?php _e( 'No posts found :(' ); ?></p>
		<?php endif;

	}

	/*
		==========================================
		 Pagination function
		==========================================
	*/
	function bittersweet_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$pages = paginate_links( array(
		        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		        'format' => '?paged=%#%',
		        'current' => max( 1, get_query_var('paged') ),
		        'total' => $wp_query->max_num_pages,
		        'prev_text' => __('&larr;'),
        		'next_text' => __('&rarr;'),
		        'type'  => 'array',
		        
		    ) );
		    if( is_array( $pages ) ) {
		        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		        echo '<ul class="pagination">';
		        foreach ( $pages as $page ) {
		                echo "<li>$page</li>";
		        }
		       echo '</ul>';
		        }
	}

	function new_excerpt_more( $more ) {
	return ' <a class="read-more wpp-post-title" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );

?>