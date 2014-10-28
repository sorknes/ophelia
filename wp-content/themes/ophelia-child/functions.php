<?php

/*
  Author: Knut A. Sorknes
  URL: htp://push-media.no/

  Functions used for Ophelia.

*/


/***************************************************
*
 	Remove widgetized areas from parent theme.
*
****************************************************/
function remove_some_widgets(){

	// Unregister some of the Bootstrap theme sidebars
	unregister_sidebar( 'sidebar1' );
	unregister_sidebar( 'sidebar2' );
	unregister_sidebar( 'footer1' );
	unregister_sidebar( 'footer2' );
	unregister_sidebar( 'footer3' );

}
add_action( 'widgets_init', 'remove_some_widgets', 11 );


function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,800,800italic,400italic,700,700italic');
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts');


/***************************************************
*
 	Register javascripts -> Add them to wp_footer
*
****************************************************/
function ophelia_theme_js(){
	wp_register_script(
		'ophelia_responsive_nav', 
		get_stylesheet_directory_uri() . '/library/js/vendor/responsive-nav.min.js', 
		array('jquery'), 
		'',
		true );

    wp_enqueue_script('ophelia_responsive_nav');

	wp_register_script(
		'ophelia_smooth_scroll', 
		get_stylesheet_directory_uri() . '/library/js/vendor/jquery.easing.min.js', 
		array('jquery'), 
		'',
		true );

    wp_enqueue_script('ophelia_smooth_scroll');

	wp_register_script(
		'ophelia_scripts', 
		get_stylesheet_directory_uri() . '/library/js/scripts.js', 
		array('jquery'), 
		'',
		true );

    wp_enqueue_script('ophelia_scripts');	
}
add_action( 'wp_footer', 'ophelia_theme_js' );


function wp_ophelia_bootstrap_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'main_nav', /* menu name */
    		'menu_class' => 'nav navbar-nav page-scroll',
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container' => 'false', /* container class */
    		'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
    		'depth' => '2',  /* suppress lower levels for now */
    		'walker' => new Bootstrap_walker(),
    	)
    );
}


/***************************************************
*
 	CHange style on login
*
****************************************************/
/*add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/../wordpress-bootstrap-child/images/logo.svg') no-repeat scroll center top transparent;
		width: 220px;
	}
	
	#loginform #wp-submit {
		padding: 1em 1.8em 0.8em 1.8em;
		color: #fff;
		font-family: 'TSTARPRO_Regular_mod' !important;
		font-size: 1.163em;
		text-transform: uppercase;
		background: #000;
		height: auto;
		border: none;
	}
	</style>
	";
}*/


?>