<?php
   
/*
Plugin Name: Post Type - Intro
Plugin URI: http://www.akerbrygge.no/
Description: Plugin for Custom Post Type - intro
Version: 1.0
Author: Craft World Wide
Author URI: http://craftww.com
License: GPL2
*/

/****************************************************************************
*
*	Function for plugin activation and deactivation
*
****************************************************************************/  
function posttype_intro_plugin_activation() {
 
    posttype_intro();
 
    //Flush rewrite rules to be able to use slug in the url's
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'posttype_intro_plugin_activation');
 
function posttype_intro_plugin_deactivation() {
 
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'posttype_intro_plugin_deactivation');


/****************************************************************************
*
*	Function for creating the intro Custom Post Type 
*
****************************************************************************/    
   function posttype_intro() {
	   $labels = array(
						'name'               => _x( 'Intro', 'Intro' ),
						'singular_name'      => _x( 'Intro', 'Intro' ),
						'add_new'            => _x( 'Legg til ny intro', 'Intro' ),
						'add_new_item'       => __( 'Legg til ny intro', 'Intro' ),
						'edit_item'          => __( 'Rediger intro' ),
						'new_item'           => __( 'Ny intro' ),
						'all_items'          => __( 'Se alle introer' ),
						'view_item'          => __( 'Vis intro' ),
						'search_items'       => __( 'Søk etter intro' ),
						'not_found'          => __( 'Fant ingen introer' ),
						'not_found_in_trash' => __( 'Finner ingen intro i papirkurv' ), 
						'parent_item_colon'  => '',
						'menu_name'          => 'Intro'
						);
	  $args = array(
	    'labels'        => $labels,
	    'description'   => 'For intro-bilde + tekst til Aker Brygge.',
	    'public'        => true,
	    'menu_position' => 2,
	    'menu_icon'		=> 'dashicons-format-image',
	    'supports'      => array( 'title', 'editor', 'thumbnail'),
	    'has_archive'   => false,
	    'exclude_from_search' => true,
		'rewrite' 		=> array(
			'slug'			=>'intro',
			'with_front'	=> false,
			'feed'			=> true,
			'pages'			=> true
	    ),
	    'hierarchical'	=> false
	  );
	  register_post_type( 'intro', $args ); 
  }
  
  add_action( 'init', 'posttype_intro' );

/****************************************************************************
*
*	Functions for adding Meta Boxes 
*
****************************************************************************/ 
	function add_pt_intro_metaboxes() {
		//add_meta_box('pt_metabox_intro_video', 'Ønsker du å bruke video?', 'pt_metabox_intro_video', 'intro', 'normal', 'default');
		add_meta_box('pt_metabox_intro_contactinfo', 'Ekstra', 'pt_metabox_intro_extras', 'intro', 'normal', 'default');
	}
	add_action( 'add_meta_boxes', 'add_pt_intro_metaboxes' );
	
/****************************************************************************
	Functions for Contactinfo metabox
	Contains:
	Phone, Email, Address  
****************************************************************************/
	function pt_metabox_intro_extras($post){
		
		$link 					= get_post_meta($post->ID, 'pt_link', true);
		$link_2					= get_post_meta($post->ID, 'pt_link_2', true);
			
		echo '<table class="form-table">';
		echo '<input type="hidden" name="pt_metabox_intro_nonce" id="pt_metabox_intro_nonce" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';		
		echo '<tr><th><label for="pt_link">Linkes til (valgfritt)</label><p class="description">Tittel vil da linkes til denne URLen.</p></th><td><input type="text" class="regular-text" id="pt_link" name="pt_link" placeholder="Link til Bar" value="'.$link.'" /></td></tr>';
		echo "</table>";
		
		echo '<table class="form-table">';
		echo '<input type="hidden" name="pt_metabox_intro_nonce_2" id="pt_metabox_intro_nonce_2" value="' .wp_create_nonce( plugin_basename(__FILE__) ) . '" />';		
		echo '<tr><th><label for="pt_link_2">Linkes til (valgfritt)</label><p class="description">Tittel vil da linkes til denne URLen.</p></th><td><input type="text" class="regular-text" id="pt_link_2" name="pt_link_2" placeholder="Link til Dinner" value="'.$link_2.'" /></td></tr>';
		echo "</table>";	
	}

	/*function pt_metabox_intro_video($post){
		
		$pt_videourl_mp4 				= get_post_meta($post->ID, 'pt_videourl_mp4', true);	
		$pt_videourl_webm 				= get_post_meta($post->ID, 'pt_videourl_webm', true);	
		$pt_videourl_ogg 				= get_post_meta($post->ID, 'pt_videourl_ogg', true);	
		$pt_videourl_vimeo 				= get_post_meta($post->ID, 'pt_videourl_vimeo', true);	

		echo "<p class='description'>Forskjellige nettlesere støtter ulike videoformater. For at video skal virke i alle nettlesere må vi legge inn video med 3 forskjellige filendinger. <br/>Disse tre er: mp4, .webm og .ogg (eller .ogv). Videoene lastes opp under Media i menyen til venstre. Her finner man også lenken/URLen til filmene som man kopierer og limer inn i feltene under. </p>";	
		echo '<table class="form-table">';
		
		echo '<tr><th><label for="pt_videourl_mp4">Videolink MP4</label><p class="description">Videofil .mp4-URL til video legges inn her.</p></th><td><input type="text" class="regular-text" id="pt_videourl_mp4" name="pt_videourl_mp4" placeholder="http://akerbrygge.no/uploads/2014/09/festdag.mp4" value="'.$pt_videourl_mp4.'" /></td></tr>';
		
		echo '<tr><th><label for="pt_videourl_webm">Videolink WEBM </label><p class="description">Videofil .webm-URL til video legges inn her.</p></th><td><input type="text" class="regular-text" id="pt_videourl_webm" name="pt_videourl_webm" placeholder="http://akerbrygge.no/uploads/2014/09/festdag.webm" value="'.$pt_videourl_ogg.'" /></td></tr>';
		
		echo '<tr><th><label for="pt_videourl_ogg">Videolink OGG eller OGV </label><p class="description">Videofil .ogg eller .ogv-URL til video legges inn her.</p></th><td><input type="text" class="regular-text" id="pt_videourl_ogg" name="pt_videourl_ogg" placeholder="http://akerbrygge.no/uploads/2014/09/festdag.ogg" value="'.$pt_videourl_ogg.'" /></td></tr>';

		echo '<tr><th><label for="pt_videourl_vimeo">Vimeo ID</label><p class="description">Legg kun til ID (feks <strong>25494831</strong>). ID-en finner du i adressefeltet i nettleseren: http://vimeo.com/XXXXXX</p></th><td><input type="text" class="regular-text" id="pt_videourl_vimeo" name="pt_videourl_vimeo" placeholder="123456753" value="'.$pt_videourl_vimeo.'" /></td></tr>';

		echo "</table>";	
	}*/


/****************************************************************************
*	
*	Functions for SAVING Meta Box Data
*
****************************************************************************/
function save_pt_metabox_intro_contactinfo($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['pt_metabox_intro_nonce'], plugin_basename(__FILE__) )) {
		return $post->ID;
	}
	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	$intro_meta['pt_link'] 		= $_POST['pt_link'];
	$intro_meta['pt_link_2']	= $_POST['pt_link_2'];
	/*$intro_meta['pt_videourl_mp4'] = $_POST['pt_videourl_mp4'];
	$intro_meta['pt_videourl_webm'] = $_POST['pt_videourl_webm'];
	$intro_meta['pt_videourl_ogg'] = $_POST['pt_videourl_ogg'];
	$intro_meta['pt_videourl_vimeo'] = $_POST['pt_videourl_vimeo'];*/

	// Add values of $events_meta as custom fields
	foreach ($intro_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't intro custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
add_action('save_post', 'save_pt_metabox_intro_contactinfo', 1, 2); // save the custom fields
	
?>