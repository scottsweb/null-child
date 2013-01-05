<?php

/***************************************************************
* Function remove_options
* Remove unwanted options for this theme
***************************************************************/

add_filter('null_options', 'remove_options');

function remove_options($options) {
	
	// general
	//unset($options['show_tagline']);
	//unset($options['breadcrumbs']);
	//unset($options['footer_sidebar']);
	//unset($options['wordpress_credit']);
	//unset($options['theme_credit']);

	// design
	//unset($options['background_image']);
	//unset($options['heading_font']);
	//unset($options['gravatar']);
	
	// advanced
	//unset($options['custom_header']);
	//unset($options['custom_background']);
	
	return $options;
	
}

/***************************************************************
* Function custom_wordpress_menu
* Remove, sort and customise the WordPress admin menu
***************************************************************/

add_action('null_admin_menu', 'admin_menu');

function admin_menu() {
	
	// remove links from menu
	remove_admin_menu_section('link-manager.php');
	
	// examples
	// remove_admin_menu_section('plugins.php');
	// remove_submenu_page('edit.php?post_type=product','edit.php?post_type=product_variation');
	// rename_admin_menu_section('edit.php?post_type=product','Art');
  	// rename_admin_menu_item('edit.php?post_type=product','post-new.php?post_type=product','Add Artwork');
    // remove final seperators
  	// unset($menu[99]);
	// unset($menu[100]);
  	// swap_admin_menu_sections('upload.php', 'edit.php?post_type=product');

}

/***************************************************************
* Function custom_pages_columns
* Remove "comments" from pages overview (rarely use comments on pages)
***************************************************************/

add_filter('manage_pages_columns', 'pages_columns');

function pages_columns($defaults) {
	unset($defaults['comments']);
	return $defaults;
}

/***************************************************************
* Function add_page_excerpts
* Enable page excerpt meta box
***************************************************************/

//add_action('init', 'add_page_excerpts');

function add_page_excerpts() {        
    add_post_type_support( 'page', 'excerpt' );
}

/***************************************************************
* Function remove_meta_boxes
* Customise the meta boxes for posts and pages
***************************************************************/

add_action('admin_init','remove_meta_boxes');

function remove_meta_boxes() {
	
	/* posts */
	/* custom fields */
	//remove_meta_box('postcustom','post','normal');
	
	/* trackbacks */
	//remove_meta_box('trackbacksdiv','post','normal');
	
	/* discussion */
	//remove_meta_box('commentstatusdiv','post','normal');
	
	/* tags */
	//remove_meta_box('tagsdiv-post_tag','post','normal');
	
	/* excerpt */
	//remove_meta_box('postexcerpt','post','normal');
	
	/* pages */
	/* custom fields */
	//remove_meta_box('postcustom','page','normal');
	
	/* tracbacks */
	//remove_meta_box('trackbacksdiv','page','normal');
	
	/* discussion */
	//remove_meta_box('commentstatusdiv','page','normal');
	
	/* comments */
	//remove_meta_box('commentsdiv','page','normal');
	
}

/***************************************************************
* Function hide_profile_fields
* Add profile information
***************************************************************/

add_filter('user_contactmethods','add_profile_fields',10,1);

function add_profile_fields( $contactmethods ) {
	
	// add some new ones
	//$contactmethods['address_line_1']       = 'Address Line 1';
    //$contactmethods['address_line_2']       = 'Address Line 2 (optional)';
    //$contactmethods['address_city']         = 'City';
    //$contactmethods['address_state']        = 'State';
    //$contactmethods['address_zipcode']      = 'Zipcode';
    
	return $contactmethods;
}

?>