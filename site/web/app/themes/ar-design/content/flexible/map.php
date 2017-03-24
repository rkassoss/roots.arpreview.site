<style type="text/css">

.acf-map {
	width: 100%;
	height: 350px;
	margin: 20px 0;
}
.container-full .acf-map {

	margin: 20px -15px;
}

</style>
<?php 
$location = get_sub_field('google_map');
$pin = get_sub_field('pin_image');
if ( $pin ) {
	$pinThumb = $pin['sizes']['thumbnail'];
} else {
	$pinThumb = null;
}
$pinText = get_sub_field('pin_text');
$snazzy = get_sub_field('snazzy_script');
if ( $snazzy ) {
	$mapStyle = $snazzy;
} else {
	$mapStyle = '[{"featureType":"all","elementType":"all","stylers":[{"saturation":-100},{"gamma":0.5}]}]';
}
if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><?php if ($pinText) echo $pinText; ?></div>
</div>
<?php endif; ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 13,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		styles		: <?php echo $mapStyle; ?>,
		scrollwheel: false,
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	// change zoom
	google.maps.event.addListenerOnce(map, 'bounds_changed', function() {
});

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	
	var imagePath = '<?php echo $pinThumb ; ?>';
	if ( !imagePath ) {
		imagePath = '';
	}
	
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon: imagePath,
	});
	
	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}
}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom(10);
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
		
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/

$(document).ready(function(){

	$('.acf-map').each(function(){

		render_map( $(this) );

	});

});

})(jQuery);
</script>

