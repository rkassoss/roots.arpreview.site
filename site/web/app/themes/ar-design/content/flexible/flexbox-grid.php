<?php 
$i = 1; 
$totalItems = count( get_sub_field('boxes_repeater') );

$parent = wp_get_post_parent_id( $post->ID );
$parentname = get_the_title($parent);

if( have_rows('boxes_repeater') ):

	echo '<div class="flex-grid">';

while( have_rows('boxes_repeater') ): the_row();
		
	if (get_sub_field('image')){ 
		
		$image = get_sub_field('image');
		$thumb = $image['sizes']['logo'];
		$text = get_sub_field('text');
		if ( get_sub_field('button_text') ) {
			$buttonText = get_sub_field('button_text');
		} else {
			$buttonText = null;
		}
		$target = get_sub_field('link_target');
		if ( $target == 'internal' ) {
			$link = get_sub_field('button_link');
		} else if ( get_sub_field('button_external_link') ) {
			$link = get_sub_field('button_external_link');
		} else {
			$link = null;
		}

		if ( get_sub_field('title') ) {
			$title = get_sub_field('title');
		}			
		if (get_sub_field("special_box")) {
			$special = get_sub_field("special_box");
			$specialT = get_sub_field("special_text");
		} else {
			$special = null;
		}
		
		if ( $totalItems % 4 == 0 ) {
			$width = '24%';
		} else {
			$width = '32%';
		}
		$colSize = null;
?>
		<div class="info-box col <?php if ( $link ) { echo ' clickable'; } ?> <?php if ($special) echo "special" ?>  wow fadeInUp" data-wow-delay="<?php echo $i * .1; ?>s" data-wow-duration="1s">
			<div class="box-header">
				<h3><?php echo $title; ?></h3>
				<h5><?php echo get_sub_field("subtitle"); ?></h5>
			</div>
			
			<div class="info-box-image">
				<img src="<?php echo $thumb; ?>" class="img-responsive" />
				<?php if ( $link ) { ?>
					<div class="actions">
						<a class="btn btn-primarys"<?php if ( $target == 'external' ) { echo 'target="_blank"';} ?> href="<?php echo $link; ?>"><?php echo $buttonText ?></a>
					</div>
				<?php } ?>
			</div>
			<div class="info-box-text"><?php echo $text; ?></div>
			
		</div> <!-- /.info-box --> 
<?php $i++; 
	}//FIX FOR EMPTY IMAGE
endwhile;
?>
	<style>
		.flexbox_items .info-box {
			margin-left: 1%; margin-bottom: 1%;
		}
		.flexbox_items .info-box.special:after {
			content: "<?php echo $specialT; ?>";
		}
		/*XS*/
		@media (max-width: 767px) {
			.flexbox_grid  .info-box {
				width: 100%;
			}
			.flexbox_grid .info-box.special:after {
				right: 0;
			}
			
		}
		@media (min-width: 767px) and (max-width: 1200px) {
			.flexbox_grid .info-box {
				width: 49%;
			}
			
		}
		@media (min-width: 1200px) {
			.flexbox_grid .info-box {
				width: <?php echo $width; ?>;
			}
		}
		
	</style>
<?php
	echo '</div>'; // END FLEXGRID
endif; ?>