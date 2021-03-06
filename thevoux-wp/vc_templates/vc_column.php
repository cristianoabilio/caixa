<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$output = $font_color = $el_class = $width = $offset = $height = $parallax_class = $data = $fixed_class = $skrollr = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// full height
if($full_height) {
	
	$height = " full-height-content";

}
$el_class = $this->getExtraClass($el_class);
$width = thb_translateColumnWidthToSpan($width);
$width = thb_column_offset_class_merge($offset, $width) .' columns';

$el_class .= ' '.$animation;
$style = $this->buildStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$data_skrollr = ($skrollr ? ' data-top-bottom="transform: translateY(-'.$skrollr_speed.'px);" data-bottom-top="transform: translateY('.$skrollr_speed.'px);"' : '');

// Parallax
if ( $enable_parallax ) {
	if ( $parallax_speed == '' ) {
		$parallax_speed = 0.2;
	}
	$parallax_class = ' parallax_bg';
	$data = ' data-stellar-background-ratio="'.$parallax_speed.'"';
}
$output .= "\n\t".'<div class="'.$css_class. $parallax_class. $height.'"'.$style.$data_skrollr.' '.$data.'>';
if($fixed == 'true') {
	$output .= "\n\t".'<div class="fixed-me">';
}
//$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
//$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
if($fixed == 'true') {
	$output .= "\n\t".'</div>';
}
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;