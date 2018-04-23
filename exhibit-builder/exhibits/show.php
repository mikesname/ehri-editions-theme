<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<?php $title = metadata('exhibit_page', 'title'); ?>

<?php if ($title == "Homepage") { ?>
	<div id="primary">
	<div class="header-search-background"></div>
	<div id="header-search">
		<div id="search-container" role="search">
			<?php echo search_form(array('submit_value' => 'search', 'text_value' => __('Search'))); ?>
		</div>
	</div>
<?php } ?>

<div id="content-share">
    <div id="content-share-title">Download</div> 
		<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>PDF</a>
		<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>E-pub</a>
	<div id="content-share-subtitle">Share</div>
	<div class="addthis_inline_share_toolbox"></div>
</div>

<div class="exhibit-pagination">
    <div class="item-pagination-previous"><?php echo exhibit_builder_link_to_previous_page_custom();?></div>
    <div class="item-pagination-next"><?php echo exhibit_builder_link_to_next_page_custom();?></div>
</div>

<h1 id="exhibit-title"><?php echo $title; ?></h1>

<div id="exhibit-blocks" class="clearfix">
    <?php exhibit_builder_render_exhibit_page(); ?>
</div>

<?php if ($title == "Homepage") { 
	echo "</div>";
	}
?>
<script type="text/javascript">
jQuery(function($) {
	var $homepage = 0;
	$('#exhibit-title').each(function () {
		if ($(this).text() == 'Homepage') {
			$(this).css('display', 'none');
			$('#content-share').css('display', 'none');
			$('.exhibit-pagination').css('display', 'none');
			$('#content').css("width", "100%");
			$('#content').css("max-width", "100%");
			$('#primary').attr("id", "exhibit-home-primary");
			$('header').attr("class", "exhibit-home-header");
			$('.header-image').attr("class", "exhibit-home-header-image");
			$('.header-overlay').attr("class", "exhibit-home-header-overlay");
			$('#site-title').attr("id", "exhibit-home-site-title");
			$('#site-subtitle').attr("id", "exhibit-home-site-subtitle");
			$('.exhibits .featured').css('height', 460);
			$('.exhibit-block.layout-neatline iframe').attr("style", "pointer-events:none;");
			$homepage = 1;
		}
	});
	
	$('.neatline-control').each(function () {
		$('.exhibit-block.layout-neatline iframe').attr("style", "pointer-events:none;");
		if ($(this).text() == 'large') {
			$('.exhibit-block.layout-neatline').attr("id", "neatline-map");
			$('.exhibit-block.layout-neatline').attr("class", "exhibit-block exhibit-map-large-resized");
		} 
		if ($(this).text() == 'wide') {
			$('.exhibit-block.layout-neatline').attr("id", "neatline-map");
			$('.exhibit-block.layout-neatline').attr("class", "exhibit-block exhibit-map-wide-resized");
		}
		if ($(this).text() == 'default') {
			$('.exhibit-block.layout-neatline').attr("id", "neatline-map");
			$('.exhibit-block.layout-neatline').attr("class", "exhibit-block exhibit-map-default");
		}
		if ($(this).text() == '') {
			$('.exhibit-block.layout-neatline').attr("id", "neatline-map");
			$('.exhibit-block.layout-neatline').attr("class", "exhibit-block exhibit-map-default");
		}
	});
	
	$('.exhibit-block.layout-neatline').click(function() {
		$('.exhibit-block.layout-neatline iframe').attr("style", "pointer-events:auto;");
	});
	
	$('#neatline-map').click(function() {
		$('#neatline-map iframe').attr("style", "pointer-events:auto;");
	});
		
	if ($homepage == 1){	
		$('.exhibits .featured-carousel').addClass("home-exhibit-featured-carousel");
		if ($(".neatline-control")[1]){
			$('.exhibit-block.layout-neatline').attr("id", "neatline-map");
			$('.exhibit-block.layout-neatline').attr("class", "exhibit-block exhibit-map-default");
		}
	}
	
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
	
	<!-- window sizing --> 
	if ($homepage == 0) {
		if ($(window).width() > 980) {
				$("#nav-bar-menu").show( 0, function() {});
				$("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu-selected');
			if ($(window).width() < 1180) {
				$("#nav-bar-menu").attr('class', 'nav-bar-menu-shadow');
				setTimeout(function(){
					$( "#nav-bar-menu" ).hide( "slide", 1000, function() {});
					$("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu');
					$("#container").animate({ 'margin-left': '0' }, 1000);
					$("#footer").animate({ 'margin-left': '0' }, 1000);
				}, 700);
			} else {
				$("#container").animate({ 'margin-left': '240px'}, 0);
				$("#footer").animate({ 'margin-left': '240px'}, 0);
				$("#nav-bar-menu").show( 0, function() {});
				$("#nav-bar-button-menu").attr('class', 'nav-bar-button-menu-selected');
			}
		} 
	}
});
</script>

<?php echo foot(); ?>
