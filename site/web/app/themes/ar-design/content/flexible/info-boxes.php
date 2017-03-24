<?php 
$i = 1; 
$columns = get_sub_field('columns');

if ( $columns == '2' ) {
	$colSize = 'col-sm-6';
} else if ( $columns == '3' ) {
	$colSize = 'col-md-4';
} else if ( $columns == '4' ) {
	$colSize = 'col-md-3 col-sm-6';
} else {
	$colSize = 'col-sm-2';
}
if( have_rows('boxes_repeater') ):
	
	echo '<div class="row is-flex">';

while( have_rows('boxes_repeater') ): the_row();
	// vars
	$breakCol = null;
	$breakCol4 = null;
	if ( $columns == '2' ) {
		if ( $i % 2 == 0 ) {
			$breakCol = '<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>';
		}
	} else if ( $columns == '3' ) {
		if ( $i % 3 == 0 ) {
			$breakCol = '<div class="clearfix visible-md-block visible-lg-block"></div>';
		}
	} else if ( $columns == '4' ) {
		if ( $i % 4 == 0 ) {
			$breakCol4 = '<div class="clearfix visible-md-block visible-lg-block"></div>';
		}
		if ( $i % 2 == 0 ) {
			$breakCol = '<div class="clearfix visible-sm-block"></div>';
		}
	}
	
	if (get_sub_field('image')){ 
		
		$image = get_sub_field('image');
		$thumb = $image['sizes']['featured'];
		$text = get_sub_field('text');
		$buttonText = get_sub_field('button_text');
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
?>
	
		<div class="<?php echo $colSize; if ( $link ) { echo ' clickable'; } ?>  wow fadeInUp" data-wow-delay="<?php echo $i * .1; ?>s" data-wow-duration="1s">
			<div class="info-box">
				<h3><?php echo $title; ?></h3>
				<div class="info-box-image">
					<img src="<?php echo $thumb; ?>" class="img-responsive" />
				</div>
				<div class="info-box-text">
					<?php echo $text ?>
				</div>
				<?php if ( $link ) { ?>
				<div class="info-box-link">
					<a class="btn btn-primary" <?php if ( $target == 'external' ) { echo 'target="_blank"';} ?> href="<?php echo $link ?>"><?php echo $buttonText ?></a>
				</div>
				<?php } ?>
			</div> <!-- /.info-box --> 
		</div>
		<?php echo $breakCol; echo $breakCol4; ?>
<?php $i++; 
	}//FIX FOR EMPTY IMAGE
endwhile;
	echo '</div>'; // END ROW
endif; ?>
<script type='text/javascript'>
jQuery( document ).ready(function( $ ) {
	new WOW().init();
}); 
</script>