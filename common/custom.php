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

?>
