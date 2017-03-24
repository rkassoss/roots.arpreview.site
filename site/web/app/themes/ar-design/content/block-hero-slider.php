<div class="hero-slider">

	<div  id="hero-slider"  class="carousel slide" data-ride="carousel" data-pause="hover" data-interval="9000">
		<div class="carousel-inner">
			<?php $row = 0; if( have_rows('hero_slider') ): ?>
			<?php while( have_rows('hero_slider') ): the_row();
			// vars
			if (get_sub_field('slider_image')){ 
				$image = get_sub_field('slider_image');
				$thumb = $image['sizes']['full-width'];
				$head = get_sub_field('slider_headline');
				$sub = get_sub_field('slider_subheader');
				$button = get_sub_field('slider_button_text');
				$link = get_sub_field('slider_button_link');
				$advanced = get_sub_field('advanced_options');
				$bgColor = 'transparent';
				if ($advanced) {
					if (get_sub_field('background_color')) {
						$bgColor = get_sub_field('background_color');
					}
					$bgPosition = get_sub_field('background_position');
					$bgSize = get_sub_field('background_size');
					$bgRepeat = get_sub_field('background_repeat');
					$bgOpacity = get_sub_field('background_opacity');
					$bgOpacityIE = $bgOpacity*100;
				
					$bgStyle = 'background-position: '.$bgPosition.';
								background-size: '.$bgSize.';
								background-repeat: '.$bgRepeat.';
								opacity: '.$bgOpacity.';
								filter: alpha('.$bgOpacityIE.');';
				}
				
			?> 
			<div class="item <?php if($row == 0) { echo 'active'; } ?>" style="background-color: <?php echo $bgColor; ?>">
				<div class="item-image" style="background-image:url(<?php echo $thumb; ?>);<?php echo $bgStyle; ?>"></div>
				<div class="content-box wow fadeIn">
					<div class="container">
							
						<h2 class="head wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1s">
							<?php echo $head ?>
						</h2>
						<h3 class="subhead wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.25s">
							<?php echo $sub ?>
						</h3>
						<div class="slider-link wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.5s">
							<a href="<?php echo $link ?>" class="btn btn-default"><?php echo $button ?></a>
						</div>
									
					</div> <!-- END CONTAINER -->	 
				</div> <!-- END CONTENT BOX -->	

			</div> <!-- /.item --> 
			<?php $row++; 
			}//FIX FOR EMPTY IMAGE
			endwhile; ?>
			<?php endif; ?> 
		</div> <!-- END CAROUSEL INNER -->
		<ol class="carousel-indicators blank">
		<?php for($g=0; $g < $row; $g++){ ?>
			<li data-target="#hero-slider" data-slide-to="<?php echo $g; ?>" class="<?php if ($g == 0) { echo 'active'; }?>"></li>
		<?php } ?>    
		</ol>
		<?php if ( $row > 1 ) { ?>
		<!-- Controls -->
		<a class="left carousel-control" href="#hero-slider" role="button" data-slide="prev">
			<i class="fa fa-angle-left fa-2x"></i>
		</a>
		<a class="right carousel-control" href="#hero-slider" role="button" data-slide="next">
			<i class="fa fa-angle-right fa-2x"></i>
		</a>
		<?php } ?>
	</div> <!-- End of .carousel -->
</div>
	
<script type='text/javascript'>
jQuery( document ).ready(function( $ ) {
	new WOW().init();
}); 
</script>
