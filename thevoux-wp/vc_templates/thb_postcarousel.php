<?php function thb_postcarousel( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_postcarousel', $atts );
  extract( $atts );
	
	ob_start();
	switch($style) {
		case 'style1':
			$style_class = 'featured-style4';
			break;
		case 'style2':
			$style_class = 'featured-style5';
			break;
		case 'style3':
			$style_class = 'featured-style6';
			break;
		case 'style4':
			$style_class = $style;
			break;
	}
	$pagi = ($pagination == 'true' ? 'true' : 'false');
	$nav = ($navigation == 'true' ? 'true' : 'false');
	
	$args = array(
		'nopaging' => 0, 
		'post_type'=>'post', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1,
		'no_found_rows' => true,
		'suppress_filters' => 0
	);
	if ($offset) {
		$args = wp_parse_args( 
			array(
				'offset' => $offset,
			)
		, $args );
	}
	if ($source == 'most-recent') {
		$excluded_tag_ids = explode(',',$excluded_tag_ids);
		$excluded_cat_ids = explode(',',$excluded_cat_ids);
		$args = wp_parse_args( 
			array(
				'posts_per_page' => $item_count,
				'tag__not_in' => $excluded_tag_ids,
				'category__not_in' => $excluded_cat_ids
			)
		, $args );
	} else if ($source == 'by-category') {
	 	if (!empty($cat)) {
	 		$cats = explode(',',$cat);
	 		$args = wp_parse_args( 
	 			array(
	 				'posts_per_page' => $item_count,
	 				'category__in' => $cats
	 			)
	 		, $args );	
	 	}
	} else if ($source == 'by-id') {
		$post_id_array = explode(',', $post_ids);
		
		$args = wp_parse_args( 
			array(
				'post__in' => $post_id_array,
				'posts_per_page' => 99
			)
		, $args );	
	} else if ($source == 'by-tag') {
		$post_tag_array = explode(',', $tag_slugs);
		
		$args = wp_parse_args( 
			array(
				'posts_per_page' => $item_count,
				'tag_slug__in' => $post_tag_array
			)
		, $args );	
	} else if ($source == 'by-share') {
		
		$args = wp_parse_args( 
			array(
				'posts_per_page' => $item_count,
				'meta_key' => 'thb_pssc_counts',  
				'orderby' => 'meta_value_num'
			)
		, $args );	
	} else if ($source == 'by-author') {
		$post_author_array = explode(',', $author_ids);
		
		$args = wp_parse_args( 
			array(
				'posts_per_page' => $item_count,
				'author__in' => $post_author_array
			)
		, $args );	
	}
	$posts = new WP_Query( $args );
	if ( $posts->have_posts() ) { ?>
		<div class="slick <?php echo esc_attr($style_class); ?><?php if($pagi == 'true') { ?> dark-pagination bottom-margin<?php } ?> <?php echo ($style == 'style3' && $nav == 'true') ? 'outset-nav' : ''; ?> <?php echo ($style == 'style3') ? 'mini-columns' : ''; ?>" data-center="<?php echo ($style == 'style3' || $style == 'style4') ? 'false' : 'true'; ?>" data-columns="<?php echo esc_attr($columns); ?>" data-pagination="<?php echo esc_attr($pagi); ?>" data-navigation="<?php echo esc_attr($nav); ?>">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php if ($style == 'style1') {?>
					<article <?php post_class('post featured-style4'); ?>>
						<?php the_post_thumbnail('thevoux-single'); ?>
						<div class="featured-title">
							<aside class="post-meta cf"><?php the_category(', '); ?></aside>
							<div class="post-title">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<div class="post-excerpt">
								<?php echo thb_excerpt(100, '&hellip;'); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more"><?php _e('Read More &rarr;', 'thevoux' ); ?></a>
							</div>
							
						</div>
					</article>
				<?php } else if ($style == 'style2') {?>
					<div class="columns">
						<article <?php post_class('post featured-style5'); ?>>
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thevoux-single'); ?></a>
							</figure>
							<div class="post-title">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							</div>
							<div class="post-excerpt">
								<?php get_template_part( 'inc/postformats/post-just-shares' ); ?>
							</div>
						</article>
					</div>
				<?php } else if ($style == 'style3') {?>
					<div class="columns">
						<article <?php post_class('post featured-style5'); ?>>
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thevoux-single'); ?></a>
							</figure>
							<div class="post-title text-center">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							</div>
						</article>
					</div>
				<?php } else if ($style == 'style4') {?>
					<div class="columns">
						<article <?php post_class('post featured-style7'); ?>>
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thevoux-vertical'); ?></a>
							</figure>
							<aside class="post-meta cf"><?php the_category(', '); ?></aside>
							<div class="post-title">
								
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
								<aside class="post-author">
									<em><?php _e('by', 'thevoux'); ?></em> <?php the_author_posts_link(); ?>
								</aside>
							</div>
						</article>
					</div>
				<?php } ?>
			<?php endwhile; ?>
		</div>
	<?php }
 $out = ob_get_contents();
 if (ob_get_contents()) ob_end_clean();
 
 wp_reset_query();
 wp_reset_postdata();
return $out;
}
add_shortcode('thb_postcarousel', 'thb_postcarousel');
