<?php function thb_contactmap( $atts, $content = null ) {
    
    $atts = vc_map_get_attributes( 'thb_contactmap', $atts );
    extract( $atts );
    
    $locations = ot_get_option('map_locations');
    ob_start(); ?>
	<div class="contact_map <?php if ($full_height) {?>full-height-content<?php }?>" <?php if (!$full_height) {?>style="height:<?php echo esc_attr($height); ?>px"<?php }?>>
		<div class="google_map" data-map-style="<?php echo ot_get_option('contact_map_style', 8); ?>" data-map-zoom="<?php echo ot_get_option('contact_zoom', 12); ?>" data-map-zoom="<?php echo ot_get_option('contact_zoom', 17); ?>" data-map-center-lat="<?php echo ot_get_option('map_center_lat', '59.93815'); ?>" data-map-center-long="<?php echo ot_get_option('map_center_long', '10.76537'); ?>" data-latlong='<?php echo esc_attr(json_encode($locations)); ?>' data-pin-image="<?php echo ot_get_option('map_pin_image', THB_THEME_ROOT. '/assets/img/pin.png'); ?>"></div>
	</div>
  	
  	<?php 
  	$out = ob_get_contents();
  	if (ob_get_contents()) ob_end_clean();
  return $out;
}
add_shortcode('thb_contactmap', 'thb_contactmap');
