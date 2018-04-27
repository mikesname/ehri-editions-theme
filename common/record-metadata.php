<?php
    $item = get_view()->{'item'};
    $texts = tei_editions_render_document_texts($item);
    $images = tei_editions_render_document_images($item);
    $refs = tei_editions_render_document_references($item);
    $exhibit = tei_editions_get_neatline_exhibit($item);
?>

<a href="#document-metadata" class="items-content-button"><?php echo __('Metadata');?></a>

<?php if ($texts): ?>
    <a href="#document-text" class="items-content-button"><?php echo __('Document Text'); ?></a>
<?php endif; ?>

<?php if ($exhibit): ?>
    <a href="#document-map" class="items-content-button"><?php echo __('Map'); ?></a>
<?php endif; ?>

<?php if ($refs): ?>
    <a href="#document-refs" class="items-content-button"><?php echo __('References'); ?></a>
<?php endif; ?>
<?php if (plugin_is_active('Commenting')): ?>
    <a href="#document-comments" class="items-content-button"><?php echo __('Comments'); ?></a>
<?php endif; ?>

<!-- METADATA -->
<div id="document-metadata">
    <?php echo $images; ?>

    <h3><?php echo __('Metadata'); ?></h3>
    <?php echo tei_editions_render_item_metadata($item); ?>
</div>

<?php if ($texts): ?>
    <div id="document-text" class="document-text">
        <div id="content-info"></div>
        <h3><?php echo __('Document Text');?></h3>
        <?php echo $texts; ?>
    </div>
<?php endif; ?>

<?php if ($exhibit): ?>
    <div id="document-map">
        <h3 class="document-map"><?php echo __('Map'); ?></h3>
        <a id="map-toggle-fullscreen" href="/neatline/fullscreen/<?php echo $exhibit->slug; ?>">
            <span class="map-document-text"><?php echo __('Toggle fullscreen') ?></span>
            <div id="map-toggle-fullscreen-icon" class="material-icons">fullscreen</div>
        </a>
        <iframe name="neatline" class="element-map" src="/neatline/fullscreen/<?php echo $exhibit->slug; ?>?neatline-embed=true"
                width=100% height="410" frameborder="0" allowfullscreen></iframe>
    </div>
<?php endif; ?>

<?php if ($refs): ?>
    <div id="document-refs">
        <h3><?php echo __('References'); ?></h3>
        <?php echo $refs; ?>
    </div>
<?php endif; ?>

<?php if (plugin_is_active('Commenting')): ?>
    <h4 id="document-comments"><?php echo __('Comments'); ?></h4>
    <div id="comments-empty" class="comments-empty"><?php echo __('There are no comments yet.'); ?></div>
    <?php CommentingPlugin::showComments(); ?>
    <div id="comment-expand-button" class="items-content-button"><?php echo __('Comment'); ?></div>
<?php endif; ?>