$(document).ready(function() { "use strict";
	
	var externalClick = function(event) {
		if( $(event.target).closest(".actived").length === 0 ) {
			
			if( $(".actived").length && $(event.target).closest("#sub_menu").length === 0 ) {
				$(".actived").trigger("click");
			}
			
		}
	};
	
	$(document).mousedown( externalClick );
	
	$( "#open_menu" ).click(function() {
		
		if( $(this).is( ".actived" ) ) {
			
			$(this).removeClass( "actived" );
			$(this).parent().find( "#sub_menu" ).css( "display", "block" ).stop().fadeOut( 100, function() {
				$(this).removeAttr( "style" );
			}).removeClass( "show" );
			
		} else {
			
			$(this).addClass( "actived" );
			$(this).parent().find( "#sub_menu" ).stop().fadeIn( 200, function() {
				$(this).removeAttr( "style" );
			}).addClass( "show" );
			
		}
		
		return false;
		
	});
    
});