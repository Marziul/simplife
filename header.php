<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css">
	
    
	<!-- Favicon Icon -->
    <!--<link rel="icon" href="/images/favicon.png" type="image/png"> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <div class="main_wrapper strip_show">
		<div class="top_strip">
			<p class="semifont"><?php the_field('header_top_text', 'option'); ?></p>
			<a href="#" class="close_pop"><i class="fa fa-times"></i></a>
		</div>
		<header class="header">
			<div class="container-fluid"> 
				<div class="row">
					<div class="col-md-8 col-sm-9 header_left hidden-xs">
						<div class="logo">
                          <?php
                            $url = home_url(); ?>
                          
                          <a href="<?php echo $url; ?>"><img src="<?php the_field('header_logo', 'option'); ?>" alt="logo"></a> 
                          
                        </div>
						<div class="room_menu">
						<?php
                            wp_nav_menu( array( 
                                'theme_location' => 'my-custom-menu-top', 
                                'container_class' => 'custom-menu-class' ) ); 
                            ?>
						</div>
					</div>
					<div class="col-md-4 col-sm-3 header_right">
						<div class="shop_icon">
							<ul>

								<li> <a href="#"><?php echo do_shortcode('[fibosearch]'); ?></a></li>
								<li><a href="<?php echo home_url(); ?>/wishlist/"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/heart.png" alt=""/></a></li>
								<li><a href="<?php echo home_url(); ?>/my-account/"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/profile-user.png" alt=""/></a></li>
								<li><a href="<?php echo home_url(); ?>/cart"></a></li>
							</ul>
						</div>
					</div>
					
					
					
					<div class="col-sm-12 header_nav">
						<nav class="navbar cus_navbar">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand visible-xs" href="#"><img src="img/logo-sm.png" class="" alt=""/></a>
							</div>
							
                            <?php wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) ); ?>
                            
						</nav>	
					</div> 
				</div>
			</div>
		</header>
