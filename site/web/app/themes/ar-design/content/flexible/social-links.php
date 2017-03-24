<div class="social-media">
	<h2>Follow Us</h2>
		<?php if( have_rows('social_media', 'options') ): ?>
			<?php while( have_rows('social_media', 'options') ): the_row();
	        	$icon = get_sub_field('social_media_icon');
	        	$link = get_sub_field('social_media_link');
			?>
			<a href="<?php echo $link ?>" target="blank">
				<span class="fa-stack fa-lg">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa <?php echo $icon ?> fa-stack-1x fa-inverse"></i>
				</span>
			</a>
			<?php endwhile; ?>		
		<?php endif; ?>
</div> <!-- END SOCIAL-MEDIA -->