<footer role="contentinfo">

	<div id="inner-footer" class="container">
		
		<div class="row">
			
			<div class="col-sm-3 footer-item">
				<h4>Menu</h4>
			  	<?php
					wp_nav_menu(
					    array(
						'menu' => 'Footer Menu',
						// do not fall back to first non-empty menu
						'theme_location' => 'Footer Links',
						// do not fall back to wp_page_menu()
						'fallback_cb' => false
					  )
					);
				?>
			</div> <!-- END FOOTER-ITEM -->
				
			<div class="col-sm-3 footer-item">
				<h4>Contact Information</h4>
				<div class="contact-info clearfix">
					<?php 
						if (get_field('address','options')) {
							$address= get_field('address','options');
							$phone = get_field('telephone','options');
							$email = get_field('email','options');
					?>
					<div class="">
						<?php echo $address ?>
					</div>
					<div class="">
						<i class="fa fa-phone"></i><?php echo $phone ?>
						<div class="">
						<i class="fa fa-envelope"></i><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
						</div>
					</div>
					<?php } ?> <!-- END IF ADDRESS -->
				</div> <!-- END CONTACT-INFO -->
				<div class="social-media">
					<?php if( have_rows('social_media', 'options') ): ?>
					    <ul>
					
						    <?php while( have_rows('social_media', 'options') ): the_row();
						        	$icon = get_sub_field('social_media_icon');
						        	$link = get_sub_field('social_media_link');
						    ?>
						    <a href="<?php echo $link ?>" target="blank"><i class="fa <?php echo $icon ?> fa-2x"></i></a>
						
						    <?php endwhile; ?>
					
					    </ul>
					
					<?php endif; ?>
				</div> <!-- END SOCIAL-MEDIA -->
			</div> <!-- END FOOTER-ITEM -->	
			
			<div class="col-sm-6 footer-item">
				Another Widget
				
			</div> <!-- END FOOTER-ITEM -->
			
		</div> <!-- END ROW -->
		
		<div class="row">
			<div class="col-xs-12 text-center site-credit">
				Site by <a href="http://ardesign.us" target="_blank">AR Design</a>
			</div>
		</div>
		
	</div> <!-- END #INNER FOOTER CONTAINER -->
	
</footer>
			
<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>

</body>



</html>