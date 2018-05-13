<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
$searchQuery = (isset($_GET['query']) ? $_GET['query'] : 'text');
?>
<script>
$( document ).ready(function(){ 
	if ($(window).width() > 980) {
			$("#nav-bar-search").show( 0, function() {});
			$("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
		if ($(window).width() < 1180) {
			$("#nav-bar-search").attr('class', 'nav-bar-search-shadow');
			setTimeout(function(){
				$( "#nav-bar-search" ).hide( "slide", 1000, function() {});
				$("#nav-bar-button-search" ).attr('class', 'nav-bar-button-search');
			}, 700);
		} else {
			$("#container").animate({ 'margin-left': '240px'}, 0);
			$("#footer").animate({ 'margin-left': '240px' }, 0);
			$("#nav-bar-search").show( 0, function() {});
			$("#nav-bar-button-search").attr('class', 'nav-bar-button-search-selected');
		}
	} else {
		$("#nav-bar-mobile-icon-search").text('close');
		$("#nav-bar-mobile-button-search").attr('class', 'nav-bar-mobile-button-search-selected');
		$("#nav-bar-search").show( 0, function() {});
		$("#nav-bar-limit-search").css('display', 'none');
		$("#nav-bar-limit-shrink").css('display', 'none');
		$("#nav-bar-limit-expand").css('display', 'inline');
	}
});
</script>

<?php if ($total_results):
	echo "<h1>Search results for “$searchQuery" . "”: $total_results </h1>";

	if ($total_results <= 50) {
		echo "<div class=\"search-results-pagination\">
				<div class=\"search-results-previous\"><div class=\"search-results-image-previous\">keyboard_arrow_left</div>Previous</div>
				<div class=\"search-results-center\"><input class=\"search-results-center-input\" value=\"1\">of 1</div>
				<div class=\"search-results-next\"><div class=\"search-results-image-next\">keyboard_arrow_right</div>Next</div>
			  </div>";}
?>
<?php echo pagination_links(); ?>
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>
        
        <a class="item-summary-link" href="<?php echo record_url($record, 'show'); ?>">
			<div class="item-summary">
				<?php
				$date = metadata($record, array('Dublin Core', 'Date'));
				$place = metadata($record, array('Dublin Core', 'Publisher'));
				?>
				<?php if ($recordImage = record_image($recordType)) {  ?>
                    <?php echo $recordImage ?>                    
                <?php } else { ?>
					<div class="item-summary-image-blank"></div>
				<?php } ?>
				<div class="item-summary-wrapper">
					<div class="item-summary-title"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></div>
					<?php if (isset($date)){ $addition = $date; } ?> 
					<?php if (isset($place)){ $addition = $date . " | " . $place; }?>           
					<?php if($addition){echo "<p>$addition</p>";} ?> 
					<p><?php echo metadata($record, array('Dublin Core', 'Description'), array('snippet'=>300)); ?></p>
					<p>Languages: <?php echo metadata($record, array('Dublin Core', 'Language')); ?></p>
				</div>
			</div>
		</a>
        <?php endforeach; ?>

<?php if ($total_results >= 2) {
	echo "<div class=\"search-results-pagination\">
			<div class=\"search-results-previous\"><div class=\"search-results-image-previous\">keyboard_arrow_left</div>Previous</div>
			<div class=\"search-results-center\"><input class=\"search-results-center-input\" value=\"1\">of 1</div>
			<div class=\"search-results-next\"><div class=\"search-results-image-next\">keyboard_arrow_right</div>Next</div>
		  </div>";}
?>
<?php else: ?>

<div id="no-results" class="search-results-empty">
    <h1><br>No results for “TEXT”.</h1>
</div>

<?php endif; ?>
<?php echo foot(); ?>
