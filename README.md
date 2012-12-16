WP-Custom-Post-Type-Generator
=============================

Usage

You can call "map_create_post_type( $args )" from your theme functions.php

<pre>
$post_type_args = array(
	'singular' 		=> 'Match',
	'plural' 		=> 'Matches',
	'slug' 			=> 'match',
	'supports'		=> array( 'title', 'thumbnail', 'comments', 'editor' ),
	'meta_boxes' 	=> '',
	'icon'			=> get_bloginfo( 'template_directory' ) . '/img/match-post-type-icon.png',
	'compat'		=> 'post'
);
map_create_post_type( $post_type_args );
</pre>

This function calls a class that will take the $args and populate the $labels and $args automatically. 

