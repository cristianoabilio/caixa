<?php function thb_videos( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_videos', $atts );
  extract( $atts );
	$args = array(
		'post_type'=>'post', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1,
		'tax_query' => array(
		    array(                
		        'taxonomy' => 'post_format',
		        'field' => 'slug',
		        'terms' => array(
		            'post-format-video'
		        ),
		        'operator' => 'IN'
		    )
		)
	);

	if ($offset) {
		$args = wp_parse_args( 
			array(
				'offset' => $offset,
			)
		, $args );
	}
	if ($source == 'most-recent') {
		$args = wp_parse_args( 
			array(
				'posts_per_page' => $item_count
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
				'posts_per_page' => 99,
				'orderby' => 'post__in'
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
	$video_posts = new WP_Query( $args );
	global $wp_embed;
	       
 	ob_start();
	if ( $video_posts->have_posts() ) { ?>
		<div class="category_container style2">
			<div class="inner">
				<div class="video_playlist">
					<div class="row" data-equal=">.columns" data-row-detection="true">
						
							<?php $i = 1; while ( $video_posts->have_posts() ) : $video_posts->the_post(); ?>
									<?php if ($i == 1) { ?>
										<div class="small-12 large-8 columns video-side">
												<?php
													$embed = get_post_meta(get_the_ID(), 'post_video', TRUE);
													echo $wp_embed->run_shortcode('[embed]'.$embed.'[/embed]'); 
												?>
										</div>
										<div class="small-12 large-4 columns">
											<div class="vertical-video slick" data-pagination="false" data-navigation="false" data-vertical="true" data-columns="6" data-autoplay="false">
									<?php } ?>
										<?php 
											$active = $i == 1 ? 'video-active' : false;
											$id = get_the_ID();
											$embed = get_post_meta($id, 'post_video', TRUE);
										?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="video_play <?php echo esc_attr($active); ?>" data-video-url="<?php echo esc_attr($embed); ?>" data-post-id="<?php echo esc_attr($id); ?>">
											<span><i class="fa fa-play"></i></span>
											<?php the_title(); ?>
										</a>
									<?php if ($i == $video_posts->post_count) { ?>
											</div>
										</div>
									<?php } ?>
							<?php $i++; endwhile; // end of the loop. ?>
					</div>
				</div>
			</div>
		</div>
	<?php }

   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_videos', 'thb_videos');
