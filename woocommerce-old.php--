<?php
/* 

*/
?>
<?php get_header(); ?>
    
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

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                   
                    <?php woocommerce_content(); ?>
                    
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
