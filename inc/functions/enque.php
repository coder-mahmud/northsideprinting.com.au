<?php

function cwp_nsp_scripts(){
          
	wp_enqueue_script('main-script', get_stylesheet_directory_uri().'/assets/js/app.js', array(),'1.0.0', true );
	wp_localize_script('main-script', 'ajax_url', admin_url('admin-ajax.php'));
}


add_action('wp_enqueue_scripts','cwp_nsp_scripts');

