<?php get_header(); ?>
<div class="container">
	<div id="content" class=" row">
		<div id="main" class="col-sm-10 col-md-7 col-lg-8" role="main">
			<?php if (is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>
				<?php echo category_description(); ?>
			<?php } ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<header>
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<div class="post-details"><time datetime="<?php the_time('o-m-d') ?>" class="post-date date updated" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
						by <span class="vcard author">	
<span class="fn"><?php the_author_posts_link(); ?></span></span></div>
					</header> <!-- end article header -->
				
					<section class="post_content e-content">
						<?php the_excerpt();
							if ( function_exists( 'sharing_display' ) ) {
								echo sharing_display();
							}
						?>
					</section> <!-- end article section -->
				</a>
				<?php 
					if ( function_exists( 'sharing_display' ) ) {
					    sharing_display( '', true );
					}
				?>
			</article> <!-- end article -->
					
			<?php endwhile; ?>	
			
			<?php if (function_exists('wp_bootstrap_page_navi')) { // if expirimental feature is active ?>
			
			<?php wp_bootstrap_page_navi(); // use the page navi function ?>

			<?php } else { // if it is disabled, display regular wp prev & next links ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
						<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
					</ul>
				</nav>
			<?php } ?>
			
			
			<?php endif; ?>
			
		</div> <!-- end #main -->
		
		<div class="hidden-xs hidden-sm col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-3">	
			<?php get_sidebar(); // sidebar 1 ?>
		</div>
		
	</div> <!-- end #content -->
</div>

<?php get_footer(); ?>