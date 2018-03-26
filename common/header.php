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
	<?php queue_js_file('jquery-fullscreen', 'javascripts/vendor'); ?>
	<?php queue_js_file('jspdf.min', 'javascripts/vendor'); ?>
	<?php queue_js_file('photoswipe.min', 'photoswipe/dist'); ?>
	<?php queue_js_file('photoswipe-ui-default.min', 'photoswipe/dist'); ?>
    <?php echo head_js(); ?>
    
    
    <!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,600|Roboto|Roboto+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
	<!-- slick -->
    <?php queue_css_file('slick', 'all', false, 'slick'); ?>
    <?php queue_css_file('dist/photoswipe', 'all', false, 'photoswipe'); ?>
    <!-- photoswipe -->
    <?php queue_css_file('dist/default-skin/default-skin', 'all', false, 'photoswipe'); ?>
</head>

 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
 
<!-- url and customized functions-->
<?php include(dirname(__FILE__) . "/custom.php"); ?>

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

                <?php if(isset($results)): ?>
                    <!-- Applied facets. -->
                <?php $appliedFacets = SolrSearch_Helpers_Facet::parseFacets(); ?>
                <?php if (!empty($appliedFacets)): ?>
                        <div class="nav-bar-search-category"><?php echo __('Applied Facets'); ?></div>
                        <div class="solr-applied-facets">
                            <ul class="nav-bar-search-items">
                                <!-- Get the applied facets. -->
                                <?php foreach ($appliedFacets as $f): ?>
                                    <li class="nav-bar-search-item">

                                        <!-- Facet label. -->
                                        <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
                                        <span class="applied-facet-label"><?php echo $label; ?>: </span>
                                        <span class="applied-facet-value"><?php echo $f[1]; ?></span>

                                        <!-- Remove link. -->
                                        <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
                                        <a class="nav-bar-search-item-close" href="<?php echo $url; ?>">close</a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Facets. -->
                    <div class="solr-facets nav-bar-limit-toggle">
                        <div class="nav-bar-search-category"><?php echo __('Limit your search'); ?></div>
                        <?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>
                            <!-- Does the facet have any hits? -->
                            <?php if (count(get_object_vars($facets))): ?>

                                <div class="solr-facet">
                                    <!-- Facet label. -->
                                    <div class="nav-bar-search-group"><?php echo SolrSearch_Helpers_Facet::keyToLabel($name); ?></div>
                                    <ul class="nav-bar-search-items">
                                        <!-- Facets. -->
                                        <?php foreach ($facets as $value => $count): ?>
                                            <li class="nav-bar-search-item <?php echo $value; ?>">

                                                <!-- Facet URL. -->
                                                <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

                                                <!-- Facet link. -->
                                                <a href="<?php echo $url; ?>" class="facet-value">
                                                    <?php echo $value; ?>
                                                    <!-- Facet count. -->
                                                    (<span class="facet-count"><?php echo $count; ?></span>)
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
			</div>

            <div class="nav-bar-menu" id="nav-bar-menu">
                <div class="nav-bar-menu-back" id="nav-bar-menu-back"><div class="nav-bar-back-icon">chevron_left</div></div>

                <?php foreach (get_db()->getTable("Exhibit")->findAll() as $exhibit): ?>
                    <?php echo exhibit_builder_page_tree($exhibit); ?>
                <?php endforeach; ?>
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
    jQuery(function($) {
        <!-- dekstop -->
        <!-- desktop/menu -->
        var searchQuery = getUrlParameter('q');
        if(searchQuery == null) {
            navBarSearch = $('#nav-bar-search');
        } else {
            navBarSearch = $('#nav-bar-search-solr');
        }

        $( "#nav-bar-button-menu" ).click(function() {
            if( $("#nav-bar-menu").css("display") == 'none' ) {
                if( navBarSearch.css("display") == 'none' ) {
                    $( "#nav-bar-menu" ).show( "slide", function() {});
                    navBarSearch.hide( "slide", function() {});
                } else {
                    $( "#nav-bar-menu" ).show( 0, function() {});
                    navBarSearch.hide( 0, function() {});
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
                navBarSearch.hide( "slide", function() {});
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
            if( navBarSearch.css("display") == 'none' ) {
                if( $("#nav-bar-menu").css("display") == 'none' ) {
                    navBarSearch.show( "slide", function() {});
                    $( "#nav-bar-menu" ).hide( "slide", function() {});
                    $("#query").focus();
                } else {
                    navBarSearch.show( 0, function() {});
                    $( "#nav-bar-menu" ).hide( 0, function() {});
                    $("#query").focus();
                }
                $("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
                $("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
                if ($(window).width() > 1180) {
                    $("#container").animate({ 'margin-left': '240px'}, 400);
                    $("#footer").animate({ 'margin-left': '240px' }, 400);
                    $("#home-map").attr('class', 'home-map-resized');
                    navBarSearch.attr('class', 'nav-bar-search');
                } else {
                    navBarSearch.attr('class', 'nav-bar-search-shadow');
                }
            } else {
                $( "#nav-bar-menu" ).hide( "", function() {});
                navBarSearch.hide( "slide", function() {});
                $("#nav-bar-button-search").attr('class', 'nav-bar-button-search');
                $("#nav-bar-button-menu" ).attr('class', 'nav-bar-button-menu');
                $("#container").animate({ 'margin-left': '0' }, 400);
                $("#footer").animate({ 'margin-left': '0' }, 400);
                $("#home-map").attr('class', 'home-map');
            }
        });
        $( "#nav-bar-search-back" ).click(function() {
            navBarSearch.hide( "slide", function() {});
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

                    } else if (navBarSearch.is(":visible")) {
                        navBarSearch.hide( "slide", function() {});
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
