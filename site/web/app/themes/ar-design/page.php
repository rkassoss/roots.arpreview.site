<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
<div id="content">
	<div class="container">
				
		<?php if (trim($post->post_content) != "" ) { //HIDE CONTENT IF EMPTY ?>
		<div class="row">
			<div id="main" class="col-sm-10 col-md-7 col-lg-8" role="main">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>	
			</div>		
		</div>
		<?php } //END HIDE CONTENT WHEN EMPTY ?>	
		
								
		<?php endwhile; ?>					
		<?php endif; ?>
		
					
	</div>  <!-- END CONTAINER -->
	<?php locate_template(array('content/flexible/setup/loop.php'), true); ?>
</div> <!-- END #CONTENT -->

<?php get_footer(); ?>