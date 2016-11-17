$(document).ready(function() { "use strict";
	
	$( "#combobox_courses #button" ).click(function() {
		
		if( $(this).is( ".actived" ) ) {
			$(this).removeClass( "actived" ).parent().find( "#sub_menu" ).stop().fadeOut( 200 ).removeClass( "show" );
		} else {
			$(this).addClass( "actived" ).parent().find( "#sub_menu" ).stop().fadeIn( 200 ).addClass( "show" );
		}
		
		return false;
		
	});
	$( "#combobox_courses #sub_menu #course a" ).click(function() {
		$(this).closest( "#combobox_courses" ).find( "#button" ).trigger( "click" );
	});
	
	$( "#error_display a" ).click(function() {
		
		if( $(this).is( ".actived" ) ) {
			$(this).removeClass( "actived" ).parent().find( "#sub_menu" ).stop().fadeOut( 200 ).removeClass( "show" );
		}else{
			$(this).addClass( "actived" ).parent().find( "#sub_menu" ).stop().fadeIn( 200 ).addClass( "show" );
		}
		
		return false;
		
	});
	
	$( ".nav-subjects a" ).click(function() {
		
		var selected = $(this).closest( ".sessions" ).find( "#subject.selected" ),
		    $this = $(this),
			width = selected.outerWidth(),
			height;
			
		if( $(this).is( "#next" ) && selected.next( "#subject" ).length ) {
			$(this).parent().find( "#prev" ).removeClass( "disabled" );
			height = selected.next().outerHeight();
			selected.closest( "#subjects_container" ).stop().animate({ height: height }, 300, function() {
				$(this).removeAttr( "style" );
			});
			selected.stop().animate({ marginLeft: -( width ) }, 300, function() {
				$(this).removeAttr( "style" ).removeClass( "selected" );
			});
			selected.next().addClass( "moving" ).stop().animate({ marginLeft: 0 }, 300, function() {
				$(this).removeAttr( "style" ).removeClass( "moving" ).addClass( "selected" );
				if( $(this).next( "#subject" ).length ) {
					$this.removeClass( "disabled" );
				}else{
					$this.addClass( "disabled" );
				}
			});
		}else if( $(this).is( "#prev" ) && selected.prev( "#subject" ).length ) {
			$(this).parent().find( "#next" ).removeClass( "disabled" );
			height = selected.prev().outerHeight();
			selected.closest( "#subjects_container" ).stop().animate({ height: height }, 300, function() {
				$(this).removeAttr( "style" );
			});
			selected.stop().animate({ marginLeft: ( width ) }, 300, function() {
				$(this).removeAttr( "style" ).removeClass( "selected" );
			});
			selected.prev().addClass( "moving right" ).stop().animate({ marginLeft: 0 }, 300, function() {
				$(this).removeAttr( "style" ).removeClass( "moving right" ).addClass( "selected" );
				if( $(this).prev( "#subject" ).length ) {
					$this.removeClass( "disabled" );
				}else{
					$this.addClass( "disabled" );
				}
			});
		}
		
		return false;
		
	});
	
	$( "#semesters a" ).click(function() {
		
		var index = $(this).index(),
		    session = $( "#subjects_wrapper .sessions:eq(" + index + ")" ),
			selected = $( "#subjects_wrapper .sessions.selected" );
		
		if( session.length && !session.is( ".selected" ) ) {
			$(this).parent().find( "a.selected" ).removeClass( "selected" );
			$(this).addClass( "selected" );
			session.closest( "#subjects_wrapper" ).css( "height", selected.outerHeight() );
			selected.css( "display", "block" ).stop().fadeOut( 200, function() {
				$(this).removeAttr( "style" ).removeClass( "selected" );
			}).removeClass( "selected" );
			session.stop().fadeIn( 200, function() {
				$(this).removeAttr( "style" ).addClass( "selected" ).removeClass( "moving-in" );
			}).addClass( "moving-in" );
			
			setTimeout(function() {
				session.closest( "#subjects_wrapper" ).stop().animate({ height: session.outerHeight() }, 200, function() {
					$(this).removeAttr( "style" );
				});
			}, 200);
		}
		
		return false;
		
	});
	
	$( "#showComments" ).click(function() {
		
		if( $(this).is( ".selected" ) ) {
			$(this).removeClass( "selected" ).find( "#text" ).text( "Mostrar observações" );
			$( "#comments_container" ).stop().animate({ opacity: 0, height: "hide" }, 300 );
		}else{
			$(this).addClass( "selected" ).find( "#text" ).text( "Esconder observações" );
			$( "#comments_container" ).css( "opacity", 0 ).stop().animate({ opacity: 1, height: "show" }, 300 );
		}
		
	});
	
});