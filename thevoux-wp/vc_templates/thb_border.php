<?php function thb_border( $atts, $content = null) {
	$atts = vc_map_get_attributes( 'thb_border', $atts );
	extract( $atts );
	$output = '';
	
	$output .= '<div class="category_container '. esc_attr($style).'"><div class="inner">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	return $output;

}
add_shortcode('thb_border', 'thb_border');