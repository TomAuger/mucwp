<?php

/*
 * Needs / Pains Feature blocks.
 *
 * Includes an optional Heading and Content, and then up to 4 slots for "Features".
 *
 * A "Feature" consists of an icon, and optionally, content text and a link.
 */

?>

<section role="complementary" class="flex-content needs-pain-feature background-<?php echo get_sub_field( 'background_colour' ) ?>">
	<div class="flex-content-wrapper">
	<?php $heading = get_sub_field( 'heading' ); ?>
	<?php if ( $heading ) : ?>
		<h3><?php echo $heading; ?></h3>
	<?php endif; ?>

	<?php $content = get_sub_field( 'content_text' ); ?>
	<?php if ( $content ) : ?>
		<div class="body-text"><?php echo $content; ?></div>
	<?php endif; ?>

	<?php
		// Get the total number of features so we can figure out what %
		// their widths need to be in the CSS.

		$total_features = count( get_sub_field( 'features' ) );
	?>

	<?php if ( $total_features ) : ?>

		<ul class="features">
			<?php while ( have_rows( 'features' ) ) : the_row();
				// Create variables out of all the fields, with "acf_" in front of the name
				extract( acf_get_all_subfield_values( "acf" ) );
			?>

			<li class="feature cols-<?php echo $total_features ?>">
				<?php if ( isset( $acf_include_link ) && ! empty( $acf_include_link ) ) : ?>
					<a href="<?php
					if ( 'internal' == $acf_internal_or_external_link ) {
						echo $acf_feature_link_url;
					} else {
						echo $acf_feature_link_url_internal;
					}?>">
				<?php endif; ?>

				<?php echo wp_get_attachment_image( $acf_feature_icon, "thumbnail" ); ?>

				<?php acf_echo_subfield( "feature_heading", "h3" ); ?>
				<?php acf_echo_subfield( "feature_content_text", "div", "body-text" ); ?>

				<?php if ( isset( $acf_include_link ) && ! empty( $acf_include_link ) ) : ?>
					</a>
				<?php endif; ?>
			</li>

			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	</div>
</section>