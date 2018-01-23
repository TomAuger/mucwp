<?php
/*
 * The missing functions that ACF forgot...
 */



/**
 * @TODO - this doesn't appear to be working any more...
 *
 * Get all the subfields of the current row (repeater or flex content) and return
 * an array with all the field names as keys and all their values as values.
 *
 * @param string $prefix Optional. If provided, will prepend the prefix to each key, along with an "_". Useful if you want to extract() the results.
 *
 * @return array
 */
function acf_get_all_subfield_values( $prefix = "" ){
	if (! empty( $prefix ) ){
		$prefix = chop( $prefix, " _") . "_";
	}

	$row = get_row(); echo "<pre>", print_r( $row, true ), "</pre>";

	if ( $row && ! empty( $row['field'] ) && isset( $row['field']['sub_fields'] ) ){
		return array_reduce(
			$row['field']['sub_fields'],
			function ( $hash, $sub_field ) use ( $prefix ){
				$hash[$prefix . $sub_field['name']] = get_sub_field( $sub_field['name'] );
				return $hash;
			}
		);
	}

	return array();
}

/**
 * Does the current post have a flex content content block that matches the layout name?
 *
 * Useful in header.php to conditionally enqueue scripts and styles based on whether a particular
 * layout is used on that specific page.
 *
 * @param string $layout_name Must match the "name" of the layout in ACF editor.
 * @return boolean True if layout is used on that post/page.
 */
function acf_has_content_block( $layout_name ){
	$all_fields = get_fields();
	if ( isset( $all_fields['content_blocks'] ) && ! empty( $all_fields['content_blocks'] ) ){
		foreach( $all_fields['content_blocks'] as $block ){
			if ( $layout_name == $block['acf_fc_layout'] ){
				return true;
			}
		}
	}

	return false;
}


/**
 * Output/echo the value of an ACF subfield, if it exists, wrapped within an HTML tag.
 *
 * @param string $subfield_name A valid ACF sub_field name
 * @param string $tag Optional. Default: "div". The tag that will wrap the content/value of the subfield.
 * @param string $class Optional. Default; "field". The class that will be attached to the wrapper tag.
 */
function acf_echo_subfield( $subfield_name, $tag = "div", $class = "field" ){
	acf_maybe_echo( get_sub_field( $subfield_name ), $tag, $class );
}

function acf_maybe_echo_field( $field_name, $tag = "div", $class = "field" ){
	acf_maybe_echo( get_field( $field_name ), $tag, $class );
}

/**
 * Output/echo the provided value if it is not empty. Optionally wrapped in the provided HTML tag.
 *
 * @param string $value The value to echo if not empty
 * @param string $tag Optional. Default "
 * @param type $class
 */
function acf_maybe_echo( $value, $tag = "", $class = "field" ){
	if ( ! empty( $value ) ){
		if ( ! empty ( $tag ) ){
			$value = "<$tag class='$class'>$value</$tag>";
		}

		echo $value;
	}
}

/**
 * Gets the ACF field's key when you only have the slug ("name"). Typically you don't need to use this function
 * if you're just getting an ACF field from within your template file, because `get_field()` accepts a slug, a key or an id.
 * But if you're trying to query the key in the global $_POST variable, or inside `$post_data` from the
 * `wp_insert_post_data` action hook, then this one will come in handy, especially if you're using hard-coded
 * PHP field definitions.
 *
 * @param string $slug
 * @param bool $prefer_local Whether to give preference to the PHP hard-coded field definition (default) or the DB field definition.
 *
 * @return string
 */
function acf_get_field_key( $slug, $prefer_local = true ){
	$db_definition = get_field_object( $slug ) ?: acf_get_field( $slug );
	$db_key = "";
	if ( isset( $db_definition['key'] ) ){
		$db_key = $db_definition['key'];
	}

	$local_key = "";
	if ( acf_is_local_enabled() ){
		$local_fields = array_values( array_keys( wp_list_filter( acf_local()->fields, array( "name" => $slug ) ) ) );
		if ( ! empty( $local_fields ) ){
			$local_key = $local_fields[0];
		}
	}

	$key = "";
	if ( $prefer_local ){
		$key = $local_key ?: $db_key;
	} else {
		$key = $db_key ?: $local_key;
	}

	return $key;
}