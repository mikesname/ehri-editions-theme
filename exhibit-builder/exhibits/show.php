<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<script>
    jQuery(function($){
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
    <?php echo exhibit_builder_page_trail();?>
</div>

<h1><?php echo metadata('exhibit_page', 'title'); ?></h1>

<div id="content-share">
    <div id="content-share-title">Download</div> 
		<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>PDF</a>
		<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>E-pub</a>
	<div id="content-share-subtitle">Share</div>
	<div class="addthis_inline_share_toolbox"></div>
</div>

<div id="exhibit-blocks" class="clearfix">
    <?php exhibit_builder_render_exhibit_page(); ?>
</div>

<div id="exhibit-footer">
    <?php echo exhibit_builder_link_to_previous_page();?>
    <?php echo exhibit_builder_link_to_next_page();?>
</div>

<?php echo foot(); ?>
