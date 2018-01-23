<?php

/**
 * This class facilitates the use of ACF Flexible Content blocks by automating the loading
 * of 1 or more blocks using a simple static function call.
 *
 *
 */


if ( ! function_exists( 'get_flex_content' ) ){
	function get_flex_content( $acf_flex_content_field_id, $post = null ){
		return AS_ACF_Flex_Blocks::get_flex_content( $acf_flex_content_field_id, $post );
	}
}


class AS_ACF_Flex_Blocks {
	/**
	 * Look in `{theme-directory}/flex by default. Can be over-ridden using the 'as_acf_flex_blocks_part_prefix' filter.
	 */
	const TEMPLATE_PART_PREFIX = "flex";
	/**
	 * Loop to grab flex content fields and serve them up with the appropriate flex-<content_name> template
	 *
	 * @param $acf_flex_content_field_id
	 * @param WP_Post|int $post Optional. If null, will attempt to grab the current $post.
	 */
	public static function get_flex_content( $acf_flex_content_field_id, $post = null ){
		$post = get_post( $post );

		// Die early if ACF Flex Content is not available.
		if ( ! function_exists( 'get_row_layout' ) ){
			trigger_error( "ACF Flexible Content add-on is not currently available.", E_USER_WARNING );
			return;
		}

		// This seems to be a good idea before `if ( have_rows() )`
		reset_rows();
		// check if the flexible content field has rows of data
		if ( have_rows( $acf_flex_content_field_id, $post ) ) {

			// loop through the rows of data
			while ( have_rows( $acf_flex_content_field_id, $post ) ) {
				the_row();

				$layout_name = get_row_layout();

				// Add layout_name so the template part can refer to it (in case of an error)
				set_query_var( 'layout_name', $layout_name );
				$part_prefix = apply_filters( 'as_acf_flex_blocks_part_prefix', self::TEMPLATE_PART_PREFIX );
				set_query_var( 'part_prefix', $part_prefix );

				get_template_part( $part_prefix, $layout_name );
			}

		} else {
			static::no_flex_content_blocks_found( $acf_flex_content_field_id, $post );
		}
	}

	/**
	 * Child classes can override this to provide some notification if the requested flex field is not found.
	 *
	 * @param string $acf_flex_content_field_id
	 * @param WP_Post $oost
	 */
	public static function no_flex_content_blocks_found( $acf_flex_content_field_id, $post ){

		// By default, do nothing if no layout blocks found, but you can over-ride this with a filter
		do_action( "as_acf_flex_blocks_not_found", $acf_flex_content_field_id, $post );
	}
}