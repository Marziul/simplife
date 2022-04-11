<?php



function  room_item_section(){
    // Custom Post Type Labels     
    $labels = array(
        'name'               => _x( 'Rooms', 'post type general name' ),
        'singular_name'      => _x( 'Rooms', 'post type singular name' ),
        'add_new'            => _x( 'Add New Room', 'Images' ),
        'add_new_item'       => __( 'Add New Room' ),
        'edit_item'          => __( 'Edit Room' ),
        'new_item'           => __( 'New Room' ),
        'all_items'          => __( 'All Rooms' ),
        'view_item'          => __( 'View Room' ),
        'search_items'       => __( 'Search Rooms' ),
        'not_found'          => __( 'No Rooms found' ),
        'not_found_in_trash' => __( 'No Rooms found in trash' ),
        'parent_item_colon'  => __( 'Room services' ),
        'menu_name'          => __( 'Rooms' )
    );
   
    // Custom Post Type Supports 
    $supports = array('title', 'thumbnail', 'editor');
   
    // Custom Post Type Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'show_in_admin_bar'  => true,
        'exclude_from_search'=> true,
        'query_var'          => true,
        'can_export'         => true,
        'rewrite'              => array("slug" => "room"), // Permalinks format
        'has_archive'        => true,
        //'menu_position'      => 5,
        'supports'           => $supports,
        'capability_type'    => 'post',
    );
   
    register_post_type( 'room', $args );
}
add_action( 'init', 'room_item_section' );


function create_room_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
    );

    register_taxonomy( 'portfolio_categories', array( 'room' ), $args );
}
add_action( 'init', 'create_room_taxonomies', 0 );



function  reviews_item_section(){
    // Custom Post Type Labels     
    $labels = array(
        'name'               => _x( 'Reviews', 'post type general name' ),
        'singular_name'      => _x( 'Reviews', 'post type singular name' ),
        'add_new'            => _x( 'Add New Review', 'Images' ),
        'add_new_item'       => __( 'Add New Review' ),
        'edit_item'          => __( 'Edit Review' ),
        'new_item'           => __( 'New Review' ),
        'all_items'          => __( 'All Reviews' ),
        'view_item'          => __( 'View Review' ),
        'search_items'       => __( 'Search Reviews' ),
        'not_found'          => __( 'No Reviews found' ),
        'not_found_in_trash' => __( 'No Reviews found in trash' ),
        'parent_item_colon'  => __( 'Review services' ),
        'menu_name'          => __( 'Reviews' )
    );
   
    // Custom Post Type Supports 
    $supports = array( 'title', 'editor', 'custom-fields');
   
    // Custom Post Type Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'show_in_admin_bar'  => true,
        'exclude_from_search'=> true,
        'query_var'          => true,
        'can_export'         => true,
        'rewrite'              => array("slug" => "reviews"), // Permalinks format
        'has_archive'        => true,
        //'menu_position'      => 5,
        'supports'           => $supports,
        'capability_type'    => 'post',
    );
   
    register_post_type( 'reviews', $args );
}
add_action( 'init', 'reviews_item_section' );




/*
function wp_blog_post_type(){
    // Custom Post Type Labels     
    $labels = array(
        'name'               => _x( 'WP Blog', 'post type general name' ),
        'singular_name'      => _x( 'WP Blog', 'post type singular name' ),
        'add_new'            => _x( 'Add new Blog', 'blog' ),
        'add_new_item'       => __( 'Add new Blog' ),
        'edit_item'          => __( 'Edit Blog' ),
        'new_item'           => __( 'New Blog' ),
        'all_items'          => __( 'All Blog' ),
        'view_item'          => __( 'View Blog' ),
        'search_items'       => __( 'Search Blog' ),
        'not_found'          => __( 'No Blog found' ),
        'not_found_in_trash' => __( 'No Blog found in trash' ),
        'parent_item_colon'  => __( 'Parent Blog' ),
        'menu_name'          => __( 'WP Blog' )
    );
   
    // Custom Post Type Supports 
    $supports = array('title', 'editor', 'thumbnail');
   
    // Custom Post Type Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'show_in_admin_bar'  => true,
        'exclude_from_search'=> true,
        'query_var'          => true,
        'can_export'         => true,
        'rewrite'              => array("slug" => "wpposts"), // Permalinks format
        'has_archive'        => true,
        //'menu_position'      => 5,
        'supports'           => $supports,
        'capability_type'    => 'post',
    );
   
    register_post_type( 'wppost', $args );

}
add_action( 'init', 'wp_blog_post_type' );



function wp_blog_taxonomy() {
    
    // Taxonomy Labels     
    $labels = array(
        'name'                       => _x( 'WP Blog Categories', 'taxonomy general name' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Categories' ),
        'popular_items'              => __( 'Popular Categories' ),
        'all_items'                  => __( 'All Categories' ),
        'parent_item'                => __( 'Parent Category' ),
        'parent_item_colon'          => __( 'Parent: Category' ),
        'edit_item'                  => __( 'Edit Category' ),
        'view_item'                  => __( 'View Category' ),
        'update_item'                => __( 'Update Category' ),
        'add_new_item'               => __( 'Add New Category' ),
        'new_item_name'              => __( 'New Category Name' ),
        'add_or_remove_items'        => __( 'Add or remove Categories' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas' ),
        'menu_name'                  => __( 'Categories' ),
    );
   
    // Linked Custom Post Type
    $cpts = array('wppost');
   
    // Taxonomy Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'description'        => 'place each testimonial into a category.',
        'public'             => true,
        'show_ui'            => true,
        'show_tagcloud'      => false,
        'show_in_nav_menus'  => false,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => false,
    );
    register_taxonomy( 'wppost', $cpts, $args );
    
}
add_action( 'init', 'wp_blog_taxonomy' );

*/

