<div class="ar_carousel">

				<div  id="hero-slider"  class="carousel slide" data-ride="carousel" data-pause="hover" data-interval="9000">
					<div class="carousel-inner">
						<?php $row = 0; if( have_rows('ar_carousel') ): ?>
						<?php while( have_rows('ar_carousel') ): the_row();
						// vars
						if (get_sub_field('carousel_image')){ 
							$image = get_sub_field('carousel_image');
							$thumb = $image['sizes']['full-width'];
							$head = get_sub_field('carousel_caption');
							if ($image['width'] < $image['height']) {
								$addClass = 'vertical';
							}
							else
								$addClass = 'horizontal'
							
							
							?> 

							<div class="item <?php if($row == 0) { echo 'active'; } ?>">
								<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" class="<?php echo $addClass ?>"/>
							</div> <!-- /.item --> 
							
							<?php $row++; 
							}//FIX FOR EMPTY IMAGE
							endwhile; ?>
						<?php endif; ?> 
					</div>
					<ol class="carousel-indicators">
					    <?php for($g=0; $g < $row; $g++){ ?>
					    <li data-target="#hero-slider" data-slide-to="<?php echo $g; ?>" class="<?php if ($g == 0) { echo 'active'; }?>"></li>
					    <?php } ?>    
					</ol>
					<!-- Controls -->
					  <a class="left carousel-control" href="#hero-slider" role="button" data-slide="prev">
					    <i class="fa fa-angle-left fa-2x"></i>
					  </a>
					  <a class="right carousel-control" href="#hero-slider" role="button" data-slide="next">
					   <i class="fa fa-angle-right fa-2x"></i>
					  </a>
			</div> <!-- End of .carousel -->
	</div>
	
	<script type='text/javascript'>
 jQuery( document ).ready(function( $ ) {
 	 new WOW().init();
}); 
</script>
