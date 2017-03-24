<?php get_header();
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<div id="content" class="clearfix">

			<?php  //ADD HERO SLIDER
				if( have_rows('hero_slider') ) {
					get_template_part('content/block', 'hero-slider');
				}
			?>
			<div class="container">
				<div class="flexbox-test">	
					<h1>Flexbox Test</h1>
					<div class="row">
						<div class="col-md-6">
							<div class="media">
								<img class="media-figure" src="http://placehold.it/100x100" alt="">
								<div class="media-body">
									<h2>Media Objects With Flexbox</h2>
									<p>Sed eget leo quis sem efficitur malesuada. Quisque dapibus massa in enim tincidunt, sed varius purus vehicula. Proin quis nisi laoreet, suscipit magna eget, vestibulum eros.</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="media">
								<img class="media-figure" src="http://placehold.it/100x100" alt="">
								<div class="media-body">
									<h2>Media Objects With Flexbox</h2>
									<p>Sed eget leo quis sem efficitur malesuada. Quisque dapibus massa in enim tincidunt, sed varius purus vehicula. Proin quis nisi laoreet, suscipit magna eget, vestibulum eros.</p>
								</div>
							</div>
						</div>
					</div> <!-- END ROW -->
				</div>
				<?php echo the_content(); ?>
								
				<!-- SASSLINE TEST - REMOVE IT FOR PRODUCTION -->
				<?php get_template_part('content/block', 'sassline'); ?>
			</div> <!-- END CONTAINER -->
			
			<!-- FLEXIBLE CONTENT -->
			<?php locate_template(array('content/flexible/setup/loop.php'), true); ?>
						
		</div> <!-- end #content -->

<?php endwhile; ?>
<?php get_footer(); ?>