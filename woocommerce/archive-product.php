<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
    <header class="woocommerce-products-header  archive-product.php">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>
    </header>

    <div class="banner_section">
        <img src="<?php the_field('shop_options_banner', 'options')?>" class="img-responsive banner_wd100" alt="">
        <div class="inner_banner_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="banner_content">
                        <select class="selection_type" onchange="javascript:location.href = this.value;">
                            <?php while(have_rows('product_banner_options')): the_row(); ?>
                                <option value="<?php the_sub_field('options_link'); ?>" > 
                                    <?php the_sub_field('banner_options_text'); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <div class="arrow_icon">
                            <i class="fa fa-angle-down"></i>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popular_readymade custom_readymade">
			<div class="inner_readymade_sec inner_cus_made_sec">
				<div class="container">
					<div class="row"> 
						<div class="col-sm-12">
							<div class="custom_title text-center">
								<h4><?php the_field('shop_options_title', 'options')?></h4>
								<span><?php the_field('shop_options_details', 'options')?></span>
							</div>  
						</div> 
						<div class="col-sm-12">							
							<div class="readymade_list">
								<ul>
								
                                <?php while(have_rows('shop_options_items', 'options')): the_row(); ?>
                                   
                                    <li>
										<a href="<?php the_sub_field('shop_options_item_link', 'options'); ?>">
										<img src="<?php the_sub_field('shop_options_item_image', 'options'); ?>" alt="">
										<span><?php the_sub_field('shop_options_item_title', 'options'); ?></span></a>
									</li>
                                   
                                <?php endwhile; ?>

								</ul>
								<div class="clearfix"></div>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
    	
		<div class="product_list_sec">
			<div class="container-fluid"> 
				<div class="row"> 
					<div class="col-md-3 col-sm-4 product_sidebar">
					
						<div class="prod_sort">
						
							<div class="form-group">
						    <?php
                            if ( woocommerce_product_loop() ) {

                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' ); ?>
			
			                <?php dynamic_sidebar( 'woo-sidebar' ); ?>
						
							</div>	
<!--
							<h4 class="semifont">Sort By</h4>
							<div class="form-group">
								<select class="form-control">
									<option>Default</option>
									<option>Average Rating</option>
									<option>Latest</option>
									<option>Price: Low to High</option>
									<option>Price: High to Low</option>
									<option>Name: A to Z</option>
								</select>
							</div>	
							<div class="form-group">	
								<div class="checkbox">
									<label><input type="checkbox" name="sort"/> Sale</label>
									<label><input type="checkbox" name="sort"/> Free Shipping</label>
									<label><input type="checkbox" name="sort"/> Clearance</label>
								</div>
							</div>
							<div class="form-group filter_type budge_filter">
								<label class="cus_label">Price</label>
								<input type="text" id="budgetrange" name="budgetrange" value=""/>
							</div>
							<div class="form-group filter_type height_filter">
								<label class="cus_label">Height</label> 
								<input type="text" id="heightrange" name="heightrange" value=""/>
							</div>
							<div class="form-group">
								<label class="cus_label">Type</label>
								<div class="checkbox">
									<label><input type="checkbox" name="type[]"/> Indoor</label>
									<label><input type="checkbox" name="type[]"/> Swivel</label>
									<label><input type="checkbox" name="type[]"/> Stackable</label>
									<label><input type="checkbox" name="type[]"/> Stain Resistant / Wateproof</label>
								</div>
							</div>
							<div class="form-group">
								<label class="cus_label">Colour</label>
								<div class="checkbox">
									<label><input type="checkbox" name="colour[]"/> Black</label>
									<label><input type="checkbox" name="colour[]"/> Clear</label>
									<label><input type="checkbox" name="colour[]"/> Dark Timber</label>
									<label><input type="checkbox" name="colour[]"/> Gold</label>
									<label><input type="checkbox" name="colour[]"/> Grey</label>
									<label><input type="checkbox" name="colour[]"/> Light Timber</label>
									<label><input type="checkbox" name="colour[]"/> White</label>
									<label><input type="checkbox" name="colour[]"/> Marble</label>
									<label><input type="checkbox" name="colour[]"/> Rust</label>
								</div>
							</div>
							<div class="form-group">
								<label class="cus_label">Material</label>
								<div class="checkbox">
									<label><input type="checkbox" name="material[]"/> Cord</label>
									<label><input type="checkbox" name="material[]"/> Cotton</label>
									<label><input type="checkbox" name="material[]"/> Engineered Timber</label>
									<label><input type="checkbox" name="material[]"/> Linen</label>
									<label><input type="checkbox" name="material[]"/> MDF</label>
									<label><input type="checkbox" name="material[]"/> Metal Timber</label>
									<label><input type="checkbox" name="material[]"/> PC (Polycarbonate)</label>
									<label><input type="checkbox" name="material[]"/> Plywood</label>
									<label><input type="checkbox" name="material[]"/> Polyester</label>
									<label><input type="checkbox" name="material[]"/> Rattan / Wicker</label>
									<label><input type="checkbox" name="material[]"/> Rubber Wood</label>
									<label><input type="checkbox" name="material[]"/> Solid Timber</label>
									<label><input type="checkbox" name="material[]"/> Upholstered</label>
									<label><input type="checkbox" name="material[]"/> Viscose</label>
								</div>
							</div>
-->
						</div> 
					</div>
					<div class="col-md-9 col-sm-8 product_list">
					
					<div class="my_list">
					
					
                        
                        <?php 
                        woocommerce_product_loop_start(); 

                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action( 'woocommerce_no_products_found' );
                    }

                    /**
                     * Hook: woocommerce_after_main_content.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action( 'woocommerce_after_main_content' );

                    /**
                     * Hook: woocommerce_sidebar.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */?>
                    
						
                     
                     
                <?php    do_action( 'woocommerce_sidebar' );

                    ?>


                        <div class="col-md-offset-3 col-md-9 col-sm-8 product_list pagi_nav">
                            <div class="clearfix"></div>
                            <div class="custom_pagination">
                                <ul>
                                    <li class="prev"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Prev', 'twentyten' ) ); ?></li>
                                    
                                    <li class="next"><?php next_posts_link( __( 'Next<span class="meta-nav">→</span>', 'twentyten' ) ); ?></li>
                                </ul>
                            </div>
                        </div>
						
					</div>
				</div>
			</div>
		</div>

<?php

get_footer( 'shop' ); ?>


    
