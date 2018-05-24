<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits-menu show'));
?>

<?php $title = metadata('exhibit_page', 'title'); ?>

<div id="content-share">
    <div id="content-share-title"><?php echo __('Download'); ?></div> 
		<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('PDF'); ?></a>
		<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('E-pub'); ?></a>
	<div id="content-share-subtitle"><?php echo __('Share'); ?></div>
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

<script type="text/javascript">
	// slick
	$(".regular").slick({
		dots: true,
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3
	});
</script>

<?php echo foot(); ?>
