<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

    <div class="banner_section">
        <img src="<?php the_field('product_banner_image')?>" class="img-responsive banner_wd100" alt="">
        <div class="inner_banner_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="banner_content">
                        <select class="selection_type" onchange="javascript:location.href = this.value;">
                           <?php while(have_rows('product_banner_options')): the_row(); ?>
                                <option value="<?php the_sub_field('options_link'); ?>" > <?php the_sub_field('banner_options_text'); ?></option>
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
    
    <div class="popular_custommade custom_readymade">
        <div class="container"> 
            <div class="inner_custommade_sec inner_cus_made_sec">
                <div class="row"> 
                    <div class="col-sm-12">
                        <div class="custom_title text-center">
                            <?php the_field('product_custom_made')?>
                            <div class="custom_made_btn">
                               <?php while(have_rows('custom_made_button')): the_row(); ?>
                                    <a href="<?php the_sub_field('custom_made_button_link'); ?>"><?php the_sub_field('custom_made_button_text'); ?></a>
                                <?php endwhile; ?>
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
    </div>


<?php  
	$regular_price = $product->get_regular_price();
	$sale_price = $product->get_sale_price();
	$variations = $product->get_available_variations();
	$attachment_id = get_post_thumbnail_id(get_the_ID());
	$featured_img = wp_get_attachment_image_src($attachment_id, 'full', true);
	$featured_img_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
	$gallery_attachment_ids = $product->get_gallery_image_ids();
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
		
		<div class="prod_details_pg">
			<div class="container">
				<div class="row">	
					<div class="col-md-8 col-sm-12">
						<div class="prod_img">
							<ul id="glasscase" class="gc-start">
								<?php if(has_post_thumbnail()) : ?>
									<li><img src="<?php echo $featured_img[0]; ?>" alt="<?php echo $featured_img_alt; ?>" data-gc-caption="<?php echo $featured_img_alt; ?>" /></li>
								<?php endif; ?>
								<?php if(!empty($gallery_attachment_ids)) : ?>
									<?php foreach( $gallery_attachment_ids as $gallery_attachment_id ): ?>
										<?php 
											$image_link = wp_get_attachment_image_src( $gallery_attachment_id, 'full', true );
											$alt_text = get_post_meta( $gallery_attachment_id, '_wp_attachment_image_alt', true ); 
										?>
										<li><img src="<?php echo $image_link[0]; ?>" alt="<?php echo $alt_text; ?>" /></li>
									<?php endforeach ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div id="sidebarWrap">
						<div id="sidebar" class="prod_sidebar">
							<div class="prod_title">
								<h4><?php the_title(); ?></h4>
								<a href="<?php echo home_url(); ?>/wishlist/"><i class="fa fa-heart"></i></a>
							</div>
							<div class="prod_price">
								<span class="sale_price"><span><?php echo $sale_price ? '$'.$sale_price : ''; ?></span></span> 
								<span class="reg_price"><span><?php echo $regular_price ? '$'.$regular_price : ''; ?></span></span>
							</div>
							<div class="prod_available">
								<span>Availability: 8 - 10 Weeks</span>
							</div>
							<div class="prod_cus_select">
<!--								<a href="#">-->
                                    <div class="prod_size cus_prod_opt">
                                        <strong>Sofa Bed:</strong> <span>No Bed</span>
                                        <div class="select_option_icon">	
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>
<!--
								</a>
								<a href="#">
-->
                                    <div class="prod_color cus_prod_opt"> 
                                        <strong>Size:</strong> <span>Eastwood bison</span>
                                        <div class="select_option_icon">	
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>
<!--
								</a>
                                <a href="#">
-->
                                    <div class="prod_upgrade prod_fabric cus_prod_opt">
                                        <strong>Fabric:</strong> <span>Gyro Nougat</span>
                                        <div class="select_option_icon">	
                                            <i class="fa fa-angle-right"></i>
                                        </div>
                                    </div>
<!--								</a>-->
							</div>
							<div class="cus_prod_btn">
								<button type="submit" class="addtocart_btn">Add To Cart</button>
								<a href="#" class="enquiry_btn">Enquiry Now</a>
							</div>
						</div>
						<div class="prod_share_icon">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
					<div class="clearfix"></div>
						
				</div>
				</div>

				<div class="row">	
					<div class="col-sm-12">
						<div class="prod_description_tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="#prod_feature" aria-controls="prod_feature" class="semifont" role="tab" data-toggle="tab">Product Features</a></li>
								<li role="presentation" class="active"><a href="#sofabed" class="semifont" aria-controls="sofabed" role="tab" data-toggle="tab">Sofa Bed</a></li>
								<li role="presentation"><a href="#choose_size" class="semifont" aria-controls="choose_size" role="tab" data-toggle="tab">Choose Size</a></li>
								<li role="presentation"><a href="#choose_fabric" class="semifont" aria-controls="choose_fabric" role="tab" data-toggle="tab">Choose Fabric</a></li>
								<li role="presentation"><a href="#moreoption" class="semifont" aria-controls="moreoption" role="tab" data-toggle="tab">More Option</a></li>
							</ul>
							<div id="product-var-tab" class="tab-content">
								<div role="tabpanel" class="tab-pane" id="prod_feature">
									<div class="prod_description">
										<h3>ANDR Collection Custom</h3>
										<p>Custom made sofas, beds, chairs and all timber furniture in Sydney. For changing dimensions, selecting a unique fabric or leather, swapping out the leg finish or discussing a custom requirement, contact us today.</p>
										<p>Custom made sofas, beds, chairs and all timber furniture in Sydney. For changing dimensions, selecting a unique fabric or leather, swapping out the leg finish or discussing a custom requirement, contact us today.</p>
										<p>Custom made sofas, beds, chairs and all timber furniture in Sydney. For changing dimensions, selecting a unique fabric or leather, swapping out the leg finish or discussing a custom requirement, contact us today.</p>
										<p>Custom made sofas, beds, chairs and all timber furniture in Sydney. For changing dimensions, selecting a unique fabric or leather, swapping out the leg finish or discussing a custom requirement, contact us today.</p>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane active" id="sofabed">
									<div class="cus_choose_option sofabed_option">

										<?php if(!empty($variations)) : ?>		

											<?php 
												$attr_size = array();
											?>								

											<?php foreach ($variations as $variation) {
												$current_variation_attributes = $variation['attributes'];
												$current_tax = 'size';
												$variation_single_attr = $variation['attributes']['attribute_pa_'.$current_tax];

												if($variation_single_attr) {
													
													$term_slug = $variation_single_attr;
													$term = get_term_by( 'slug', $term_slug, 'pa_'.$current_tax );
													$attribute_img = get_field('image', 'pa_'.$current_tax.'_'.$term->term_id);
													$attribute_img_url = $attribute_img['url'];
													?>

													<?php if(!in_array($term_slug, $attr_size)) : ?>

														<?php array_push($attr_size, $term_slug); ?>

														<div class="field_choice size_attr" data-color-variations="<?php echo get_color_attributes(get_the_ID(), 'size', 'material-color', $term_slug); ?>" data-fabric-variations="<?php echo get_color_attributes(get_the_ID(), 'size', 'fabrics', $term_slug); ?>" data-current-variation="<?php echo $term_slug; ?>" autocomplete="off">
<!--														    <a href="#">-->
                                                                <label id="" class="choice_label">
                                                                    <div class="variation_item" data-variation-type="size"></div>
                                                                    <img src="<?php echo $attribute_img_url; ?>">
                                                                    <span class="span_title"><?php echo $term->name; ?></span>
                                                                    <?php 

                                                                    $attribute_price = get_field('sofa_price', 'pa_'.$current_tax.'_'.$term->term_id);

                                                                    ?>

                                                                    <?php if( $attribute_price ): ?>
                                                                    <span class="price">$<?php echo $attribute_price; ?></span>
                                                                    <?php endif; ?>

                                                                </label>
<!--															</a>-->
														</div>

													<?php endif; ?>
												<?php }
											} ?>

										<?php endif; ?>

									</div>
									<div class="clearfix"></div>
								</div>
								<div role="tabpanel" class="tab-pane" id="choose_size">
									<div class="cus_choose_option size_option">

										<?php if(!empty($variations)) : ?>

											<?php 
												$attr_material_colors = array();
											?>								

											<?php foreach ($variations as $variation) {
												$current_variation_attributes = $variation['attributes'];
												$current_tax = 'material-color';
												$variation_single_attr = $variation['attributes']['attribute_pa_'.$current_tax];

												if($variation_single_attr) {
													
													$term_slug = $variation_single_attr;
													$term = get_term_by( 'slug', $term_slug, 'pa_'.$current_tax );
													$attribute_img = get_field('image', 'pa_'.$current_tax.'_'.$term->term_id);
													$attribute_img_url = $attribute_img['url'];
													?>

													<?php if(!in_array($term_slug, $attr_material_colors)) : ?>

														<?php array_push($attr_material_colors, $term_slug); ?>

														<div class="field_choice color_attr" data-size-variations="<?php echo get_color_attributes(get_the_ID(), 'material-color', 'size', $term_slug); ?>" data-fabric-variations="<?php echo get_color_attributes(get_the_ID(), 'material-color', 'fabrics', $term_slug); ?>" data-current-variation="<?php echo $term_slug; ?>" autocomplete="off">
															<label class="choice_label">
																<div class="variation_item" data-variation-type="material-color"></div>
																<img src="<?php echo $attribute_img_url; ?>">
																<span class="span_title"><?php echo $term->name; ?></span>
															</label>
														</div>

													<?php endif; ?>
												<?php }
											} ?>

										<?php endif; ?>

									</div>
									<div class="clearfix"></div>
								</div>
								<div role="tabpanel" class="tab-pane" id="choose_fabric">
									<div class="cus_choose_option fabric_option">

										<?php if(!empty($variations)) : ?>

											<?php 
												$attr_fabrics = array();
											?>								

											<?php foreach ($variations as $variation) {
												$current_variation_attributes = $variation['attributes'];
												$current_tax = 'fabrics';
												$variation_single_attr = $variation['attributes']['attribute_pa_'.$current_tax];

												if($variation_single_attr) {

													$term_slug = $variation_single_attr;
													$term = get_term_by( 'slug', $term_slug, 'pa_'.$current_tax );
													$attribute_img = get_field('image', 'pa_'.$current_tax.'_'.$term->term_id);
													$attribute_img_url = $attribute_img['url'];
													?>

													<?php if(!in_array($term_slug, $attr_fabrics)) : ?>

														<?php array_push($attr_fabrics, $term_slug); ?>

														<div class="field_choice fabric_attr" data-size-variations="<?php echo get_color_attributes(get_the_ID(), 'fabrics', 'size', $term_slug); ?>" data-color-variations="<?php echo get_color_attributes(get_the_ID(), 'fabrics', 'material-color', $term_slug); ?>" data-current-variation="<?php echo $term_slug; ?>" autocomplete="off">
															<label class="choice_label">
																<div class="variation_item" data-variation-type="fabric"></div>
																<img src="<?php echo $attribute_img_url; ?>">
																<span class="span_title"><?php echo $term->name; ?></span>
															</label>
														</div>

													<?php endif; ?>
												<?php }
											} ?>

										<?php endif; ?>

									</div>
									<div class="clearfix"></div>
									<input type="hidden" value="<?php echo get_the_ID(); ?>" id="product_id">
									<input type="hidden" value="" id="sizeVar">
									<input type="hidden" value="" id="colorVar">
									<input type="hidden" value="" id="fabricVar">
									<input type="hidden" value="" id="selectedProdVarSize">
									<input type="hidden" value="" id="selectedProdVarColor">
									<input type="hidden" value="" id="selectedProdVarFabric">
									<input type="hidden" value="" id="selectedProdVarID">
									<input type="hidden" value="" id="selectedProdVarPrice">
									<input type="hidden" value="" id="productQuantity">
									<input type="hidden" value="" id="addToCart_variationID">
								</div>
								<div role="tabpanel" class="tab-pane" id="moreoption">
									<div class="other_option_design">
										<div class="main_title">
											<h3>Make it your own</h3>
											<p>Make your new sofa as unique as you are with our infinite amount of customisation options</p>
										</div>
										<div class="more_option_content">
											<div class="more_option_item">
												<div class="option_content">
													<h4>Fabrics</h4>
													<p>Our countless fabric options and combinations are guaranteed to impress.</p>
													<span class="sub-read-more" style="display: none;">Our broad range makes it simple for you to select a fabric you’ll love in any price range. If you already have a particular fabric in mind, you can bring it to us, and we can use it to upholster your sofa for you!</span>
													<a href="javascript:;" class="morelink">Read More <i class='fa fa-angle-down' aria-hidden='true'></i></a>
												</div>
												<div class="option_image">
													<img src="<?php echo get_template_directory_uri(); ?>/img/fabrics.jpg" alt="" />
												</div>
											</div>
											<div class="more_option_item">
												<div class="option_content">
													<h4>Dimensions</h4>
													<p>In a bit of a squeeze? Our customisable sofas can be made to size, solving any spatial problems.</p>
													<span class="sub-read-more" style="display: none;">Simply bring in the measurements you require, and our skilled craftsmen will create a sofa perfectly tailored to your needs.</span>
													<a href="javascript:;" class="morelink">Read More</a>
												</div>
												<div class="option_image">
													<img src="<?php echo get_template_directory_uri(); ?>/img/dimensions.jpg" alt="" />
												</div>
											</div>
											<div class="more_option_item">
												<div class="option_content">
													<h4>Legs</h4>
													<p>All of our sofas can be fitted with any of our extensive range of metal and timber legs.</p>
													<span class="sub-read-more" style="display: none;">Whether you’re looking for a tall, modern look or a traditional timber finish, we’re sure to have the legs to suit your sofa. Browse through our </span>
													<a href="javascript:;" class="morelink">Read More</a>
												</div>
												<div class="option_image">
													<img src="<?php echo get_template_directory_uri(); ?>/img/legs.jpg" alt="" />
												</div>
											</div>
											<div class="more_option_item">
												<div class="option_content">
													<h4>Dunlop Foam</h4>
													<p>Our sofa seat cushions are filled with premium Dunlop foam, produced by Australia’s number 1 foam manufacturer.</p>
													<span class="sub-read-more" style="display: none;">With a variety of seating options – ranging from plush Luxura foam and feather wrapped cushions to a firmer, more supportive Enduro foam or pocket springs – we’re sure to have a cushion for your comfort.</span>
													<a href="javascript:;" class="morelink">Read More</a>
												</div> 
												<div class="option_image">
													<img src="<?php echo get_template_directory_uri(); ?>/img/cushions.jpg" alt="" />
												</div>
											</div>
											<div class="more_option_item">
												<div class="option_content">
													<h4>Scatter Cushions</h4>
													<p>Scatter cushions are an excellent way to bring your sofa – and your room – to life.</p>
													<span class="sub-read-more" style="display: none;">Adding contrasting scatter cushions to your sofa will accentuate your style and can tie other elements of your room together.</span>
													<a href="javascript:;" class="morelink">Read More</a>
												</div>
												<div class="option_image">
													<img src="<?php echo get_template_directory_uri(); ?>/img/scatter-cushions.jpg" alt="" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		


</div>

<!-- Button trigger modal -->
<button style="display: none;" type="button" class="add_to_cart_btn" data-toggle="modal" data-target="#addToCartModal">
	Add To Cart modal popup
</button>

<!-- Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body"></div>
		</div>
	</div>
</div>




<?php do_action( 'woocommerce_after_single_product' ); ?>
