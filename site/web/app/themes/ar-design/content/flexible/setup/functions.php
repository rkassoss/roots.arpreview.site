<?php 
	function startContainer($boxId = 0, $skipContainer = 0){
		$background = null;
		$backColor = null;
		$backImage = null;
		$textClass = 'dark';
		$backSet = null;
		$backCSS = null;
		$backClass = null;
		$containerClass = null;
		$noPadding = null;
		$sectionClass = null;
		$boxType = get_row_layout() ;
		$width = get_sub_field('container_width');
		$head = get_sub_field('heading');
		$subhead = get_sub_field('sub_heading');
		if ( get_sub_field('class_field') ) {
			$sectionClass = get_sub_field('class_field');
		}
		if ( $width == 'full' ) {
			$containerClass = "container-fluid";
		} else if ('contained') {
			$containerClass = 'container';
		} else {
			$containerClass = null;
		} 	
		
		
		$background = get_sub_field('background');
		if ( $background == 'color' ) {
			$backColor = get_sub_field('background_color');
			if ($backColor) { 
				$backCSS = 'background-color:'.$backColor;
			}
		} else if ( $background == 'image' ) {
			$backImage = get_sub_field('background_image');
			if ( $backImage ) {
				$backCSS = 'background-image:url('.$backImage['url'].');';
				$backClass = 'background-image';
				$backSet = get_sub_field('background_settings');
				if ($backSet){
					if ( in_array('fixed', $backSet) ) {
						$backClass .= ' back-fixed';
					} 
					if ( in_array('repeat-x', $backSet) ) {
						$backClass .= ' back-repeat-x';
					} 
					if ( in_array('repeat-y', $backSet) ) {
						$backClass .= ' back-repeat-y';
					} 
					if ( in_array('no-repeat', $backSet) ) {
						$backClass .= ' back-no-repeat';
					}
					if ( in_array('contain', $backSet) ) {
						$backClass .= ' back-contain';
					}
					
				} else { $backClass = ' background-cover '; }
			}
		}
		if ( get_sub_field('text_color') == 'light' ) {
			$textClass = ' text-light';
		}
			
		
		echo '<div id="box-'.$boxId.'" class="flexible-block '.$backClass .' '.$textClass.' '.$boxType.' '.$sectionClass.'" style="'. $backCSS .'">';
		if ( $skipContainer == 0 ) {
			echo '<div class="'.$containerClass.'">';
		}
		if ( ( $head ) || ( $subhead ) ) {
			echo '<div class="block-header">';
			if ($head) echo '<h2>'.$head.'</h2>';
			if ($subhead) echo '<h3>'.$subhead.'</h3>';
			echo '</div>';
		}
		
	} // END START CONTAINER
	
	
	function endContainer( $skipContainer = 0 ){
		if ($skipContainer == 0) {
			echo '</div>';
		}
		
		echo "</div>";
	}
?>