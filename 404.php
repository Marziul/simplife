<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

    <div class="header-height"></div>
    <section class="page_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text_404">
                        <h1>404</h1>
                        <h3>Ooopps.! The Page you were looking for, couldn't be found.</h3>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">Go back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>