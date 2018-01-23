<?php

	// Enqueue parent theme styles and child styles for overwrites
	function LN_child_theme_enqueue_styles() {
		$parent_style = 'ln-parent-style';
		wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
		wp_enqueue_style('ln-child-style', get_stylesheet_directory_uri() . '/assets/styles/style.css', array($parent_style), wp_get_theme()->get('Version'));
	}

	add_action('wp_enqueue_scripts', 'LN_child_theme_enqueue_styles', 999);
