<?php function thb_subscribe( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_subscribe', $atts );
  extract( $atts );
 	ob_start();
 	
 	?>
 	<div class="thb_subscribe">
	 	<?php if ($title) { ?><h3><?php echo $title; ?></h3><?php } ?>
	 	<?php if ($description) { ?><p><?php echo $description; ?></p><?php } ?>
		<form class="newsletter-form row" action="#" method="post">   
			<div class="small-12 medium-9 columns"><input placeholder="<?php _e("Your E-Mail",'thevoux'); ?>" type="text" name="widget_subscribe" class="widget_subscribe"></div>
			<div class="small-12 medium-3 columns"><button type="submit" name="submit" class="btn large black"><?php _e("SIGN UP",'thevoux'); ?></button></div>
		</form>
		<div class="result"></div>
	</div>
	<?php
   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
  return $out;
}
add_shortcode('thb_subscribe', 'thb_subscribe');
