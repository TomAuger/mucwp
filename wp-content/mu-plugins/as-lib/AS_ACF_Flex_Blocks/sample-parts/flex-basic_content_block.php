<?php

/*
 * Template for a simple heading + content flex content block
 */


extract( acf_get_all_subfield_values( "acf" ) );
?>

<section role="complementary" class="flex-content basic-content-block background-<?php echo get_sub_field( 'background_colour' ) ?>">
	<div class="flex-content-wrapper">

		<?php
			$layout_style = get_sub_field( 'layout_style' );
			if( $layout_style == 'narrow' ) {
				$layout_class = ' narrow';
			} else {
				$layout_class = ' wide';
			}
		?>

		<div class="call-to-action-text<?php echo $layout_class; ?>">
			<?php
				acf_echo_subfield( 'heading', "h3" );
				if( $layout_style == 'narrow' ) {
					acf_echo_subfield( 'content_text_simple', 'div', 'body-text' );
				} else {
					acf_echo_subfield( 'content_text', 'div', 'body-text' );
				}
			?>
		</div>
	</div>

</section>
