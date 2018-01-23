<!--
	This template part displays the custom image navigation
 -->

<?php if( have_rows('image_navigation') ):
	$itemCount = count(get_field('image_navigation')); // for determining the grid sizing
	$grid = getGridSize($itemCount);

	?>

	<div class="image-navigation row">

		<?php while( have_rows('image_navigation') ): the_row();

			// option types
			$title_type = get_sub_field('title_type');
			$image_type = get_sub_field('image_type');
			$link_type = get_sub_field('link');

			// associated page
			$id = get_sub_field('associated_page');

			// image types
			$custom_image = get_sub_field('custom_image');
			$post_image = get_the_post_thumbnail_url($id, 'full');

			// title types
			$custom_title = get_sub_field('custom_title');
			$post_title = get_the_title($id);

			// link types
			$post_link = get_the_permalink($id);
			$internal_link = get_sub_field('internal_link');
			$external_link = get_sub_field('external_link');

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

			if($link_type == 'internal') {
				$link = $internal_link;
			} else if($link_type == 'external') {
				$link = $external_link;
			} else {
				$link = $post_link;
			}

			// Vars used in the part
			set_query_var( 'image', $image );
			set_query_var( 'title', $title );
			set_query_var( 'link', $link );
			set_query_var( 'grid', $grid );

		?>

		<?php get_template_part('parts/imagenav/imagenav', 'part') ?>

		<?php endwhile; ?>

	</div>

<?php endif; ?>
