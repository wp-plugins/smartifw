<?php

function smart_ifw_shortcode($atts)
{
	global $smart_ifw;
    $smart_ifw = get_option('_smart_ifw_options');
	$values = shortcode_atts(array(
				'name' => 'Icon Name',
				'style' => '',
				), $atts, $smart_ifw['icon_code']
				);
return smart_ifw_icon_render($values, $atts);
	
}

	
function find_attr($attr, $atts) {
    $found = false;
    foreach ($atts as $key => $value) {
        if (is_int($key) && $value === $attr) $found = true;
    }
    return $found;
}

function smart_ifw_icon_render($values, $atts) {

$name =  $values["name"];
$attr = '';

if (find_attr('radius', $atts) ) {
$attr .= ' radius';
} 
if (find_attr('shadow', $atts) ) {
$attr .= ' shadow';
} 
  return <<<EOS
<span class="smart-ifw $name$attr"></span>
EOS;

}