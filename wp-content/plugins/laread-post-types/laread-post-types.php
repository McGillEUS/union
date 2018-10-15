<?php 
/**
* Plugin Name: LaRead Post Types
* Plugin URI: http://themeforest.net/user/evmet
* Description: LaRead - Gallery Post Types
* Version: 1.0
* Author: Evmet
* Author URI: http://evmet.net/
*/
// Register Custom Post Gallery
function laread_gallery_post_type() {

	$labels = array(
		'name'                => esc_html__( 'LaRead Galleries', 'LaRead' ),
		'singular_name'       => esc_html__( 'LaRead Gallery', 'LaRead' ),
		'menu_name'           => esc_html__( 'LaRead Gallery', 'LaRead' ),
		'name_admin_bar'      => esc_html__( 'LaRead Gallery', 'LaRead' ),
		'parent_item_colon'   => esc_html__( 'Parent Item:', 'LaRead' ),
		'all_items'           => esc_html__( 'All Items', 'LaRead' ),
		'add_new_item'        => esc_html__( 'Add New Item', 'LaRead' ),
		'add_new'             => esc_html__( 'Add New', 'LaRead' ),
		'new_item'            => esc_html__( 'New Item', 'LaRead' ),
		'edit_item'           => esc_html__( 'Edit Item', 'LaRead' ),
		'update_item'         => esc_html__( 'Update Item', 'LaRead' ),
		'view_item'           => esc_html__( 'View Item', 'LaRead' ),
		'search_items'        => esc_html__( 'Search Item', 'LaRead' ),
		'not_found'           => esc_html__( 'Not found', 'LaRead' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'LaRead' ),
	);
	$args = array(
		'label'               => esc_html__( 'LaRead Gallery', 'LaRead' ),
		'description'         => esc_html__( 'LaRead gallery posts', 'LaRead' ),
		'labels'              => $labels,
		'menu_icon' 		  => 'dashicons-format-gallery',
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array( 'laread_gallery_category' ),
		'hierarchical'        => false,
		'public'              => false,
		'rewrite' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'laread_gallery', $args );

}

add_action( 'init', 'laread_gallery_post_type', 0 );

// Register Custom Taxonomy
function laread_gallery_taxonomy() {

	$labels = array(
		'name'                       => esc_html__( 'Gallery Categories', 'LaRead' ),
		'singular_name'              => esc_html__( 'Gallery Category', 'LaRead' ),
		'menu_name'                  => esc_html__( 'Gallery Category', 'LaRead' ),
		'all_items'                  => esc_html__( 'All Items', 'LaRead' ),
		'parent_item'                => esc_html__( 'Parent Item', 'LaRead' ),
		'parent_item_colon'          => esc_html__( 'Parent Item:', 'LaRead' ),
		'new_item_name'              => esc_html__( 'New Item Name', 'LaRead' ),
		'add_new_item'               => esc_html__( 'Add New Item', 'LaRead' ),
		'edit_item'                  => esc_html__( 'Edit Item', 'LaRead' ),
		'update_item'                => esc_html__( 'Update Item', 'LaRead' ),
		'view_item'                  => esc_html__( 'View Item', 'LaRead' ),
		'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'LaRead' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove items', 'LaRead' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'LaRead' ),
		'popular_items'              => esc_html__( 'Popular Items', 'LaRead' ),
		'search_items'               => esc_html__( 'Search Items', 'LaRead' ),
		'not_found'                  => esc_html__( 'Not Found', 'LaRead' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'laread_gallery_category', array( 'laread_gallery' ), $args );

}
add_action( 'init', 'laread_gallery_taxonomy', 0 );