<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>


<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search'), 'results' => $results));?>


<?php if (isset($_GET["q"]) and trim($_GET["q"]) !== ""): ?>
    <h1><?php echo __("Search Results for \"%s\": %d", $_GET['q'], $results->response->numFound); ?></h1>
<?php else: ?>
    <h1><?php echo __('Search Results'); ?></h1>
<?php endif; ?>


<?php echo pagination_links(); ?>

<!-- Results. -->
<div class="search-results">

  <!-- Number found. -->
  <h2 id="num-found">
    <?php echo $results->response->numFound; ?> results
  </h2>

    <?php $db = get_db(); ?>
    <?php foreach ($results->response->docs as $doc): ?>

        <?php $record = $db->getTable("Item")->find($doc->modelid); ?>
        <?php $url = SolrSearch_Helpers_Index::getUri($record); ?>

        <?php set_current_record("item", $record); ?>

        <div class="search-result">
            <?php
                $date = metadata($record, array('Dublin Core', 'Date'));
                $place = metadata($record, array('Dublin Core', 'Publisher'));
            ?>
            <a href="<?php echo $url;?>">
                <?php if ($recordImage = record_image("item")):  ?>
                    <?php echo $recordImage ?>
                <?php else: ?>
                    <div class="search-result-image-blank"></div>
                <?php endif; ?>
            </a>
            <div class="search-result-wrapper">
                <a class="search-result-link" href="<?php echo $url; ?>">
                    <div class="search-result-title"><?php echo metadata($record, 'display_title'); ?></div>
                </a>
                <?php if (isset($date)){ $addition = $date; } ?>
                <?php if (isset($place)){ $addition = $date . " | " . $place; }?>
                <?php if($addition){echo "<p>$addition</p>";} ?>
                <p><?php echo metadata($record, array('Dublin Core', 'Description'), array('snippet'=>300)); ?></p>
                <p>Languages: <?php echo metadata($record, array('Dublin Core', 'Language')); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php echo pagination_links(); ?>
<?php echo foot();
