<div class="item record">
    <?php
    $title = metadata($item, 'display_title', array('snippet' => 100));
    ?>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image(null, array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <?php if ($title): ?>
        <div class="item-record-caption"><?php echo $title; ?></div>
    <?php endif; ?>
</div>
