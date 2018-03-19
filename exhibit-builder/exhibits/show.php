<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<script>
$( document ).ready(function(){ 
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
});

</script>

<div class="exhibit-pagination">
	<div class="item-pagination-previous"><a href="#"><div id="previous-item-icon" class="material-icons">keyboard_arrow_left</div>Introduction</a></div>
	<div class="item-pagination-next"><a href="#">Additional narrative texts (interpretations)<div id="next-item-icon" class="material-icons">keyboard_arrow_right</div></a></div>
</div>

<h1><?php echo metadata('exhibit_page', 'title'); ?></h1>

<div id="content-share">
    <div id="content-share-title">Download</div> 
		<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>PDF</a>
		<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>E-pub</a>
	<div id="content-share-subtitle">Share</div>
	<div class="addthis_inline_share_toolbox"></div>
</div>

<div id="exhibit-blocks">
<?php exhibit_builder_render_exhibit_page(); ?>

<h3><?php echo "Map" ?></h3><div id="map-toggle-fullscreen">Toggle fullscreen<div id="map-toggle-fullscreen-icon" class="material-icons">fullscreen</div></div>
<iframe class="element-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50905.17188989865!2d-8.71802301985908!3d37.11527485037645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1b304950234d8d%3A0x5410aaa3471afc57!2sLagos!5e0!3m2!1scs!2spt!4v1519825124407" width=100% height="410" frameborder="0" allowfullscreen></iframe>

</div>


    <h4><?php echo __('Related chapters'); ?></h4>
    <div class="related-chapters-box-exhibit">
    <a href= <?php $documentRoot ?> "/items/show/2">
		<div class="related-chapters">
			<img src= "http://localhost/Omeka/themes/ehri/images/related-chapters.png">
			<div class="related-chapters-title">Additional narrative texts</div>
			<p>How belowed Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans</p>
		</div>
    </a>
    <a href= <?php $documentRoot ?> "/items/show/2">
		<div class="related-chapters">
			<img src= "http://localhost/Omeka/themes/ehri/images/related-chapters.png">
			<div class="related-chapters-title">Lorem Ipsum</div>
			<p>How belowed Superman has become in our culture and the worldwide fascination with extraterrestrials and all things cosmic only emphasizes that there is a deep curiosity in all humans</p>
		</div>
    </a>
    </div>

<?php echo foot(); ?>
