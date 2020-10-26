<?php get_header(); ?>
<?php 
	$id = $wp_query->get_queried_object_id();
	$style = get_post_meta($id, 'post-style', true) ? get_post_meta($id, 'post-style', true) : 'style1';
	$infinite = ot_get_option('infinite_load', 'on');
?>
<div id="infinite-article" data-infinite="<?php echo esc_attr($infinite); ?>">
	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<?php $ajax = 0; include(locate_template( 'inc/loop/single-'.$style.'.php' ) ); ?>
	<?php endwhile; else : endif; ?>
</div>
<?php get_footer(); ?>
