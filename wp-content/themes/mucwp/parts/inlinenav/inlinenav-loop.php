<!--
	This template part displays the custom inline
 -->

<?php
	$gridType        = get_field('nav_layout_type');
	$displayOptions  = get_field('nav_display_options');
	$alignment       = get_field('nav_image_alignment');
	$index           = 0;
	$navigation_type = get_field('navigation_type');
	$overlayClass = in_array('background-colour', $displayOptions) ? 'bg-overlay' : '';

	if($navigation_type == 'custom') {
		$itemCount = count(get_field('navigation_items')); // for determining the grid sizing
	} else {
		$itemCount = count(get_children()); // for determining the grid sizing
	}

	$grid = getGridSize($itemCount); ?>

<?php if($itemCount > 0) { ?>
	<div class="inline-navigation row">

	<?php if(have_rows('navigation_items') && $navigation_type == 'custom'):

		while(have_rows('navigation_items')): the_row();

			// option types
			$title_type   = get_sub_field('title_source');
			$image_type   = get_sub_field('image_source');
			$excerpt_type = get_sub_field('excerpt_source');
			$link_type    = get_sub_field('url_source');
			$link_text    = get_sub_field('link_text');

			// associated page
			$id = get_sub_field('associated_post');

			// image types
			if($gridType == 'row') {
				$img_atts   = wp_get_attachment_image_src(get_sub_field('custom_image'), 'inline-nav-row');
				$post_image = get_the_post_thumbnail_url($id, 'inline-nav-row');
			} else {
				$img_atts   = wp_get_attachment_image_src(get_sub_field('custom_image'), 'inline-nav-grid');
				$post_image = get_the_post_thumbnail_url($id, 'inline-nav-grid');
			}

			$custom_image = $img_atts[0];

			// title types
			$custom_title = get_sub_field('custom_title');
			$post_title   = get_the_title($id);

			// link types
			$post_link     = get_the_permalink($id);
			$internal_link = get_sub_field('custom_internal_link');
			$external_link = get_sub_field('custom_external_link');

			// Excerpts
			$post_excerpt   = get_the_excerpt($id);
			$custom_excerpt = get_sub_field('custom_excerpt');

			if($title_type == 'custom') {
				$title = $custom_title;
			} else {
				$title = $post_title;
			}

			if($image_type == 'custom') {
				$image = $custom_image;
			} else {
				$image = $post_image;
			}

			if($link_type == 'custom-internal') {
				$link = $internal_link;
			} else if($link_type == 'custom-external') {
				$link = $external_link;
			} else {
				$link = $post_link;
			}

			if($excerpt_type == 'custom') {
				$excerpt = $custom_excerpt;
			} else {
				$excerpt = $post_excerpt;
			}

			if($alignment == 'alternating' && $gridType == 'row') {
				$index ++;
			} elseif($alignment == 'right' && $gridType == 'row') {
				$index = 2;
			} else {
				$index = 1;
			}

			$bgImg = ' style="background-image: url(\'' . $image . '\')" ';
			$overlay = (in_array('background-colour', $displayOptions) && !empty($image)) ? $bgImg : '';

			// Vars used in the part
			set_query_var('image', $image);
			set_query_var('title', $title);
			set_query_var('link', $link);
			set_query_var('link_text', $link_text);
			set_query_var('grid', $grid);
			set_query_var('excerpt', $excerpt);
			set_query_var('displayOptions', $displayOptions);
			set_query_var('gridType', $gridType);
			set_query_var('index', $index);
			set_query_var('overlay', $overlay);
			set_query_var('overlayClass', $overlayClass);

			get_template_part('parts/inlinenav/inlinenav', 'part');

		endwhile;

	elseif($navigation_type == 'automatic') :
		global $post;

		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_parent'    => $post->ID,
			'order'          => 'ASC',
			'orderby'        => 'menu_order'
		);

		$parent = new WP_Query($args);

		if($parent->have_posts()) {

			while($parent->have_posts()) {
				$parent->the_post();

				$id = get_the_ID();

				if($gridType == 'row') {
					$image = get_the_post_thumbnail_url($id, 'inline-nav-row');
				} else {
					$image = get_the_post_thumbnail_url($id, 'inline-nav-grid');
				}

				$title     = get_the_title($id);
				$link      = get_the_permalink($id);
				$link_text = __("Read More", LUMOSNOX_TEXTDOMAIN);
				$excerpt   = get_the_excerpt($id);

				if($alignment == 'alternating' && $gridType == 'row') {
					$index ++;
				} elseif($alignment == 'right' && $gridType == 'row') {
					$index = 2;
				} else {
					$index = 1;
				}

				$bgImg = ' style="background-image: url(\'' . $image . '\')" ';
				$overlay = (in_array('background-colour', $displayOptions) && !empty($image)) ? $bgImg : '';

				// Vars used in the part
				set_query_var('image', $image);
				set_query_var('title', $title);
				set_query_var('link', $link);
				set_query_var('link_text', $link_text);
				set_query_var('grid', $grid);
				set_query_var('excerpt', $excerpt);
				set_query_var('displayOptions', $displayOptions);
				set_query_var('gridType', $gridType);
				set_query_var('index', $index);
				set_query_var('overlay', $overlay);
				set_query_var('overlayClass', $overlayClass);

				get_template_part('parts/inlinenav/inlinenav', 'part');
			}
		}

		wp_reset_postdata();

	endif; ?>

	</div>
<?php } ?>
