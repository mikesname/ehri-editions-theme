<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="header-search-background"></div>
	<div id="header-search">
		<div id="search-container" role="search">
			<?php echo search_form(array('submit_value' => 'search', 'text_value' => __('Search'))); ?>
		</div>
	</div>

<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
		<div class="homepage-text"><?php echo $homepageText; ?></div>
    <?php endif; ?>
    <a class="homepage-project">More about the project</a>
    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->

	<div id="featured-item" class="featured">
        <h4>Featured Items</h4>
		<div id="featured-carousel" class="featured-carousel">
			<?php echo random_featured_items(15); ?>
        </div>
        
    </div><!--end featured-item-->
    
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php $featuredString = "How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy"; ?>
    <h4>Edition Chapters</h4>
    <div class="related-chapters-box">
		<a href="https://editionstest.ehri-project-stage.eu/items/show/92">
			<div class="related-chapters">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/related-chapters.png";>
				<div class="related-chapters-title" <?php if (strlen($featuredString)>200) { echo "style=\"margin-top: 0;\""; } ?>>Introduction</div>
				<p >How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy</p>
			</div>
		</a>
		<a href="https://editionstest.ehri-project-stage.eu/items/show/92">
			<div class="related-chapters">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/related-chapters.png">
				<div class="related-chapters-title" <?php if (strlen($featuredString)>200) { echo "style=\"margin-top: 0;\""; } ?>>Early Holocaust Documentation</div>
				<p>How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy</p>
			</div>
		</a>
		<a href="https://editionstest.ehri-project-stage.eu/items/show/92">
			<div class="related-chapters">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/related-chapters.png">
				<div class="related-chapters-title" <?php if (strlen($featuredString)>200) { echo "style=\"margin-top: 0;\""; } ?>>Additional narrative texts</div>
				<p>How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy</p>
			</div>
		</a>
		<a href="https://editionstest.ehri-project-stage.eu/items/show/92">
			<div class="related-chapters">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/related-chapters.png">
				<div class="related-chapters-title" <?php if (strlen($featuredString)>200) { echo "style=\"margin-top: 0;\""; } ?>>Search individual testimony via map</div>
				<p>How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy</p>
			</div>
		</a>
		<a href="https://editionstest.ehri-project-stage.eu/items/show/92">
			<div class="related-chapters">
				<img src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/related-chapters.png">
				<div class="related-chapters-title" <?php if (strlen($featuredString)>200) { echo "style=\"margin-top: 0;\""; } ?>>Witnesses</div>
				<p>How beloved Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans about nature and astronomy</p>
			</div>
		</a>
    </div>

    <!--<php echo exhibit_builder_display_random_featured_exhibit(); ?>-->
    <?php endif; ?>
    <h4>Map of items</h4>
    <div class="home-map-wrapper">
		<iframe id="home-map" class="home-map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d96815.27473282232!2d-74.07053318395133!3d40.68548380090549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ses!4v1521111530896" width="100%" height="460px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
    <h4>Recently added items</h4>
    <div class="recently-added-wrapper">
		<div class="search-result">
			<div class="search-result-image-blank"></div>
			<div class="search-result-wrapper">
				<div class="search-result-title">Sachsová, Gerta: Dopis o osudu rodiny Artura a Edity Hellerových z Prahy</div>			
				<p>May 20, 1945  |   Prague</p>
				<p>Letter describes the fate of her parents and husband. Gerta Sachs shortly tells about her actual situation.</p>
				<p>Languages: English, Czech (original)</p>
			</div>
		</div>
		<div class="search-result">
			<div class="search-result-image-blank"></div>
			<div class="search-result-wrapper">
				<div class="search-result-title">Sachsová, Gerta: Dopis o osudu rodiny Artura a Edity Hellerových z Prahy</div>			
				<p>May 20, 1945  |   Prague</p>
				<p>Letter describes the fate of her parents and husband. Gerta Sachs shortly tells about her actual situation.</p>
				<p>Languages: English, Czech (original)</p>
			</div>
		</div>
		<div class="search-result">
			<div class="search-result-image-blank"></div>
			<div class="search-result-wrapper">
				<div class="search-result-title">Sachsová, Gerta: Dopis o osudu rodiny Artura a Edity Hellerových z Prahy</div>			
				<p>May 20, 1945  |   Prague</p>
				<p>Letter describes the fate of her parents and husband. Gerta Sachs shortly tells about her actual situation.</p>
				<p>Languages: English, Czech (original)</p>
			</div>
		</div>
	</div>
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
		
		<!-- search fields text --> 
		$('#header-search input[type=text]').on('click focusin', function() {
			if (this.value === 'Search') {
				this.value = '';
			}
		});
		$('#header-search input[type=text]').on('focusout', function() {
			if (this.value.length === 0) {
				this.value = 'Search';
			}
		});
	});
</script>

<?php echo foot(); ?>
