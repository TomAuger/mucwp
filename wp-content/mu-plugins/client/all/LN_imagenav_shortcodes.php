<?php

	// This shortcode lets you have an image navigation anywhere in your content
	// Main purpose is for Elementor pages where you do not want this to be the last item on the page
	// Usage: [imagenav type="post" slugs="slug-1 slug-2 slug-3"]
	function LN_imagenav_shortcode( $atts ) {
		$a = shortcode_atts( array(
			'type' => 'post',
			'slugs' => '',
		), $atts );

		//
		$navArray = explode(' ', $a['slugs']);
		$grid = getGridSize(count($navArray));

		// If there are any slugs, run the loop
		if(count($navArray) > 0) {

			// For every item get the post data
			$args = array(
				'post_name__in'  => $navArray,
				'post_type'      => $a['type'],
				'posts_per_page' => -1,
			);

			$the_query = new WP_Query($args);
			if($the_query->have_posts()) : ?>
				<div class="image-navigation row">

					<?php while($the_query->have_posts()) :
						$the_query->the_post();
						ob_start();
						// Vars used in the part
						set_query_var( 'image', get_the_post_thumbnail_url() );
						set_query_var( 'title', get_the_title() );
						set_query_var( 'link', get_the_permalink() );
						set_query_var( 'grid', $grid);

						get_template_part('parts/imagenav/imagenav', 'part');

					endwhile; ?>

				</div>

			<?php endif;
			wp_reset_query();

			$content = ob_get_contents();
			ob_end_clean();

			return $content;
		} else {
			return '';
		}
	}

	add_shortcode( 'imagenav', 'LN_imagenav_shortcode' );