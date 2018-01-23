<?php

/*
 * Template for the Logo Parade flex content block
 */


extract( acf_get_all_subfield_values( "acf" ) );
?>
		
<section role="complementary" class="flex-content single-logo-parade-block background-<?php echo get_sub_field( 'background_colour' ); ?>">
		<?php $logos = get_sub_field( 'logos' );
		if( $logos ) {
		$logo_count = count($logos);
		$logo_count_class = ' logo-count-' . $logo_count;
		$slider_container_class = '';
		$slider_class = '';
		if ( $logo_count > 4 ) {
			wp_enqueue_script( 'logo-parade-slider', get_stylesheet_directory_uri() . '/js/logo-parade-slider.js', array( 'swiper' ), '1.0' );
			$slider_container_class = ' logo-parade-slider';
			$slider_class = ' swiper-wrapper';
		}				
		?>
	<div class="flex-content-wrapper<?php echo $slider_container_class; ?>">
		<div class="inner-container">
			<ul class="logo-parade-list<?php echo $slider_class . $logo_count_class; ?>">
				<?php foreach( $logos as $logo ) { 
				?><li class="swiper-slide">

					<?php if( $logo['logo_link_url'] ) { ?>
						<a target="_blank" href="<?php echo $logo['logo_link_url']; ?>">
					<?php } ?>
					<div class="display-table">
						<div class="display-table-cell">
							<?php echo wp_get_attachment_image( $logo['logo_image'], 'full' ); ?>
						</div>
					</div>
					<?php if( $logo['logo_link_url'] ) { ?>
						</a>
					<?php } ?>

				</li><?php
				} ?>
			</ul>
		</div>
			<?php if ( $logo_count > 4 ) { 
			echo '<div class="logo-swiper-button-prev"></div>';
			echo '<div class="logo-swiper-button-next"></div>'; 
			echo '<div class="logo-swiper-pagination"></div>'; 
			} ?>	
		<?php } ?>
	</div>
	
</section>
