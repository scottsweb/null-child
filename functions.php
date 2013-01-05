<?php

	/*
	
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	888888888$1||120888888110811081108888888
	88888880;  ;;' '288880  20  20  28888888
	88888881 '08881  08880  20  20  28888888
	8888888; :88882  08880  20  20  28888888
	8888888| :88882  08880  20  20  28888888
	8888888; :88880' ;2$2;  00  20  28888888
	88888881 ;8888801'   '|080: $0' $8888888
	8888888800888888880008888800880088888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888
	8888888888888888888888888888888888888888

	Notes:
	----------------------------------------


	*/
	
	/***************************************************************
	* Function language_setup
	* Setup languages
	***************************************************************/
	
	add_action('after_setup_theme','language_setup');

	function language_setup() {
		
		// load language files for child theme
		load_child_theme_textdomain('null-child', STYLESHEETPATH . '/assets/languages');
		
		// load optional locale file
		$locale = get_locale();
		$locale_file = STYLESHEETPATH . "/assets/languages/$locale.php";
		if (is_readable($locale_file)) require_once( $locale_file );  
		
	}
	
	/***************************************************************
	* Function image_sizes
	* Register image sizes for the theme
	***************************************************************/
	
	add_action('null_register_image_size', 'image_sizes');
	
	function image_sizes() {

		// add a custom image size: the_post_thumbnail( 'single-post-thumbnail' );
		// add_image_size( 'journal_image_feature', 620, 100);

	}

	/***************************************************************
	* Function register_menu
	* Register new or filter default menu locations
	***************************************************************/
	
	add_filter('null_register_menu', 'register_menu');

	function register_menu($menus) {

		//$my_menu = array('sidebar' => 'Sidebar Menu');
		//$menus = array_merge($menus, $my_menu);		
		return $menus;

	}

	/***************************************************************
	* Function sidebars
	* Remove or register new sidebars for this theme
	***************************************************************/

	add_filter('null_sidebars', 'sidebars');

	function sidebars($sidebars) {

		//$mysidebars = array(__('Custom Sidebar', 'null'));
		//return array_merge($sidebars, $mysidebars);
		return $sidebars;
		
	}

	/***************************************************************
	* Function admin_css
	* Setup the admin css
	***************************************************************/
	
	add_action('null_admin_css', 'admin_css');
	
	function admin_css() {

		// is less compiling enabled or disabled?
		$type = (of_get_option('disable_less', '0') ? 'css' : 'less');	

		// custom admin css
		wp_register_style('admin', get_stylesheet_directory_uri() . '/assets/'.$type.'/wp-admin.'.$type, array(), filemtime(get_stylesheet_directory() . '/assets/'.$type.'/wp-admin.'.$type));
		wp_enqueue_style('admin');
	
	}
	
	/***************************************************************
	* Function theme_css
	* Setup the theme css
	***************************************************************/
	
	add_action('null_theme_css', 'theme_css');
	
	function theme_css() {

		// is less compiling enabled or disabled?
		$type = (of_get_option('disable_less', '0') ? 'css' : 'less');	

		// remove default styles shipped with null framework
		wp_deregister_style('null-screen');
		//wp_deregister_style('google-font'); 
		//wp_deregister_style('null-print');
		
		// register new css
		wp_register_style('screen', get_stylesheet_directory_uri() . '/assets/'.$type.'/screen.'.$type, array(), filemtime(get_stylesheet_directory() . '/assets/'.$type.'/screen.'.$type), 'screen');
		
		// all styles for this theme
		wp_enqueue_style('screen');
		
	}

	/***************************************************************
	* Function login_css
	* Add a custom stylesheet to the login (same CSS is also added to the admin)
	***************************************************************/
	
	add_action('login_enqueue_scripts', 'login_css');
	
	function login_css() {

		// is less compiling enabled or disabled?
		$type = (of_get_option('disable_less', '0') ? 'css' : 'less');

		// custom admin css
		wp_register_style('admin-css', get_stylesheet_directory_uri() . '/assets/'.$type.'/wp-admin.'.$type, array(''), filemtime(get_stylesheet_directory() . '/assets/'.$type.'/wp-admin.'.$type));
		wp_enqueue_style('admin-css');
	   
	}

	/***************************************************************
	* Function admin_js
	* Setup the admin js
	***************************************************************/
	
	add_action('null_admin_js', 'admin_js');
	
	function admin_js() {
		
		// custom admin js
		wp_register_script('admin-js', get_stylesheet_directory_uri() . '/assets/js/wp-admin.js', array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/wp-admin.js'));
		wp_enqueue_style('admin-js');
	
	}

	/***************************************************************
	* Function theme_js
	* Setup the theme js
	***************************************************************/
	
	add_action('wp_enqueue_scripts', 'theme_js');
	
	function theme_js() {
		
		// remove default null script
		//wp_deregister_script('null');
		
		// register js for this theme
		//wp_register_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/onload.js', array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/onload.js'));

	}
	
	// only load admin functions in admin interface
	if (is_admin()) { load_template(STYLESHEETPATH . '/assets/inc/child-admin.php'); }
	
	// only load front end functions for site
	if (!is_admin()) { load_template(STYLESHEETPATH . '/assets/inc/child-theme.php'); }
	
?>