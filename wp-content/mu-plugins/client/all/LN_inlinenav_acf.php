<?php

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_5a5d061e168c9',
			'title' => 'Inline Navigation',
			'fields' => array (
				array (
					'key' => 'field_5a5d062abbf48',
					'label' => 'Navigation Type',
					'name' => 'navigation_type',
					'type' => 'radio',
					'instructions' => 'Choose the type of inline-navigation you\'d like. With custom you will be able to choose all options, with Automatic it will show all direct child pages to this page.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'custom' => 'Custom',
						'automatic' => 'Automatic',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'automatic',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_5a5d081abbf49',
					'label' => 'Display Options',
					'name' => 'nav_display_options',
					'type' => 'checkbox',
					'instructions' => 'Choose the parts you\'d like to display in the navigation',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 1000,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'title' => 'Title',
						'image' => 'Image',
						'excerpt' => 'Excerpt',
						'link-text' => 'Link Text',
						'background-colour' => 'Background Colour / Overlay',
					),
					'default_value' => array (
					),
					'layout' => 'vertical',
					'toggle' => 0,
				),
				array (
					'key' => 'field_5a5d0be2bbf59',
					'label' => 'Nav Layout Type',
					'name' => 'nav_layout_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'row' => 'Row',
						'grid' => 'Grid',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'row',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_5a5e42138679e',
					'label' => 'Nav Image Alignment',
					'name' => 'nav_image_alignment',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5a5d0be2bbf59',
								'operator' => '==',
								'value' => 'row',
							),
						),
					),
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'left' => 'Left',
						'right' => 'Right',
						'alternating' => 'Alternating',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_5a5d08e5bbf4a',
					'label' => 'Navigation Items',
					'name' => 'navigation_items',
					'type' => 'repeater',
					'instructions' => 'Select your navigation items',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5a5d062abbf48',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => '',
					'max' => '',
					'layout' => 'row',
					'button_label' => 'Add Another Link',
					'sub_fields' => array (
						array (
							'key' => 'field_5a5d0916bbf4b',
							'label' => 'Title Source',
							'name' => 'title_source',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'title',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'post' => 'From Post',
								'custom' => 'Custom',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_5a5d099ebbf4c',
							'label' => 'Custom Title',
							'name' => 'custom_title',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d0916bbf4b',
										'operator' => '==',
										'value' => 'custom',
									),
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'title',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array (
							'key' => 'field_5a5d09b8bbf4d',
							'label' => 'Image Source',
							'name' => 'image_source',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'image',
									),
								),
								array (
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'background-colour',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'from-post' => 'From Post',
								'custom' => 'Custom',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_5a5d09e3bbf4e',
							'label' => 'Custom Image',
							'name' => 'custom_image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d09b8bbf4d',
										'operator' => '==',
										'value' => 'custom',
									),
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'image',
									),
								),
								array (
									array (
										'field' => 'field_5a5d09b8bbf4d',
										'operator' => '==',
										'value' => 'custom',
									),
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'background-colour',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => 600,
							'min_height' => 300,
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '.png, .jpg',
						),
						array (
							'key' => 'field_5a5d0a2fbbf4f',
							'label' => 'Excerpt Source',
							'name' => 'excerpt_source',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'excerpt',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'from-post' => 'From Post',
								'custom' => 'Custom',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_5a5d0a6bbbf50',
							'label' => 'Custom Excerpt',
							'name' => 'custom_excerpt',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d0a2fbbf4f',
										'operator' => '==',
										'value' => 'custom',
									),
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'excerpt',
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
							'key' => 'field_5a5d0a86bbf51',
							'label' => 'URL Source',
							'name' => 'url',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'from-post' => 'From Post',
								'custom-external' => 'Custom External',
								'custom-internal' => 'Custom Internal',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_5a5d0af5bbf52',
							'label' => 'Custom Internal Link',
							'name' => 'custom_internal_link',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d0a86bbf51',
										'operator' => '==',
										'value' => 'custom-internal',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'post_type' => array (
							),
							'taxonomy' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
						),
						array (
							'key' => 'field_5a5d0b49bbf53',
							'label' => 'Custom External Link',
							'name' => 'custom_external_link',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d0a86bbf51',
										'operator' => '==',
										'value' => 'custom-external',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
						array (
							'key' => 'field_5a5d0b69bbf54',
							'label' => 'Link Text',
							'name' => 'link_text',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d081abbf49',
										'operator' => '==',
										'value' => 'link-text',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'default_value' => 'Read More',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array (
							'key' => 'field_5a5d0b81bbf55',
							'label' => 'Associated Post',
							'name' => 'associated_post',
							'type' => 'post_object',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5a5d0916bbf4b',
										'operator' => '==',
										'value' => 'post',
									),
								),
								array (
									array (
										'field' => 'field_5a5d09b8bbf4d',
										'operator' => '==',
										'value' => 'from-post',
									),
								),
								array (
									array (
										'field' => 'field_5a5d0a2fbbf4f',
										'operator' => '==',
										'value' => 'from-post',
									),
								),
								array (
									array (
										'field' => 'field_5a5d0a86bbf51',
										'operator' => '==',
										'value' => 'from-post',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'post_type' => array (
							),
							'taxonomy' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'return_format' => 'id',
							'ui' => 1,
						),
					),
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

	endif;