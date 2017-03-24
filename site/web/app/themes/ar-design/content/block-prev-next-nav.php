<div class=" prev-next-posts">
	<div class="row">	
		<?php
		$prev_post = get_previous_post();
		if (!empty( $prev_post )): 
		?>
		<div class="col-xs-6 clickable">	
			<div class="prev-post clearfix">
				<h3>Previous Read</h3>
		<?php
		$prevID = $prev_post->ID;
		echo ard_getPostThumb($prevID,'thumbnail');
		?>
		<a href="<?php echo $prev_post->guid ?>">
			<?php echo $prev_post->post_title ?>
			<div class="post-details"><time datetime="<?php echo mysql2date('M j, Y', $prev_post->post_date); ?>" class="post-date date updated" pubdate><?php echo mysql2date('M j, Y', $prev_post->post_date); ?></time>
			 </div>	
		</a>
			</div>
		</div> <!-- END COL XS 6 -->
		<?php endif ?>		
		<?php
		$next_post = get_next_post();
		
		
		if (!empty( $next_post )):
		?>			
		<div class="col-xs-6 clickable">	
			<div class="next-post clearfix">
				<h3>Next Read</h3>
		<?php
		$nextID = $next_post->ID;
		echo ard_getPostThumb($nextID,'thumbnail');
		?>
		<a href="<?php echo $next_post->guid; ?>">
			<?php echo $next_post->post_title; ?>
			<div class="post-details"><time datetime="<?php echo mysql2date('M j, Y', $next_post->post_date); ?>" class="post-date date updated" pubdate><?php echo mysql2date('M j, Y', $next_post->post_date); ?></time>
			 </div>
		</a>
			</div> 
		</div>	<!-- END COL XS 6 -->	
		<?php endif; ?>			
	</div> <!-- END ROW -->						
</div> <!-- END PREV_NEXT_POSTS -->