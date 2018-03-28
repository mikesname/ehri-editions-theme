<script>
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
</script>

<?php
function link_to_next_item_show_custom($text = null, $props = array())
{
    if (!$text) {
        $text = __('<div id="next-item-icon" class="material-icons">keyboard_arrow_right</div>');
    }
    $item = get_current_record('item');
    if($next = $item->next()) {
		$next_id = intval(substr(json_encode($next), -2, 1));
		$next_item = metadata($item->next(), array('Dublin Core', 'Title'));
		if (strlen($next_item) > 40) {$next_item = substr($next_item, 0, 40) . '...';}

        return link_to($next, 'show', $text . $next_item, $props);
    }
}

function link_to_previous_item_show_custom($text = null, $props = array())
{
    if (!$text) {
        $text = __('<div id="previous-item-icon" class="material-icons">keyboard_arrow_left</div>');
    }
    $item = get_current_record('item');
    if($previous = $item->previous()) {
		$previous_id = intval(substr(json_encode($previous), -2, 1));
		$previous_item = metadata($item->previous(), array('Dublin Core', 'Title'));
		if (strlen($previous_item) > 40) {$previous_item = substr($previous_item, 0, 40) . '...'; }

        return link_to($previous, 'show', $previous_item . $text, $props);
    }
}

function item_image_gallery_custom($attrs = array(), $imageType = 'square_thumbnail', $filesShow = false, $item = null)
{
    if (!$item) {
        $item = get_current_record('item');
    }

    $files = $item->Files;
    if (!$files) {
        return '';
    }

    $defaultAttrs = array(
        'wrapper' => array('id' => 'item-images'),
        'linkWrapper' => array(),
        'figure' => array(),
        'link' => array(),
        'image' => array()
    );
    $attrs = array_merge($defaultAttrs, $attrs);

    $html = '';
    if ($attrs['wrapper'] !== null) {
        $html .= '<div ' . tag_attributes($attrs['wrapper']) . '>';
    }
    foreach ($files as $file) {
        if ($attrs['linkWrapper'] !== null) {
            $html .= '<figure ' . tag_attributes($attrs['linkWrapper']) . '>';
        }

        $image = file_image($imageType, $attrs['image'], $file);  
        list($width, $height) = getimagesize($file->getWebPath('original')); 
		
        if ($filesShow) {
            $html .= link_to($file, 'show', $image, $attrs['link']);
        } else {
            $linkAttrs = $attrs['link'] + array('href' => $file->getWebPath('original'));
            $html .= '<a ' . tag_attributes($linkAttrs) . ' data-size=' . $width . 'x' . $height . '>' . $image . '</a>';
        }

        if ($attrs['linkWrapper'] !== null) {
            $html .= '</figure>';
        }
    }
    if ($attrs['wrapper'] !== null) {
        $html .= '</div>';
    }
    return $html;
}

function pagination_links_custom($options = array())
{
    if (Zend_Registry::isRegistered('pagination')) {
        // If the pagination variables are registered, set them for local use.
        $p = Zend_Registry::get('pagination');
    } else {
        // If the pagination variables are not registered, set required defaults
        // arbitrarily to avoid errors.
        $p = array('total_results' => 1, 'page' => 1, 'per_page' => 1);
    }

    // Set preferred settings.
    $scrollingStyle = isset($options['scrolling_style']) ? $options['scrolling_style'] : 'Sliding';
    $partial = isset($options['partial_file']) ? $options['partial_file'] : 'common/pagination_control.php';
    $pageRange = isset($options['page_range']) ? (int) $options['page_range'] : 10;
    $totalCount = isset($options['total_results']) ? (int) $options['total_results'] : (int) $p['total_results'];
    $pageNumber = isset($options['page']) ? (int) $options['page'] : (int) $p['page'];
    $itemCountPerPage = isset($options['per_page']) ? (int) $options['per_page'] : (int) $p['per_page'];
    $pageTotal = ceil($totalCount/$pageRange);

    // Create an instance of Zend_Paginator.
    $paginator = Zend_Paginator::factory($totalCount);

    // Configure the instance.
    $paginator->setCurrentPageNumber($pageNumber)
              ->setItemCountPerPage($itemCountPerPage)
              ->setPageRange($pageRange);

	echo "<div class=\"search-results-pagination\">
			<div class=\"search-result-previous\"><div class=\"search-result-image-previous\">keyboard_arrow_left</div>Previous</div>
			<div class=\"search-result-center\"><input class=\"search-result-center-input\" value=\"" . $pageNumber . "\">of " . $pageTotal . "</div>
			<div class=\"search-result-next\"><div class=\"search-result-image-next\">keyboard_arrow_right</div>Next</div>
		  </div>";
}

?>
