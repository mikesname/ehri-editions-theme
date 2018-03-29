<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'two-columns items show')); ?>

<div id="content-share">
    <div id="content-share-title"><?php echo __('Download'); ?></div> 
		<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('PDF'); ?></a>
		<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('E-pub'); ?></a>
	<div id="content-share-subtitle"><?php echo __('Share'); ?></div>
	<div class="addthis_inline_share_toolbox"></div>
    <?php if (plugin_is_active('Feedback')): ?>
	<div id="feedback">
		<div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
			<h5><?php echo __('Feedback'); ?></h5>
			<div id="feedback-close" class="material-icons">close</div>
			<form enctype="application/x-www-form-urlencoded" method="post" action="<?php echo $this->url('feedback/public/send'); ?>" class="form panel-body" role="form">
				<div class="form-group">
					<input class="form-control" name="email" id="email" autofocus placeholder="<?php echo __('Your e-mail'); ?>" type="email" />
					<input class="form-control" name="username" id="username" type="text" placeholder="Username" value="">
					<input type="hidden" name="timestamp" id="timestamp" value="<?php echo (new DateTime())->format('Y-m-d H:i:s'); ?>">
				</div>
				<div class="form-group">
					<textarea class="form-control" name="feedback" id="feedback" placeholder="<?php echo __('Your feedback...'); ?>" rows="8"></textarea>
				</div>
                <input class="form-control" name="url" id="url" type="hidden" value="<?php echo absolute_url(); ?>" />
                <input class="form-control" name="title" id="title" type="hidden" value="<?php echo metadata('item', array('Dublin Core', 'Title')); ?>" />
				<button class="feedback-button" type="submit"><?php echo __('Send'); ?></button>
			</form>
		</div>
		<div id="feedback-tab"><?php echo __('Feedback'); ?></div>
        <div id="feedback-thanks"><?php echo __('Thanks for your feedback!'); ?></div>
	</div>
    <?php endif; ?>
</div>

<div id="primary">
	<div id="item-pagination-desktop" class="item-pagination navigation">
        <div class="item-pagination-previous"><?php echo link_to_previous_item_show_custom(); ?></div>
        <div class="item-pagination-next"><?php echo link_to_next_item_show_custom(); ?></div>
    </div>

    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

	<div id="content-share-mobile">
		<div id="content-share-title"><?php echo __('Download'); ?></div> 
			<a id="pdf-create" class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('PDF'); ?></a>
			<a class="content-share-item"><div class="content-share-item-icon">insert_drive_file</div><?php echo __('E-pub'); ?></a>
		<div id="content-share-subtitle"><?php echo __('Share'); ?></div>
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
