<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="header-search-background"></div>
	<div id="header-search">
		<div id="search-container" role="search">
			<?php echo search_form(array('submit_value' => 'search')); ?>
		</div>
	</div>

<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
        <div class="homepage-text"><?php echo $homepageText; ?></div>
    <?php endif; ?>

    <?php if ($exhibitPage = get_homepage_exhibit_page()): ?>
        <div class="homepage-exhibit"></div>
            <?php echo exhibit_builder_render_exhibit_page($exhibitPage); ?>
        </div>
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Item')): ?>
        <!-- Featured Item -->
        <div id="featured-item" class="featured">
            <h4>Featured Items</h4>
            <div id="featured-carousel" class="featured-carousel">
                <?php echo random_featured_items(15); ?>
            </div>
        </div><!--end featured-item-->
    <?php endif; ?>

    <?php if (($recent = get_theme_option('Homepage Recent Items')) > 0): ?>
        <div id="recent-items" class="recent">
            <h4><?php echo __("Recently added items"); ?></h4>
            <?php foreach (get_recent_items($recent) as $item): ?>
                <?php echo tei_editions_render_search_item($item); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div><!-- end secondary -->


<script type="text/javascript">
	jQuery(function($) {
		<!-- slick --> 
		$(".regular").slick({
			dots: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		});
	});
</script>

<?php echo foot(); ?>
