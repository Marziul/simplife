<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */

?>

    <div id="footer" class="popu_search_sec">
        <div class="container-fluid">
            <div class="row"> 
                
                <div class="follow_instagram">
                    
					 <?php dynamic_sidebar('footer-instagram'); ?>

                </div>
            </div>  
        </div>
        <div class="clearfix"></div>
    </div>
		
		<footer class="footer">
			<div class="container">
				<div class="row"> 					
					<div class="inner_footer"> 
						<div class="col-md-3 col-sm-6 footer_col">
						    <?php dynamic_sidebar('footer-1'); ?>
						</div>
						<div class="col-md-3 col-sm-6 footer_col">							
						    <?php dynamic_sidebar('footer-2'); ?>
						</div>
						<div class="col-md-3 col-sm-6 footer_col">
						    <?php dynamic_sidebar('footer-3'); ?>
						</div>
						<div class="col-md-3 col-sm-6 footer_col">						
						    <?php dynamic_sidebar('footer-4'); ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div> 
			</div>
		</footer>
	</div>
    <div class="chat_msg_icon">
		<a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/quick-msg.png" alt=""/></a>
	</div>

  </body> 
</html>

   

<?php wp_footer(); ?>


</body>
</html>
