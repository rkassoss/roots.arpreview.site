jQuery( document ).ready(function( $ ) {
	
	$(".clickable").click(function(){
    
    if ( $(this).find("a").attr("target") == '_blank'){ // FOR DATA TARGET _BLANK 
    	window.open( $(this).find("a").attr("href"), '_blank' );
	} else if ($(this).find("a").data("toggle") == 'modal') { // FOR BOOTSTRAP MODAL
		var target = $(this).find("a").attr("href");
		$(target).modal('show');
	} else { 
    	window.location = $(this).find("a").attr("href"); // REGULAR <a>
	}
    return false;
	});
	
	// SLIDE PUSH MOBILE MENU
	var showRightPush = document.getElementById( 'navbar-toggle' ),
		menuRight = document.getElementById( 'mobilemenu' ),
		body = document.body;
	showRightPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'cbp-spmenu-push-toleft' );
		classie.toggle( menuRight, 'cbp-spmenu-open' );
	};
}); 	