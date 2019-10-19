<?php


function nsp_custom_post() {

    register_post_type('products', array(

    //'show_in_rest' => true,  // For REST API
      'supports' => array('author', 'thumbnail', 'title', 'editor', 'custom-fields','excerpt'),
      'rewrite' => array('slug' => 'products'),
      'has_archive' => true,
      'public' => true,
      'show_ui' => true,
      'hierarchical' => true,
      'sort' => true,
      'labels' => array(
        'name' => 'Products',
        'add_new_item' => 'Add New Product',
        'edit_item' => 'Edit Product',
        'all_items' => 'All Products',
        'singular_name' => 'Product',
        'add_new' => 'Add New Product',
      ),
	  'menu_icon' => 'dashicons-format-gallery',
	  'taxonomies' => array('category'),
    ));
      

    
}
  
add_action( 'init', 'nsp_custom_post' );

// Taxonomy for products
function nsp_product_taxonomy() {
	register_taxonomy(
		'product-cat',   //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'products', //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'Product Category',  //Display name
			'query_var'             => true,
			'rewrite'                       => array(
				'slug'                  => 'product-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				),
			'show_admin_column' => TRUE
			
			)
	);
}
add_action( 'init', 'nsp_product_taxonomy'); 









// Advanced custom fields for Products
function nsp_products_acf_field_groups() {

	acf_add_local_field_group(array(
		'key' => 'nsp_porducts_post',
		'title' => 'North Side Printing Products',
		'fields' => array(
            array(
				'key' => 'nsp_products_price_starts',
				'label' => 'Product Price Starts From...',
				'name' => 'nsp_products_price_starts',
				'type' => 'text',
			),
            
			array(
				'key' => 'nsp_products_images',
				'label' => 'Product Slider',
				'name' => 'nsp_products_images',
				'type' => 'repeater',
				'button_label' => 'Add New Slide',
				'sub_fields' => array(
					array(
						'key' => 'nsp_product_slide_image',
						'label' => 'Image',
						'name' => 'nsp_product_slide_image',
						'type' => 'image',
                        // 'default_value' => 'Member Name',
                        'return_format' => 'url',
                        
					),
					array(
						'key' => 'nsp_product_slide_text',
						'label' => 'Slide Text',
						'name' => 'nsp_product_slide_text',
                        'type' => 'textarea',
                        'placeholder' => 'Side Text Here....'
					),
				)
            ),

            array(
				'key' => 'nsp_products_tabs',
				'label' => 'Product Tabs',
				'name' => 'nsp_products_tabs',
				'type' => 'repeater',
				'layout' => 'row',
				'button_label' => 'Add New Tab',
				'sub_fields' => array(

					array(
						'key' => 'nsp_product_tab_type',
						'label' => 'Is it Assets type tab?',
						'name' => 'nsp_product_tab_type',
                        'type' => 'radio',
                        'choices' => array(
							'No' => 'No',
							'Yes' => 'Yes',
						),
						'return_format' => 'value',
						'default_value' => 'No',
					),



					array(

						'key' => 'nsp_product_tab_specs',
						'label' => 'Product Specification for Left Column',
						'name' => 'nsp_product_tab_specs',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'conditional_logic' => array(
							array(
								array(
									'field' => 'nsp_product_tab_type',
									'operator' => '==',
									'value' => 'No',
								),
							),
						),
                        'sub_fields' => array(

                        	array(
								'key' => 'nsp_product_specs_heading',
								'label' => 'Specification Heading',
								'name' => 'nsp_product_specs_heading',
		                        'type' => 'textarea',
							),

                        	array(
								'key' => 'nsp_product_specs_text',
								'label' => 'Specification Text',
								'name' => 'nsp_product_specs_text',
		                        'type' => 'wysiwyg',
							),
                        )
					),


					array(

						'key' => 'nsp_product_tab_specs_right',
						'label' => 'Product Specification for Right Column',
						'name' => 'nsp_product_tab_specs_right',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'conditional_logic' => array(
							array(
								array(
									'field' => 'nsp_product_tab_type',
									'operator' => '==',
									'value' => 'No',
								),
							),
						),
                        'sub_fields' => array(

                        	array(
								'key' => 'nsp_product_specs_heading_right',
								'label' => 'Specification Heading',
								'name' => 'nsp_product_specs_heading_right',
		                        'type' => 'textarea',
							),

                        	array(
								'key' => 'nsp_product_specs_text_right',
								'label' => 'Specification Text',
								'name' => 'nsp_product_specs_text_right',
		                        'type' => 'wysiwyg',
							),
                        )
					),

					array(
						'key' => 'nsp_product_desc_text',
						'label' => 'Extra Description Text',
						'name' => 'nsp_product_desc_text',
                        'type' => 'textarea',
                        'conditional_logic' => array(
							array(
								array(
									'field' => 'nsp_product_tab_type',
									'operator' => '==',
									'value' => 'No',
								),
							),
						),
					),

					array(
						'key' => 'nsp_product_asset_tab',
						'label' => 'Assets Tab',
						'name' => 'nsp_product_asset_tab',
                        'type' => 'repeater',
                        'conditional_logic' => array(
							array(
								array(
									'field' => 'nsp_product_tab_type',
									'operator' => '==',
									'value' => 'Yes',
								),
							),
						),
						'sub_fields' => array(

                        	array(
								'key' => 'nsp_product_asset_heading_first_row',
								'label' => 'Asset Heading First Row',
								'name' => 'nsp_product_asset_heading_first_row',
		                        'type' => 'text',
		                        'placeholder' => ''
							),
                        	array(
								'key' => 'nsp_product_asset_heading_second_row',
								'label' => 'Asset Heading Second Row',
								'name' => 'nsp_product_asset_heading_second_row',
		                        'type' => 'text',
		                        'placeholder' => ''
							),
                        	array(
								'key' => 'nsp_product_asset_image',
								'label' => 'Asset Heading Image',
								'name' => 'nsp_product_asset_image',
		                        'type' => 'image',
		                        'return_format' => 'url'
							),
                        	array(
								'key' => 'nsp_product_asset_file',
								'label' => 'Asset PDF File',
								'name' => 'nsp_product_asset_file',
		                        'type' => 'file',
		                        'return_format' => 'url'
							),

                        )


					),






				)
            ),

            /*
            array(
				'key' => 'nsp_products_psd_template',
				'label' => 'Product Artwork Template in PSD format',
				'name' => 'nsp_products_psd_template',
				'type' => 'file',
				'return_format' => 'url',
			),

            array(
				'key' => 'nsp_products_ai_template',
				'label' => 'Product Artwork Template in AI format',
				'name' => 'nsp_products_ai_template',
				'type' => 'file',
				'return_format' => 'url',
			),

            array(
				'key' => 'nsp_products_pdf_template',
				'label' => 'Product Artwork Template in PDF format',
				'name' => 'nsp_products_pdf_template',
				'type' => 'file',
				'return_format' => 'url',
			),

            array(
				'key' => 'nsp_products_id_template',
				'label' => 'Product Artwork Template in ID format',
				'name' => 'nsp_products_id_template',
				'type' => 'file',
				'return_format' => 'url',
			),
			*/

            array(
				'key' => 'nsp_products_pricing_iframe',
				'label' => 'Product Pricing Iframe',
				'name' => 'nsp_products_pricing_iframe',
                'type' => 'textarea',
                'default_value' => '<iframe src="https://my.lepcolourprinters.com.au/index_wl.html#!/wl/120098/o/0/j/0?t=eyJhbGciOiJkaXIiLCJlbmMiOiJBMjU2Q0JDLUhTNTEyIiwidHlwIjoiSldUIn0..BDHqsiahmviPgQo6CT4M0g.thLPfqOu4LqS5vk3TB8rWsw4UuzxpMzwZg-iDBBE6t9uTnJBVgGl2FnDs0nWqWdIf5Pdbk75rz_xHMdNPteN5Wh2vUGSpXYyFqG4Yjah41n1s3xmAJ4jlNucXzAqC8jl_vIVfQVaOt5gtAwdo0pSsO0aoGvlkHpIT_xYbQcIntfiwShQb5vy_GTiN4Hvmk7LgLbf0oqj2he7mFmVeXRtLU3lpvSg7kgnr42fRK48uX5dv1Ov_X4l4zEdgOzLGJ6-eORwS9UqsOj0iDX4F_KHVj7sYxik2HmyCUUci6LiotuijoH3662GHRPHL1APXpCdoIznDiRFrWs_oYjTZOJLJ8N9AT-cDAgJMtCJHlOZsFvAK9HVgS9KMcw3gcEuK38cMfc2Wcz0FguJL_cmFSlH4i8iZrx5RDB8ezhahOPi-JY.RG08Q0J8KDENYPtDt_TAHdUNGA2XrUNqMTDoqJuQJBo" frameborder="0" width="100%" height="750"></iframe>',
            ),
            
            array(
				'key' => 'nsp_products_icons',
				'label' => 'Four Icons Area',
				'name' => 'nsp_products_icons',
				'type' => 'repeater',
				'button_label' => 'Add New Icon',
				'sub_fields' => array(
					array(
						'key' => 'nsp_products_icons_icon',
						'label' => 'Icon',
						'name' => 'nsp_products_icons_icon',
                        'type' => 'text',
                        'instructions' => 'Get icons from here: https://fontawesome.com/v4.7.0/icons/',
                        'placeholder' => '<i class="fa fa-facebook-official" aria-hidden="true"></i>'
                        
					),
					array(
						'key' => 'nsp_products_icons_heading',
						'label' => 'Icon Heading',
						'name' => 'nsp_products_icons_heading',
                        'type' => 'textarea',
                        'placeholder' => 'Competitive Prices'
                    ),
                    array(
						'key' => 'nsp_products_icons_text',
						'label' => 'Icon Text',
						'name' => 'nsp_products_icons_text',
                        'type' => 'textarea',
                        'placeholder' => 'Hard-to-beat pricing with trade buyers in mind.'
					),
				),

            ),
            /*
            array(
				'key' => 'nsp_products_tabs',
				'label' => 'Product TABs area',
				'name' => 'nsp_products_tabs',
				'type' => 'repeater',
				'button_label' => 'Add New Tab',
				'sub_fields' => array(
					array(
						'key' => 'nsp_products_tab_heading',
						'label' => 'Tab Heading',
						'name' => 'nsp_products_tab_heading',
                        'type' => 'text',
                        'placeholder' => 'DETAILS'
                        
					),
					array(
						'key' => 'nsp_products_tab_details',
						'label' => 'Tab Details',
						'name' => 'nsp_products_tab_details',
                        'type' => 'wysiwyg',
                        'placeholder' => ''
                        
					),
					array(
						'key' => 'nsp_products_tab_image',
						'label' => 'Tab Image',
						'name' => 'nsp_products_tab_image',
                        'type' => 'image',
                        'return_format' => 'url'   
					),

				),

            ),
            */




		),
		'location' => array(
			array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'products',
                ),
            ),
		),
	));
}

add_action('acf/init', 'nsp_products_acf_field_groups');