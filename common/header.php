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
    
    <!-- css -->
    <?php
    queue_css_file(array('iconfonts', 'skeleton','style', 'style-mobile'));

    echo head_css();
    ?>
    <!-- java -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('jquery-3.3.1.min', 'javascripts/vendor'); ?>
	<?php queue_js_file('jquery-ui', 'javascripts/vendor'); ?>
	<?php queue_js_file('jquery-fullscreen', 'javascripts/vendor'); ?>
	<?php queue_js_file('jspdf.min', 'javascripts/vendor'); ?>
	<?php queue_js_file('photoswipe.min', 'photoswipe/dist'); ?>
	<?php queue_js_file('photoswipe-ui-default.min', 'photoswipe/dist'); ?>
    <?php echo head_js(); ?>
    
    <!-- custom search -->
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/css/results.css"; ?>" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/css/fields.css"; ?>" /> 
    
    <!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,600|Roboto|Roboto+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
	<!-- slick -->
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/slick/slick.css" ?>" />
	
	<!-- photoswipe -->
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/photoswipe/dist/photoswipe.css"; ?>" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/photoswipe/dist/default-skin/default-skin.css"; ?>" /> 

</head>

 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
 
<!-- url and customized functions-->
<?php $include = "./themes/ehri/common/custom.php";
      include($include); 
      $searchQuery = array_key_exists('q', $_GET) ? $_GET['q'] : '';
?>

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
<?php if (isset($_GET["q"]) and trim($_GET["q"]) !== ""): ?>
	<div id="search-container" role="search">
		<form id="solr-search-form">
			<input type="text" title="<?php echo __('Search keywords') ?>" name="q" value="<?php	echo $searchQuery;  ?>" />
			<input class="search-button-solr" type="submit" value="search" />
		</form>
	</div>

	<!-- Applied facets. -->
	<h2 class="nav-bar-search-category">Applied facets</h2>
	<div id="solr-applied-facets">

		<!-- Get the applied facets. -->
		<?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f): ?>
		
		<!-- Facet label. -->
		<?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
		<div class="nav-bar-search-item"><?php echo $f[1]; ?><a class="nav-bar-search-item-close" href="<?php echo $url; ?>">close</a></div>	
	  
		<?php endforeach; ?>


		<!-- If facet is empty -->
		<?php if (count($f)==0) { 
		  echo "<div class=\"nav-bar-search-item\">None</div>";
		} ?>
		  
	</div>

	<div class="nav-bar-search-line"></div>
					
	<!-- Facets. -->
	<div id="solr-facets">
		<h2 class="nav-bar-search-category">Limit your search</h2>

		<?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>

		<!-- Does the facet have any hits? -->
		<?php if (count(get_object_vars($facets))) { ?>

		<!-- Facet label. -->
		<?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
		<div class="nav-bar-search-group"><?php echo $label; ?></div>

			<!-- Facets. -->
			<?php foreach ($facets as $value => $count): ?>
			  <div class="nav-bar-search-item" value="<?php echo $value; ?>">

				<!-- Facet URL. -->
				<?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

				<!-- Facet link. -->
				<a href="<?php echo $url; ?>" class="facet-value">
				  <?php echo $value; ?>
				</a>

				<!-- Facet count. -->
				(<span class="facet-count"><?php echo $count; ?></span>)

			  </div>
			<?php endforeach; ?>

		<?php } ?>

	  <?php endforeach; ?>
  
	</div>

  	<?php if ((count(get_object_vars($facets)))==0) {
	  echo "<div class=\"nav-bar-search-item\">None</div>";
	} ?>	
	</div>	
<?php else: ?>

	<div id="search-container" role="search">
		<?php echo search_form(array('submit_value' => 'search')); ?>
	</div>
	<div class="nav-bar-search-category">Applied facets</div>
	<div class="nav-bar-search-item">None</div>
	<div class="nav-bar-search-line"></div>
	<div id="nav-bar-limit-toggle"><div class="nav-bar-search-category">Limit your search</div><div id="nav-bar-limit-expand">keyboard_arrow_down</div><div id="nav-bar-limit-shrink">keyboard_arrow_up</div></div>
	<div id="nav-bar-limit-search">
		<div class="nav-bar-search-item">None</div>
	</div>
<?php endif; ?>
</div>

<div class="nav-bar-menu" id="nav-bar-menu">
	<div class="nav-bar-menu-back" id="nav-bar-menu-back"><div class="nav-bar-back-icon">chevron_left</div></div>
	<a class="nav-bar-menu-item" href="<?php echo WEB_ROOT ?>">Home</a>
	<br>
	<a class="nav-bar-menu-item">Introduction</a>
	<a class="nav-bar-menu-item">Early Holocaust Documentation</a>
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
$(document).ready(function(){
	<!-- dekstop -->
	<!-- desktop/menu -->
	$( "#nav-bar-button-menu" ).click(function() {
		if( $("#nav-bar-menu").css("display") == 'none' ) {
		   if( $( "#nav-bar-search" ).css("display") == 'none' ) {
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
		if( $( "#nav-bar-search" ).css("display") == 'none' ) {
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
				$( "#nav-bar-search" ).attr('class', 'nav-bar-search');
			} else {
				$( "#nav-bar-search" ).attr('class', 'nav-bar-search-shadow');
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
		$( "#nav-bar-search" ).hide( "slide", function() {});
		$("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
		$("#container").animate({ 'margin-left': '0' }, 400);
		$("#footer").animate({ 'margin-left': '0' }, 400);
		$("#home-map").attr('class', 'home-map');
	});
	$( window ).resize(function() {
		if ($(window).width() < 1180) {
			if ($(window).width() > 930) {
				if ($("#nav-bar-menu").is(":visible")) {
					$( "#nav-bar-menu" ).hide( "slide", function() {});
					$("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
					$("#container").animate({ 'margin-left': '0' }, 400);
					$("#footer").animate({ 'margin-left': '0' }, 400);
					
				} else if ($( "#nav-bar-search" ).is(":visible")) {
					if (!( "header" ).attr('class', 'search')) {
						$( "#nav-bar-search" ).hide( "slide", function() {});
						$("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
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
			}
		}
		
		if ($(window).width() > 930) {
			$( "#nav-bar-limit-toggle" ).css('cursor', 'default');
		} else {
			$( "#nav-bar-limit-toggle" ).css('cursor', 'pointer');
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
            <a href="<?php echo WEB_ROOT ?>"><div id="site-title"><?php echo option('site_title'); ?></div></a>
            <div id="site-subtitle"><?php echo $description; ?></div>  
        </header>
		<div id="site-logo"><?php echo link_to_home_page(theme_logo()); ?></div>
    <div id="content" role="main" tabindex="-1">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
