jQuery(function($){
	$(document).ready(function(){
		/* DESKTOP */
		/* DESKTOP:menu */
		$("#nav-bar-button-menu").click(function() {
			if( $("#nav-bar-menu").css("display") == 'none' ) {
			   if( $("#nav-bar-search").css("display") == 'none' ) {
					$("#nav-bar-menu").show( "slide", function() {});
					$("#nav-bar-search").hide( "slide", function() {}); 
			   } else {
				   $("#nav-bar-menu").show( 0, function() {});
				   $("#nav-bar-search").hide( 0, function() {}); 
			   }
			   $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu-selected');
			   $("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
			   if(!$('body').hasClass('search')) {
				   if ($(window).width() > 1180) {
						$("#container").animate({ 'margin-left': '240px'}, 400);
						$("#footer").animate({ 'margin-left': '240px' }, 400);
						$("#home-map").attr('class', 'home-map-resized');
						$("#nav-bar-menu").attr('class', 'nav-bar-menu');
					} else {
						$("#nav-bar-menu").attr('class', 'nav-bar-menu-shadow');
					} 	
				} else {
					$("#nav-bar-menu").attr('class', 'nav-bar-menu');
					$("#container").animate({ 'margin-left': '240px'}, 400);
					$("#footer").animate({ 'margin-left': '240px' }, 400);
				} 	   
			} else {
			   $("#nav-bar-search").hide( "slide", function() {});
			   $("#nav-bar-menu").hide( "slide", function() {});
			   $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
			   $("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
			   $("#container").animate({ 'margin-left': '0' }, 400);
			   $("#footer").animate({ 'margin-left': '0' }, 400);
			   $("#home-map").attr('class', 'home-map');
			}			
		});
		
		$( "#nav-bar-menu-back" ).click(function() {
			$("#nav-bar-menu").hide( "slide", function() {});
			$("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
			$("#container").animate({ 'margin-left': '0' }, 400);
			$("#footer").animate({ 'margin-left': '0' }, 400);
			$("#home-map").attr('class', 'home-map');
		});
		
		/* DESKTOP:search */
		$( "#nav-bar-button-search" ).click(function() {
			$("#nav-bar-limit-search").css('display', 'block');
			$("#nav-bar-limit-expand").css('display', 'none');
			$("#nav-bar-limit-shrink").css('display', 'none');
			if( $( "#nav-bar-search" ).css("display") == 'none' ) {
			   if( $("#nav-bar-menu").css("display") == 'none' ) {
					$("#nav-bar-search").show( "slide", function() {});
					$("#nav-bar-menu").hide( "slide", function() {}); 
					$("#query").focus();
			   } else {
				   $("#nav-bar-search").show( 0, function() {});
				   $("#nav-bar-menu").hide( 0, function() {}); 
					$("#query").focus();
			   }
			   $("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
			   $("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
			   if(!$('body').hasClass('search')) {
				   if ($(window).width() > 1180) {
						$("#container").animate({ 'margin-left': '240px'}, 400);
						$("#footer").animate({ 'margin-left': '240px' }, 400);
						$("#home-map").attr('class', 'home-map-resized');
						$("#nav-bar-search").attr('class', 'nav-bar-search');
					} else {
						$("#nav-bar-search").attr('class', 'nav-bar-search-shadow');
					} 
				} else {
					$("#nav-bar-search").attr('class', 'nav-bar-search');
					$("#container").animate({ 'margin-left': '240px'}, 400);
					$("#footer").animate({ 'margin-left': '240px' }, 400);
				} 
			} else {
			   $("#nav-bar-menu").hide( "", function() {});
			   $("#nav-bar-search").hide( "slide", function() {});
			   $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
			   $("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
			   $("#container").animate({ 'margin-left': '0' }, 400);
			   $("#footer").animate({ 'margin-left': '0' }, 400);
			   $("#home-map").attr('class', 'home-map');
			}		
		});
		$( "#nav-bar-search-back" ).click(function() {
			$("#nav-bar-search").hide( "slide", function() {});
			$("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
			$("#container").animate({ 'margin-left': '0' }, 400);
			$("#footer").animate({ 'margin-left': '0' }, 400);
			$("#home-map").attr('class', 'home-map');
		});
		
		/* MOBILE */
		/* MOBILE:menu */
		$( "#nav-bar-mobile-button-menu" ).click(function() {
			if( $("#nav-bar-menu").css("display") == 'none' ) {
			   $("#nav-bar-mobile-icon-menu").text('close');
			   $("#nav-bar-mobile-icon-menu").css('font-size', '36px');
			   $("#nav-bar-mobile-icon-menu").css('margin-top', '7px');
			   if( $("#nav-bar-search").css("display") == 'none' ) {
					$("#nav-bar-menu").show( 0, function() {});
					$("#nav-bar-search").hide( 0, function() {}); 
			   } else {
				   $("#nav-bar-menu").show( 0, function() {});
				   $("#nav-bar-search").hide( 0, function() {}); 
			   }
			   $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu-selected');
			   $("#nav-bar-mobile-button-search" ).attr('class', 'nav-bar-mobile-button-search');
			   $("#header-image").hide( 0, function() {}); 
								   
			} else {
			   $("#nav-bar-mobile-icon-menu").text('menu');
			   $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
			   $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
			   $("#nav-bar-search").hide( 0, function() {});
			   $("#nav-bar-menu").hide( 0, function() {});
			   $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
			   $("#nav-bar-mobile-button-search" ).attr('class', 'nav-bar-mobile-button-search');
			   $("#header-image").show( 0, function() {}); 
			}		
			$("#nav-bar-mobile-icon-search").text('search');		
		});
		
		/* MOBILE:search */
		$( "#nav-bar-mobile-button-search" ).click(function() {
			if( $("#nav-bar-search").css("display") == 'none' ) {
			   $("#nav-bar-mobile-icon-search").text('close');
			   if( $("#nav-bar-menu").css("display") == 'none' ) {
					$("#nav-bar-search").show( 0, function() {});
					$("#nav-bar-menu").hide( 0, function() {}); 
					$("#query").focus();
			   } else {
				   $("#nav-bar-search").show( 0, function() {});
				   $("#nav-bar-menu").hide( 0, function() {}); 
					$("#query").focus();
			   }
			   $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
			   $("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
			   $("#header-image").hide( 0, function() {}); 
				
			} else {
			   $("#nav-bar-mobile-icon-search").text('search');
			   $("#nav-bar-menu").hide( 0, function() {});
			   $("#nav-bar-search").hide( 0, function() {});
			   $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
			   $("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
			   $("#header-image").show( 0, function() {}); 
			}				
			$("#nav-bar-mobile-icon-menu").text('menu');
			$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
			$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
		});
		
		/* MOBILE:search menu expand */
		$( "#nav-bar-limit-toggle" ).click(function() {
			if ($(window).width() < 930) {
				if ( $("#nav-bar-limit-expand").css('display') == 'none' ) {
					$("#nav-bar-limit-search").css('display', 'none');
					$("#nav-bar-limit-shrink").css('display', 'none');
					$("#nav-bar-limit-expand").css('display', 'inline');
				} else {	
					$("#nav-bar-limit-search").css('display', 'block');
					$("#nav-bar-limit-shrink").css('display', 'inline');
					$("#nav-bar-limit-expand").css('display', 'none');	
				}
			}
		});
		
		if ($(window).width() < 930) {
			$("#nav-bar-limit-search").css('display', 'none');
			$("#nav-bar-limit-shrink").css('display', 'none');
			$("#nav-bar-limit-expand").css('display', 'inline');
		}
	});
		
	$( window ).resize(function() {
		if ($(window).width() < 1180) {
			if ($(window).width() > 930) {
				if ($("#nav-bar-menu").is(":visible")) {
					if ($("body").hasClass("search")) {
						$("#nav-bar-menu").hide( 0, function() {});
						$("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
					} else {
						$("#nav-bar-menu").hide( "slide", function() {});
						$("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
						$("#container").animate({ 'margin-left': '0' }, 400);
						$("#footer").animate({ 'margin-left': '0' }, 400);
					} 
				} 
				$("#home-map").attr('class', 'home-map');
				$("#nav-bar-mobile-icon-search").text('search');
				$("#nav-bar-mobile-icon-menu").text('menu');
				$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
				$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
				$("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
				$("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
			} else {
				if($('body').hasClass('search')) {
					$("#nav-bar-search").show( 0, function() {});
					$("#nav-bar-mobile-icon-search").text('close');
					$("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
					$("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
					$("#nav-bar-mobile-icon-menu").text('menu');
					$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
					$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
				}	
			}
		}
		
		if ($(window).width() > 930) {
			$("#header-image").show( 0, function() {}); 
			$("#nav-bar-limit-toggle").css('cursor', 'default');
			$("#nav-bar-limit-search").css('display', 'block');
			$("#nav-bar-limit-shrink").css('display', 'none');
			$("#nav-bar-limit-expand").css('display', 'none');
			if($('body').hasClass('search')) {
				$("#container").css('margin-left', '240px');
				$("#footer").css('margin-left', '240px');
			} else {
				$("#nav-bar-search").hide( "slide", function() {});
				$("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
				$("#container").animate({ 'margin-left': '0' }, 0);
				$("#footer").animate({ 'margin-left': '0' }, 0);
			}
		} else {
			$("#nav-bar-limit-toggle").css('cursor', 'pointer');
			$("#nav-bar-limit-search").css('display', 'none');
			$("#nav-bar-limit-shrink").css('display', 'none');
			$("#nav-bar-limit-expand").css('display', 'inline');
			$("#container").css('margin-left', '0px');
			$("#footer").css('margin-left', '0px');
		}
	});
});
