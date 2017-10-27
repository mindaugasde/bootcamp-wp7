<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {

        wp_deregister_script('jquery');
		wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery.js', false, false, false);
		wp_register_script('plugins', ASSETS_URL . '/assets/js/plugins.js', false, false, true);
		wp_register_script('bootstrap', ASSETS_URL . '/assets/js/bootstrap.min.js', false, false, true);
		wp_register_script('prettyPhoto', ASSETS_URL . '/assets/js/jquery.prettyPhoto.js', false, false, true);
		wp_register_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCWDPCiH080dNCTYC-uprmLOn2mt2BMSUk&amp;sensor=true', false, false, true);
        wp_register_script('js_main', ASSETS_URL . '/assets/js/init.js', array('jquery', 'plugins', 'bootstrap', 'prettyPhoto', 'gmaps'), '1.0', true);
        wp_enqueue_script('js_main');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/style.css';

	if( $styles_path ) {
	
		wp_register_style('bootstrap', ASSETS_URL . '/assets/css/bootstrap.min.css', array(), false, false);
		wp_register_style('font-awesome', ASSETS_URL . '/assets/css/font-awesome.min.css', array(), false, false);
		wp_register_style('pe-icons', ASSETS_URL . '/assets/css/pe-icons.css', array(), false, false);
		wp_register_style('prettyPhoto', ASSETS_URL . '/assets/css/prettyPhoto.css', array(), false, false);
		wp_register_style('animate', ASSETS_URL . '/assets/css/animate.css', array(), false, false);
		wp_register_style('main', ASSETS_URL . '/assets/css/style.css', array('bootstrap', 'font-awesome', 'pe-icons', 'prettyPhoto', 'animate'), false, false);

		wp_enqueue_style('main');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
		'primary-navigation' => __( 'Primary Navigation' ),
		'secondary-navigation' => __( 'Secondary Navigation' )
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
	'Skills' => 'Skill',
	'Members' => 'Member',
	'Portfolio' => 'Portfolio'
);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

// Custom Mega Super Menu

function megaSuperMenu($menu, $classes){
	wp_nav_menu(array(
		'container' => 'ul',
		'menu_class' => $classes,
		'theme_location' => $menu,
		'menu' => $menu
	));
}

// ACF Options Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page('Global');
	
}