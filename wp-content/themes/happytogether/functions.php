<?php 
	/*
	==========================================
	 Include scripts
	==========================================
	*/
	add_action('wp_enqueue_scripts', 'wptry_scripts');
	function wptry_scripts(){
		wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('style-css', get_stylesheet_uri());
		
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('colorbox', get_template_directory_uri() . '/css/colorbox.css');
		wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css');
		wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css');
		wp_enqueue_style('jquery.fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css');



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
	

	function register_my_menus()
	{

		register_nav_menus( array(
		'htprimary' => 'htprimary menu',
		'htsecondary' => 'htsecondary menu',
		) );
	}
	add_action( 'init', 'register_my_menus' );



	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	    return $html;
	}


	

	

	function new_excerpt_more( $more ) {
	return ' <a class="read-more wpp-post-title" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );

?>