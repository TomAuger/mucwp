<?php

/*
 * Template for the Single Read More Features flex content block
 */


extract( acf_get_all_subfield_values( "acf" ) );
?>

<section role="complementary" class="flex-content single-read-more-features-block background-<?php echo get_sub_field( 'background_colour' ); ?>">
	
	<div class="flex-content-wrapper">
		<?php $features = get_sub_field( 'features' );
		if ( $features ) { ?>
		<ul class="read-more-features-list">
			<?php foreach ( $features as $feature ) { ?>
				<li class="item <?php echo $feature['learn_more_button'] ? 'has-learn-more' : '' ?>">
					<?php if ( ! $feature['learn_more_button'] ) { 
						
						if ( 'internal' == $feature['internal_or_external_link'] ) {
							$link = $feature['feature_link'];
						} else {
							$link = $feature['feature_link_external'];
						}
						?>
						<a href="<?php echo $link; ?>">
					
					<?php 
					}
						echo '<div class="image-container">';
							echo '<div class="image-container-inner">';
								echo '<div class="table-cell">';
					echo wp_get_attachment_image( $feature['icon'], 'medium' ); 
					
					//if ( ! $feature['learn_more_button'] ) {
								echo '</div>';
							echo '</div>'; 
						echo '</div>'; 
					//}
					?>
					<div class="read-more-content">
						<?php echo $feature['excerpt']; ?>
						<?php if ( $feature['learn_more_button'] ) { 
							
							if ( 'internal' == $feature['internal_or_external_link'] ) {
								$link = $feature['learn_more_page_link'];
							} else {
								$link = $feature['learn_more_external_link'];
							}?>
							<p><a class="button knockout" href="<?php echo $link; ?>"><?php echo $feature['learn_more_button_text']; ?></a></p>
						<?php } ?>
					</div>
					<?php if ( ! $feature['learn_more_button'] ) { ?>
						</a>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
		<?php }	?>
	</div>

</section>
