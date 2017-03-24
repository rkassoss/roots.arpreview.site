<div class="hero-slider">
	<div id="flexible-slideshow" class="carousel slide" data-ride="carousel" data-pause="hover" data-interval="9000">
		<div class="carousel-inner">
			<?php $row = 0; if( have_rows('carousel_repeater') ): ?>
			<?php while( have_rows('carousel_repeater') ): the_row();
			// vars
			if (get_sub_field('image')){ 
				$image = get_sub_field('image');
				$thumb = $image['sizes']['full-width'];
				$text = get_sub_field('text');
				$buttonText = get_sub_field('button_text');
				$link = get_sub_field('button_link');		
			?> 
			<div class="item <?php if($row == 0) { echo 'active'; } ?>" style="background-image:url(<?php echo $thumb; ?>)">
				<div class="content-box wow fadeIn">
					<div class="container">
						<h1 class="wow fadeInLeft" data-wow-delay=".1s" data-wow-duration="1s"><?php echo $text ?></h1>
						<div class="slider-link wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.2s">
							<a href="<?php echo $link ?>" class="btn btn-default"><?php echo $buttonText ?></a>
						</div>
					</div> <!-- END CONTAINER -->	 
				</div> <!-- END CONTENT BOX -->	
	
			</div> <!-- /.item --> 
			<?php $row++; 
			}//FIX FOR EMPTY IMAGE
			endwhile; ?>
			<?php endif; ?> 
		</div> <!-- END CAROUSEL INNER -->
		<ol class="carousel-indicators">
		<?php for($g=0; $g < $row; $g++){ ?>
			<li data-target="#flexible-slideshow" data-slide-to="<?php echo $g; ?>" class="<?php if ($g == 0) { echo 'active'; }?>"></li>
		<?php } ?>    
		</ol>
		<!-- Controls -->
		<a class="left carousel-control" href="#flexible-slideshow" role="button" data-slide="prev">
			<i class="fa fa-angle-left fa-2x"></i>
		</a>
		<a class="right carousel-control" href="#flexible-slideshow" role="button" data-slide="next">
			<i class="fa fa-angle-right fa-2x"></i>
		</a>
	</div> <!-- End of .carousel -->
</div> <!-- END #flexible-slideshow -->
<script type='text/javascript'>
jQuery( document ).ready(function( $ ) {
	new WOW().init();
}); 
</script>
