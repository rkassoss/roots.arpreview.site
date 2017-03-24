<?php	
if( have_rows('images') ):

 	echo '<div class="slick-carousel">';

 	// loop through the rows of data
    while ( have_rows('images') ) : the_row();
		
		$image = null;
		$text = null;
		
		if ( get_sub_field('image') ) {
			$image = get_sub_field('image');
			$thumb = $image['sizes']['logo'];
		}
		if ( get_sub_field('text') ) {
			$text = get_sub_field('text');
		}
		$link = get_sub_field('link');
		
		echo '<div class="slick-item">';
		if ( $link ) {
			echo '<a href="' . $link . '">';
		}
		echo '<img class="img-responsive" src="' . $thumb . '" alt="' . $image['alt'] . '" />';
		if ( $link ) {
			echo '</a>';
		}
		echo '<div class="slick-item-text">'.$text.'</div>';
		echo '</div>';

	endwhile;

	echo '</div>';

endif;
	
?>
<script>
jQuery(document).ready(function( $ ) {
	$(".slick-carousel").slick({
		dots: false,
		infinite: true,
		speed: 10000,
		autoplay: true,
		autoplaySpeed: 0,
		cssEase: 'linear',
		slidesToShow: 5,
		slidesToScroll: 1,
		draggable: false,
		responsive: [
		{
		  breakpoint: 1100,
		  settings: {
		    slidesToShow: 4,
		  }
		},
		{
		  breakpoint: 750,
		  settings: {
		    slidesToShow: 3,
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
		    slidesToShow: 1,
		    draggable: true,
		  }
		}
		]
	});
});
</script>

