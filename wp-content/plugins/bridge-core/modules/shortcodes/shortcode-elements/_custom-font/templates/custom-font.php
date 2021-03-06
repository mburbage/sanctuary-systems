<?php

$html = '';
$html .= '<div class="custom_font_holder" style="';
if($font_family != "") {
    $html .= 'font-family: '.$font_family.';';
}

if($font_size != "") {
    $html .= ' font-size: '.$font_size.'px;';
}

if($line_height != "") {
    $html .= ' line-height: '.$line_height.'px;';
}

if($font_style != "") {
    $html .= ' font-style: '.$font_style.';';
}

if($font_weight != "") {
    $html .= ' font-weight: '.$font_weight.';';
}

if($color != ""){
    $html .= ' color: '.$color.';';
}

if($text_decoration != "") {
    $html .= ' text-decoration: '.$text_decoration.';';
}

if($text_shadow == "yes") {
    $html .= ' text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);';
}

if($letter_spacing != "") {
    $html .= ' letter-spacing: '.$letter_spacing.'px;';
}

if($background_color != "") {
    $html .= ' background-color: '.$background_color.';';
}

if($padding != "") {
    $html .= ' padding: '.$padding.';';
}

if($margin != "") {
    $html .= ' margin: '.$margin.';';
}

$border = '';
if($border_color != '') {
    $border .= 'border: 1px solid '.$border_color.';';

    if($border_width != '') {
        $border .= 'border-width: '.$border_width.'px;';
    }
} elseif($border_width != '') {
    $border .= 'border: '.$border_width.'px solid;';
}

$html .= $border;
$html .= ' text-align: ' . $text_align . ';';
$html .= '">' . bridge_core_get_custom_font_modified_title($params, $content) . '</div>';
echo bridge_qode_get_module_part( $html );