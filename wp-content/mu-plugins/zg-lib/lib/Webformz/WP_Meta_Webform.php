<?php

	require_once('Valz_Webform.php');

	/**
	 * Extends Valz_Webform and provides convenience methods that depend on WordPress functions and classes.
	 *
	 * Used specifically for forms within metaboxes.
	 *
	 * Version 1.2 (OTFFEO)
	 * * `update_post_meta_from_input()` now does not require the $post_id argument, since we passed it to the constructor in the first place.
	 *
	 *
	 * Version 1.1 (IFOA)
	 * ------------------
	 * * If a meta field is left blank, `update_post_meta_from_input()` will now completely delete that field, rather than store a blank meta value.
	 * * Added the ::meta_field_name() static function
	 */
	class WP_Meta_Webform extends Valz_Webform {

		const META_PREFIX = '_zg_';

		private $post_id;


		/**
		 * Convenience function to concatenate the meta prefix with the field name for things like calls to `get_post_meta()`
		 * @api
		 * @access static
		 * @param string $field_name
		 * @return string
		 */
		public static function meta_field_name( $field_name ){
			return self::META_PREFIX . $field_name;
		}


		/**
		 * Constructor function.
		 */
		function __construct($post_id = 0, $args = array()){
			$this->post_id = $post_id;

			$post_meta = get_post_custom($post_id);

			// we're only interested in metadata that's tagged with our prefix
			$our_meta = array();
			foreach ($post_meta as $key => $value){
				if (strpos($key, self::META_PREFIX) === 0){
					$key = substr($key, strlen(self::META_PREFIX));
					$our_meta[$key] = $value[0];
				}
			}

			/** @TODO if we have multiple meta values for the same key, we're screwed right now */
			$this->user_input = array_merge($our_meta, $_REQUEST);

			parent::__construct($args);
		}

		/**
		 * Overrides parent method to set up custom templates for this type of form
		 */
		protected function define_templates(){
			$this->template = '<p><label for="<!id>" class="valz_metabox"><!label></label><!field></p>';
			$this->raw_text_template = '<p><!html></p>';
			$this->header_template = '<h2><!label></h2>';
			$this->checkbox_template = '<p><!field> <label for="<!id>"><!label></p>';
		}



		/**
		 * $autop (Boolean) - allows you to enable wpautop on the content of this webform.
		 */
		public function update_post_meta_from_input( $post_id = null, $autop = false ){
			if ( is_null( $post_id ) ) $post_id = $this->post_id;

			foreach ( $this->fields as $field ){
				$data = $_REQUEST[$field['id']];
				if ( $autop )
					$data = wpautop( $data );
				if ( isset( $field['sanitization'] ) )
					$this->sanitize( $data, $field['sanitization'] );

				// Removed: wp_kses_data( $data ) - data is already being sanitized
				update_post_meta( $post_id, self::META_PREFIX.$field['id'], $data );
			}
		}

		/**
		 * Convenience function to return the actual database value (post meta) for a given form field.
		 *
		 * @param int $post_id
		 * @param string $field_id The ID passed to Webform when the field is defined
		 * @param boolean $single If set to `false`, will return an array (even if there's only 1 meta result)
		 * @return string|array Return type depends on the `$single` argument
		 */
		public function get_post_meta( $field_id, $single = true ){
			$key = self::meta_field_name( $field_id );
			return get_post_meta( $this->post_id, $key, $single );
		}
	}