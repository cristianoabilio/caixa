<?php 
	$footer_columns = ot_get_option('footer_columns', 'threecolumns');
	$footer_center_align = ot_get_option('footer_center_align', 'on') == 'on' ? 'center-align' : '';
	$footer_widget_borders = ot_get_option('footer_widget_borders', 'on') == 'on' ? '' : 'no-borders';
	$footer_widget_text_align = ot_get_option('footer_widget_text_align');
	$footer_grid = (ot_get_option('footer_grid') != 'off' ? '' : 'full-width-row');
	$article_fullwidth = (isset($_GET['article_fullwidth']) ? htmlspecialchars($_GET['article_fullwidth']) : ot_get_option('article_fullwidth', 'off'));
	$header_style = (isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1'));
	$subfooter_style = (isset($_GET['subfooter_style']) ? htmlspecialchars($_GET['subfooter_style']) : ot_get_option('subfooter_style', 'footer-standard'));
	$subfooter_content = (isset($_GET['subfooter_content']) ? htmlspecialchars($_GET['subfooter_content']) : ot_get_option('subfooter_content', 'footer-text'));
	$selection_sharing_type = ot_get_option('selection_sharing_buttons') ? ot_get_option('selection_sharing_buttons') : array();
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
?>
		</div><!-- End role["main"] -->

	<?php if (ot_get_option('footer') != 'off') { ?>
	<!-- Start Footer -->
	<!-- Please call pinit.js only once per page -->
	<footer id="footer" role="contentinfo" class="<?php echo esc_attr($footer_widget_text_align. ' ' .$footer_widget_borders); ?>">
	  	<div class="row no-padding <?php echo esc_attr($footer_grid. ' '. $footer_center_align); ?>">
	  		<?php if ($footer_columns == 'fourcolumns') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <?php } elseif ($footer_columns == 'threecolumns') { ?>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif ($footer_columns == 'twocolumns') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <?php } elseif ($footer_columns == 'doubleleft') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif ($footer_columns == 'doubleright') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif ($footer_columns == 'fivecolumns') { ?>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer5'); ?>
		    </div>
		    <?php }?>
	    </div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
	<?php if (ot_get_option('subfooter') != 'off') { ?>
	<!-- Start Sub-Footer -->
	<aside id="subfooter">
		<div class="row">
			<div class="small-12 columns">
				<?php if($subfooter_content == 'footer-icons') {  ?>
					<?php do_action( 'thb_social' ); ?>
				<?php } else if ($subfooter_content == 'footer-text') { ?>
					<p><?php echo do_shortcode(ot_get_option('subfooter_text')); ?></p>
				<?php } else if ($subfooter_content == 'footer-menu') { ?>
					<?php wp_nav_menu( array( 'menu' => ot_get_option('subfooter_menu'), 'depth' => 1, 'container' => false  ) ); ?>
				<?php } ?>
			</div>
		</div>
	</aside>
	<!-- End Sub-Footer -->
	<?php } ?>
	<?php if (ot_get_option('scroll_totop') != 'off') { ?>
		<a href="#" id="scroll_totop"></a>
	<?php } ?>
	</section> <!-- End #content-container -->
</div> <!-- End #wrapper -->
<?php if (ot_get_option('selection_sharing') == 'on') { ?>
<div id="thbSelectionSharerPopover" class="thb-selectionSharer" data-appid="<?php echo ot_get_option('selection_sharing_appid'); ?>" data-user="<?php echo esc_attr($twitter_user); ?>">
  <div id="thb-selectionSharerPopover-inner">
    <ul>
    	<?php if (in_array('twitter',$selection_sharing_type)) { ?>
      <li><a class="action twitter" href="#" title="<?php _e('Share this selection on Twitter', 'thevoux'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <?php } ?>
      <?php if (in_array('facebook',$selection_sharing_type)) { ?>
      <li><a class="action facebook" href="#" title="<?php _e('Share this selection on Facebook', 'thevoux'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <?php } ?>
      <?php if (in_array('email',$selection_sharing_type)) { ?>
      <li><a class="action email" href="#" title="<?php _e('Share this selection by Email', 'thevoux'); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
      <?php } ?>
    </ul>
  </div>
</div>
<?php } ?>
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>