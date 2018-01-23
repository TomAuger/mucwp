<?php
	if( is_home() ) {
		$post_id = get_option( 'page_for_posts' ); // specific ID of home page
	} else {
		$post_id = get_the_ID();
	}
?>

<div
		data-aos="fade"
		data-aos-duration="500"
		class="featured-image lazyload"
		data-bgset="
		<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?> [--small] |
		<?php echo get_the_post_thumbnail_url($post_id, 'medium_large'); ?> [--medium] |
		<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> [--mediumlarge] |
		<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>"
>
	<?php get_template_part( 'parts/hero/hero', 'header-text'); ?>
</div>


