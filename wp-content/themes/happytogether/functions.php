<?php 
	/*
	==========================================
	 Include scripts
	==========================================
	*/
	add_action('wp_enqueue_scripts', 'wptry_scripts');
	function wptry_scripts(){
		wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
		
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		
		wp_enqueue_style('jquery.fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css');
		wp_enqueue_style('colorbox', get_template_directory_uri() . '/css/colorbox.css');
		wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css');
		wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css');

		wp_enqueue_style('style-css', get_stylesheet_uri());
		


		wp_deregister_script( 'jquery' );   
    	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    	wp_enqueue_script('jquery');
    	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    	wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.js', array('jquery'), null, true);
    	wp_enqueue_script('jquery.fancybox.pack', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', array('jquery'), null, true);
    	wp_enqueue_script('youtube', get_template_directory_uri() . '/js/youtube.js', array('jquery'), null, true);
    	wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
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
	return ' <a class="read-more wpp-post-title" href="'. get_permalink( get_the_ID() ) . '">' . __('Читать далее', 'your-text-domain') . '</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );


function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>,<h3>,<strong>'; 
    }

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'wpse' ), get_the_title()) . '</a>'; 
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

?>