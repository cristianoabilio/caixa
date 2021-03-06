<?php get_header(); ?>
<?php get_template_part( 'inc/header/archive-title' ); ?>
<div class="row archive-page-container">
	<div class="small-12 medium-8 columns">
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'inc/loop/style1' ); ?>
		<?php endwhile; ?>
			<?php if ( get_next_posts_link() || get_previous_posts_link()) { ?>
			<div class="blog_nav">
				<?php if ( get_next_posts_link() ) : ?>
					<a href="<?php echo next_posts(); ?>" class="next"><i class="fa fa-angle-left"></i> <?php _e( 'Older Posts', 'thevoux' ); ?></a>
				<?php endif; ?>
				<?php if ( get_previous_posts_link() ) : ?>
					<a href="<?php echo previous_posts(); ?>" class="prev"><?php _e( 'Newer Posts', 'thevoux' ); ?> <i class="fa fa-angle-right"></i></a>
				<?php endif; ?>
			</div>
			<?php } ?>
		<?php else : ?>
		  <?php get_template_part( 'inc/loop/notfound' ); ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar('archive'); ?>
</div>
<?php get_footer(); ?>