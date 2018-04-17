<div id="recent-items" class="search-result">
    <?php
    $title = metadata($item, 'display_title', array('snippet' => 100));
    ?>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image(null, array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    } else {
		echo '<div class="search-result-image-blank"></div>';
	}
    ?>
    <div class="search-result-wrapper">
		<?php if ($title): ?>
			<div class="search-result-title"><?php echo $title; ?></div>
			<p>EHRI-BF-19380509b</p>
			<p>1938-08-05&nbsp;&nbsp;|&nbsp;&nbsp;Schmolka, Marie&nbsp;&nbsp;|&nbsp;&nbsp;Amsterdam</p>
			<p>Der sich in England befindender Weissmandl legt einen Bericht über die Verfolgung und Ausweisung der Juden aus Burgenland vor, sowie über die Illegale Hilfeleistung des orthodoxen Hilfskommittees. Er beantragt Unterstützung und persönliches Treffen mit dem Committee.</p>
		<?php endif; ?>
    </div>
</div>
