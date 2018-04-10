<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

$searchQuery = array_key_exists('q', $_GET) ? $_GET['q'] : '';
?>

<?php echo head(array('title' => __('Solr Search'), 'results' => $results, 'bodyclass' => 'search'));?>

<?php if ($results->response->numFound > 0): ?>
    <h1>
        <?php if ($searchQuery): ?>
            <?php echo __("Search Results for \"%s\": %d", $searchQuery, $results->response->numFound); ?>
        <?php else: ?>
            <?php echo __("All Documents"); ?>
        <?php endif; ?>
    </h1>

	<?php echo pagination_links(); ?>

	<!-- Results. -->
	<div class="search-results">

	  <!-- Number found. -->
		<?php $db = get_db(); ?>
		<?php foreach ($results->response->docs as $doc): ?>
            <?php if ($item = $db->getTable("Item")->find($doc->modelid)): ?>
                <?php echo tei_editions_render_search_item($item); ?>
            <?php endif; ?>
		<?php endforeach; ?>
	</div>

	<?php echo pagination_links(); ?>

<?php else: ?>
	<div id="no-results" class="search-result-empty"><h1>
	<?php if (strlen($searchQuery)>0) { ?>
		No results for “<?php echo $searchQuery; ?>”.
	<?php } else { ?>
		Search query is empty.
	<?php } ?>
	</h1></div>
<?php endif; ?>

<script>
<!-- show sidebar -->
jQuery(function($) {
    if ($(window).width() < 930) {
		$("#nav-bar-search").show( 0, function() {});
		$("#nav-bar-mobile-icon-search").text('close');
		$("#nav-bar-mobile-button-menu").attr('class', 'nav-bar-mobile-button-menu');
		$("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
		$("#nav-bar-mobile-icon-menu").text('menu');
		$("#nav-bar-mobile-icon-menu").css('font-size', '48px');
		$("#nav-bar-mobile-icon-menu").css('margin-top', '0px');
		$("#nav-bar-limit-toggle").css('cursor', 'pointer');
		$("#nav-bar-limit-search").css('display', 'none');
		$("#nav-bar-limit-shrink").css('display', 'none');
		$("#nav-bar-limit-expand").css('display', 'inline');
		$("#header-image").hide( 0, function() {}); 
    } else {
        $("#nav-bar-mobile-icon-search").text('close');
        $("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
        $("#nav-bar-search").show(0, function () {
        });
        $("#container").animate({'margin-left': '240px'}, 0);
        $("#footer").animate({'margin-left': '240px'}, 0);
        $("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
        $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
    }

    $(window).resize(function () {
        <!-- hide logo -->
        if ($(window).width() < 1000) {
            $("#site-logo").hide(0, function () {
            });
        } else {
            $("#site-logo").show(0, function () {
            });
        }

        <!-- move content -->
        if ($(window).width() > 930) {
            $("#nav-bar-search").show(0, function () {
            });
            $("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
            $("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
            $("#container").animate({'margin-left': '240px'}, 0);
            $("#footer").animate({'margin-left': '240px'}, 0);
        } else {
			$("#header-image").hide( 0, function() {}); 
        }
    });
});
</script>

<?php echo foot();
