<?php
function bed_search_callback(){

	if(isset($_GET['term'])){
		$term = sanitize_text_field ($_GET['term']);
	}


	// echo 'HOla ajax';

	$args = array(
		'post_type' => 'products',
		'posts_per_page' => -1,
		's'=> $term
	);



	$result = array();

	$bed_query = new WP_Query($args);
	while($bed_query -> have_posts()){
		$bed_query -> the_post();
		$result[] = array(
			'id' => get_the_ID(),
			'title' => get_the_title(),
			'permalink' => get_permalink()
		);
		// echo "<li>". get_the_title() ."</li>";
	}
	echo json_encode($result);
	// echo $result;
	wp_die();

	
}

add_action('wp_ajax_product_search', 'bed_search_callback');
add_action('wp_ajax_nopriv_product_search', 'bed_search_callback');