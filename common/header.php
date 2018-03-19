<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts', 'skeleton','style', 'style-mobile', 'lightbox.min'));

    echo head_css();
    ?>
    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('jquery-3.3.1.min', 'javascripts/vendor'); ?>
	<?php queue_js_file('jquery-ui', 'javascripts/vendor'); ?>
	<?php queue_js_file('jquery-fullscreen', 'javascripts/vendor'); ?>
	<?php queue_js_file('jspdf.min', 'javascripts/vendor'); ?>
    <?php queue_js_file('lightbox.min', 'javascripts/vendor'); ?>
    
    <?php echo head_js(); ?>
    
    <!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,600|Roboto|Roboto+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    <!-- lightbox -->
    <script>
		lightbox.option({
		  'resizeDuration': 0,
		  'fadeDuration': 400,
		  'imageFadeDuration': 0,
		  'albumLabel': '%1/%2',
		  'disableScrolling': true,
		})
	</script>
	
	<!-- slick -->
	<!-- <link rel="stylesheet" type="text/css" href="https://editionstest.ehri-project-stage.eu/themes/ehri/slick/slick.css"/> -->
	<link rel="stylesheet" type="text/css" href="themes/ehri/slick/slick.css"/>
</head>
 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
 
<!-- url and customized functions-->
<?php $documentRoot = "http://localhost/Omeka"; ?>
<?php $include = "./themes/ehri/common/custom.php"; ?>
<?php include($include); ?>

<!-- desktop navbar -->
   			<div class="nav-bar">
				<div class="nav-bar-button-search" id="nav-bar-button-search">
					<div id="nav-bar-icon-search" class="material-icons">search</div>
					<div id="nav-bar-icon-text-search">SEARCH</div>
				</div>
				<div class="nav-bar-button-menu" id="nav-bar-button-menu" >
					<div id="nav-bar-icon-menu" class="material-icons">menu</div>
					<div id="nav-bar-icon-text-menu">MENU</div>
				</div>
			</div>
						
			<div class="nav-bar-search" id="nav-bar-search">
				<div class="nav-bar-search-back" id="nav-bar-search-back"><div class="nav-bar-back-icon">chevron_left</div></div>
				<div id="search-container" role="search">
					<?php echo search_form(array('submit_value' => 'search')); ?>
                </div>
                <div class="nav-bar-search-category">Applied facets</div>
                <div class="nav-bar-search-item">Jewish Museum in Prague<div class="nav-bar-search-item-close">close</div></div>
                <div class="nav-bar-search-line"></div>
                <div id="nav-bar-limit-toggle"><div class="nav-bar-search-category">Limit your search</div><div id="nav-bar-limit-expand">keyboard_arrow_down</div><div id="nav-bar-limit-shrink">keyboard_arrow_up</div></div>
                <div id="nav-bar-limit-search">
					<div class="nav-bar-search-group">Collection</div>
					<div class="nav-bar-search-item">Jewish Museum in Prague (11)</div>
					<div class="nav-bar-search-group">Subjects</div>
					<div class="nav-bar-search-item">Death (9)</div>
					<div class="nav-bar-search-item">Diseases (9)</div>
					<div class="nav-bar-search-item">Forced labour (9)</div>
					<div class="nav-bar-search-item">Labour camps (9)</div>
					<div class="nav-bar-search-item">Concentration camps (8)</div>
					<div class="nav-bar-search-item">Documentation Action (in Prague) (8)</div>
					<div class="nav-bar-search-item">Housing (8)</div>
					<div class="nav-bar-search-item">Men (8)</div>
					<div class="nav-bar-search-item">SS men (8)</div>
					<div class="nav-bar-search-item">Transports from Terezín (8)</div>
					<div class="nav-bar-search-item">Food and eating (7)</div>
					<div class="nav-bar-search-item">Camp inmates (6)</div>
					<div class="nav-bar-search-item">Children (6)</div>
					<div class="nav-bar-search-item">Executions (6)</div>
					<div class="nav-bar-search-item">Transports (6)</div>
					<div class="nav-bar-search-group">Places</div>
					<div class="nav-bar-search-item">Katowice (2)</div>
					<div class="nav-bar-search-item">Latvia (2)</div>
					<div class="nav-bar-search-item">Poland (2)</div>
					<div class="nav-bar-search-item">Bardejov (1)</div>
					<div class="nav-bar-search-item">Belgium (1)</div>
					<div class="nav-bar-search-item">Bubeneč (1)</div>
					<div class="nav-bar-search-group">Persons</div>
					<div class="nav-bar-search-item">Edelstein, Jacob (* 25.7.1903) (3)</div>
					<div class="nav-bar-search-item">Hirsch, Alfred (* 11.2.1916) (2)</div>
					<div class="nav-bar-search-item">Ančerl, Karel (* 11.4.1908) (1)</div>
					<div class="nav-bar-search-item">Edelstein, Arje (* 15.5.1931) (1)</div>
					<div class="nav-bar-search-item">Edelsteinová, Mirjam (* 1.1.1908) (1)</div>
					<div class="nav-bar-search-item">Gerron, Kurt (* 11.5.1897) (1)</div>
				</div>
			</div>
		
			<div class="nav-bar-menu" id="nav-bar-menu">
				<div class="nav-bar-menu-back" id="nav-bar-menu-back"><div class="nav-bar-back-icon">chevron_left</div></div>
				<a class="nav-bar-menu-item" href="https://editionstest.ehri-project-stage.eu/">Home</a>
				<br>
				<a class="nav-bar-menu-item">Introduction</a>
				<a class="nav-bar-menu-item" href="http://localhost/Omeka/exhibits/show/early-holocaust-documentation/early-holocaust-documentation">Early Holocaust Documentation</a>
				<a class="nav-bar-menu-subitem">Chapter 1</a>
				<a class="nav-bar-menu-subitem">Chapter 2</a>
				<a class="nav-bar-menu-item">Additional narrative text</a>
				<a class="nav-bar-menu-subitem">Chapter 1</a>
				<a class="nav-bar-menu-subitem">Chapter 2</a>
				<a class="nav-bar-menu-subitem">Chapter 3</a>
				<br>
				<a class="nav-bar-menu-item">Search individual testimony via map</a>
				<a class="nav-bar-menu-item">Witnesses</a>
				<a class="nav-bar-menu-item">Timeline</a>
				<br>
				<br>
				<a class="nav-bar-menu-item">Index</a>
			</div>
<!-- / desktop navbar -->

<!-- mobile navbar -->
			<div class="nav-bar-mobile"></div>
			<div id="nav-bar-mobile-icons">
				<div class="nav-bar-mobile-button-search" id="nav-bar-mobile-button-search">
					<div id="nav-bar-mobile-icon-search" class="material-icons">search</div>
				</div>
				<div class="nav-bar-mobile-button-menu" id="nav-bar-mobile-button-menu" >
					<div id="nav-bar-mobile-icon-menu" class="material-icons">menu</div>
				</div>
			</div>
<!-- / mobile navbar -->

<!-- jquery menu control -->
				<script>
				<!-- dekstop -->
				<!-- desktop/menu -->
				$( "#nav-bar-button-menu" ).click(function() {
					if( $("#nav-bar-menu").css("display") == 'none' ) {
					   if( $("#nav-bar-search").css("display") == 'none' ) {
							$( "#nav-bar-menu" ).show( "slide", function() {});
					        $( "#nav-bar-search" ).hide( "slide", function() {}); 
					   } else {
						   $( "#nav-bar-menu" ).show( 0, function() {});
						   $( "#nav-bar-search" ).hide( 0, function() {}); 
					   }
					   $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu-selected');
					   $("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
					   if ($(window).width() > 1180) {
							$("#container").animate({ 'margin-left': '240px'}, 400);
							$("#footer").animate({ 'margin-left': '240px' }, 400);
							$("#home-map").attr('class', 'home-map-resized');
							$("#nav-bar-menu").attr('class', 'nav-bar-menu');
						} else {
							$("#nav-bar-menu").attr('class', 'nav-bar-menu-shadow');
						} 			   
					} else {
					   $( "#nav-bar-search" ).hide( "slide", function() {});
					   $( "#nav-bar-menu" ).hide( "slide", function() {});
					   $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
					   $("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
					   $("#container").animate({ 'margin-left': '0' }, 400);
					   $("#footer").animate({ 'margin-left': '0' }, 400);
					   $("#home-map").attr('class', 'home-map');
					}				
				});
				
				$( "#nav-bar-menu-back" ).click(function() {
					$( "#nav-bar-menu" ).hide( "slide", function() {});
					$("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
					$("#container").animate({ 'margin-left': '0' }, 400);
					$("#footer").animate({ 'margin-left': '0' }, 400);
					$("#home-map").attr('class', 'home-map');
				});
				
				<!-- desktop/search -->
				$( "#nav-bar-button-search" ).click(function() {
					$("#nav-bar-limit-search").css('display', 'block');
					$("#nav-bar-limit-expand").css('display', 'none');
					$("#nav-bar-limit-shrink").css('display', 'none');
					if( $("#nav-bar-search").css("display") == 'none' ) {
					   if( $("#nav-bar-menu").css("display") == 'none' ) {
							$( "#nav-bar-search" ).show( "slide", function() {});
					        $( "#nav-bar-menu" ).hide( "slide", function() {}); 
					        $("#query").focus();
					   } else {
						   $( "#nav-bar-search" ).show( 0, function() {});
						   $( "#nav-bar-menu" ).hide( 0, function() {}); 
						   	$("#query").focus();
					   }
					   $("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
					   $("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
					   if ($(window).width() > 1180) {
							$("#container").animate({ 'margin-left': '240px'}, 400);
							$("#footer").animate({ 'margin-left': '240px' }, 400);
							$("#home-map").attr('class', 'home-map-resized');
							$("#nav-bar-search").attr('class', 'nav-bar-search');
						} else {
							$("#nav-bar-search").attr('class', 'nav-bar-search-shadow');
						} 
					} else {
					   $( "#nav-bar-menu" ).hide( "", function() {});
					   $( "#nav-bar-search" ).hide( "slide", function() {});
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
				$( window ).resize(function() {
					if ($(window).width() < 1180) {
						if ($(window).width() > 980) {
							if ($("#nav-bar-menu").is(":visible")) {
								$( "#nav-bar-menu" ).hide( "slide", function() {});
								$("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
								$("#container").animate({ 'margin-left': '0' }, 400);
								$("#footer").animate({ 'margin-left': '0' }, 400);
								
							} else if ($("#nav-bar-search").is(":visible")) {
								$( "#nav-bar-search" ).hide( "slide", function() {});
								$("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
								$("#container").animate({ 'margin-left': '0' }, 400);
								$("#footer").animate({ 'margin-left': '0' }, 400);
							}
							$("#home-map").attr('class', 'home-map');
							$("#nav-bar-mobile-icon-search").text('search');
							$("#nav-bar-mobile-icon-menu").text('menu');
							$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
							$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
							$("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
							$("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
						}
					}
				});
				
				<!-- mobile -->
				<!-- mobile/menu -->
				$( "#nav-bar-mobile-button-menu" ).click(function() {
					if( $("#nav-bar-menu").css("display") == 'none' ) {
					   $("#nav-bar-mobile-icon-menu").text('close');
					   $("#nav-bar-mobile-icon-menu").css('font-size', '36px');
					   $("#nav-bar-mobile-icon-menu").css('margin-top', '7px');
					   if( $("#nav-bar-search").css("display") == 'none' ) {
							$( "#nav-bar-menu" ).show( 0, function() {});
					        $( "#nav-bar-search" ).hide( 0, function() {}); 
					   } else {
						   $( "#nav-bar-menu" ).show( 0, function() {});
						   $( "#nav-bar-search" ).hide( 0, function() {}); 
					   }
					   $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu-selected');
					   $("#nav-bar-mobile-button-search" ).attr('class', 'nav-bar-mobile-button-search');
					   					   
					} else {
					   $("#nav-bar-mobile-icon-menu").text('menu');
					   $("#nav-bar-mobile-icon-menu").css('font-size', '48px');
					   $("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
					   $( "#nav-bar-search" ).hide( 0, function() {});
					   $( "#nav-bar-menu" ).hide( 0, function() {});
					   $("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
					   $("#nav-bar-mobile-button-search" ).attr('class', 'nav-bar-mobile-button-search');
					}		
				    $("#nav-bar-mobile-icon-search").text('search');		
				});
				
				<!-- mobile/search -->
				$( "#nav-bar-mobile-button-search" ).click(function() {
					$("#nav-bar-limit-search").css('display', 'none');
					$("#nav-bar-limit-shrink").css('display', 'none');
					$("#nav-bar-limit-expand").css('display', 'inline');
					if( $("#nav-bar-search").css("display") == 'none' ) {
					   $("#nav-bar-mobile-icon-search").text('close');
					   if( $("#nav-bar-menu").css("display") == 'none' ) {
							$( "#nav-bar-search" ).show( 0, function() {});
					        $( "#nav-bar-menu" ).hide( 0, function() {}); 
					        $("#query").focus();
					   } else {
						   $( "#nav-bar-search" ).show( 0, function() {});
						   $( "#nav-bar-menu" ).hide( 0, function() {}); 
						   	$("#query").focus();
					   }
					   $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
					   $("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
						
					} else {
					   $("#nav-bar-mobile-icon-search").text('search');
					   $( "#nav-bar-menu" ).hide( 0, function() {});
					   $( "#nav-bar-search" ).hide( 0, function() {});
					   $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search');
					   $("#nav-bar-mobile-button-menu" ).attr('class', 'nav-bar-mobile-button-menu');
					}				
					$("#nav-bar-mobile-icon-menu").text('menu');
					$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
					$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
				});
				
				<!-- mobile expand search limits -->
				$( "#nav-bar-limit-toggle" ).click(function() {
					if ( $("#nav-bar-limit-expand").css('display') == 'none' ) {
						$("#nav-bar-limit-search").css('display', 'none');
						$("#nav-bar-limit-shrink").css('display', 'none');
						$("#nav-bar-limit-expand").css('display', 'inline');
					} else {	
						$("#nav-bar-limit-search").css('display', 'block');
						$("#nav-bar-limit-shrink").css('display', 'inline');
						$("#nav-bar-limit-expand").css('display', 'none');	
					}
				});
				</script>
<!-- / jquery menu control -->

<div id="container" style='overflow:hidden;min-height: 100%;'>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
		<div class="header-image"></div>
		<div class="header-overlay"></div>
        <header role="banner">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>     
            <a href="https://editionstest.ehri-project-stage.eu/"><div id="site-title"><?php echo option('site_title'); ?></div></a>
            <div id="site-subtitle"><?php echo $description; ?></div>  
        </header>
		<div id="site-logo"><?php echo link_to_home_page(theme_logo()); ?></div>
    <div id="content" role="main" tabindex="-1">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
