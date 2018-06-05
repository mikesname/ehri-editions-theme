<?php
$searchQuery = array_key_exists('q', $_GET) ? $_GET['q'] : '';
?>

<?php echo head(array('title' => __('Search'), 'results' => $results, 'bodyclass' => 'search-menu'));?>

<?php if ($results->response->numFound > 0): ?>
    <h1>
        <?php if ($searchQuery): ?>
            <?php echo __("Documents found: %d", $results->response->numFound); ?>
        <?php else: ?>
            <?php echo __("All Documents"); ?>
        <?php endif; ?>
    </h1>

	<?php echo pagination_links(); ?>

	<div class="search-results">
		<?php foreach ($results->response->docs as $doc): ?>
            <?php if ($item = get_db()->getTable("Item")->find($doc->modelid)): ?>
                <?php echo tei_editions_render_item_summary($item); ?>
            <?php endif; ?>
		<?php endforeach; ?>
	</div>

	<?php echo pagination_links(); ?>

<?php else: ?>
	<div id="no-results" class="search-results-empty"><h1>
	<?php if (strlen($searchQuery)>0) { ?>
		<?php echo __("No results for \"%s\"", $searchQuery); ?>
	<?php } else { ?>
		<?php echo __('Search query is empty'); ?>
	<?php } ?>
	</h1></div>
<?php endif; ?>

<?php echo foot();
