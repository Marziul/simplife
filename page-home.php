<?php
/**
 * Template Name: Home
 */

get_header(); ?>

  
<div class="banner_section">
    <div id="homecarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#homecarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homecarousel" data-slide-to="1"></li>
            <li data-target="#homecarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php $sactive = 1; while(have_rows('home_slider')): the_row(); ?>
                <div class="item <?php if ($sactive == 1) echo ' active'; ?>">
                    <img src="<?php the_sub_field('slide_image'); ?>" class="img-responsive banner_wd100" alt=""/>
                </div>
            <?php  $sactive++;  endwhile; ?>                   

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#homecarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#homecarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>			
</div>
    <div class="our_serv_section">
        <div class="container">
            <div class="row">               
               <?php while(have_rows('service_area')): the_row(); ?>                   
                    <div class="col-md-3 col-sm-6 col-xs-6 serv_col">
                        <div class="serv_img">
                            <img src="<?php the_sub_field('service_icon'); ?>" class="wd100 wdauto" alt=""/>
                        </div>
                        <div class="serv_txt">
                            <span class="semifont"><?php the_sub_field('service_text'); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>  
            </div>
        </div>
    </div>
    
     <div class="room_popu_collect">
        <div class="room_tabs_section">
           
              <?php $cat_active = 1; $film_genres = get_terms('portfolio_categories'); // get all the genres ?>
           
            <div class="container-fluid">
                <div class="row"> 
                    <div class="inner_room_tabs">
                      
                        <ul class="nav nav-tabs" role="tablist">
                            <?php foreach($film_genres as $film_genre) { ?>
                              <li role="presentation" class="<?php if ( 1 == $cat_active ) echo ' active'; ?>">
                                <a href="#<?php echo $film_genre->slug ?>" class="semifont" aria-controls="<?php echo $film_genre->slug ?>" role="tab" data-toggle="tab"><?php echo $film_genre->name ?></a>
                                
                              </li>
                            <?php $cat_active++; } ?>
                        </ul>
                        
                        
                    <div class="tab-content">

                        <?php $is_active; foreach($film_genres as $film_genre) { ?>
                          
                          <div role="tabpanel" class="tab-pane <?php if ( 1 == $is_active ) echo ' active'; ?>" id="<?php echo $film_genre->slug ?>">
                            <div class="room_list">

                            <?php 	
                            $args = array(
                              'post_type' => 'room',
                              'showposts' => 3,
                              'orderby' => 'title',
                              'order' => 'ASC',
                              'tax_query' => array(
                                array(
                                  'taxonomy' => 'portfolio_categories',
                                  'field' => 'slug',
                                  'terms' => $film_genre->slug
                                )
                              )
                            );
                            $films = new WP_Query( $args );		
                            ?>

                            <?php if ( $films->have_posts() ) : // make sure we have films to show before doing anything?>
                            
                            <?php while ( $films->have_posts() ) : $films->the_post(); ?>	
                                   
                            <div class="col-sm-4 room_col_4">
                                <div class="room_content">
                                   
                                    <?php the_post_thumbnail(); ?>
                                    <div class="hover_effect">
                                        <div class="hover_content">
                                            <h4 class="semifont"><?php the_title(); ?></h4>
                                            <a href="<?php the_permalink(); ?>">Explore</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                              
                                <?php endwhile; ?>
                                <?php wp_reset_query() ?>
                                
                            <?php  $is_active++; endif; ?>

                          </div>
                          </div>
                         <?php  }  ?>

                    </div><!-- tab-content -->
                       
                        
                    
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    
        
        
        <div class="popu_collect_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom_title text-center">
                            <h3 class="semifont"><?php the_field('popular_collections_title')?></h3>
                        </div>
                    </div>
                    <div class="pop_collect_list">
                       
                        <?php while(have_rows('popular_collections')): the_row(); ?>
                           <div class="col-sm-4 pop_col4">
                            <div class="inner_collect">	
                                <div class="collect_img">	
                                    <img src="<?php the_sub_field('popular_collections_image')?>" class="img-responsive" alt=""/>
                                </div>
                                <h4 class="semifont"><?php the_sub_field('popular_coll_item_title')?></h4>
                                <p><?php the_sub_field('popular_coll_item_details')?></p>
                            </div>
                            </div>
                        <?php endwhile; ?>                        
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="feat_produt_review">
        <div class="feature_product_sec">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="custom_title text-center">
                            <h3 class="semifont"><?php the_field('featured_products_title')?></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="feture_prod_list">
                        <ul>
                            <?php while(have_rows('featured_products')): the_row(); ?> 
                                <li><a href="<?php the_sub_field('featured_product_link'); ?>"><div class="feature_img"><img src="<?php the_sub_field('featured_products_image'); ?>" alt="" /></div><span><?php the_sub_field('featured_products_item_title'); ?></span></a></li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="clearfix"></div> 
                    </div>
                </div>  
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="popu_search_sec">
            <div class="container-fluid"> 
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="custom_title text-center">
                            <h3 class="semifont"><?php the_field('popular_searches_title', 'option'); ?></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="search_list">
                        <ul>
                           <?php while(have_rows('popular_searches_items', 'option')): the_row(); ?>
                              <li><a href="<?php echo home_url(); ?>/?s=<?php the_sub_field('popular_searches_item', 'option'); ?>"><?php the_sub_field('popular_searches_item', 'option'); ?></a>
                               </li>
                            <?php endwhile; ?>
                           
<!--
                            
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#">#</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="customer_review_sec">
            <div class="container-fluid">
                <div class="row">  
                    <div class="col-md-12">
                        <div class="custom_title text-center">
                            <h3 class="semifont"><?php the_field('reviews_section_title')?> 
								<a href="<?php the_field('reviews_view_all_link')?>" class="viewall"><?php the_field('reviews_view_all_text')?> <i class="fa fa-angle-right"></i></a>
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="overall_rating">
                        <span class="rating_value">4.5</span>
                        <div class="rating_review">
                            <div class="star_rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span>20 Reviews</span>
                        </div>
                    </div>
                    <div class="client_review">
                        <div class="owl-carousel owl-theme review_carousel custom_product">
                          
                           <?php $sl = new WP_Query( array(

                                'post_type' => 'reviews',
                                'posts_per_page' => -1

                            )); ?>

                            <?php while( $sl->have_posts('reviews') ) : $sl->the_post(); ?>

                                <div class="item">
                                    <div class="review_col">
                                        <div class="review_cont">
                                            <div class="star_rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <?php the_field('reviews_details')?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="google_map_sec">
       <?php the_field('site_map')?>
        <div class="visit_showroom">
            <a href="<?php the_field('visit_our_showroom_link')?>"><?php the_field('visit_our_showroom_btn_text')?></a>
        </div>
    </div>
    <div class="newsletter_sec">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="custom_title text-center">
                        <h3 class="semifont">SUBSCRIBE TO OUR NEWSLETTER</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="newsletter_form">
                <form action="#" method="">
                    <div class="form_field">
                        <input type="text" class="form-control" name="name" placeholder="NAME" />
                    </div>
                    <div class="form_field">
                        <input type="text" class="form-control" name="name" placeholder="POSTCODE" />
                    </div>
                    <div class="form_field email_field">
                        <input type="text" class="form-control" name="name" placeholder="EMAIL" />
                    </div>
                    <div class="form_btn">
                        <input type="submit" class="subscribe_btn" name="submit" value="Subscribe" />
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    


<?php get_footer(); ?>
