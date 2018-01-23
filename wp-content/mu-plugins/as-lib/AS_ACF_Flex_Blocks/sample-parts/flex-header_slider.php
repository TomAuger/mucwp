<?php

/*
 * Header slider Flex Content Block.
 */
$acf_arrow_position = get_field( 'arrow_position' );

$first_slide_content = '';
?>
<section role="banner" class="flex-content header-slider swiper-container">
	<?php if( have_rows( 'slide' ) ): ?>

		<ul class="slides swiper-wrapper">

		<?php while( have_rows( 'slide' ) ) : the_row();

			// Create variables out of all the fields, with "acf_" in front of the name
			extract( acf_get_all_subfield_values( "acf" ) );
			
		?>

			<li class="swiper-slide">
				<?php //echo wp_get_attachment_image( $acf_slide_image, 'large' ) ?>
				
				<div class="slide-image highdpi-ready" style="background-image: url('<?php echo wp_get_attachment_url( $acf_slide_image, 'large' ); ?>');"></div>
				
				<?php 
				// Copy the output of the first slide and stick it in by default
				if ( ! $first_slide_content ) {
					ob_start();
				}
				?>
				<div class="slide-content">
					<div class="display-table">
						<div class="display-table-cell">
							<?php $hero_headline = get_sub_field( 'hero_headline' ); 
							echo( $hero_headline ? '<h3 class="field">' . $hero_headline . '</h3>' : '' ); 
							?>
							<?php acf_echo_subfield( 'content_text', 'div', 'content-text' ); ?>
							<div class="action-buttons">
								<?php if ( $acf_call_to_action ) : ?>
								<a class="call-to-action button" href="<?php echo $acf_c2a_link ?>"><?php echo $acf_c2a_button_text ?></a>
								<?php endif; ?>

								<?php if ( $acf_call_to_action && $acf_learn_more_link ) : ?>
								<span class="action-buttons-or"><?php echo __( 'or', TELMETRICS_TEXT_DOMAIN );?></span>
								<?php endif; ?>

								<?php if ( $acf_learn_more_link ) : ?>
								<a class="learn-more-link button" href="<?php echo $acf_learn_more_link_url ?>"><?php echo( $acf_learn_more_link_text ? $acf_learn_more_link_text : __( 'Learn more' ) . ' <span class="screen-reader-text"> ' . __( 'about', TELMETRICS_TEXT_DOMAIN ) . ' ' . $hero_headline . '</span>'  ); ?></a>
								<?php endif; ?>
							</div>	
						</div>
					</div>
					
				</div>
				
				<?php 
				if ( ! $first_slide_content ) {
					$first_slide_content = ob_get_contents();
					ob_end_flush();
				}
				?>
			</li>

		<?php endwhile; ?>

		</ul>
	<?php if ( 'wide' === $acf_arrow_position ) : ?>
		<a href="#" class="swiper-button-wide swiper-button-prev"></a>
		<a href="#" class="swiper-button-wide swiper-button-next"></a>
	<?php endif; ?>

	<?php endif; ?>	
	
	<!-- Overlay transparency layer !-->
	<div id="swiper-trans-layer">
		<div id="swiper-trans-shape"></div>
	</div>
	
	<!-- Slide content container !-->
	<div id="swiper-content-container">
		<div id="swiper-position-content">
		<?php if ( 'wide' !== $acf_arrow_position ) : ?>
			<div class="swiper-button-narrow swiper-button-prev"></div>
			<div class="swiper-button-narrow swiper-button-next"></div>
		<?php endif; ?>
			<div id="swiper-clone-area"><?php echo $first_slide_content ?></div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
	
</section>