<?php
/*
Template Name: Sidebar Page
*/
?>
<?php get_header(); ?>

<div id="content">
	<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<div class="row">	
			<div id="main" class="col-sm-10 col-md-7 col-lg-8" role="main">	
				<?php if (trim($post->post_content) != "" ) { //HIDE CONTENT IF EMPTY 
					the_content();  
				} //END HIDE CONTENT WHEN EMPTY
		
				locate_template(array('content/flexible/setup/loop.php'), true);
				?>	
			</div>	<!-- END #MAIN -->
			<div class="hidden-xs hidden-sm col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-3">	
				<?php get_sidebar(); // sidebar 1 ?>
			</div>
		</div> <!-- END ROW -->
		<?php endwhile; ?>					
<?php endif; ?>
		
					
	</div>  <!-- END CONTAINER -->
</div> <!-- END #CONTENT -->

<?php get_footer(); ?>