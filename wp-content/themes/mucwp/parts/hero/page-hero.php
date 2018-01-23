<!-- This template part sets the hero style of the page -->
<?php
	$post_id = false;
	if( is_home() ) {
		$post_id = get_option( 'page_for_posts' ); // specific ID of home page
	}
?>

<?php if(get_field('header_style', $post_id) !== 'none') { ?>
	<div id="ln-<?php echo get_field('header_size', $post_id) ?>" class="hero-image">
		<?php get_template_part( 'parts/hero/hero', get_field('header_style', $post_id)); ?>
	</div>
<?php } ?>
