<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<script>
jQuery(function($) {
  var doc = new jsPDF();
  var specialElementHandlers = {
    '#editor': function(element, renderer) {
      return true;
    }
  };
  $('#pdf-create').click(function() {
    doc.fromHTML($('.element-text-document').html(), 20, 20, {
      'width': 170,
      'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
  });
});
</script>

<div id="content-share">

    <?php $pdf = tei_editions_get_first_file_with_extension($item, ".pdf"); ?>
    <?php $epub = tei_editions_get_first_file_with_extension($item, ".epub"); ?>

    <?php if ($pdf or $epub): ?>
    <div id="content-share-title">Download</div>
        <?php if ($pdf): ?>
		    <a href="<?php echo $pdf->getWebPath(); ?>"
               id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>PDF</a>
        <?php endif; ?>
        <?php if ($epub): ?>
		    <a href="<?php echo $epub->getWebPath(); ?>"
               class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>E-pub</a>
        <?php endif; ?>
    <?php endif; ?>
    <div id="content-share-subtitle">Share</div>
	<div class="addthis_inline_share_toolbox"></div>
</div>

<div id="primary">
	<div id="item-pagination-desktop" class="item-pagination navigation">
        <div class="item-pagination-previous"><?php echo link_to_previous_item_show_custom(); ?></div>
        <div class="item-pagination-next"><?php echo link_to_next_item_show_custom(); ?></div>
    </div>

    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

	<div id="content-share-mobile">
		<div id="content-share-title">Download</div> 
			<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>PDF</a>
			<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div>E-pub</a>
		<div id="content-share-subtitle">Share</div>
		<div class="addthis_inline_share_toolbox"></div>
	</div>

    <!-- Items metadata -->
    <div id="item-texts">
        <?php echo tei_editions_render_item_text('item'); ?>
    </div>


    <!-- Mobile navigation -->
	<div id="item-pagination-mobile" class="item-pagination navigation">
        <div class="item-pagination-previous"><?php echo link_to_previous_item_show_custom(); ?></div><br>
        <div class="item-pagination-next"><?php echo link_to_next_item_show_custom(); ?></div>
    </div>
</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
