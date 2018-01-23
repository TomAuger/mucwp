<?php
	$post_id = false;
	if( is_home() ) {
		$post_id = get_option( 'page_for_posts' ); // specif ID of home page
	}
?>

<div class="hero-background-video">
		<div class="video-background">
			<div class="video-foreground">
				<video poster="<?php echo get_field("background_video_poster", $post_id) ?>" id="hero-bgvideo" playsinline
					autoplay muted loop>
					<source src="<?php echo get_field('upload_background_video', $post_id) ?>" type="video/mp4">
				</video>
			</div>
		</div>
	<?php get_template_part('parts/hero/hero', 'header-text'); ?>
</div>