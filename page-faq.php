<?php
/**
 * Template Name: FAQ
 */

get_header(); ?>


    <div class="banner_section">
        <img src="<?php the_field('product_banner_image')?>" class="img-responsive banner_wd100" alt="">
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

    <section class="sim_faq_top">
        <div class="sim_faq_in container">
            <div class="row">
               <?php while(have_rows('faq_banner_block')): the_row(); ?>
                   <a href="<?php the_sub_field('banner_block_item_link'); ?>" class="col-md-2">
                        <div class="sim_faq_items">
                            <div class="faq_image">
                                <img src="<?php the_sub_field('banner_block_item_icon'); ?>" alt="Question">
                            </div>
                            <div class="faq_title">
                                <h2><?php the_sub_field('banner_block_item_title'); ?></h2>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<div class="header-height"></div>
    <div class="faq_section">
        <div class="container">
          <div class="faq_main_title"><h2><?php the_field('faqs_title')?></h2></div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('ordering_icon')?>" alt=""></span>
                <h4><?php the_field('ordering_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('ordering_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('ordering_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('ordering_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('shopping_icon')?>" alt=""></span>
                <h4><?php the_field('shopping_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('shopping_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('shopping_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('shopping_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('delivery_icon')?>" alt=""></span>
                <h4><?php the_field('delivery_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('delivery_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('delivery_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('delivery_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('payment_icon')?>" alt=""></span>
                <h4><?php the_field('payment_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('payment_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('payment_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('payment_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('returns_icon')?>" alt=""></span>
                <h4><?php the_field('returns_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('returns_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('returns_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('returns_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('warranty_icon')?>" alt=""></span>
                <h4><?php the_field('warranty_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('warranty_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('warranty_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('warranty_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="row faq_items_area">
            <div class="col-12 col-lg-3">
               <div class="faq_icon_area">
                <span><img src="<?php the_field('others_icon')?>" alt=""></span>
                <h4><?php the_field('others_heading')?></h4>
                </div>
            </div>
            <div class="col-12 col-lg-9">   
                <div class="faq_accordion_area">            
                    <div class="accordion">
                       <?php while(have_rows('others_items')): the_row(); ?>                       
                        <div class="accordion__head"><?php the_sub_field('others_item_heading'); ?></div>
                        <div class="accordion__body" style="display:none;">
                            <p><?php the_sub_field('others_item_details'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
