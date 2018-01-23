<?php
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_59e903ca5f9ab',
			'title' => 'Hero Image',
			'fields' => array (
				array (
					'key' => 'field_59e903df98eca',
					'label' => 'Hero Style',
					'name' => 'header_style',
					'type' => 'radio',
					'instructions' => 'Please choose which header style appears before your content',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'none' => 'No Hero',
						'featured-image-banner' => 'Featured Image Banner',
						'solid-colour' => 'Solid Colour',
						'background-video' => 'Background Video',
						'controlled-video' => 'Video With Controls',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'solid-colour',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_59fa155518660',
					'label' => 'Hero Size',
					'name' => 'header_size',
					'type' => 'radio',
					'instructions' => 'Select the size of the header you\'d like. Banner will give you a set-height strip (edit that height in the css files, default is 350px), cover will always set the height to the height of your browser window.',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'none',
							),
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'controlled-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'banner' => 'Banner',
						'cover' => 'Cover',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'banner',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_59e904db98ecb',
					'label' => 'Display Page Title?',
					'name' => 'display_page_title',
					'type' => 'true_false',
					'instructions' => 'Would you like to display the page title in the header?',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'none',
							),
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'controlled-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 1,
				),
				array (
					'key' => 'field_59e9055698ecc',
					'label' => 'Display Custom Text?',
					'name' => 'custom_text',
					'type' => 'textarea',
					'instructions' => 'If you would like custom text displayed as an overlay, fill these fields out.',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'none',
							),
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '!=',
								'value' => 'controlled-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 3,
					'new_lines' => 'br',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_59e905c998ecd',
					'label' => 'Video Embed Code',
					'name' => 'video_embed_code',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '==',
								'value' => 'controlled-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 2,
					'new_lines' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_59e906d798ed0',
					'label' => 'Upload Background Video',
					'name' => 'upload_background_video',
					'type' => 'file',
					'instructions' => 'Please upload a small .mp4 file.',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '==',
								'value' => 'background-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => 15,
					'mime_types' => '.mp4',
				),
				array (
					'key' => 'field_59ea133203f4a',
					'label' => 'Background Video Poster',
					'name' => 'background_video_poster',
					'type' => 'image',
					'instructions' => 'Upload an optional background video poster image',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_59e903df98eca',
								'operator' => '==',
								'value' => 'background-video',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => 1400,
					'min_height' => 750,
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '.jpg, .png',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_template',
						'operator' => '!=',
						'value' => 'elementor_canvas',
					),
					array (
						'param' => 'post_type',
						'operator' => '!=',
						'value' => 'rule',
					),
					array (
						'param' => 'post_type',
						'operator' => '!=',
						'value' => 'team',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (
				0 => 'discussion',
				1 => 'comments',
				2 => 'revisions',
				3 => 'send-trackbacks',
			),
			'active' => 1,
			'description' => '',
			'local' => 'php',
		));

	endif;