<?php
	global $counters;
	if( have_rows('flexible_content') ):
		
		include(get_template_directory().'/content/flexible/setup/functions.php');
		
		if( !isset( $counters ) )
		{
			// initialize counter
			$counters = 1;
		}
		
		while ( have_rows('flexible_content') ) : the_row();
		
			$skipContainer = 0;
	        
	        //CHECK IF YOU SHOULD SKIP THE CONTAINER
	        
	        if ( is_page_template( 'page-sidebar.php' ) ) {
			    $skipContainer = 1;
			}
	        
	        //END CHECK
		
	        startContainer($counters, $skipContainer);
	        
	        if( get_row_layout() == 'columns' ) {
				include(get_template_directory().'/content/flexible/columns.php');
	        } // END LAYOUT COLUMNS
	        
	        else if ( get_row_layout() == 'info_boxes' ) {
		        include(get_template_directory().'/content/flexible/info-boxes.php');
	        } // END LAYOUT INFO BOXES REPEATER
	        
	        else if ( get_row_layout() == 'flexbox_grid' ) {
		        include(get_template_directory().'/content/flexible/flexbox-grid.php');
	        } // END LAYOUT FLEXBOX GRID REPEATER
	        
	        else if ( get_row_layout() == 'slideshow' ) {
		        include(get_template_directory().'/content/flexible/slideshow.php');
	        } // END LAYOUT SLIDESHOW
	        
	        else if ( get_row_layout() == 'carousel' ) {
		        include(get_template_directory().'/content/flexible/carousel.php');
	        } // END LAYOUT OWL CAROUSEL
	        
	        else if ( get_row_layout() == 'general_info' ) {
		        include(get_template_directory().'/content/flexible/general-info.php');
	        } // END LAYOUT GENERAL INFO
	        
	        else if ( get_row_layout() == 'contact_form' ) {
		        include(get_template_directory().'/content/flexible/contact-form.php');
	        } // END LAYOUT CONTACT FORM
	        
	        else if ( get_row_layout() == 'social_links' ) {
		        include(get_template_directory().'/content/flexible/social-links.php');
	        } // END LAYOUT SOCIAL LINKS
	        
	        else if ( get_row_layout() == 'map' ) {
		        include(get_template_directory().'/content/flexible/map.php');
	        } // END LAYOUT MAP
			endContainer();
			$counters++;
    endwhile; // END WHILE CONTENT
    endif;
			
?>