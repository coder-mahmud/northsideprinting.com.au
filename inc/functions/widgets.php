<?php

function cwp_nsp_widgets() {

	register_sidebar( array(
		'name' => __( 'Footer Column One', 'bilanti' ),
		'id' => 'footer_col_one',
		'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="column_heading">',
        'after_title' => '</h2>',
    ) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column Two', 'bilanti' ),
		'id' => 'footer_col_two',
		'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="column_heading">',
        'after_title' => '</h2>',
    ) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column Three', 'bilanti' ),
		'id' => 'footer_col_three',
		'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="column_heading">',
        'after_title' => '</h2>',
    ) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column Four', 'bilanti' ),
		'id' => 'footer_col_four',
		'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="column_heading">',
        'after_title' => '</h2>',
    ) );
	


}

add_action('widgets_init', 'cwp_nsp_widgets');