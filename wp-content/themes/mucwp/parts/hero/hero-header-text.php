<?php
	$post_id = false;

	if(is_home()) {
		$post_id = get_option('page_for_posts'); // specific ID of home page
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$title = $labels->name;
	} else if(is_404()) {
		$title = __('Oops!', LUMOSNOX_TEXTDOMAIN);
	} else if(is_search()) {
		$title =  __('Search Results for: ', LUMOSNOX_TEXTDOMAIN) . esc_attr(get_search_query());
	} else if(is_archive()) {
		$title = get_the_archive_title();
	} else {
		$title = get_the_title();
	}
?>

<div class="row align-middle align-center header-text">
	<div class="column small-12">
		<?php if(get_field('display_page_title', $post_id) || is_404()) { ?>
			<h1><?php echo $title ?></h1>
		<?php } ?>
		<?php if(!empty(get_field('custom_text', $post_id))) { ?>
			<p><?php echo get_field('custom_text', $post_id) ?></p>
		<?php } ?>
		<?php if(get_field('header_style', $post_id) == 'background-video') { ?>
			<div id="Pause">
				<button>Pause Video</button>
			</div>
		<?php } ?>
	</div>
</div>