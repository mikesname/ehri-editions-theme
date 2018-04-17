<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes"/>
    <?php if ($description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>"/>
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- css -->
    <?php
    queue_css_file(array('iconfonts', 'skeleton', 'style', 'style-mobile'));

    echo head_css();
    ?>
    <!-- java -->
    <?php queue_js_file('menu', 'javascripts'); ?>
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('jquery-fullscreen', 'javascripts/vendor'); ?>
    <?php queue_js_file('jspdf.min', 'javascripts/vendor'); ?>
    <?php queue_js_file('photoswipe.min', 'photoswipe/dist'); ?>
    <?php queue_js_file('photoswipe-ui-default.min', 'photoswipe/dist'); ?>
    <?php echo head_js(); ?>

    <!-- custom search -->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/css/results.css"; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/css/fields.css"; ?>"/>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:400,600|Roboto|Roboto+Mono"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT . "/themes/ehri/slick/slick.css"; ?>"/>

    <!-- photoswipe -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo WEB_ROOT . "/themes/ehri/photoswipe/dist/photoswipe.css"; ?>"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo WEB_ROOT . "/themes/ehri/photoswipe/dist/default-skin/default-skin.css"; ?>"/>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

<!-- url and customized functions-->
<?php
include("./themes/ehri/common/custom.php");
$searchQuery = array_key_exists('q', $_GET) ? $_GET['q'] : '';
?>

<!-- desktop navbar -->
<div class="nav-bar">
    <div class="nav-bar-button-search" id="nav-bar-button-search">
        <div id="nav-bar-icon-search" class="material-icons">search</div>
        <div id="nav-bar-icon-text-search">SEARCH</div>
    </div>
    <div class="nav-bar-button-menu" id="nav-bar-button-menu">
        <div id="nav-bar-icon-menu" class="material-icons">menu</div>
        <div id="nav-bar-icon-text-menu">MENU</div>
    </div>
</div>

<div class="nav-bar-search" id="nav-bar-search">
    <div class="nav-bar-search-back" id="nav-bar-search-back">
        <div class="nav-bar-back-icon">chevron_left</div>
    </div>
    <div id="search-container" role="search">
        <form id="solr-search-form" action="<?php echo url('search'); ?>">
            <input type="text" title="<?php echo __('Search keywords') ?>" name="q"
                   value="<?php echo $searchQuery; ?>"/>
            <input class="search-button-solr" type="submit" value="search"/>
        </form>
    </div>

    <!-- Applied facets. -->
    <h2 class="nav-bar-search-category">Applied facets</h2>
    <div id="solr-applied-facets">

        <!-- Get the applied facets. -->
        <?php $facets = SolrSearch_Helpers_Facet::parseFacets(); ?>
        <?php foreach ($facets as $f): ?>
            <!-- Facet label. -->
            <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
            <div class="nav-bar-search-item"><?php echo $f[1]; ?><a class="nav-bar-search-item-close"
                                                                    href="<?php echo $url; ?>">close</a></div>
        <?php endforeach; ?>

        <!-- If facet is empty -->
        <?php if (empty($facets)): ?>
            <div class="nav-bar-search-item">None</div>
        <?php endif; ?>
    </div>

    <div class="nav-bar-search-line"></div>

    <!-- Facets. -->
    <?php $counts = isset($results) ? $results->facet_counts->facet_fields : array(); ?>
    <div id="solr-facets">
        <div id="nav-bar-limit-toggle">
            <h2 class="nav-bar-search-category">Limit your search</h2>
            <div id="nav-bar-limit-expand">keyboard_arrow_down</div>
            <div id="nav-bar-limit-shrink">keyboard_arrow_up</div>
            <div id="nav-bar-limit-search">
            <?php foreach ($counts as $name => $facets): ?>
                <!-- Does the facet have any hits? -->
                <?php if (!empty($facets)): ?>

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
                                <!-- Facet count. -->
                                (<span class="facet-count"><?php echo $count; ?></span>)
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>

        <?php if (empty($counts)): ?>
            <div class="nav-bar-search-item">None</div>
        <?php endif; ?>
    </div>
</div>

<div class="nav-bar-menu" id="nav-bar-menu">
    <div class="nav-bar-menu-back" id="nav-bar-menu-back">
        <div class="nav-bar-back-icon">chevron_left</div>
    </div>
    <ul>
        <?php foreach (get_exhibit_menu_items() as $exhibit): ?>
            <li>
                <a href="<?php echo record_url($exhibit); ?>"><?php echo $exhibit->title; ?></a>
                <?php echo exhibit_builder_page_tree($exhibit); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- / desktop navbar -->

<!-- mobile navbar -->
<div class="nav-bar-mobile"></div>
<div id="nav-bar-mobile-icons">
    <div class="nav-bar-mobile-button-search" id="nav-bar-mobile-button-search">
        <div id="nav-bar-mobile-icon-search" class="material-icons">search</div>
    </div>
    <div class="nav-bar-mobile-button-menu" id="nav-bar-mobile-button-menu">
        <div id="nav-bar-mobile-icon-menu" class="material-icons">menu</div>
    </div>
</div>

<!-- / mobile navbar -->

<div id="container" style='overflow:hidden;min-height: 100%;'>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
    <div class="header-image" id="header-image"
         style="background: url('<?php echo theme_header_image_url(); ?>') no-repeat center left; background-size: cover;"></div>
    <div class="header-overlay"></div>
    <header role="banner">
        <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
        <a href="<?php echo WEB_ROOT ?>">
            <div id="site-title"><?php echo option('site_title'); ?></div>
        </a>
        <div id="site-subtitle"><?php echo $description; ?></div>
    </header>
    <div id="site-logo"><?php echo link_to_home_page(theme_logo()); ?></div>
    <div id="content" role="main" tabindex="-1">

        <?php fire_plugin_hook('public_content_top', array('view' => $this)); ?>
