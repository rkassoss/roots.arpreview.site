<?php
// Register Custom Post Type
function projects_post_type() {

	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Projects', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Project:', 'text_domain' ),
		'all_items'           => __( 'All Projects', 'text_domain' ),
		'view_item'           => __( 'View Project', 'text_domain' ),
		'add_new_item'        => __( 'Add New Project', 'text_domain' ),
		'add_new'             => __( 'New Project', 'text_domain' ),
		'edit_item'           => __( 'Edit Project', 'text_domain' ),
		'update_item'         => __( 'Update Project', 'text_domain' ),
		'search_items'        => __( 'Search Projects', 'text_domain' ),
		'not_found'           => __( 'No Projects found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Projects found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'project', 'text_domain' ),
		'description'         => __( 'Project information pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', ),
		'taxonomies'          => array( 'project_type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'project', $args );

}

// Hook into the 'init' action
add_action( 'init', 'projects_post_type', 0 );

// Register Custom Taxonomy
function project_type() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Project Type', 'text_domain' ),
		'all_items'                  => __( 'All Project Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Project Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Project Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Project Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add Project Type Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Project Type', 'text_domain' ),
		'update_item'                => __( 'Update Project Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Project Type with commas', 'text_domain' ),
		'search_items'               => __( 'Search Project Types', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Project Types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Project Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'project_type', array( 'project' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'project_type', 0 );	
	
	
?>