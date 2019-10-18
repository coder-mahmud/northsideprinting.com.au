<?php


# Register Field Group

function nsp_home_acf_field_groups() {

	acf_add_local_field_group(array(
		'key' => 'nsp_home_field_group',
		'title' => 'Home Page Sections',
		'fields' => array(
			array(
				'key' => 'nsp_home_slider_image',
				'label' => 'Home Page Slider Image for Desktop',
				'name' => 'nsp_home_slider_image',
				'type' => 'image',
				'return_format' => 'url',
            ),
			array(
				'key' => 'nsp_home_slider_image_mobile',
				'label' => 'Home Page Slider Image for mobile',
				'name' => 'nsp_home_slider_image_mobile',
				'type' => 'image',
				'return_format' => 'url',
            ),
            
			array(
				'key' => 'nsp_home_highlight_icons',
				'label' => 'Highlight Icons',
				'name' => 'nsp_home_highlight_icons',
				'type' => 'repeater',
				'button_label' => 'Add New Icons',
				'sub_fields' => array(
					array(
						'key' => 'nsp_highlight_icon',
						'label' => 'Icon Name',
						'name' => 'nsp_highlight_icon',
						'type' => 'text',
                        'default_value' => '<i class="fa fa-facebook" aria-hidden="true"></i>',
                        'instructions' => 'Write icon name in this box. Get icon code from here: https://fontawesome.com/v4.7.0/icons/ ',
					),
					array(
						'key' => 'nsp_highlight_text',
						'label' => 'Icon Text',
						'name' => 'nsp_highlight_text',
						'type' => 'text',
						'default_value' => 'White label packaging',
					),

				)
            ),
            
            
			array(
				'key' => 'nsp_home_highlight_products',
				'label' => 'Highlight Products First Two columns',
				'name' => 'nsp_home_highlight_products',
				'type' => 'repeater',
				'button_label' => 'Add Featured Products',
				'sub_fields' => array(
					array(
						'key' => 'nsp_home_highlighted_product_text',
						'label' => 'Promotional Text',
						'name' => 'nsp_home_highlighted_product_text',
						'type' => 'text',
                        'default_value' => 'Pick any Gift Card',
                        'instructions' => '',
					),
					array(
						'key' => 'nsp_home_highlighted_product_image',
						'label' => 'Promotional Image',
						'name' => 'nsp_home_highlighted_product_image',
						'type' => 'image',
                        'instructions' => '',
                        'return_format' => 'url',
					),
					array(
						'key' => 'nsp_home_highlighted_product_link',
						'label' => 'Promotional Link',
						'name' => 'nsp_home_highlighted_product_link',
                        'type' => 'link',
                        'return_format' => 'url',
					),

				)
            ),
            
			array(
				'key' => 'nsp_home_highlight_product_col_3',
				'label' => 'Highlight Items Third column',
				'name' => 'nsp_home_highlight_product_col_3',
				'type' => 'repeater',
                'button_label' => 'Add New Third column item',
                'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'nsp_highlight_third_col_image',
						'label' => 'Image',
						'name' => 'nsp_highlight_third_col_image',
                        'type' => 'image',
                        'return_format' => 'url',
					),
					array(
						'key' => 'nsp_highlight_third_col_text',
						'label' => 'Text',
						'name' => 'nsp_highlight_third_col_text',
						'type' => 'wysiwyg',
						'default_value' => '<h3>Explore our new pro tools</h3>
                        <ul>
                            <li>Order a Free sample Pack</li>
                            <li>Download Email and Free templates</li>
                            <li>Ger Free Promotional Image</li>
                        </ul>',
                    ),
                    array(
						'key' => 'nsp_highlight_third_col_link',
						'label' => 'Link',
						'name' => 'nsp_highlight_third_col_link',
                        'type' => 'link',
                        'return_format' => 'url',
					),
                    array(
						'key' => 'nsp_highlight_third_col_link_text',
						'label' => 'Link Button Text',
						'name' => 'nsp_highlight_third_col_link_text',
                        'type' => 'text',
					),

				)
            ),

            array(
				'key' => 'nsp_home_print_professional_heading',
				'label' => 'Print Professional Heading',
				'name' => 'nsp_home_print_professional_heading',
				'type' => 'text',
				'default_value'=> 'The preferred supplier for print professionals',
            ),
            array(
				'key' => 'nsp_home_print_professional_items',
				'label' => 'Print Professional Items',
				'name' => 'nsp_home_print_professional_items',
				'type' => 'repeater',
                'button_label' => 'Add New Item',
                'layout' => 'table',
				'sub_fields' => array(
					array(
						'key' => 'nsp_home_print_professional_item_heading',
						'label' => 'Heading',
						'name' => 'nsp_home_print_professional_item_heading',
						'type' => 'text',
						'placeholder'=> 'Business Manager',
					),
					array(
						'key' => 'nsp_home_print_professional_item_text',
						'label' => 'Item Text',
						'name' => 'nsp_home_print_professional_item_text',
						'type' => 'wysiwyg',
						'placeholder' => 'Personalised business development advice from an expert in your local area',
                    ),

				)
            ),

            array(
				'key' => 'nsp_home_print_professional_button_text',
				'label' => 'Print Professional Button Text',
				'name' => 'nsp_home_print_professional_button_text',
				'type' => 'text',
				'default_value' => 'Learn More',
            ),

            array(
				'key' => 'nsp_home_print_professional_button_link',
				'label' => 'Print Professional Button Link',
				'name' => 'nsp_home_print_professional_button_link',
                'type' => 'link',
				'return_format' => 'url',
				
            ),

            




		),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-home.php',
                ),
            ),
        ),
	));
}

add_action('acf/init', 'nsp_home_acf_field_groups');