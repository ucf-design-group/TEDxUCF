<?php

/* Allow Post Thumbnails to be used */

function setup_thumbnails() {

	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_thumbnails');


function custom_post_types() {

	register_post_type('submissions', array(
		'labels' => array(
			'name' => 'Submissions',
			'singular_name' => 'Submission'),
		'public' => true,
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
		'register_meta_box_cb' => 'submission_meta_add',
		'taxonomies' => array(),
		'has_archive' => false,
		));
}
add_action('init', 'custom_post_types');


function cpt_icons() {

	?>
	<style type="text/css" media="screen">
		#menu-posts-news .wp-menu-image {
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/news.png) no-repeat 6px -17px !important;
		}
		#menu-posts-news:hover .wp-menu-image, #menu-posts-news.wp-has-current-submenu .wp-menu-image {
			background-position: 6px 7px!important;
		}
	</style>
	<?php
}
add_action('admin_head', 'cpt_icons');


/* To include other collections of functions, include_once() the relevant files here. */

include_once("functions/functions-nav.php");
include_once("functions/functions-submissions.php");

?>