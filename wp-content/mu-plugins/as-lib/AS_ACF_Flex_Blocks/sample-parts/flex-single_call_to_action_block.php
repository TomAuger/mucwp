<?php

/*
 * Template for the Single Call to Action flex content block
 */


extract( acf_get_all_subfield_values( "acf" ) );
?>

<section role="complementary" class="flex-content single-call-to-action-block background-<?php echo get_sub_field( 'background_colour' ); $image_position =  get_sub_field( 'image_position' ); echo( $image_position ? ' ' . $image_position : '' ); ?>">
	
	<div class="flex-content-wrapper">
		<div class="call-to-action-image">
			<?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'large' ); ?>
		</div>
		<div class="call-to-action-text">
			<?php acf_echo_subfield( 'heading', "h3" ); ?>
			<?php acf_echo_subfield( 'subheading', 'h4' ); ?>
			<?php acf_echo_subfield( 'content', 'div', 'body-text' ); ?>

			<?php
			if ( get_sub_field( 'call_to_action_button' ) ) {
				$link_type = get_sub_field( 'internal_or_external_link' );
				if ( 'internal' == $link_type ) {
					$call_to_action_url = get_sub_field( 'call_to_action_page_link' );
				} else {
					$call_to_action_url = get_sub_field( 'call_to_action_url' );
				}
				if ( ! empty ( $call_to_action_url ) ) : ?>
					<a class="button call-to-action" href="<?php echo $call_to_action_url ?>"><?php echo get_sub_field( 'call_to_action_button_text' ); ?></a>
				<?php endif;
			}
			?>
		</div>
	</div>

</section>
