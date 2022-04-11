<?php

//after setup theme
function _tk_setup() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
/*
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
*/
    
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

    /* Logo */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
	) );
    
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
	/**
	 * Register Menus
	*/
	register_nav_menus( array(
		'primary'  => __( 'Primary Menu', '_tk' ),
	) );

    function wpb_custom_new_menu() {
      register_nav_menu('my-custom-menu-top',__( 'Top menu' ));
    }
    add_action( 'init', 'wpb_custom_new_menu' );

    
    /* Theme Images Size */
    //add_image_size( 'slider-size', 1170, 530, true );
    
    
}

add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tk' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init' );

function _tk_widgets_init2() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget 01', '_tk' ),
		'id'            => 'footer-1',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init2' );

function _tk_widgets_init3() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget 02', '_tk' ),
		'id'            => 'footer-2',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init3' );

function _tk_widgets_init4() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget 03', '_tk' ),
		'id'            => 'footer-3',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tk_widgets_init4' );

function _tk_widgets_init5() {
    
    
	register_sidebar( array(
		'name'          => __( 'Footer Widget 04', '_tk' ),
		'id'            => 'footer-4',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Woocommerce Widget Sidebar', '_tk' ),
		'id'            => 'woo-sidebar',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="form-group">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="semifont">',
		'after_title'   => '</h4>',
	) );
	
    
	register_sidebar( array(
		'name'          => __( 'Footer Instagram', '_tk' ),
		'id'            => 'footer-instagram',
        'description'   => __( 'Appears in the section of the site.', '_tk' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="custom_title text-center semifont">',
		'after_title'   => '</h3>',
	) );
	
}



add_action( 'widgets_init', '_tk_widgets_init5' );

/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {


	// load Theme styles
	wp_enqueue_style( '_tk-style', get_stylesheet_uri() );
	wp_enqueue_style('sl-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('sl-owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('sl-owltheme', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	wp_enqueue_style('sl-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('sl-glasscase', get_template_directory_uri() . '/css/glasscase.css');
	wp_enqueue_style('sl-style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style('sl-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('sl-style-wp', get_template_directory_uri() . '/style-wp.css', array(), time());
	
	wp_enqueue_script('sl-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('sl-owlcarousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('sl-glasscase-js', get_template_directory_uri() . '/js/glasscase.js', array('jquery'), '', true);
	wp_enqueue_script('sl-scripts-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

	if(is_singular('product')) {

		$product = wc_get_product(get_the_ID());
		$variations = $product->get_available_variations();

		wp_localize_script( 'sl-scripts-js', 'product_var_obj',
	        array( 
	            'ajaxurl' => admin_url( 'admin-ajax.php' ),
	            'product_variation' => $variations,
	        )
	    );
	}


}
add_action( 'wp_enqueue_scripts', '_tk_scripts' );

acf_add_options_page(array(
    'page_title' 	=> 'Header Options',
    'menu_title'	=> 'Header Options',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
));

acf_add_options_page(array(
    'page_title' 	=> 'Popular Searches',
    'menu_title'	=> 'Popular Searches',
    'menu_slug' 	=> 'theme-general-settings2',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
));

acf_add_options_page(array(
    'page_title' 	=> 'Shop Options',
    'menu_title'	=> 'Shop Options',
    'menu_slug' 	=> 'theme-general-settings3',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
));

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';


/* Post Type Require Files */
require get_template_directory() . '/includes/post-type.php';



//
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
//
//
//add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
//add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
//
//function my_theme_wrapper_start() {
//    echo '<div id="main" class="readymade_product functions.php cus_made_product">';
//}
//
//function my_theme_wrapper_end() {
//    echo '</div>';
//}


function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




/**
 * Remove product data tabs
 */
// add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// function woo_remove_product_tabs( $tabs ) {

//     unset( $tabs['description'] );      	// Remove the description tab
//     unset( $tabs['reviews'] ); 			// Remove the reviews tab
//     unset( $tabs['additional_information'] );  	// Remove the additional information tab

//     return $tabs;
// }


add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {
	$mime_types['webp'] = 'image/webp';
	return $mime_types;
}

add_theme_support('title-tag');


function get_color_attributes($product_id, $from_attribute_tax, $to_attribute_tax, $current_attr){

	$product = wc_get_product($product_id);
	$variations = $product->get_available_variations();

	$variation_attrs = array();
	foreach ($variations as $key) {
		if($key['attributes']['attribute_pa_'.$from_attribute_tax] == $current_attr) {
			$variation_single_attr_color = $key['attributes']['attribute_pa_'.$to_attribute_tax];
			$variation_attrs[] = $variation_single_attr_color;
		}
	}

	$unique_attrs = array_unique($variation_attrs);
	$formatted_current_variation_attributes = implode(', ', $unique_attrs);

	return $formatted_current_variation_attributes;

}


add_action('wp_head', 'my_wp_ajaxurl');
function my_wp_ajaxurl() {
    $url = parse_url(home_url());
    if ($url['scheme'] == 'https') {
        $protocol = 'https';
    } else {
        $protocol = 'http';
    }
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php', $protocol); ?>';
    </script>
    <?php
}


function add_to_cart_ajax() {

    $res = new stdClass;
    $res->post = $_POST;
    $res->error = false;
    $res->error_text = '';
    $res->cart_quantity = 0;

    global $woocommerce;
	$product_id = $_POST['product_id'];
	$product_quantity = $_POST['product_quantity'];
	$variation_id = $_POST['variation_id'];

	if($product_id && $variation_id && $product_quantity) {

		WC()->cart->add_to_cart( $product_id, $product_quantity, $variation_id ); ?>

		<?php $atc_product_info = wc_get_product($product_id ); ?>

		<h3><?php echo $atc_product_info->get_name(); ?> has been successfully added to cart!</h3>
		<a href="<?php echo wc_get_cart_url() ?>" class="cart_btn">View Cart</a>

		<?php 
	    $res->res = ob_get_clean();

	    $res->cart_quantity = WC()->cart->get_cart_contents_count();

	    echo json_encode($res);

	    die();

	}
	
}
add_action('wp_ajax_product_addtocart', 'add_to_cart_ajax');
add_action('wp_ajax_nopriv_product_addtocart', 'add_to_cart_ajax');