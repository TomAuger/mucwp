<?php
/**
 * Automatically enqueue thickbox and use is on default WordPress gallery images.
 */

class AS_Auto_Gallery {
	public function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts(){
		/** @var WP_Post $post */
		$post = get_post();

		if ( ! is_a( $post, 'WP_Post' ) ){
			return;
		}

		// Does this Post have the default WordPress [gallery] shortcode?
		if ( preg_match( "/\[\s*gallery(?:\s|\])/i", $post->post_content ) ){
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_style( 'thickbox' );

			wp_enqueue_script( 'auto-gallery', plugin_dir_url( __FILE__ ) . "/js/auto-gallery.js", array( 'thickbox', 'jquery' ), "1.0.0" );
		}
	}
}

$as_auto_gallery_plugin = new AS_Auto_Gallery();