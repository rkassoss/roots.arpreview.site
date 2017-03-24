<?php
add_editor_style('library/editor-style/editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'wp_bootstrap_add_active_class', 10, 2 );

// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
    function wp_bootstrap_theme_styles() { 
        
        // Original Build for AR Design
	    wp_register_style('origin-main', get_stylesheet_directory_uri() . '/library/dist/css/main.css');
        wp_enqueue_style( 'origin-main'); 
                
		//animate.css    
        wp_register_style('animate', get_template_directory_uri()  . '/js/wow/animate.css');
        wp_enqueue_style( 'animate');
        
        //slick carousel
        wp_register_style('slick', get_template_directory_uri()  . '/js/slick/slick.css');
        wp_enqueue_style( 'slick');
        
        //mobilemenu.css    
        wp_register_style('mobilemenu', get_template_directory_uri()  . '/js/mobilemenu/mobilemenu.css');
        wp_enqueue_style( 'mobilemenu');
        
        //slick theme
        wp_register_style('slick-theme', get_template_directory_uri()  . '/js/slick/slick-theme.css');
        wp_enqueue_style( 'slick-theme');
                
        wp_register_style( 'scss-style', get_stylesheet_directory_uri()  . '/library/css/main.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'scss-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );

// enqueue javascript
if( !function_exists( "wp_bootstrap_theme_js" ) ) {  
  function wp_bootstrap_theme_js(){

    if ( !is_admin() ){
      if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1) ) 
        wp_enqueue_script( 'comment-reply' );
    }

    // This is the full Bootstrap js distribution file. If you only use a few components that require the js files consider loading them individually instead
    
//  BEGIN BOOTSTRAP JS
/*
    wp_register_script( 'affix', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/affix.js', 
      array('jquery'), 
      '1.2' );
    
    wp_enqueue_script( 'affix' );
*/
      
/*
    wp_register_script( 'alert', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/alert.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'alert' );
*/
      
    wp_register_script( 'button', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/button.js', 
      array('jquery'), 
      '1.2' );
    
    wp_enqueue_script( 'button' );

	wp_register_script( 'carousel', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/carousel.js', 
      array('jquery'), 
      '1.2' );
    
    wp_enqueue_script( 'carousel' );

	wp_register_script( 'collapse', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/collapse.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'collapse' );

	wp_register_script( 'dropdown', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/dropdown.js', 
      array('jquery'), 
      '1.2' );
      
     wp_enqueue_script( 'dropdown' );
      
/*
    wp_register_script( 'modal', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/modal.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'modal' );
*/
      
/*
    wp_register_script( 'popover', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/popover.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'popover' );
*/
      
/*
    wp_register_script( 'scrollspy', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/scrollspy.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'scrollspy' );
*/
      
/*
    wp_register_script( 'tab', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/tab.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'tab' );
*/
      
/*
    wp_register_script( 'tooltip', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/tooltip.js', 
      array('jquery'), 
      '1.2' );
      
    wp_enqueue_script( 'tooltip' );
*/
      
    wp_register_script( 'transition', 
      get_template_directory_uri() . '/bower_components/bootstrap/js/transition.js', 
      array('jquery'), 
      '1.2' );
    wp_enqueue_script( 'transition' );
    	
// 	END BOOTSTRAP JS
	
	//Custom Bootstrap Classes
    wp_register_script( 'wpbs-js', 
      get_template_directory_uri() . '/library/bones-dist/js/scripts.d1e3d952.min.js',
      array('bootstrap'), 
      '1.2' );
      
    // From AR Design Build
    wp_register_script( 'origin-main', 
      get_template_directory_uri() . 'library/dist/js/scripts.js',
      array('jquery'), 
      '1.2' );
    
    wp_register_script( 'main', 
      get_template_directory_uri() . '/js/main.js',
      array('jquery'), 
      '1.2' );
  
    wp_register_script( 'modernizr', 
      get_template_directory_uri() . '/bower_components/modernizer/modernizr.js', 
      array('jquery'), 
      '1.2' );
    
    wp_register_script( 'wow', 
      get_template_directory_uri() . '/js/wow/wow.js', 
      array('jquery'), 
      '1.2' );
            
    wp_register_script( 'matchHeight', 
      get_template_directory_uri() . '/js/matchHeight/jquery.matchHeight.js', 
      array('jquery'), 
      '1.2' );
      
    wp_register_script( 'mobile-touch', 
      get_template_directory_uri() . '/js/mobile-touch-swipe.js', 
      array('jquery'), 
      '1.2' );
      
    wp_register_script( 'slick', 
      get_template_directory_uri() . '/js/slick/slick.min.js', 
      array('jquery'), 
      '1.2' );
      
    //pushy mobile nav
    wp_register_script( 'pushy', 
      get_template_directory_uri() . '/js/pushy.min.js', 
      array('jquery'), 
      '1.2', true );
      
    //pushy mobile nav
    wp_register_script( 'mobilemenu', 
      get_template_directory_uri() . '/js/mobilemenu/classie.js', 
      array('jquery'), 
      '1.2', true );
      
    wp_enqueue_script( 'wpbs-js' );
    wp_enqueue_script( 'main' );
   // wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'wow' );
//     wp_enqueue_script( 'matchHeight' );
	wp_enqueue_script( 'pushy' );
	 wp_enqueue_script( 'mobilemenu' );
    wp_enqueue_script( 'mobile-touch' );
    wp_enqueue_script( 'slick' );
    
  }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_js' );	
	
?>