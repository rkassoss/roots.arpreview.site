<?php get_header(); ?>
<div class="container">
	<div id="content" class=" row">
		<div id="main" class="col-sm-10 col-md-7 col-lg-8" role="main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
	if ( has_post_thumbnail() ) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		$thumbnail = $thumbnail[0];
	} else { $thumbnail = null; }
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >
				
				<div class="article-image">
					<img src="<?php echo $thumbnail; ?>" class="img-responsive"/>
				</div>
				
				<header>
					<h1 class="single-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-details">Posted on: <time datetime="<?php the_time('o-m-d') ?>" class="post-date date updated" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
						by <span class="vcard author">	
<span class="fn"><?php the_author_posts_link(); ?></span></span></div>
							
				</header> <!-- end article header -->
			
				<section class="e-content post_content clearfix" itemprop="articleBody">
				<?php		
							
					the_content(); 
					 
					if ( function_exists( 'sharing_display' ) ) {
					    sharing_display( '', true );
					}
				?>
				</section> <!-- end article section -->
			
			</article> <!-- end article -->
			
			<?php get_template_part('content/block','author-card'); ?>
			
			<?php get_template_part('content/block','prev-next-nav'); ?>
					
	<?php endwhile; ?>			
<?php endif; ?>
			
		</div> <!-- end #main -->
		
		<div class="hidden-xs hidden-sm col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-3">	
			<?php get_sidebar(); // sidebar 1 ?>
		</div>			
	</div> <!-- end #content -->
</div>

<?php get_footer(); ?>