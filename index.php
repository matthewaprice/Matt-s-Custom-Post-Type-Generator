<?php
$mappt_classes = array( 'MAPPT_Base' );
foreach ( $mappt_classes as $mappt_class ) :
	include( "classes/" . $mappt_class . ".class.php" );
endforeach;

function map_create_post_type( $args ) {

	$post_type = new MAPPT();
	$post_type->setPostTypeOptions(
		$args['singular'],
		$args['plural'],
		$args['slug'],
		$args['supports'],
		$args['meta_boxes'],
		$args['icon'],
		$args['compat']
	);
	$post_type->setPostTypeArguments();
	$post_type->initPostType();

}

function map_create_taxonomy( $args ) {

	$taxonomoy = new MAPPT();
	$taxonomoy->setTaxonomyOptions(
		$args['singular'],
		$args['plural'],
		$args['slug'],
		$args['post_types'],
		$args['hierarchical']
	);
	$taxonomoy->initTaxonomy();

}
