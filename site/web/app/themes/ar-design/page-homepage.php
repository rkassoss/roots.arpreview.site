<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
	<div class="container">		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
		<h1><?php the_title() ?></h1>
	
	</div>					
	<?php endif; ?>
	</div>		        

<?php get_footer(); ?>