<?php

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_59f89b137b5a5',
			'title' => 'Manual Image Navigation',
			'fields' => array (
				array (
					'key' => 'field_59f89b26b436a',
					'label' => 'Group Heading',
					'name' => 'group_heading',
					'type' => 'text',
					'instructions' => 'Optional heading for the image navigation',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 100,
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
					'key' => 'field_59f89bafb436b',
					'label' => 'Image Navigation',
					'name' => 'image_navigation',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => '',
					'max' => '',
					'layout' => 'row',
					'button_label' => 'Add Image',
					'sub_fields' => array (
						array (
							'key' => 'field_59f89bdeb436c',
							'label' => 'Title Type',
							'name' => 'title_type',
							'type' => 'radio',
							'instructions' => 'Choose the type of title you would like',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'page-title' => 'Page or Post Title',
								'custom' => 'Custom Title',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'custom',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_59f89c44b436d',
							'label' => 'Custom Title',
							'name' => 'custom_title',
							'type' => 'text',
							'instructions' => 'Enter a custom title. Maximum 150 characters.',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_59f89bdeb436c',
										'operator' => '==',
										'value' => 'custom',
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
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array (
							'key' => 'field_59f89c77b436e',
							'label' => 'Image Type',
							'name' => 'image_type',
							'type' => 'radio',
							'instructions' => 'Choose which type of image to display',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'page-image' => 'Page or Post Featured Image',
								'custom' => 'Custom Image',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'custom',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_59f89ce5b436f',
							'label' => 'Custom Image',
							'name' => 'custom_image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_59f89c77b436e',
										'operator' => '==',
										'value' => 'custom',
									),
								),
							),
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'return_format' => 'url',
							'preview_size' => 'medium',
							'library' => 'all',
							'min_width' => 300,
							'min_height' => 300,
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '.jpg, .png',
						),
						array (
							'key' => 'field_59f89d45b4370',
							'label' => 'Link Type',
							'name' => 'link',
							'type' => 'radio',
							'instructions' => 'Please specify the type of link',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 100,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'page-link' => 'Page or Post Link',
								'internal' => 'Custom Internal Link',
								'external' => 'External URL',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'internal',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_59f89db6b4371',
							'label' => 'Internal Link',
							'name' => 'internal_link',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_59f89d45b4370',
										'operator' => '==',
										'value' => 'internal',
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
							'key' => 'field_59f89e08b4372',
							'label' => 'External Link',
							'name' => 'external_link',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_59f89d45b4370',
										'operator' => '==',
										'value' => 'external',
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
						),
						array (
							'key' => 'field_59f89e2eb4373',
							'label' => 'Associated Page or Post',
							'name' => 'associated_page',
							'type' => 'post_object',
							'instructions' => 'If you are using post or page information, please select the page you would like to get the content from',
							'required' => 1,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_59f89bdeb436c',
										'operator' => '==',
										'value' => 'page-title',
									),
								),
								array (
									array (
										'field' => 'field_59f89c77b436e',
										'operator' => '==',
										'value' => 'page-image',
									),
								),
								array (
									array (
										'field' => 'field_59f89d45b4370',
										'operator' => '==',
										'value' => 'page-link',
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
						'param' => 'page_type',
						'operator' => '!=',
						'value' => 'posts_page',
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